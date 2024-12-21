<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\quotationlist;
use App\Models\quotationproduct;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Session;

class QuotaionController extends Controller
{

    public function index()
    {
        $quotationLists = QuotationList::with('quotationProducts')->orderBy('id','desc')->get();
        return view('backendfile.requestquote', compact('quotationLists'));
    }

    //
    public function store(Request $request)
    {
        // dd($request);
        try {

            // Create a new quotation list record
            $quotationList = quotationlist::create([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'company_name' => $request->input('company_name'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
                'message' => $request->input('message'),
                // Add other fields as needed
            ]);
            // Retrieve the selected products array from the request
            $selectedProducts = json_decode($request->input('selected_products'), true);

            // Iterate over each product in the array
            foreach ($selectedProducts as $product) {
                // Create an array of product data for each product
                $productData = [
                    'quotationlists_id' => $quotationList->id, // Assuming you have quotation list ID available
                    'product_image' => $product['image'], // Assuming 'image' is the key for the product image
                    'product_name' => $product['name'], // Assuming 'name' is the key for the product name
                    // Add other fields as needed
                ];

                // Create a new quotation product record for each product
                $quotationProduct = QuotationProduct::create($productData);
            }

            Session::flash('success', 'Message sent successfully');

            // Redirect back to the form page
            return redirect()->back();
        } catch (\Exception $e) {
            // Set error message
            Session::flash('error', 'Failed to send message. Please try again.');

            // Redirect back to the form page with an error message
            return redirect()->back();
        }
    }
}
