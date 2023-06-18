<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    private $apiBaseUrl = 'https://openexchangerates.org/api/';
    private $apiKey = 'MY-KEY';

    public function index()
    {
        return view('converter');
    }

    public function convert(Request $request)
{
    $client = new Client();

    $amount = $request->input('amount');
    $from = $request->input('from');
    $to = $request->input('to');

    $response = $client->request('GET', "{$this->apiBaseUrl}/latest.json", [
        'query' => [
            'app_id' => $this->apiKey,
            'symbols' => $from . ',' . $to,
        ],
    ]);

    $result = json_decode($response->getBody(), true);
    $rates = $result['rates'];

    $convertedAmount = $amount * ($rates[$to] / $rates[$from]);
    $symbol = $this->getCurrencySymbol($to);
    
    return view('converter', compact('convertedAmount', 'symbol', ));
}

private function getCurrencySymbol($currencyCode)
{
    // Define an array mapping currency codes to symbols
    $symbolMap = [
        'USD' => '$',
        'EUR' => '€',
        'BTC' => '₿',
        'BRL' => 'R$',
        'GBP' => '£',
        'ARS' => '$',
        'CAD' => '$',
        'AUD' => '$',
        'JPY' => '¥',
        // Add more currency code-symbol mappings as needed
    ];

    // Check if the currency code exists in the symbol map
    if (array_key_exists($currencyCode, $symbolMap)) {
        return $symbolMap[$currencyCode];
    }

    // Default to an empty string if the currency code is not found
    return '';
}



}
