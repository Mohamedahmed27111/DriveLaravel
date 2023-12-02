@extends('layouts.app')


@section('content')
<h1 class="text-center my-3">All Files</h1>
<div class="container col-md-6 text-center">
    @if (Session::has('done'))
    <div class="alert alert-success">
     {{Session::get('done')}}
     @endif
    <div class="card">
        <div class="card-body">
            <table class="table">
        <tr>
          <th>NO</th>
          <th>Title</th>
          <th>Status</th>
          <th colspan="3">Action</th>
        </tr>
        @forelse ( $drives as $item )
             <tr>
                <th>{{$loop->iteration}}</th>
                <th>{{$item->title}}</th>
                <th>@if ($item->status == 'private')
                   <a href="{{route("drive.changeStatus",$item->id)}}"> <i title="Make It public" class="mx-3 text-danger fa-solid fa-lock"></i></a>
                    @else
                   <a href="{{route("drive.changeStatus",$item->id)}}">  <i title="Make It Private" class="mx-3 text-success fa-solid fa-lock-open"></i></a>
                    @endif</th>
                <th><a href="{{route("drive.show",$item->id)}}"><i class="text-info fa-solid fa-eye"></i></a></th>
                <th><a href="{{route("drive.edit",$item->id)}}"><i class="text-warning fa-solid fa-pen-to-square"></i></a></th>
                <th><a href="{{route("drive.destroy",$item->id)}}"><i class="text-danger fa-solid fa-trash-can"></i></a></th>

             </tr>


        @empty
        @endforelse
    </table>
        </div>
    </div>
</div>



@endsection
