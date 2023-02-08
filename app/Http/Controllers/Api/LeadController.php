<?php

namespace App\Http\Controllers\Api;

use App\Lead;
use App\Mail\NewLeadToLead;
use App\Mail\NewLeadToAdmin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Validator;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        $validations = [
            'name' => 'string|required|max:100',
            'email' => 'email|required|max:100',
            'newsletter' => 'boolean',
            'message' => 'string|required',
        ];
        $formData = $request->all();
        $validator = Validator::make($formData, $validations);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ]);
        }

        $lead = new Lead;
        $lead->name = $formData['name'];
        $lead->email = $formData['email'];
        $lead->newsletter = $formData['newsletter'];
        $lead->message = $formData['message'];
        $lead->save();

        Mail::to('admin@laravel-boolpress.com')->send(new NewLeadToAdmin($formData));
        Mail::to($formData['email'])->send(new NewLeadToLead($formData));

        return response()->json([
            'success' => true,
        ]);
    }
}
