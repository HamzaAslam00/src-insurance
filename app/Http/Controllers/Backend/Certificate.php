<?php

namespace App\Http\Controllers\Backend;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\CertificateRequestMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\JsonResponse;

class Certificate extends Controller
{
    public function certificate($clientId, Request $request)
    {
        // dd($clientId);
        // Validate form data
        $validator = Validator::make($request->all(), [
            'certificate_option' => 'required|string',
            'request_name' => 'required|string|max:255',
            'request_addres' => 'required|string|max:255',
            'information' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => JsonResponse::HTTP_UNPROCESSABLE_ENTITY,
                'message' => $validator->errors()->first(),
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            // Prepare data for email
            $client = Client::findOrFail($clientId);
            // dd($client);
            $data = [
                'certificate_option' => $request->certificate_option,
                'request_name' => $request->request_name,
                'request_address' => $request->request_addres,
                'information' => $request->information,
               'business_name' => $client->business_name,
            ];

            // Send email
            Mail::to(config('services.adminemail'))->send(new CertificateRequestMail($data));

            return response()->json([
                'success' => JsonResponse::HTTP_OK,
                'message' => 'We will get back to you soon!',
            ], JsonResponse::HTTP_OK);
        } catch (\Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage(),
            ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
