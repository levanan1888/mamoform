<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Client;
use Google\Service\Sheets;
use Google\Service\Sheets\ValueRange;

class RegistrationController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);

        try {
            $client = new Client();
            $client->setApplicationName('Mammo Event Registration');
            $client->setScopes([Sheets::SPREADSHEETS]);
            $client->setAuthConfig(json_decode(env('GOOGLE_SHEETS_JSON_KEY'), true));
            $client->setAccessType('offline');

            $service = new Sheets($client);
            $spreadsheetId = env('GOOGLE_SHEETS_SPREADSHEET_ID');
            $range = "Registration!A:C"; // Name, Phone, Timestamp

            $values = [
                [
                    $request->name,
                    $request->phone,
                    now()->format('Y-m-d H:i:s'),
                ],
            ];

            $body = new ValueRange([
                'values' => $values
            ]);

            $params = [
                'valueInputOption' => 'RAW'
            ];

            $service->spreadsheets_values->append($spreadsheetId, $range, $body, $params);

            return back()->with('success', 'Đăng ký thành công! Cảm ơn bạn.');
        } catch (\Exception $e) {
            \Log::error('Google Sheets Error: ' . $e->getMessage());
            return back()->with('error', 'Có lỗi xảy ra, vui lòng thử lại sau.');
        }
    }
}
