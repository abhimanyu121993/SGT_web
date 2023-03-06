<div class="modal-content">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
     


.profile-pic {
    width: 200px;
    height: 120px;
    display: inline-block;
}

.file-upload {
    display: none;
}
.circle {
    border-radius: 100% !important;
    overflow: hidden;
    width: 128px;
    height: 128px;
    border: 2px solid rgba(255, 255, 255, 0.2);
    position: absolute;
    top: 72px;
}
img {
    max-width: 100%;
    height: auto;
}
.p-image {
  position: absolute;
  top: 167px;
  right: 30px;
  color: #666666;
  transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
}
.p-image:hover {
  transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
}
.upload-button {
    font-size: 1.2em;
    float: right;
    margin-right: 498px;
}
.upload-button:hover {
  transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
  color: #999;
}


    </style>
    <h4>
    {{ isset($guard) ? 'Update Guard ': 'Add Guard' }}
    </h4>
    <div class="live-preview">
        <form action="{{ isset($guard) ? route(Session::get('guard').'.secuirty-guard.update', $guard->id) : route(Session::get('guard').'.secuirty-guard.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if (isset($guard))
            @method('patch')
            @endif

   <div class="row">
   
</div>
<br><br><br>

<div class="row gy-4">
                <div class="col-xxl-3 col-md-6">
                   
                  
                  <div class="small-12 medium-2 large-2 columns" >
     <div class="circle">
       <img class="profile-pic" src="https://t3.ftcdn.net/jpg/03/46/83/96/360_F_346839683_6nAPzbhpSkIpb8pmAwufkC7c5eD7wYws.jpg">

     </div>
     <div class="p-image">
       <i class="fa fa-camera upload-button"></i>
        <input class="file-upload" name="images" type="file" style="display:none;" accept="image/*"/>
     </div>
  </div>

<br><br><br>
       
                    </div>
             <div class="input-field col s6">
                 <label class="active" for="name">{{__('security_guard.name')}}</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ isset($guard) ? $guard->name : old('name') }}">
                       
                    </div>
                    <div class="input-field col s6">
                        <label class="active" for="phone">{{__('security_guard.phone')}}</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ isset($guard) ? $guard->phone : old('phone') }}">
                        
                    </div>
                    <div class="input-field col s6">
                        <label class="active" for="email">{{__('security_guard.email')}}</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{ isset($guard) ? $guard->email : old('email') }}">
                        
                    </div>
                    @if(!isset($guard))
                    <div class="input-field col s6">
                        <label class="active" for="password">{{__('security_guard.password')}}</label>
                        <input type="password" class="form-control" id="password" name="password" value="{{ isset($guard) ? $guard->password : '' }}">
                        
                    </div>
                    <div class="input-field col s6">
                        <label class="active" for="cpassword">{{__('security_guard.cpassword')}}</label>
                        <input type="text" class="form-control" id="cpassword" name="cpassword" value="{{ isset($guard) ? $guard->password : '' }}">
                        
                    </div>
                    @endif
                    <div class="input-field col s6">
                        
                        <select class="select2 browser-default" id="gender" name="gender">
                            <option selected disabled>--Select Gender--</option>
                            <option value="male" @isset($guard) @selected($guard->gender=='m') @else @selected(old('gender')=='m') @endisset>Male</option>
                            <option value="female" @isset($guard) @selected($guard->gender=='f') @else @selected(old('gender')=='f') @endisset >Female</option>
                            <option value="other" @isset($guard) @selected($guard->gender=='o') @else @selected(old('gender')=='o') @endisset>Other</option>
                        </select>
                       
                    </div>
                   
                     <div class="input-field col s6">
                        
                        <select class="select2 browser-default" id="country" name="country">
                            <option selected disabled>--Select Country--</option>
                            @foreach ($countries as $country)
                            <option value="{{ $country->id }}" @isset($guard) @selected($guard->country_id==$country->id) @else @selected(old('country_id')==$country->id) @endisset>{{ $country->name }}</option>
                            @endforeach
                        </select>
                       

                    </div>

                    

                    <div class="input-field col s6" style="margin-top:-58px;">
                        
                        <select class="select2 browser-default" id="state" name="state">
                            <option value="">--Select State--</option>
                            @foreach (Helper::getStateByCountry($guard->country_id??old('country_id')) as $st)
                            <option value="{{$st->id}}" @isset($guard) @selected($guard->state_id==$st->id) @else @selected(old('state_id')==$st->id) @endisset>{{$st->name}}</option>
                            @endforeach
                        </select>
                       
                    </div>
                    <div class="input-field col s6">
                       
                        <select class="select2 browser-default" id="city" name="city">
                            <option value="">--Select City--</option>
                            @foreach (Helper::getCitiesByState($guard->state_id??old('state_id')) as $ct)
                            <option value="{{$ct->id}}" @isset($guard) @selected($guard->city_id==$ct->id) @else @selected(old('city_id')==$ct->id) @endisset>{{$ct->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col s6 input-field">
                                            <select class="select2 browser-default" name="timezone" id="timezone">
                                            <option value="">--Select Timezone--</option>
                                            @foreach ($timezones as $timezone)
                                                    <option value="{{ $timezone->id }}"@isset($guard) @selected($timezone->id==$guard->time_zone_id) @endisset>{{ $timezone->timezone ?? '' }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label>{{__('security_guard.timezone')}}</label>
                                        </div>
                     <div class="input-field col s6" style="margin-top:-58px;">
                        <label class="active" for="street">{{__('security_guard.street')}}</label>
                        <input type="text" class="form-control" id="street" name="street" value="{{ isset($guard) ? $guard->street : '' }}">
                        
                    </div>

                   
                        <div class="input-field col s4">
                        <label class="active" for="pincode">{{__('security_guard.pincode')}}</label>
                        <input type="text" class="form-control" id="pincode" name="pincode" value="{{ isset($guard) ? $guard->pincode : '' }}">
                        </div>
                    <!--end col-->
                </div>
                <div class="row col s12 mt-2">
                    <div class="input-field col s6">
                        <button class="btn btn-primary" id="btn-btn" type="submit">{{ isset($guard) ? 'Update' : 'Submit' }}</button>
                    </div>
                </div>
            </div>

            <!--end col-->
    </div>
    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<script>

    $(document).ready(function() {

    
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.profile-pic').attr('src', e.target.result);
            }
    
            reader.readAsDataURL(input.files[0]);
        }
    }
    

    $(".file-upload").on('change', function(){
        readURL(this);
    });
    
    $(".upload-button").on('click', function() {
       $(".file-upload").click();
    });
});


    </script>