<?php

namespace App\Filament\Resources\StudentResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FeesRelationManager extends RelationManager
{
    protected static string $relationship = 'student_fees';
    
    protected static ?string $recordTitleAttribute = 'StudentFees';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('fee_amount')
                    ->numeric()
                    ->rules(['regex:/^\d{1,6}(\.\d{0,2})?$/'])
                    ->required(),
                
                Forms\Components\DatePicker::make('received_on'),
                
                Forms\Components\TextInput::make('remark')
                    ->columnSpan('full')
                    ->required(),
                
                Forms\Components\ToggleButtons::make('payment_mode')
                    ->inline()
                    ->options([
                        'credit_card' => 'Credit Card',
                        'cash' => 'Cash',
                        'upi' => 'UPI',
                    ])
                    ->required(),
                    Forms\Components\Select::make('course_id')
                    ->label('Course')
                    ->relationship('course', 'name')
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('remark')
                    ->searchable(),

                Tables\Columns\TextColumn::make('fee_amount')
                    ->label('Amount')
                    ->sortable()
                    ->money(fn ($record) => $record->currency),
                
                Tables\Columns\TextColumn::make('received_on')
                    ->label('Date')->since(),

                Tables\Columns\TextColumn::make('payment_mode')
                    ->label('Method')
                    ->formatStateUsing(fn ($state) => Str::headline($state))
                    ->sortable(),
            ])
            ->filters([
                // Add filters here if needed
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),

                   // ✅ Custom WhatsApp share action
            Tables\Actions\Action::make('whatsapp')
            ->label('Send Receipt')
            ->icon('heroicon-o-chat-bubble-left-ellipsis')
            ->url(fn ($record) => $this->generateWhatsAppUrl($record))
            ->openUrlInNewTab(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

        // ✅ Helper Method yahan add karen
        protected function generateWhatsAppUrl($record): string
        {
            $phone = $record->Student->mobile_no ?? ''; // student table me phone field hona chahiye
            $amount = number_format($record->fee_amount, 2);
            $date = \Carbon\Carbon::parse($record->received_on)->format('d M Y');
    
            $message = "Hello {$record->Student->name},\n\n".
                       "We have received your fee payment.\n".
                       "💰 Amount: ₹{$amount}\n".
                       "📅 Date: {$date}\n".
                       "📖 Course: {$record->course->name}\n\n".
                       "Thank you!";
    
            return "https://wa.me/{$phone}?text=" . urlencode($message);
        }
}
