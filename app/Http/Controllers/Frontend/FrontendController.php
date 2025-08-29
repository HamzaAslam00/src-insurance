<?php

namespace App\Http\Controllers\Frontend;

use ReCaptcha\ReCaptcha;
use App\Mail\ContactUsMail;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.pages.index');
    }

    public function services()
    {
        return view('frontend.pages.services');
    }

    public function srcPartners()
    {
        return view('frontend.pages.src_partners');
    }

    public function clientLogin()
    {
        return view('frontend.pages.client_login');
    }

    public function aboutUs()
    {
        return view('frontend.pages.about_us');
    }

    public function paymentPortal()
    {
        return view('frontend.pages.payment_portal');
    }

    public function contactUs(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('frontend.pages.contact_us');
        }
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
            'g-recaptcha-response' => 'required',
        ], [
            'g-recaptcha-response.required' => 'Please complete the reCAPTCHA to proceed.',
        ]);

        try {
            $recaptcha_response = $request->input('g-recaptcha-response');
            $recaptcha_secret = env('RECAPTCHA_SITE_SECRET');
            $recaptcha = new ReCaptcha($recaptcha_secret);
            $recaptcha_result = $recaptcha->verify($recaptcha_response, $request->ip());

            if (!$recaptcha_result->isSuccess()) {
                return response()->json([
                    'status' => JsonResponse::HTTP_UNPROCESSABLE_ENTITY,
                    'message' => 'reCAPTCHA verification failed. Please try again.',
                ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
            }
            $data = $request->only('name', 'email', 'subject', 'message');
            Mail::to(config('services.adminemail'))->send(new ContactUsMail($data));
            return response()->json([
                'success' => JsonResponse::HTTP_OK,
                'message' => 'We will get back to you soon!'
            ], JsonResponse::HTTP_OK);
        } catch (\Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage()
            ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function requestAQuote()
    {
        // dd('fghj');
        return view('frontend.pages.request_a_quote');
    }
}
