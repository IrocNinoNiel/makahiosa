@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<link href="{{ asset('css/style.css') }}" rel="stylesheet">

<div class="container chat-container">
    <div class="row clearfix">
        <div class="col">
            <div class="chat-app">
                <div id="plist" class="people-list border bg-white shadow rounded">
                    <div class="input-group header-function">
                        <input type="text" class="form-control rounded-pill icon" placeholder="Search...">
                        <div class="hidden-sm text-right">
                            <a href="javascript:void(0);" class="btn dropdown" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
                            <a href="javascript:void(0);" class="btn dropdown" data-toggle="dropdown"><i class="fa fa-plus"></i></a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <ul class="list-unstyled chat-list mt-2 mb-0">
                        <li class="clearfix" aria-expanded="false" aria-controls="collapseExample">
                            <div class="item">
                                <img src="{{asset('images/Desert-2.jpg')}}" alt="avatar" data-toggle="collapse" 
                                href="#collapseGroup" role="button">
                                <i class="fa fa-circle online notify-badge"></i>
                            </div>
                            <div class="about">
                                <div class="name truncate">Office of Student Affairs</div>
                                <div class="status truncate">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem porro quibusdam repellendus alias excepturi architecto, ullam nihil? Totam minima, tempora, quisquam molestiae quia vitae commodi iure harum repellat, libero eaque.</div>
                            </div>

                            <div class="collapse" id="collapseGroup">
                                <div class="card">
                                    <ul class="list-unstyled mt-2 mb-0">
                                        <li class="clearfix">
                                            <div class="item">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="avatar">
                                                <i class="fa fa-circle online notify-badge"></i>
                                            </div>
                                            <div class="about">
                                                <div class="name truncate-sub">Juan Organization</div>
                                                <div class="status truncate-sub">Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo maiores, delectus ipsa dignissimos rem quaerat sit eaque. Et sequi quibusdam alias expedita cumque possimus provident amet earum, nisi at veniam. </div>                                            
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <div class="item">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="avatar">
                                                <i class="fa fa-circle online notify-badge"></i>
                                            </div>
                                            <div class="about">
                                                <div class="name truncate-sub">John Organization</div>
                                                <div class="status truncate-sub">Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis nulla reiciendis magni iure rem quae hic. Rem corrupti perspiciatis aliquam magnam repellat cum minima, excepturi dolorum quis iure temporibus culpa? </div>                                            
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <div class="item">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="avatar">
                                                <i class="fa fa-circle online notify-badge"></i>
                                            </div>
                                            <div class="about">
                                                <div class="name truncate-sub">Vincent Organization</div>
                                                <div class="status truncate-sub">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut ad id magni explicabo ea magnam doloribus asperiores? Laudantium reiciendis illum enim, minima odio, incidunt dicta atque deleniti quam natus doloribus.</div>                                            
                                            </div>
                                        </li>
                                    </ul>
                                </div>    
                            </div>
                        </li>
                        <li class="clearfix">
                            <div class="item">
                                <img src=" {{asset('images/desert-3.jpg')}} " alt="avatar">
                               
                                <i class="fa fa-circle online notify-badge"></i>
                            </div>
                            <div class="about">
                                <div class="name truncate">Mike Organization</div>
                                <div class="status truncate">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dignissimos, impedit error beatae aliquid odit, molestiae provident eveniet commodi blanditiis similique maiores explicabo! Quos dolorem at, accusamus amet qui facilis asperiores! </div>
                            </div>
                        </li>                                    
                        <li class="clearfix">
                            <div class="item">
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar">
                                <i class="fa fa-circle online notify-badge"></i>
                            </div>
                            <div class="about">
                                <div class="name truncate">Soho Organization</div>
                                <div class="status truncate">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dignissimos, impedit error beatae aliquid odit, molestiae provident eveniet commodi blanditiis similique maiores explicabo! Quos dolorem at, accusamus amet qui facilis asperiores! </div>
                            </div>
                        </li>      
                        <li class="clearfix">
                            
                            <div class="item">
                                <img src="https://bootdey.com/img/Content/avatar/avatar8.png" alt="avatar">
                                <i class="fa fa-circle online notify-badge"></i>
                            </div>
                            <div class="about">
                                <div class="name truncate">Monika Organization</div>
                                <div class="status truncate"> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dignissimos, impedit error beatae aliquid odit, molestiae provident eveniet commodi blanditiis similique maiores explicabo! Quos dolorem at, accusamus amet qui facilis asperiores! </div>
                            </div>
                        </li>  
                        <li class="clearfix">
                            <div class="item">
                                <img src=" {{asset('images/desert-3.jpg')}} " alt="avatar">
                                
                                <i class="fa fa-circle online notify-badge"></i>
                            </div>
                            <div class="about">
                                <div class="name truncate">Mike Organization</div>
                                <div class="status truncate">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dignissimos, impedit error beatae aliquid odit, molestiae provident eveniet commodi blanditiis similique maiores explicabo! Quos dolorem at, accusamus amet qui facilis asperiores! </div>
                            </div>
                        </li>                                    
                        <li class="clearfix">
                            <div class="item">
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar">
                                <i class="fa fa-circle online notify-badge"></i>
                            </div>
                            <div class="about">
                                <div class="name truncate">Soho Organization</div>
                                <div class="status truncate">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dignissimos, impedit error beatae aliquid odit, molestiae provident eveniet commodi blanditiis similique maiores explicabo! Quos dolorem at, accusamus amet qui facilis asperiores! </div>
                            </div>
                        </li>      
                        <li class="clearfix">
                            
                            <div class="item">
                                <img src="https://bootdey.com/img/Content/avatar/avatar8.png" alt="avatar">
                                <i class="fa fa-circle online notify-badge"></i>
                            </div>
                            <div class="about">
                                <div class="name truncate">Monika Organization</div>
                                <div class="status truncate"> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dignissimos, impedit error beatae aliquid odit, molestiae provident eveniet commodi blanditiis similique maiores explicabo! Quos dolorem at, accusamus amet qui facilis asperiores! </div>
                            </div>
                        </li>  
                        <li class="clearfix">
                            <div class="item">
                                <img src=" {{asset('images/desert-3.jpg')}} " alt="avatar">
                                <i class="fa fa-circle online notify-badge"></i>
                            </div>
                            <div class="about">
                                <div class="name truncate">Mike Organization</div>
                                <div class="status truncate">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dignissimos, impedit error beatae aliquid odit, molestiae provident eveniet commodi blanditiis similique maiores explicabo! Quos dolorem at, accusamus amet qui facilis asperiores! </div>
                            </div>
                        </li>                                    
                        <li class="clearfix">
                            <div class="item">
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar">
                                <i class="fa fa-circle online notify-badge"></i>
                            </div>
                            <div class="about">
                                <div class="name truncate">Soho Organization</div>
                                <div class="status truncate">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dignissimos, impedit error beatae aliquid odit, molestiae provident eveniet commodi blanditiis similique maiores explicabo! Quos dolorem at, accusamus amet qui facilis asperiores! </div>
                            </div>
                        </li>      
                        <li class="clearfix">
                            
                            <div class="item">
                                <img src="https://bootdey.com/img/Content/avatar/avatar8.png" alt="avatar">
                                <i class="fa fa-circle online notify-badge"></i>
                            </div>
                            <div class="about">
                                <div class="name truncate">Monika Organization</div>
                                <div class="status truncate"> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dignissimos, impedit error beatae aliquid odit, molestiae provident eveniet commodi blanditiis similique maiores explicabo! Quos dolorem at, accusamus amet qui facilis asperiores! </div>
                            </div>
                        </li>  
                        <li class="clearfix">
                            <div class="item">
                                <img src=" {{asset('images/desert-3.jpg')}} " alt="avatar">
                                <i class="fa fa-circle online notify-badge"></i>
                            </div>
                            <div class="about">
                                <div class="name truncate">Mike Organization</div>
                                <div class="status truncate">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dignissimos, impedit error beatae aliquid odit, molestiae provident eveniet commodi blanditiis similique maiores explicabo! Quos dolorem at, accusamus amet qui facilis asperiores! </div>
                            </div>
                        </li>                                    
                        <li class="clearfix">
                            <div class="item">
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar">
                                <i class="fa fa-circle online notify-badge"></i>
                            </div>
                            <div class="about">
                                <div class="name truncate">Soho Organization</div>
                                <div class="status truncate">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dignissimos, impedit error beatae aliquid odit, molestiae provident eveniet commodi blanditiis similique maiores explicabo! Quos dolorem at, accusamus amet qui facilis asperiores! </div>
                            </div>
                        </li>      
                        <li class="clearfix">
                            
                            <div class="item">
                                <img src="https://bootdey.com/img/Content/avatar/avatar8.png" alt="avatar">
                                <i class="fa fa-circle online notify-badge"></i>
                            </div>
                            <div class="about">
                                <div class="name truncate">Monika Organization</div>
                                <div class="status truncate"> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dignissimos, impedit error beatae aliquid odit, molestiae provident eveniet commodi blanditiis similique maiores explicabo! Quos dolorem at, accusamus amet qui facilis asperiores! </div>
                            </div>
                        </li>  
                        
                    </ul>
                </div>
            
                <div class="chat border bg-white shadow rounded">
                    <div class="chat-header clearfix">
                        <div class="row">
                            <div class="col-lg-6">
                                <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                                    <img src=" {{asset('images/desert-2.jpg')}}" alt="avatar">
                                </a>
                                <div class="chat-about">
                                    <h6 class="m-b-0">Office of student Affairs</h6>
                                    <small>Last seen: 2 hours ago</small>
                                </div>
                            </div>
                            <div class="col-lg-6 hidden-sm text-right">
                            
                                <a href="javascript:void(0);" class="btn"><i class="fa fa-search"></i></a>
                            
                                <a href="javascript:void(0);" class="btn dropdown" data-toggle="dropdown"><i class="fa fa-cogs"></i></a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="chat-history">
                        <ul class="m-b-0">
                            <li class="clearfix">
                                <div class="message-data text-right">
                                    <span class="message-data-time">10:10 AM, Today</span>
                                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar">
                                </div>
                                <div class="message other-message float-right"> Hi Aiden, how are you? How is the project coming along? lore</div>
                            </li>
                            <li class="clearfix">
                                <div class="message-data">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar">
                                    <span class="message-data-time">10:12 AM, Today</span>
                                    
                                </div>
                                <div class="message my-message">Are we meeting today?</div>                                    
                            </li>                               
                            <li class="clearfix">
                                <div class="message-data">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar">
                                    <span class="message-data-time">10:15 AM, Today</span>
                                </div>
                                <div class="message my-message">Project has been already finished and I have results to show you.</div>
                            </li>
                            <li class="clearfix">
                                <div class="message-data text-right">
                                    <span class="message-data-time">10:10 AM, Today</span>
                                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar">
                                </div>
                                <div class="message other-message float-right"> Hi Aiden, how are you? How is the project coming along? </div>
                            </li>
                            <li class="clearfix">
                                <div class="message-data">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar">
                                    <span class="message-data-time">10:12 AM, Today</span>
                                </div>
                                <div class="message my-message">Are we meeting today?</div>                                    
                            </li>                               
                            <li class="clearfix">
                                <div class="message-data">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar">
                                    <span class="message-data-time">10:15 AM, Today</span>
                                </div>
                                <div class="message my-message">Project has been already finished and I have results to show you.</div>
                            </li>
                            <li class="clearfix">
                                <div class="message-data text-right">
                                    <span class="message-data-time">10:10 AM, Today</span>
                                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar">
                                </div>
                                <div class="message other-message float-right"> Hi Aiden, how are you? How is the project coming along? </div>
                            </li>
                            <li class="clearfix">
                                <div class="message-data">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar">
                                    <span class="message-data-time">10:12 AM, Today</span>
                                </div>
                                <div class="message my-message">Are we meeting today?</div>                                    
                            </li>                               
                            <li class="clearfix">
                                <div class="message-data">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar">
                                    <span class="message-data-time">10:15 AM, Today</span>
                                </div>
                                <div class="message my-message">Project has been already finished and I have results to show you.</div>
                            </li>
                            <li class="clearfix">
                                <div class="message-data text-right">
                                    <span class="message-data-time">10:10 AM, Today</span>
                                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar">
                                </div>
                                <div class="message other-message float-right"> Hi Aiden, how are you? How is the project coming along? </div>
                            </li>
                            <li class="clearfix">
                                <div class="message-data">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar">
                                    <span class="message-data-time">10:12 AM, Today</span>
                                </div>
                                <div class="message my-message">Are we meeting today?</div>                                    
                            </li>                               
                            <li class="clearfix">
                                <div class="message-data">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar">
                                    <span class="message-data-time">10:15 AM, Today</span>
                                </div>
                                <div class="message my-message">Project has been already finished and I have results to show you.</div>
                            </li>
                            
                        </ul>
                    </div>
                    <div class="chat-message clearfix">
                        <div class="row">
                            <div class="col-lg-1 col-md-1 col-sm-1 icon-chat">
                                <span class=""><i class="fa fa-paperclip"></i></span>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-1 icon-chat">
                                <span class=""><i class="fa fa-image"></i></span>
                            </div>
                            
                            <div class="col-lg-10 col-md-10 col-sm-10">
                                <div class="input-group mb-0">
                                    <input type="text" class="form-control chat-input" placeholder="Enter text here..."> 
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-send"></i></span>
                                    </div>
                                                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@endsection
