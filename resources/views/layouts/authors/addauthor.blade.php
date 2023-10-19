@extends('layouts.app')
  
@section('title', 'Create Author')
  
@section('contents')
    <h1 class="mb-0">Add Author</h1>
    <hr />
    <form action="{{ route('author.store') }}" method="POST" enctype="multipart/form-data">
       {!! csrf_field() !!}
        @method('POST')
        <div class="row mb-3">
            <!-- <div class="col">
                <input type="text" name="ma_tgia" class="form-control" placeholder="ID OF Author">
            </div> -->
            <div class="col">
                <input type="text" name="ten_tgia" class="form-control" placeholder="Name Author">
            </div>
            <div class="col">
               <input type="file" class="form-control" name="image" id="image" placeholder="Image Author">
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{route('author')}}" class="btn btn-warning">Quay Lại</a>
            </div>
        </div>
    </form>
@endsection