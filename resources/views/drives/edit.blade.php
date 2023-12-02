@extends('layouts.app')


@section('content')
<h1 class="text-center my-3">Edit file : {{$drive->id}}</h1>
<div class="container col-md-6">
    @if (Session::has('done'))
   <div class="alert alert-success">
    {{Session::get('done')}}
   </div>


    @endif
    <div class="card">
        <div class="card-body">
            <form action="{{route('drive.update',$drive->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Drive title</label>
                    <input class="form-control" value="{{$drive->title}}" type="text" name="title">
                </div>
                <div class="form-group">
                    <label for="">Drive Description</label>
                    <input class="form-control" value="{{$drive->description}}" type="text" name="description">
                </div>
                    <div class="form-group">
                    <label for="">Upload your file:value="{{$drive->file}}" </label>
                    <input class="form-control" type="file" name="file">
                </div>
                <div class="form-group">
                    @if ($drive->status =='private')
                    <input  type="radio" checked name="status" value="private">
                    privat
                    <hr>
                    <input  type="radio"  name="status" value="public">
                    public
                    @else
                    <input  type="radio" name="status" value="private">
                    privat
                    <hr>
                    <input  type="radio" checked name="status" value="public">
                    public
                    @endif




                </div>
                <div class="d-grid">
                    <button class="btn btn-warning">Update File</button>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection
