<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanyContact;
use App\Http\Controllers\Controller;
use App\Http\Requests\SendMessageRequest;

class CompanyController extends Controller
{
    public function submit(SendMessageRequest $request)
    {
        CompanyContact::create([
            'email' => $request->email,
            'phone' => $request->companyPhone,
            'company_name' => $request->company,
        ]);

        return back()->with('success', 'Your message has been sent successfully!');
    }
}
