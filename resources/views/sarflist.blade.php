@extends('layouts.app')

@section('content')

<link href="{{ asset('css/sarf.css') }}" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" /> 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
   

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2 col-xl-2 col-md-2 col-sm-12">
         <a href="{{ route('sarf') }}" class="btn border badge-pill"><p class="mr-3 ml-3 mt-2"><i class="fa fa-plus"></i><span class="font-weight-bold">
             Create
         </span></p></a>
        </div>
        <div class="col-lg-10 col-xl-10 col-md-10 col-sm-12">
             <div class="container">
                 <div class="container">
                     <div class="borders">
                         <div class="card">
                             <div class="card-header">
                                 <div class="row">
                                     <div class="col">
                                         <h4>Status</h4>
                                     </div>
                                     <div class="col-4 form-inline">
                                         <div class="input-group mb-2">
                                             <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                             <div class="input-group-append">
                                                 <button class="input-group-text" id="basic-addon2"><i class="fa fa-search"></i></button>
                                             </div>
                                         </div>
                                         <i class="fa fa-gear ml-3 mb-2"></i>
                                     </div>
                                 </div>
                             </div>
                            @foreach ($sarfs as $sarf)
                                <div class="card-body main-card">
                                    <div class="container">
                                        <div class="col">
                                            <p class="font-weight-bold float-right">{{$sarf->status}}</p>
                                        </div>
                                        <br>
                                        <div class="card m-0" style="width: 50%;">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-2 m-auto">
                                                        
                                                        <i class="fa fa-question m-auto img-nav img-nav1 whiteincolor"></i>
                                                        
                                                    </div>
                                                    <div class="col">
                                                        <div class="row">
                                                            <p>Date <span class="font-weight-bold">{{$sarf->dateOfEvent}}</span></p>
                                                        </div>
                                                        <div class="row">
                                                            <p class="ellipsis1">Need More Details? <a href="{{ route('sarf.show', $sarf->id) }}">Click Here</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h3 class="mt-2">{{$sarf->titleOfTheEvent}}</h3>
                                        <h5>{{$sarf->org->information->orgname}}</h5>
                                        <hr/>
                                    </div>
                                    
                                </div>
                                
                            @endforeach
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

 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 <script src="assets/js/app.js"></script>
@endsection
