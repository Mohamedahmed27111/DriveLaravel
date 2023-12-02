@extends('layouts.app')


@section('content')
<h1 class="text-center my-3">Public files</h1>
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
          <th colspan="1">Action</th>
        </tr>
        @forelse ( $drives as $item )
             <tr>
                <th>{{$loop->iteration}}</th>
                <th>{{$item->title}}</th>
                <th><a href="{{route("drive.show",$item->id)}}"><i class="text-info fa-solid fa-eye"></i></a></th>

             </tr>


        @empty
        @endforelse
    </table>
        </div>
    </div>
</div>



@endsection
