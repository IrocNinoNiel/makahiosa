@extends('layouts.app')

@section('content')
    <div class="container m-auto w-50 pt-5 pb-5">
        <div class="card text-left">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h3>{{$faq->faq_title}}</h3>
                </div>
            </div>
            <div class="card-body">
                <p class="mx-3">
                    {{$faq->solution}}
                </p>
            </div>
         </div>
    </div>
@endsection
