<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerEnquiry;

class EnquiryController extends Controller
{
    //
    public function store(Request $request)
    {

        dd($request->all());
    }
    public function enquirydetails()
    {
        $getenquirys = CustomerEnquiry::orderBy('id', 'desc')->get();
        return view('backendfile.enquirydetails', compact('getenquirys'));
    }

    public function quotedetails()
    {
        
        return view('backendfile.requestquote');
    }
}
