@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($sarfs as $sarf)
        <div class="card my-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-2 col-md-2 m-auto">
                        <img class="rounded-circle" src="{{asset('images/106669644_122402626202775_248362239959887121_n.jpg')}}"
                        width="90" height="80" alt="">
                    </div>
                    <div class="col-lg-8 col-md-8">
                        <h5>{{$sarf->titleOfTheEvent}}</h5>
                        <p><b>General Objective : </b>{{$sarf->generalObjective}}</p>
                        Status : @if ($sarf->status == 'pending')
                                <button class="btn btn-outline-warning">Pending</button>
                            @elseif ($sarf->status == 'approved')
                                <button class="btn btn-outline-warning">Approved</button>
                            @else
                                <button class="btn btn-outline-danger">Rejected</button>
                            @endif
                    </div>
                    <div class="col-lg-2 col-md-2 m-auto">
                        <div class="dropdown">
                            <button id="my-dropdown" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-pen"></i></button>
                            <div class="dropdown-menu" aria-labelledby="my-dropdown">
                                <a class="dropdown-item" href="{{ route('sarfadmin.show', $sarf->id) }}">View</a>
                                <form action=" {{route('sarf.changeStatus', $sarf->id)}} " method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status", value="approved">
                                    <button type="submit" class="dropdown-item">Approved</button>
                                </form>
                                <form action=" {{route('sarf.changeStatus', $sarf->id)}} " method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status", value="rejected">
                                    <button type="submit" class="dropdown-item">Rejected</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
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
