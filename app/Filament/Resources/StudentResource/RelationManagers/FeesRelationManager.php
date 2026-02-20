<?php

namespace App\Filament\Resources\StudentResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Filament\Notifications\Notification;

class FeesRelationManager extends RelationManager
{
    protected static string $relationship = 'student_fees';

    protected static ?string $recordTitleAttribute = 'StudentFees';

    /* ===================================
       FORM
    =================================== */

    public function form(Form $form): Form
    {
        return $form
            ->columns(2)
            ->schema([

                Forms\Components\TextInput::make('fee_amount')
                    ->label('Fee Amount')
                    ->numeric()
                    ->minValue(0)
                    ->required(),

                Forms\Components\Select::make('course_id')
                    ->label('Course')
                    ->relationship('course', 'name')
                    ->searchable()
                    ->required(),

                Forms\Components\DatePicker::make('received_on')
                    ->label('Received On')
                    ->required(),

                Forms\Components\Textarea::make('remark')
                    ->label('Remark')
                    ->columnSpan('full')
                    ->required(),

                Forms\Components\ToggleButtons::make('payment_mode')
                    ->label('Payment Mode')
                    ->inline()
                    ->options([
                        'credit_card' => 'Credit Card',
                        'cash' => 'Cash',
                        'upi' => 'UPI',
                    ])
                    ->required(),
            ]);
    }

    /* ===================================
       TABLE
    =================================== */

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('remark')->searchable(),

                Tables\Columns\TextColumn::make('fee_amount')
                    ->label('Amount')
                    ->sortable(),

                Tables\Columns\TextColumn::make('received_on')
                    ->label('Date')
                    ->since(),

                Tables\Columns\TextColumn::make('payment_mode')
                    ->label('Method')
                    ->formatStateUsing(fn ($state) => Str::headline($state))
                    ->sortable(),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->after(fn ($record) => $this->sendWhatsAppMessage($record)),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),

                // Manual WhatsApp Web link
                Tables\Actions\Action::make('whatsapp')
                    ->label('Send via WhatsApp')
                    ->icon('heroicon-o-chat-bubble-left-ellipsis')
                    ->url(fn ($record) => $this->generateWhatsAppUrl($record))
                    ->openUrlInNewTab(),

                Tables\Actions\Action::make('print')
                    ->label('Print Receipt')
                    ->icon('heroicon-o-printer')
                    ->url(fn ($record) => route('fees.print', $record->id))
                    ->openUrlInNewTab(),
            ]);
    }

    /* ===================================
       Manual WhatsApp Link
    =================================== */

    protected function generateWhatsAppUrl($record): string
    {
        $phone = preg_replace('/[^0-9]/', '', $record->student->mobile_no ?? '');

        if (!$phone) {
            return '#';
        }

        if (substr($phone, 0, 2) !== '91') {
            $phone = '91' . $phone;
        }

        $amount = number_format($record->fee_amount, 2);
        $date = \Carbon\Carbon::parse($record->received_on)->format('d M Y');

        $message = "Hello {$record->student->name},\n\n"
            . "We have received your fee payment.\n"
            . "Amount: ₹{$amount}\n"
            . "Date: {$date}\n"
            . "Course: {$record->course->name}\n\n"
            . "Thank you!";

        return "https://wa.me/{$phone}?text=" . urlencode($message);
    }

    /* ===================================
       Auto WhatsApp API Send (AiSensy)
    =================================== */

    protected function sendWhatsAppMessage($record): void
    {
        try {

            $phone = preg_replace('/[^0-9]/', '', $record->student->mobile_no ?? '');

            if (!$phone) {
                return;
            }

            if (substr($phone, 0, 2) !== '91') {
                $phone = '91' . $phone;
            }

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . env('AISENSY_API_KEY'),
                'Content-Type'  => 'application/json',
            ])->post('https://backend.aisensy.com/campaign/t1/api/v2', [
                "apiKey"       => env('AISENSY_API_KEY'),
                "campaignName" => "fee_confirmation",
                "destination"  => $phone,
                "userName"     => $record->student->name,
                "templateParams" => [
                    number_format($record->fee_amount, 2),
                    $record->course->name,
                ],
            ]);

            if ($response->successful()) {
                Notification::make()
                    ->title('WhatsApp message sent successfully')
                    ->success()
                    ->send();
            } else {
                Notification::make()
                    ->title('WhatsApp sending failed')
                    ->danger()
                    ->send();
            }

        } catch (\Exception $e) {
            logger()->error('WhatsApp API Error: ' . $e->getMessage());
        }
    }
}
