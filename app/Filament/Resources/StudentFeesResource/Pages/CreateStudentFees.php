<?php

namespace App\Filament\Resources\StudentFeesResource\Pages;

use App\Filament\Resources\StudentFeesResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Http;
use Filament\Notifications\Notification;

class CreateStudentFees extends CreateRecord
{
    protected static string $resource = StudentFeesResource::class;

    protected function afterCreate(): void
    {
        $this->sendWhatsAppMessage($this->record);
    }

    protected function sendWhatsAppMessage($record): void
    {
        try {

            $phone = preg_replace('/[^0-9]/', '', $record->student->mobile_no ?? '');

            if (!$phone) return;

            if (substr($phone, 0, 2) !== '91') {
                $phone = '91' . $phone;
            }

            $fullName = trim(
                $record->student->user->firstname . ' ' .
                $record->student->user->lastname
            );

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . env('AISENSY_API_KEY'),
            ])->post('https://backend.aisensy.com/campaign/t1/api/v2', [

                "apiKey"       => env('AISENSY_API_KEY'),
                "campaignName" => "fee_confirmation_msg",
                "destination"  => $phone,
                "userName"     => $fullName,

                "templateParams" => [
                    $fullName,
                    number_format($record->fee_amount, 2),
                    $record->course->name,
                ],
            ]);

            if ($response->successful()) {
                Notification::make()
                    ->title('WhatsApp message sent successfully')
                    ->success()
                    ->send();
            }

        } catch (\Exception $e) {
            logger()->error($e->getMessage());
        }
    }
    
}