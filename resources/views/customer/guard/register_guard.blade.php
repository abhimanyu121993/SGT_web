<div class="modal-content">
    <h4>
    {{ isset($guard) ? 'Update Guard ': 'Add Guard' }}
    </h4>
    <div class="live-preview">
        <form action="{{ isset($guard) ? route(Session::get('guard').'.secuirty-guard.update', $guard->id) : route(Session::get('guard').'.secuirty-guard.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if (isset($guard))
            @method('patch')
            @endif

            <div class="row gy-4">
                <div class="col-xxl-3 col-md-6">
                    <div class="file-field input-field col s12" id="image">
                        <div class="btn">
                            <span>{{__('security_guard.image')}}</span>
                            <input type="file" name="images">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                    </div>
                    <div class="input-group col s4">
                        <input type="text" class="form-control" id="name" name="name" value="{{ isset($guard) ? $guard->name : old('name') }}" placeholder="Name">
                        <label class="active" for="name">{{__('security_guard.name')}}</label>
                    </div>
                    <div class="input-group col s4">
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ isset($guard) ? $guard->phone : old('phone') }}" placeholder="Phone No">
                        <label class="active" for="phone">{{__('security_guard.phone')}}</label>
                    </div>
                    <div class="input-group col s4">
                        <input type="text" class="form-control" id="email" name="email" value="{{ isset($guard) ? $guard->email : old('email') }}" placeholder="Email">
                        <label class="active" for="email">{{__('security_guard.email')}}</label>
                    </div>
                    @if(!isset($guard))
                    <div class="input-group col s4">
                        <input type="password" class="form-control" id="password" name="password" value="{{ isset($guard) ? $guard->password : '' }}" placeholder="password">
                        <label class="active" for="password">{{__('security_guard.password')}}</label>
                    </div>
                    <div class="input-group col s4">
                        <input type="text" class="form-control" id="cpassword" name="cpassword" value="{{ isset($guard) ? $guard->password : '' }}" placeholder="Confirm Password">
                        <label class="active" for="cpassword">{{__('security_guard.cpassword')}}</label>
                    </div>
                    @endif
                    <div class="input-group col s4">
                        <select class="select2 browser-default" id="gender" name="gender">
                            <option selected disabled>--Select Gender--</option>
                            <option value="male" @isset($guard) @selected($guard->gender=='m') @else @selected(old('gender')=='m') @endisset>Male</option>
                            <option value="female" @isset($guard) @selected($guard->gender=='f') @else @selected(old('gender')=='f') @endisset >Female</option>
                            <option value="other" @isset($guard) @selected($guard->gender=='o') @else @selected(old('gender')=='o') @endisset>Other</option>
                        </select>
                        <span class="active" for="gender">{{__('security_guard.gender')}}</span>
                    </div>
                    <div class="input-group col s4">
                        <input type="text" class="form-control" id="street" name="street" value="{{ isset($guard) ? $guard->street : '' }}" placeholder="Confirm Password">
                        <label class="active" for="street">{{__('security_guard.street')}}</label>
                    </div>
                    <div class="input-group col s4">
                        <select class="select2 browser-default" id="country" name="country">
                            <option selected disabled>--Select Country--</option>
                            @foreach ($countries as $country)
                            <option value="{{ $country->id }}" @isset($guard) @selected($guard->country_id==$country->id) @else @selected(old('country_id')==$country->id) @endisset>{{ $country->name }}</option>
                            @endforeach
                        </select>
                        <span class="active" for="cpassword">{{__('security_guard.country')}}</span>

                    </div>
                    <div class="input-group col s4">
                        <select class="select2 browser-default" id="state" name="state">
                            <option value="">--Select State--</option>
                            @foreach (Helper::getStateByCountry($guard->country_id??old('country_id')) as $st)
                            <option value="{{$st->id}}" @isset($guard) @selected($guard->state_id==$st->id) @else @selected(old('state_id')==$st->id) @endisset>{{$st->name}}</option>
                            @endforeach
                        </select>
                        <span class="active" for="cpassword">{{__('security_guard.state')}}</span>

                    </div>
                    <div class="input-group col s4">
                        <select class="select2 browser-default" id="city" name="city">
                            <option value="">--Select City--</option>
                            @foreach (Helper::getCitiesByState($guard->state_id??old('state_id')) as $ct)
                            <option value="{{$ct->id}}" @isset($guard) @selected($guard->city_id==$ct->id) @else @selected(old('city_id')==$ct->id) @endisset>{{$ct->name}}</option>
                            @endforeach
                        </select>
                        <span class="active" for="cpassword">{{__('security_guard.city')}}</span>

                    </div>
                    <div class="input-group col s4">
                        <input type="text" class="form-control" id="pincode" name="pincode" value="{{ isset($guard) ? $guard->pincode : '' }}" placeholder="Confirm Password">
                        <label class="active" for="pincode">{{__('security_guard.pincode')}}</label>
                    </div>
                    <!--end col-->
                </div>
                <div class="row col s12 mt-2">
                    <div class="input-group col s4">
                        <button class="btn btn-primary" id="btn-btn" type="submit">{{ isset($guard) ? 'Update' : 'Submit' }}</button>
                    </div>
                </div>
            </div>

            <!--end col-->
    </div>
    </form>
</div>