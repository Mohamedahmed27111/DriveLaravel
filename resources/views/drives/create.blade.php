@extends('layouts.app')


@section('content')
<h1 class="text-center my-3">Create file</h1>
<div class="container col-md-6">
    @if (Session::has('done'))
   <div class="alert alert-success">
    {{Session::get('done')}}
   </div>


    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="card">
        <div class="card-body">
            <form action="{{route('drive.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Drive title</label>
                    <input class="form-control" type="text" name="title">
                </div>
                <div class="form-group">
                    <label for="">Drive Description</label>
                    <input class="form-control" type="text" name="description">
                </div>
                    <div class="form-group">
                    <label for="">Upload your file</label>
                    <input class="form-control" type="file" name="file">
                </div>
                <div class="form-group">

                    <input  type="radio" name="status" value="private">
                    private
                    <hr>
                    <input  type="radio" name="status" value="public">
                    public
                </div>
                <div class="d-grid">
                    <button class="btn btn-info">Create New</button>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection
