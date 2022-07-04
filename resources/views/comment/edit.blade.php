@extends('layouts.app')

@section('content')
    <div class="container m-auto w-50 pt-5 pb-5">
        <div class="card text-left">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h3>Edit Comment</h3>
                </div>
            </div>
            <div class="card-body">
                <form action=" {{route('comment.update', $comment->id)}} " method="post">
                    @csrf
                    @method('PUT')
                    <div>
                        <div class="form-group">
                            <textarea class="form-control @error('comment')
                            border border-danger @enderror" name="comment" id="" rows="3">{{$comment->comment}}</textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-warning mt-3">Edit College</button>
                </form>
            </div>
         </div>
    </div>
@endsection
