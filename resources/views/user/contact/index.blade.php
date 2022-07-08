@extends('layouts.app')

@section('content')
<link href="{{ asset('css/contact.css') }}" rel="stylesheet">
    <div class="container m-auto">
        <div class="card ">
            <div class="card-header text-center" style="background: #2f2d62">
                <h1 style="color: #fff"><b>FAQ</b></h1>
                <h4 style="color: #fff" class="mb-5">Have Any Questions?</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="w-100 m-auto text-center">
                            <img src="{{ asset('images/logo-150x150.png')}}" alt="" width="250px">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <p class="text-center m-auto"><b>Frequently Ask Questions</b></p>
                        @foreach ($faqs as $faq)
                            <button class="btn btn-light mb-4" type="button" data-toggle="collapse" data-target="#{{$faq->id}}" aria-expanded="false" aria-controls="faqSolution">
                                <span><i class="fa-solid fa-caret-down"></i></span> {{$faq->faq_title}}
                            </button>
                            <div class="collapse mt-3" id="{{$faq->id}}">
                                <div class="card card-body">
                                    {{$faq->solution}}
                                </div>
                            </div>
                            <br/>
                        @endforeach
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="contact-form-parent">
                            <div class="head-title">
                                <h2>If you have</h2>
                                <h1>any <b>questions</b></h1>
                            </div>
                            <div class="contact-form mt-5">
                                <form action="">
                                    <div class="form-group">
                                        <input type="email" class="form-control contact-email" id="email" name="email" placeholder="&#xf0e0; Enter email">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" id="concern" name="concern" rows="6" placeholder="concern"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-outline-secondary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- Footer -->
    <footer class="text-center text-lg-start bg-light text-muted mt-5">
        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
        © 2021 Copyright:
        <a class="text-reset fw-bold" href="https://mdbootstrap.com/">MAKAHIOSA</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->
@endsection
