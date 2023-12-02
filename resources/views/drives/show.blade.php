@extends('layouts.app')


@section('content')
<h1 class="text-center my-3">Drive : {{$drive->DriveId}}</h1>
<div class="container col-md-4 text-center">

    <div class="card">
        @if ($drive->extension == "png" || $drive->extension == "gif" || $drive->extension == "jpeg" || $drive->extension == "jpg" )
        <img src="{{asset("upload/$drive->file")}}" class="img-top img-fluid" alt="">
         @else
         <img src="{{asset("fileimg.png")}}" class="img-top img-fluid" alt="">
        @endif
        <div class="card-body">
            <hr>
            <h6> Title : {{$drive->title}}</h6>
            <hr>
            <h6>Description : {{$drive->description}}</h6>
            <hr>
            <h6>name : {{$drive->name}}</h6>
            <hr>
            <h6>publich: {{$drive->created_at}}</h6>
            <hr>
            <h6>Status :
                @if ($drive->status == 'private')
                Private <i class="mx-3 text-danger fa-solid fa-lock"></i>
                @else Public <i class="mx-3 text-success fa-solid fa-lock-open"></i>
                @endif
            </h6>
            <hr>
            <div class="d-grid">
                <a href="{{route("drive.download",$drive->DriveId)}}" class="btn btn-success">Download</a>
                @if (Auth::user()->id==$drive->user_id)
                <a class="btn btn-warning my-2" href="{{route("drive.edit",$drive->DriveId)}}">Edit <i class="text-dark fa-solid fa-pen-to-square"></i></a>
                @endif
            </div>

        </div>
    </div>
</div>



@endsection
