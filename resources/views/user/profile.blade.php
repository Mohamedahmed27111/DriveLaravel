@extends('layouts.app')


@section('content')
<h1 class="text-center my-3">{{$user->name}}</h1>
@if (Session::has('done'))
<div class="alert alert-success">
 {{Session::get('done')}}
</div>
 @endif
<div class="container col-md-4 text-center">

    <div class="card">
        @if ($user->image == 'fake.png')
        <img src="{{asset("fake.png")}}"class="image-top image-fluid " alt="">
        @else
        <img src="{{asset("users/$user->image")}}"class="image-top image-fluid " alt="">

        @endif
 <form method="POST" action="{{route("user.Uploadimg")}}" enctype="multipart/form-data">
    @csrf
    <div class="m-0 form-group">
        <div class="row">
            <div class="col-md-8">
                <input name="image" type="file" class="form-control btn btn-info"></div>

        <div class="m-0 col-md-4">
            <div class="d-grid">
                <button class="btn btn-info">Change image</button>
            </div>
        </div>
        </div>

    </div>
 </form>
        <div class="card-body">
            <hr>
            <h6> Name :{{$user->name}}</h6>
            <hr>
            <h6>Email :{{$user->email}}</h6>
            <hr>
            <h6>rule : {{$user->rules}}</h6>
        </div>
    </div>
</div>



@endsection
