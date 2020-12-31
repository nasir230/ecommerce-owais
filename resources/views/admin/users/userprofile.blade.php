
@extends('admin.layouts.admin')
@section('title','Profile')

@section('css')

   <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}">
   
<style>
.datepicker{
  width:176px;
 padding: 15px;

}
</style>
          
@endsection

@section('content')
{{-- Bread Items --}}
    @php
        $route = [
            'admin.home' =>'Home',
        ]
    @endphp
@component('admin.components.bread',['routes' => $route,'title' => 'Profile' ])
@endcomponent
{{-- Bread Items End --}}

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PROFILE SIDEBAR -->
        <div style="width:100%" class="profile-sidebar">
            <div class="row">
                <div class="col-md-4">
                    <div style="height:500px;" class="card">
                        <div class="card-head card-topline-aqua">
                            <header class="text-center" >About</header>
                        </div>
                        <div  class="card-body no-padding height-9">
                            <div class="content" >
                            <div class="row">
                                <div class="profile-userpic">
                                    <img style="width: 229px;height:200px" src="{{asset($profile->photo)}}" class="img-responsive" alt=""> </div>
                            </div>
                           <div class="profile-usertitle">
                                    <div class="profile-usertitle-name"> @if($profile->nick_name == null) {{$profile->user->name}} @else {{$profile->nick_name}} @endif </div>
                                     <div class="profile-usertitle-job"> {{$profile->user->role->name}} </div>
                            </div>
                            
                           <ul class="list-group list-group-unbordered">
                                  <li class="list-group-item">
                                    <b>Joined</b> <a class="pull-right">{{date_format($profile->user->created_at,"d-M-y")}}</a>
                                  </li>
                                  <li class="list-group-item">
                                    <b>Status</b> <a class="pull-right">{{ucfirst($profile->user->status)}}</a>
                                  </li>
                                  <li class="list-group-item">
                                    <b>Birthday</b> <a class="pull-right">{{date('d-M-y', strtotime($profile->birthday))}}</a>
                                  </li>
                            </ul>
                            </div>
                        </div>
                    </div> 
                </div>

                <div class="col-md-8">
                    <div style="height: 500px;" class="card">        
                        <div style="border-bottom: 1px dotted rgba(0, 0, 0, 0.2);"  class="profile-tab-box">
                            <div class="p-l-20">
                                  <!--Profile View Tab-->
                                <ul class="nav ">
                                    <li class="nav-item tab-all"><a
                                        class="nav-link active show" href="#proftab1" data-toggle="tab">About</a>
                                    </li>
                                    <li class="nav-item tab-all p-l-20"><a class="nav-link"
                                        href="#proftab2" data-toggle="tab">Address</a>
                                    </li>
                                    <li class="nav-item tab-all p-l-20"><a class="nav-link"
                                        href="#proftab3" data-toggle="tab">Story</a>
                                    </li>
                                      <li class="nav-item tab-all p-l-20"><a class="nav-link"
                                        href="#proftab4" data-toggle="tab">Others</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-content">
                            
                               <div class="tab-pane active fontawesome-demo" id="proftab1">
                                    <div id="biography" style="overflow-y:scroll;height:370px;" class="p-3" >
                                         <div class="form-group">
                                            <label for="simpleFormEmail">@lang('fields.nick_name')</label>
                                            <input type="text" value="{{$profile->nick_name}}" readonly class="form-control" >
    								     </div>
    								     <div class="form-group">
                                            <label >@lang('fields.username')</label>
                                            <input readonly value="{{$profile->user->name}}"  type="text"  class="form-control" >
                                        </div>
                                         <div class="form-group">
                                            <label >@lang('fields.email')</label>
                                            <input readonly value="{{$profile->user->email}}"  type="text"  class="form-control" >
                                        </div>
    								     <div class="form-group">
                                            <label for="simpleFormEmail">@lang('fields.mobile')</label>
                                            <input type="text" value="{{$profile->mobile}}" readonly class="form-control" >
    								     </div>
    								      <div class="form-group">
                                                <label >@lang('fields.gender')</label>
                                                <input readonly type="text" value="{{$profile->gender}}" readonly class="form-control" >
                                          </div>
                                        <div class="form-group">
                                            <label >@lang('fields.profession')</label>
                                        <input readonly value="{{$profile->profession}}"  type="text" class="form-control" >
                                        </div>
                                        <div class="form-group">
                                            <label >@lang('fields.bio')</label>
                                            <input readonly value="{{$profile->bio}}"  type="text"  class="form-control" >
                                        </div>
                                     </div>            
                                </div>
                            
                                <div class="tab-pane" id="proftab2">
                                     <div id="biography" style="overflow-y:scroll;height:370px;" class="p-3" >
                                                    <div class="form-group">
                                                            <label > @lang('fields.country')</label>
                                                            <input readonly value="{{$profile->country}}" type="text"  class="form-control" >
                                                    </div>
                                                    <div class="form-group">
                                                            <label > @lang('fields.state')</label>
                                                            <input readonly value="{{$profile->state}}" type="text"   class="form-control" >
                                                    </div>
                                                    <div class="form-group">
                                                            <label > @lang('fields.city')</label>
                                                            <input readonly value="{{$profile->city}}" type="text"  class="form-control"  >
                                                    </div>
                                                    <div class="form-group">
                                                            <label > @lang('fields.zip')</label>
                                                            <input readonly value="{{$profile->zip}}" type="text"   class="form-control" >
                                                        </div>
                                                    <div class="form-group">
                                                        <label> @lang('fields.street_address')</label>
                                                        <input readonly value="{{$profile->street_address}}" type="text" class="form-control"  >
                                                    </div>
                                                    <div class="form-group">
                                                        <label >@lang('fields.street_address2')</label>
                                                        <input readonly value="{{$profile->street_address2}}" type="text"  class="form-control">
                                                    </div>
                                      </div>
                            
                                </div>
                                 <div class="tab-pane" id="proftab3">
                                    <div style="overflow-y:scroll;height:370px;" class="p-5 text-center" >
                                    <p>{{$profile->story}}</p>
                                    </div>
                                </div>
                                
                                 <div class="tab-pane" id="proftab4">
                                       <div id="biography" style="overflow-y:scroll;height:370px;overflow-x: hidden;" class="p-3" >
                                     
                                           
                                         @if(! is_null($profile->others))
                                                @foreach($profile->others as $key => $value)
                                                                 <div class="row">
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <input readonly value="{{$key}}"  type="text" class="form-control"  >
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-9">
                                                                        <div class="form-group">
                                                                            <input readonly value="{{$value}}" type="text" class="form-control" >
                                                                        </div>
                                                                    </div>
                                                                 </div>
                                                @endforeach
                                           @endif
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
@endsection

@section('js')

    <script src="{{asset('admin/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>

    
      <script type="text/javascript">
    $(document).ready(function(){
        
         $('#birthday').datepicker({
             format: 'yyyy-mm-dd',
         });
        
    
        //Once add button is clicked
          $('.create_field').click(function(event){
                event.preventDefault();
              var r= $(this);
              r.parent().parent().remove();
           });
    });
</script>
@endsection

