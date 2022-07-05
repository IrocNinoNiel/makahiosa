@extends('layouts.app')

@section('content')
    <div class="container m-auto w-50 pt-5 pb-5">
        <div class="card text-left">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h3>Organization Information</h3>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="orgname">Organization Name</label>
                    <p class="form-control">
                        {{$user->information->orgname}}
                    </p>
                    <label for="orgname">Email</label>
                    <p class="form-control">
                        {{$user->email}}
                    </p>
                    <label for="orgname">Adviser</label>
                    <p class="form-control">
                        {{$user->information->adviser}}
                    </p>
                    <label for="orgname">Representative</label>
                    <p class="form-control">
                        {{$user->information->representative}}
                    </p>
                    <label for="orgname">Vision</label>
                    <p class="form-control">
                        {{$user->information->vision}}
                    </p>
                    <label for="orgname">Mission</label>
                    <p class="form-control">
                        {{$user->information->mission}}
                    </p>
                    <label for="orgname">Default Password</label>
                    @isset($user->default_pass->password)
                        <p class="form-control">
                            {{$user->default_pass->password}}
                        </p>
                    @else
                        <p class="form-control">
                            N/A
                        </p>
                    @endisset
                </div>
            </div>
         </div>
    </div>
@endsection
