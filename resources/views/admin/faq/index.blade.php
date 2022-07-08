@extends('layouts.app')

@section('content')
    <link href="{{ asset('css/contact.css') }}" rel="stylesheet">
    <div class="container m-auto w-50 pt-5 pb-5">
        <div class="py-3">
            @include('includes.message')
        </div>
        <div class="card text-left">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h3>FAQ</h3>
                    <a href="{{route('faq.create')}}" class="btn btn-outline-primary">Add FAQ</a>
                </div>
            </div>
            <div class="card-body">
                @if (count($faqs) == 0)
                    <div class="text-center">
                        <h1>No FAQ Found</h1>
                    </div>
                @else
                    @foreach ($faqs as $faq)
                        <div class="d-flex justify-content-between">
                            <p> {{$faq->faq_title}} </p>
                            <div class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa-solid fa-location-arrow"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a href="{{ route('faq.edit', $faq->id) }}" class="btn btn-outline-warning dropdown-item">Edit</a>
                                    <a href="{{ route('faq.show', $faq->id) }}" class="btn btn-outline-primary dropdown-item">Show</a>
                                    <form action="{{ route('faq.destroy', $faq->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger dropdown-item">Delete</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                        <hr>
                    @endforeach
                @endif
            </div>
         </div>
    </div>
@endsection
