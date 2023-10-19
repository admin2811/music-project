@extends('layouts.app')
  
@section('title', 'Show Category')
  
@section('contents')
    <h1 class="mb-0">Detail Category</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">ID Of Category</label>
            <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $category->ma_tloai }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Name Of Category</label>
            <input type="text" name="price" class="form-control" placeholder="Price" value="{{ $category->ten_tloai }}" readonly>
        </div>
    </div>
        <a href="{{route('category')}}" class="btn btn-warning">Quay Lại</a>
@endsection