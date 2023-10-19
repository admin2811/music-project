@extends('layouts.app')
  
@section('title', 'Create Article')
  
@section('contents')
    <h1 class="mb-0">Add Article</h1>
    <hr />
    <form action="{{ route('article.store') }}" method="POST" enctype="multipart/form-data">
       {!! csrf_field() !!}
        @method('POST')
        <div class=" mb-3 d-flex" style= "display:flex;flex-direction:column">
            <!-- <div class="col">
                <input type="text" name="ma_tgia" class="form-control" placeholder="ID OF Author">
            </div> -->
            <div class="col mb-3">
                <input type="text" name="ten_tieu" class="form-control" placeholder="Name Article">
            </div>
            <div class="col mb-3">
                <input type="text" name="tieude" class="form-control" placeholder="Title Article">
            </div>
            <div class="col mb-3">
                <input type="text" name="ten_bhat" class="form-control" placeholder="Name Song">
            </div>
            <div class="col mb-3">
                <input type="text" name="ma_tloai" class="form-control" placeholder="ID of Category">
            </div>
            <div class="col mb-3">
            <textarea class="form-control" name="tomtat" id="exampleFormControlTextarea1" rows="3" placeholder="Summary"></textarea>
            </div>
            <div class="col mb-3">
            <textarea class="form-control" name = "noidung" id="exampleFormControlTextarea1" rows="3" placeholder="Content"></textarea>
            </div>
            <div class="col mb-3">
                <input type="text" name="ma_tgia" class="form-control" placeholder="ID of Author">
            </div>
            <div class="col mb-3">
                <input type="date"  name="ngayviet" class="form-control" placeholder="Date Of Article">
            </div>
            <div class="col">
               <input type="file" class="form-control" name="hinh" id="image" placeholder="Image Article">
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{route('article')}}" class="btn btn-warning">Quay Lại</a>
            </div>
        </div>
    </form>
@endsection