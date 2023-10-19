@extends('layouts.app')

@section('title', 'Show Author')

@section('contents')
<h1 class="mb-0">Detail Author</h1>
<hr />
<div class="row">
    <div class="col mb-3">
        <label class="form-label">ID Of Author</label>
        <input type="text" name="title" class="form-control" placeholder="ID Author" value="{{ $author->ma_tgia }}" readonly>
    </div>
    <div class="col mb-3">
        <label class="form-label">Name Of Author</label>
        <input type="text" name="price" class="form-control" placeholder="Name" value="{{ $author->ten_tgia }}" readonly>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Image:</strong>
        @if(file_exists(public_path('img/' . $author->hinh_tgia)))
        <img src="{{ asset('img/' . $author->hinh_tgia) }}" width="100" height="100" class="img img-responsive mt-3" alt="hình">
        @else
        <img src="{{ asset($author->hinh_tgia) }}" width="100" height="100" class="img img-responsive mt-3" alt="không có hình">
        @endif
    </div>
</div>

</div>
<a href="{{route('author')}}" class="btn btn-warning " style="margin-left: 20px;">Quay Lại</a>
@endsection