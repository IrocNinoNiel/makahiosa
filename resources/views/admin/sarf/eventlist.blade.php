@extends('layouts.app')

@section('content')
<div class="container">
    @if (count($sarfs) == 0)
        <div class="m-auto">
            <h4 class="m-auto">No Ongoing Events</h4>
        </div>
    @else
        @foreach ($sarfs as $sarf)
            <div class="card my-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-2 col-md-2 m-auto">
                            <img class="rounded-circle" src="{{asset('images/106669644_122402626202775_248362239959887121_n.jpg')}}"
                            width="90" height="80" alt="">
                        </div>
                        <div class="col-lg-8 col-md-8">
                            <h5>Event Number 1</h5>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consequatur optio doloremque cumque iusto! Quasi, perferendis tempore.</p>
                        </div>
                        <div class="col-lg-2 col-md-2 m-auto">
                            <button class="btn btn-outline-primary">Ongoing</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
    
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
