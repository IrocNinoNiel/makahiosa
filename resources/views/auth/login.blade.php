@extends('layouts.app')

@section('content')
<link rel="stylesheet" href={{ asset('css/app.css') }}>
<link rel="stylesheet" href={{ asset('css/message.css') }}>

<section class="vh-100" >
    <div class="container-fluid h-100 p-0">
        <div class="login-container row h-100 g-0">
            <div class="col-3 d-flex align-items-center hidden-sm justify-content-end bg-warning">
                <div class="shadow container py-4 bg-primary" style="margin-left: 14%">
                    <div class="d-flex flex-column">
                        <div class="container py-5">
                            <h1 class="fs-5 text-light text-start px-3">Welcome To <span
                                    class="fw-bold text-uppercase">Magkahi<span
                                        class="text-warning">OSA!</span></span>
                            </h1>
                            <hr class="m-0 bg-white text-white" style="height: 3px;" />
                            <div class="container-fluid hidden-sm">
                                <p class="text-light text-start px-3 pt-4" style="font-size: 12px">The University of Science
                                    and Technology of Southern Philippines (USTP) has been handling student organization
                                    processes through the Office of Student Affairs (OSA) for the past few years. Just
                                    recently, in March 2020, all transactions for students have been slowly converted
                                    through online means, which poses a huge gap in terms of communication between the
                                    OSA and the recognized student organizations.<br><br> Although emails and
                                    contact information have been opened to the public for transactions, students are
                                    still facing delays and backlogs in their activities which include approval of
                                    documents, email responses, and the like. With these ongoing situations, the lack of
                                    a centralized platform to organize the transactions and create a much responsive
                                    communication are left unaddressed.
                                </p>
                            </div>
                        </div>
                        <nav aria-label="" class="">
                            <ul class="pagination leftSideBar justify-content-center">
                                <li class="page-item">
                                    <a class="page-link" href="#" tabindex="-1"> <i class="fa-solid fa-circle" style="color:#FAB415;"></i> </a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link " href="#"><i class="fa-solid fa-circle" style="color:#FAB415;"></i> </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="mx-0 col-9 d-flex align-items-center justify-content-start bg-white">
                <div class="shadow container py-5 bg-white" style="margin-right: 10%">
                    <div class="container d-flex align-items-center justify-content-center flex-column h-100">
                        <img src="{{asset('images/logo-150x150.png')}}" class="img-fluid" alt="Logo" srcset="">
                        <br>
                        <form class="pt-3 pb-0" style="background: #F7F7F7;width: 75%" method="POST" action="{{ route('login.manual') }}">
                            @csrf
                            <div class="container px-4">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    <label for="floatingInput">Email address</label>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>
                            <div class="container px-4">
                                <div class="form-floating mb-5">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="floatingInput2" placeholder="name@example.com" name="password" required autocomplete="current-password">
                                    <label for="floatingInput2">Password</label>
                                    <div class="my-2 form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                                    </div>
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="#ForgotPassword" target="_blank">Forgot password?</a>
                                        <p style="font-size: 11px">Cookies must be enabled in your browser</p>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="px-4 input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">@</span>
                                <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                            </div> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
