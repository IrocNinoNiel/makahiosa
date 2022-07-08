@extends('layouts.app')

@section('content')
    <div class="container m-auto w-50 pt-5 pb-5">
        <div class="my-3">
            @include('includes.message')
        </div>
        <div class="card text-left">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h3>Add FAQ</h3>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('faq.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <div class="form-group">
                        <label for="faq_title">FAQ Title</label>
                        <input type="text" class="form-control" name="faq_title" id="faq_title" placeholder="Enter FAQ Title" value="{{old('faq_title')}}">
                    </div>
                    <div class="form-group">
                        <label for="solution">FAQ Solution</label>
                        <textarea class="form-control" id="solution" name="solution" rows="3">{{old('solution')}}</textarea>
                    </div>
                    <button class="btn btn-primary mt-3">Add FAQ</button>
                </form>
            </div>
         </div>
    </div>
@endsection
