@extends('layouts.app')
  
@section('title', 'Create Category')
  
@section('contents')
    <h1 class="mb-0">Add Category</h1>
    <hr />
    <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <!-- <div class="col">
                <input type="text" name="ma_tloai" class="form-control" placeholder="Mã Thể Loại">
            </div> -->
            <div class="col">
                <input type="text" name="ten_tloai" class="form-control" placeholder="Tên Thể loại">
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{route('category')}}" class="btn btn-warning">Quay Lại</a>
            </div>
        </div>
    </form>
@endsection