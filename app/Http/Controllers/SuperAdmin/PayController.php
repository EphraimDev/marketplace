<?php

namespace App\Http\Controllers\SuperAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;

class PayController extends Controller
{
  private $client;

  public function __construct()
  {
    $this->client = new Client([
      'headers' => ['Authorization' => Config('app.Paystack_skey')]

    ]);
  }

  public function listPayments()
  {
    try {
      $response = $this->client->request('GET', 'https://api.paystack.co/transaction');
      if ($response->getStatusCode() == 200) {
        $res = $response->getBody();
        $results = json_decode($res, true);
        $results = $results['data'];
      }
    } catch (\Exception $e) {
      Log::error($e);
    }
    //dd($results);
    return view('superadminBE.payment', compact('results'));
  }
}
