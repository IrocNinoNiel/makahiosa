@extends('layouts.app')

@section('content')

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="{{ asset('css/sarf.css') }}" rel="stylesheet">

<div class="container">
    @include('includes.message')
    <div class="card">
        <div class="card-header">
            <h2>Delete Files</h2>
        </div>
        <div class="card-body">
            <div class="row mt-4">
                <ul class="list-group list-group-flush">
                    @foreach ($sarf->files as $file)
                        <li class="list-group-item d-flex justify-content-between">
                            <div class="d-flex">
                                <a href="{{ asset('files/'.$file->sarves_id.'/'.$file->name) }}">{{$file->truename}}.{{$file->extension}}</a>
                            </div>
                            <div>
                                <form action="{{ route('sarf.fileDelete',$file->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="card mt-4">
        <div class="card-header">
            <h2>Upload New File</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('sarf.addNewFile', $sarf->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="files" class="form-label mt-4">Upload Product Image</label>
                    <input
                        type="file"
                        name="files[]"
                        id=""
                        class="form-control"
                        accept="files/*"
                        multiple>
                </div>
                <input type="submit" value="Add Files" class="btn btn-primary mt-5">
            </form>
        </div>
    </div>

</div>


  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="{{ asset('js/sarf.js')}}"></script>
@endsection
