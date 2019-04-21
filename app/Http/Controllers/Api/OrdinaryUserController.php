<?php

namespace App\Http\Controllers\Api;

use DB;
use App\User;
use Validator;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
        $users = User::where('role', 'ordinary-user')->get();

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'message' => 'OK',
            'data' => $users
        ], 200);
    }

    /**
     * Fetch a single ordinary user
     *
     * @param  int  $userId
     * @return array
     */
    public function show($userId)
    {
        $user = User::where('id', $userId)->where('role', 'ordinary-user')->first();

        if (!$user) {
            return response()->json([
                'error' => ['code' => 404, 'message' => 'User not found']
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'message' => 'OK',
            'data' => $user
        ], 200);
    }

    /**
     * Update an ordinary user
     *
     * @param  int  $userId
     * @return array
     */
    public function update(Request $request, $userId)
    {
        // Check if this action is performed by the logged in user
        if (Auth::user()->id != $userId) {
            return response()->json([
                'error' => ['code' => 403, 'message' => "Forbidden to update another user's details"]
            ], 403);
        }

        $validate = Validator::make($request->all(), [
            'first_name' => 'required|min:2',
            'last_name' => 'required|min:2',
            'password' => 'required',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'error' => [
                    'code' => 422,
                    'message' => "Unprocessable Entity",
                    'errors' => $validate->errors()
                ]
            ], 422);
        } else {
            DB::beginTransaction();

            $userResponse = Auth::user()->update([
                "first_name" => $request['first_name'],
                "last_name" => $request['last_name'],
                "password" => bcrypt($request['password'])
            ]);

            DB::commit();

            return response()->json([
                'status' => 'success',
                'code' => 200,
                'message' => 'OK'
            ], 200);
        }
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

        $rate = 1000; //The fixed charge

        $fee = $rate * 100; //Paystack deals in kobo

        $reference = 12344987; //Reference number from backend

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
