@extends('layouts.app')

@section('title', 'Create Article')

@section('contents')
<h1 class="mb-0">Show Article</h1>
<hr />

<div class=" mb-3 d-flex" style="display:flex;flex-direction:column">
    <!-- <div class="col">
                <input type="text" name="ma_tgia" class="form-control" placeholder="ID OF Author">
            </div> -->
    <div class="col mb-3">
        <input type="text" name="ten_tieu" class="form-control" placeholder="Name Article" value="{{ $article->ma_bviet}}" readonly>
    </div>
    <div class="col mb-3">
        <input type="text" name="tieude" class="form-control" placeholder="Title Article" value="{{ $article->tieude}}" readonly>
    </div>
    <div class="col mb-3">
        <input type="text" name="ten_bhat" class="form-control" placeholder="Name Song" value="{{$article->ten_bhat}}" readonly>
    </div>
    <div class="col mb-3">
        <input type="text" name="ma_tloai" class="form-control" placeholder="ID of Category" value="{{ $article->ma_tloai}}" readonly>
    </div>
    <div class="col mb-3">
        <textarea class="form-control" name="tomtat" id="exampleFormControlTextarea1" rows="3" placeholder="Summary" value="{{ $article->tomtat}}" readonly></textarea>
    </div>
    <div class="col mb-3">
        <textarea class="form-control" name="noidung" id="exampleFormControlTextarea1" rows="3" placeholder="Content" value="{{ $article->noidung}}" readonly></textarea>
    </div>
    <div class="col mb-3">
        <input type="text" name="ma_tgia" class="form-control" placeholder="ID of Author" value="{{$article->ma_tgia}}" readonly>
    </div>
    <div class="col mb-3">
        <input type="text" name="ngayviet" class="form-control" placeholder="Date Of Article" value="{{$article->ngayviet}}">
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Image:</strong>
            @if(file_exists(public_path('img/' . $article->hinh)))
            <img src="{{ asset('img/' . $article->hinh) }}" width="100" height="100" class="img img-responsive mt-3" alt="hình">
            @else
            <img src="{{ asset($article->hinh) }}" width="100" height="100" class="img img-responsive mt-3" alt="không có hình">
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="d-grid">
        <a href="{{route('article')}}" class="btn btn-warning">Quay Lại</a>
    </div>
</div>
@endsection