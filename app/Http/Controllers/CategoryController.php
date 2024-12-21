<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category_view = Category::where('category_delete',1)->get();
        return view('backendfile.category.index', compact('category_view'));
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
            $totalEntries = Category::count();

            // Check if the total number of entries is less than 3
            if ($totalEntries <= 5) {
            // Validate the request data
            $validator = Validator::make($request->all(), [
                'category_name' => 'required',
                'category_image' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Example image validation rules
            ]);
            // If validation fails, return an error response with validation messages
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            // Get data from the request
            $category_name = $request->input('category_name');
            $slug_category_name = Str::slug($category_name);
            $uploadedImage = $request->file('category_image');

            if (!empty($uploadedImage)) {
                $imageName = time() . '_' . mt_rand(1000, 9999) . '.' . $uploadedImage->extension();
                $uploadedImage->move(public_path('category_image'), $imageName);

            } else {
                // Handle the case when no image is uploaded.
            }
            // Insert category data into the 'category' table using the DB facade
            Category::insert(['category_name' => $category_name, 'category_image' =>  $imageName, 'slug_category_name' => $slug_category_name]);

            // Redirect back with a success message if the data is saved successfully
            return redirect()->back()->with('success', 'saved successfully');
        } else {
            // Return an error response if the total number of entries is already 3
            return redirect()->back()->with('failed', 'You can only add a maximum of 6 Categories.');
        }
        } catch (\Exception $e) {
            // Redirect back with a failure message if an exception occurs
            return redirect()->back()->with('failed', 'Failed to save');
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
        $category = Category::where('id',$id)->first();
        $category_view = Category::where('category_delete',1)->get();
       

        return view('backendfile.category.edit',compact('category','category_view'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            // Validate the request data
            $validator = Validator::make($request->all(), [
                'category_name' => 'required',
                'category_image' => 'image|mimes:jpeg,png,jpg|max:2048', // Updated image validation rules
            ]);
    
            // If validation fails, return an error response with validation messages
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
    
            // Find the category by its ID
            $category = Category::findOrFail($id);
    
            // Update the category name
            $category->category_name = $request->input('category_name');
              $category->slug_category_name = Str::slug($request->input('category_name'));
    
            // Check if a new image is uploaded
            if ($request->hasFile('category_image')) {
                $uploadedImage = $request->file('category_image');
                $imageName = time() . '_' . mt_rand(1000, 9999) . '.' . $uploadedImage->extension();
                $uploadedImage->move(public_path('category_image'), $imageName);
    
                // Delete the previous image file
                if (File::exists(public_path('category_image/' . $category->category_image))) {
                    File::delete(public_path('category_image/' . $category->category_image));
                }
    
                // Update the category image
                $category->category_image = $imageName;
            }
    
            // Save the updated category data
            $category->save();
    
            // Redirect back with a success message if the data is updated successfully
            return redirect()->back()->with('success', 'Category updated successfully');
        } catch (\Exception $e) {
            // Redirect back with a failure message if an exception occurs
            return redirect()->back()->with('error', 'Failed to update category');
        }
    }
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $model = Category::findOrFail($id);
        $model->category_delete = '0';
        $model->save();

        return redirect()->back()->with('success', 'Category deleted successfully');
    }
}
