<?php

namespace App\Http\Controllers\Api;

use DB;
use App\User;
use Validator;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Services\FileUploadService;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrdinaryUserController extends Controller
{
    private $paystack = 'https://api.paystack.co';
    
    //Paystack private key set in the .env file
    private $paystack_skey;

    public function __construct(FileUploadService $fileUploadService)
    {
        //Paystack private key set in the .env file
        $this->paystack_skey = Config('app.Paystack_skey');
        $this->fileUploadService = $fileUploadService;
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
     * @param int  $userId
     * @return array
     */
    public function update(Request $request, $userId)
    {
        $authUser = Auth::user();

        // Check if this action is performed by the logged in user
        if ($authUser->id != $userId) {
            return response()->json([
                'error' => ['code' => 403, 'message' => "Forbidden to update another user's details"]
            ], 403);
        }

        $validate = Validator::make($request->all(), [
            'photo'=>'nullable|mimes:jpeg,jpg,png|max:800', //Max 800KB
            'first_name' => 'required|min:2',
            'last_name' => 'required|min:2'
        ]);

        if ($validate->fails()) {
            return response()->json([
                'error' => [
                    'code' => 422,
                    'message' => "Unprocessable Entity",
                    'errors' => $validate->errors()
                ]
            ], 422);
        } 

        // Upload image if it exists
        if($request->hasFile('photo')) {
            $image = $this->fileUploadService->uploadFile($request->file('photo'));

            if(!is_null($authUser->image_name)) {
                $this->fileUploadService->deleteFile($authUser->image_name);
            }
        }
        
        DB::beginTransaction();

        $userResponse = $authUser->update([
            "title" => $request->title ?? null,
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "phone" => $request->phone ?? null,
            "image_url" => $image['secure_url'] ?? $authUser->image_url,
            "image_name" => $image['public_id'] ?? $authUser->image_name
        ]);

        DB::commit();

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'message' => 'OK'
        ], 200);
        
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
