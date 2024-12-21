<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $catalog_view = Catalog::where('catalog_delete', 1)->get();

        return view('backendfile.catalog.index', compact('catalog_view'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validate the request data
            $validator = Validator::make($request->all(), [
                'catalog_name' => 'required',
                'catalog_image' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Image validation rules
                'catalog_pdf' => 'required|mimes:pdf|max:2048', // PDF validation rules
            ]);

            // If validation fails, return an error response with validation messages
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Get data from the request
            $catalog_name = $request->input('catalog_name');
            $slug_catalog_name = Str::slug($catalog_name);
            $uploadedImage = $request->file('catalog_image');
            $uploadedPDF = $request->file('catalog_pdf');

            if (!empty($uploadedImage) && !empty($uploadedPDF)) {
                $imageName = time() . '_' . mt_rand(1000, 9999) . '.' . $uploadedImage->extension();
                // $pdfName = time() . '_' . mt_rand(1000, 9999) . '.' . $uploadedPDF->extension();
                $pdfName = $catalog_name . '.' . $uploadedPDF->extension();

                // Move uploaded files to the respective directories
                $uploadedImage->move(public_path('catalog_image'), $imageName);
                $uploadedPDF->move(public_path('catalog_pdfs'), $pdfName);

                // Insert catalog data into the 'catalog' table
                catalog::insert([
                    'catalog_name' => $catalog_name,
                    'catalog_image' =>  $imageName,
                    'catalog_pdf' => $pdfName,
                    'slug_catalog_name' => $slug_catalog_name
                ]);

                // Redirect back with a success message if the data is saved successfully
                return redirect()->back()->with('success', 'Catalog saved successfully');
            } else {
                // Return an error response if any of the required fields are empty
                return redirect()->back()->with('failed', 'Please provide both an image and a PDF file');
            }
        } catch (\Exception $e) {
            // Redirect back with a failure message if an exception occurs
            return redirect()->back()->with('failed', 'Failed to save catalog');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $catalog = Catalog::where('id', $id)->first();
        $catalog_view = Catalog::where('catalog_delete', 1)->get();

        return view('backendfile.catalog.edit', compact('catalog_view', 'catalog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        try {
            // Validate the request data
            $validator = Validator::make($request->all(), [
                'catalog_name' => 'required',
                'catalog_image' => 'image|mimes:jpeg,png,jpg|max:2048', // Updated image validation rules for optional update
                'catalog_pdf' => 'mimes:pdf', // Updated PDF validation rules for optional update
            ]);

            // If validation fails, return an error response with validation messages
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Get catalog data from the request
            $catalog = catalog::find($id);
            if (!$catalog) {
                return redirect()->back()->with('failed', 'Catalog not found');
            }

            $catalog_name = $request->input('catalog_name');
            $slug_catalog_name = Str::slug($catalog_name);

            // Check if new image is uploaded
            if ($request->hasFile('catalog_image')) {
                $uploadedImage = $request->file('catalog_image');
                $imageName = time() . '_' . mt_rand(1000, 9999) . '.' . $uploadedImage->extension();
                $uploadedImage->move(public_path('catalog_image'), $imageName);
                $catalog->catalog_image = $imageName;
            }

            // Check if new PDF is uploaded
            if ($request->hasFile('catalog_pdf')) {
                $uploadedPDF = $request->file('catalog_pdf');
                $pdfName = time() . '_' . mt_rand(1000, 9999) . '.' . $uploadedPDF->extension();
                $uploadedPDF->move(public_path('catalog_pdfs'), $pdfName);
                $catalog->catalog_pdf = $pdfName;
            }

            // Update catalog data
            $catalog->catalog_name = $catalog_name;
            $catalog->slug_catalog_name = $slug_catalog_name;
            $catalog->save();

            // Redirect back with a success message
            return redirect()->back()->with('success', 'Catalog updated successfully');
        } catch (\Exception $e) {
            // Redirect back with a failure message if an exception occurs
            return redirect()->back()->with('failed', 'Failed to update catalog');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $model = Catalog::findOrFail($id);
        $model->catalog_delete = '0';
        $model->save();

        return redirect()->back()->with('success', 'catalog deleted successfully');
    }
}
