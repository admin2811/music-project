<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Yoeunes\Toastr\Facades\Toastr;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Hiển thị lên view
        $articles = Article::all();
        return view('layouts.articles.articles',compact('articles'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.articles.addarticles');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tieude'=> 'required',
            'ten_bhat'=> 'required',
            'ma_tloai'=> 'required',
            'tomtat'=> 'required',
            'noidung'=> 'required',
            'ma_tgia'=> 'required',
            'ngayviet'=> 'required',
            'hinh' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',            
        ]);
        $imageName = time() . '.' .$request->hinh->extension();
        $request->hinh->move(public_path('img'),$imageName);
        $article = new Article();
        $article->tieude = $request->tieude;
        $article->ten_bhat = $request->ten_bhat;
        $article->ma_tloai = $request->ma_tloai;
        $article->tomtat = $request->tomtat;
        $article->noidung = $request->noidung;
        $article->ma_tgia = $request->ma_tgia;
        $article->ngayviet = $request->ngayviet;
        $article->hinh = $imageName;
        $article->save();
        Toastr::success('Article add successfully','Success');
        return redirect('article');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $ma_bviet)
    {
        $article = Article::where('ma_bviet', $ma_bviet)->firstOrFail();
        return view('layouts.articles.showarticles', compact('article'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $ma_bviet)
    {
        $article = Article::where('ma_bviet', $ma_bviet)->firstOrFail();
        return view('layouts.articles.editarticles', compact('article'));    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $ma_bviet)
    {
        $request->validate([
            'tieude'=> 'required',
            'ten_bhat'=> 'required',
            'ma_tloai'=> 'required',
            'tomtat'=> 'required',
            'noidung'=> 'required',
            'ma_tgia'=> 'required',
            'ngayviet'=> 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',          
        ]);
        $article = Article::where('ma_bviet',$ma_bviet)->first();
        if(isset($request->image)){
            $imageName = time() . '.' .$request->image->extension();
            $request->image->move(public_path('img'),$imageName);
            $article->hinh = $imageName;
        }
        $article->tieude = $request->tieude;
        $article->ten_bhat = $request->ten_bhat;
        $article->ma_tloai = $request->ma_tloai;
        $article->tomtat = $request->tomtat;
        $article->noidung = $request->noidung;
        $article->ma_tgia = $request->ma_tgia;
        $article->ngayviet = $request->ngayviet;
        $article->save();
        Toastr::success('Article update successfully','Success');
        return redirect('article');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $ma_bviet)
    {
        $article = Article::where('ma_bviet',$ma_bviet)->first();
        $article->delete();
        Toastr::success('Article delete successfully','Success');
        return redirect('article');
    }
}
