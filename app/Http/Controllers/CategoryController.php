<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Console\View\Components\Alert;
use Yoeunes\Toastr\Facades\Toastr;
// use RealRashid\SweetAlert\Facades\Alert;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $category = Category::all();

        return view('layouts.category.category',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.category.addcategory');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Category::create($request->all());
        //Hiển thị thông báo toastr
        Toastr::success('Category add successfully','Success');
        return redirect()->route('category');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $ma_tloai)
    {
        $category = Category::where('ma_tloai', $ma_tloai)->firstOrFail();
        return view('layouts.category.showcategory',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $ma_tloai)
    {
        $category = Category::where('ma_tloai',$ma_tloai)->firstOrFail();
        return view('layouts.category.editcategory', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $ma_tloai)
    {   

        $category = Category::where('ma_tloai',$ma_tloai)->firstOrFail();
        $category->update($request->all());
        Toastr::success('Category update successfully','Success');
        // dd($request->all());
        return redirect()->route('category');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $ma_tloai)
    {
        // Tìm mục cần xóa
        $category = Category::where('ma_tloai', $ma_tloai)->first();
    
        if ($category) {
            // Xóa mục
            $category->delete();
            Toastr::success('Category deleted successfully', 'Success');
        } else {
            Toastr::error('Category not found', 'Error');
        }
    
        return redirect()->route('category');
    }
    
}
