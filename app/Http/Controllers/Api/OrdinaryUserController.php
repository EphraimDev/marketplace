<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;
use App\User;

class OrdinaryUserController extends Controller
{
    private $paystack = 'https://api.paystack.co';
    //Paystack private key set in the .env file
    private $paystack_skey;

    public function __construct()
    {
        //Paystack private key set in the .env file
        $this->paystack_skey = Config('app.Paystack_skey');
    }

    /**
     * Fetch all ordinary users
     *
     * @return array
     */
    public function index()
    {
        // 
        $user = User::where('role', 'ordinary_user')->get();

        return  response()->json(["users" => $user]);
    }

    /**
     * Fetch a single ordinary user
     *
     * @param  int  $id
     * @return array
     */
    public function show($id)
    {
        // 

        $user = User::findOrFail($id);

        return  response()->json(["users" => $user]);
    }

    /**
     * Update an ordinary user
     *
     * @param  int  $id
     * @return array
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        if (!$user) {
            return response()->json(['error' => 'User not found!'], 404);
        }

        $user->update($request->all());

        return response()->json(['success' => true]);
    }

    /**
     * Delete an ordinary user
     *
     * @param  int  $id
     * @return array
     */
    public function destroy($id)
    {

        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(['suuccess' => true]);
    }

    /**
     * Update an ordinary user's status
     *
     * @param  int  $id
     * @return array
     */
    public function updateStatus($id)
    {
        // 
    }

    /**
     * An ordinary user can pay via Paystack
     *
     * @param  int  $id
     * @return array
     */
    public function pay($id)
    {
        //return response(["status" => true, "msg" => "you are in the pay controller"]);

        if (!User::where('id', $id)->exists()) {
            return response(["success" => false, "msg" => "User not found."]);
        }

        $rate = 500; //The fixed charge

        $fee = $rate * 100; //Paystack deals in kobo

        $reference = 12344988; //Reference number from backend

        $verificationStatus = $this->verifyTransaction($fee, $reference);
        return response(["success" => $verificationStatus]);
    }

    private function verifyTransaction($fee, $reference)
    {
        try {
            $client = new Client([
                'headers' => ['Authorization' => $this->paystack_skey]
            ]);

            $api = $this->paystack . '/transaction/verify/';
            $paystackApi = $api . $reference;

            $res = $client->request('GET', $paystackApi);
            $response = $res->getBody();

            $result = json_decode($response, true);

            $dataExist = array_key_exists('data', $result);
            $statusExist = array_key_exists('status', $result['data']);

            $statusResult = $result['data']['status'];
            $amountResult = $result['data']['amount'];

            if (!$dataExist && !$statusExist) {
                return false;
            }

            if ($statusResult != 'success' && $amountResult != $fee) {
                return false;
            }
            return true;
        } catch (\Exception $e) {
            Log::error($e);
            return false;
        }
    }
}
