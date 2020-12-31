
@extends('admin.layouts.admin')

@section('title','Profile')

@section('css')

<style>
.datepicker{
  width:176px;
 padding: 15px;

}
</style>
        
@endsection

@php
    $profile = $user->profile;
   
@endphp
@section('content')
        <div class=" py-3 container-fluid ">
    <!-- Your content goes here  -->
    <div class="row clearfix">
        <div class="col-12">
            <!-- Your content goes here  -->
            @if ($errors->any())
            @foreach ($errors->all() as $error)
             <div class="alert alert-danger">
                <ul>
                    <li>{{ $error }}</li>
                </ul>
            </div>
            @endforeach
            @endif
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="m-b-20">
                    <div class="contact-grid">
                        <div class="profile-header bg-dark">
                            <div class="user-name">{{$profile->user->name}}</div>
                        <div class="name-center">{{$profile->user->role->name}}</div>
                        </div>
                        <img src="{{asset($profile->photo)}}" class="user-img" alt="">
                        <p>
                            {{$profile->street_address}}
                        </p>
                        <div>
                            <span class="phone">
                                <i class="material-icons">phone</i>{{$profile->mobile}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <ul class="nav nav-tabs">
                    <li class="nav-item m-l-10">
                        <a class="nav-link active" data-toggle="tab" href="#infosec">Info</a>
                    </li>
                    <li class="nav-item m-l-10">
                        <a class="nav-link " data-toggle="tab" href="#detailsAbout">About</a>
                    </li>
                    <li class="nav-item m-l-10">
                        <a class="nav-link" data-toggle="tab" href="#addresssec">Address</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane body active" id="infosec">
                        <small class="text-muted">Email address: </small>
                        <p>{{$profile->user->email}}</p>
                        <hr>
                        <small class="text-muted">Phone: </small>
                        <p>{{$profile->mobile}}</p>
                        <hr>
                    </div>
                    <div class="tab-pane body " id="detailsAbout">
                    <p class="text-default">{{$profile->story}}</p>
                    </div>
                    <div class="tab-pane body" id="addresssec">
                        <small class="text-muted">Country: </small>
                        <p>{{$profile->country}}</p>
                        <hr>
                        <small class="text-muted">City: </small>
                        <p>{{$profile->city}}</p>
                        <hr>
                        <small class="text-muted">Street Address: </small>
                        <p>{{$profile->street_address}}</p>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-12">
            <div class="card">
                <div class="profile-tab-box">
                    <div class="p-l-20">
                        <ul class="nav ">
                            <li class="nav-item tab-all">
                                <a class="nav-link active show" href="#aboutsec" data-toggle="tab">About Me</a>
                            </li>
                            <li class="nav-item tab-all p-l-20">
                                <a class="nav-link" href="#passwordsec" data-toggle="tab">Password Reset</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="aboutsec" aria-expanded="true">
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card project_widget">
                                <div class="body">
                                    <form method="post" enctype="multipart/form-data" action="{{route('admin.defaultProfile.update',$profile->user->id)}}">
                                        @csrf
                                        <div class="row clearfix">
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input value="{{$profile->fname}}" name="fname" type="text" class="form-control" placeholder="First Name">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input value="{{$profile->lname}}"  name="lname" type="text" class="form-control" placeholder="Last Name">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group">
                                            <label>Email</label>
                                            <input required value="{{$profile->user->email}}" name="email" type="email" class="form-control" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input value="{{$profile->mobile}}" name="phone"  type="text" class="form-control" placeholder="Phone">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <label>Stroy</label>
                                                <textarea name="story" rows="4" class="form-control no-resize"
                                                    placeholder="Details About You">{{$profile->story}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input value="{{$profile->city}}" name="city" type="text" class="form-control" placeholder="City">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label>Country</label>
                                                <input value="{{$profile->country}}" name="country" type="text" class="form-control" placeholder="Country">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Street Address</label>
                                                <textarea name="street_address" rows="4" class="form-control no-resize"
                                                    placeholder="Address Line 1">{{$profile->street_address}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12"><button type="submit" class="btn btn-primary btn-round">Save Changes</button></div>
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="passwordsec" aria-expanded="false">
                <div class="card">
                    <div class="body">
                        <form method="post" action="{{route('reset')}}" >
                            @csrf
                            <div class="form-group">
                            <input  value="{{$profile->user->name}}" required type="hidden" name="username" class="form-control" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <input required name="old_password" type="password" class="form-control" placeholder="Current Password">
                            </div>
                            <div class="form-group">
                                <input required name="new_password" type="password" class="form-control" placeholder="New Password">
                            </div>
                            <button type="submit" class="btn btn-info btn-round">Save Changes</button>
                        </form>
                     
                    </div>
                </div>
            </div>
        </div>
    </div>











<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="formModal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModal">Profile Picture</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form method="post" enctype="multipart/form-data" 
                action="{{route('admin.profile.image')}}" >
                @csrf
                <div class="modal-body">
                    <label >Upload File</label>
                    <input class="form-control" type="file" name="image" >
                    <input name="id" type="hidden" value="{{$profile->id}}" />
                    <br>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info waves-effect">Save</button>
                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
                </div>
             </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

      <script src="{{asset('admin/assets/js/pages/forms/form-data.js')}}"></script>

@endsection

