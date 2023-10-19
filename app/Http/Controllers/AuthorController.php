<?php

namespace App\Http\Controllers;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Console\View\Components\Alert;
use Yoeunes\Toastr\Facades\Toastr;
class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $author = Author::all();

        return view('layouts.authors.author',compact('author'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.authors.addauthor');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $requestData = $request->all();
        // $fileName = time().$request->file('hinh_tgia')->getClientOriginalName();
        // $path = $request->file('hinh_tgia')->storeAs('images', $fileName, 'public');
        // $requestData["hinh_tgia"] = '/storage/'.$path;
        // Author::create($requestData);
        // Toastr::success('Author add successfully','Success');
        // return redirect('router');
        // dd($request->all());

        $request->validate([

            'ten_tgia' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time() . '.' .$request->image->extension();
        $request->image->move(public_path('img'),$imageName);
        $author = new Author();
   
        $author->ten_tgia = $request->ten_tgia;
        $author->hinh_tgia = $imageName;
        $author->save();
        Toastr::success('Author add successfully','Success');
        return redirect('author');
    }
    
    /**
     * Display the specified resource.
     */

    public function show(string $ma_tgia)
    {
        $author = Author::where('ma_tgia',$ma_tgia)->firstOrFail();
        return view('layouts.authors.showauthor', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.Ư
     */
    public function edit(string $ma_tgia)
    {
        $author = Author::where('ma_tgia',$ma_tgia)->firstOrFail();
        return view('layouts.authors.editauthor', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $ma_tgia)
    {
       $request->validate([
            'ten_tgia' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       ]);
        $author = Author::where('ma_tgia',$ma_tgia)->first();
        if(isset($request->image)){
            $imageName = time() . '.' .$request->image->extension();
            $request->image->move(public_path('img'),$imageName);
            $author->hinh_tgia = $imageName;
        }
        $author->ten_tgia = $request->ten_tgia;
        $author->save();
        Toastr::success('Author update successfully','Success');
        return redirect('author');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $ma_tgia)
    {
        $author = Author::where('ma_tgia', $ma_tgia)->first();
        if($author){
            $author->delete();
            Toastr::success('Author delete successfully','Success');
            return redirect('author');
        }else{
            Toastr::error('Author delete fail','Error');
            return redirect('author');
        }
    }
}
