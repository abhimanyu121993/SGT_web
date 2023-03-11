@extends('layout.panel')
@section('title', 'Property')
@section('breadcrumb')
<div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
    <!-- Search for small screen-->
    <div class="container">
        <div class="row">
            <div class="col s10 m6 l6">
                <h5 class="breadcrumbs-title mt-0 mb-0"><span>Property</span></h5>
                <ol class="breadcrumbs mb-0">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Property</a>
                    </li>
                    <li class="breadcrumb-item active">Add Property
                    </li>
                </ol>
            </div> 
            <div class="col s2 m6 l6"><a class="btn breadcrumbs-btn right modal-trigger" href="{{route(Session::get('guard') . '.property.show',Crypt::encrypt(Helper::getCustomerBySession()->id))}}" class="hide-on-small-onl">Back To Properties</span></a> 
            </div>        
        </div>
    </div>
</div>
@endsection
@section('content-area')

    <div class="section">
        <div class="card">
            <div class="card-content">
                <div class="live-preview">
                    <form action="{{ isset($propertyEdit) ? route(Session::get('guard').'.property.update', $propertyEdit->id) : route(Session::get('guard').'.property.store') }}"
                        method="POST" enctype="multipart/form-data">
                        @if (isset($propertyEdit))
                            @method('patch')
                        @endif
                        @csrf
                        <div class="row gy-4">
                        <div class="file-field input-field col s6" id="image">
                        <div class="btn">
                            <span>{{__('property.image')}}</span>
                            <input type="file" name="images">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                    </div>
                    
                            <div class="input-field col s6">
                            <input type="text" class="form-control" id="property_name" name="name"
                                <input type="text" class="form-control" id="property_name" name="name"
                                    value="{{ isset($propertyEdit) ? $propertyEdit->name : old('name') }}" >
                                    <label for="property_name">{{__('property.property_name')}}</label>
                            </div>

                            <!--end col-->
                        </div>
                        <div class="row gy-4">
                            <div class="input-field col s6">
                                   <select class="select2 browser-default"  id="country" name="country">
                                        <option selected disabled>--Select Country--</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}" @isset($propertyEdit) @selected($propertyEdit->country==$country->id) @else @selected(old('country')==$country->id) @endisset>{{ $country->name }}</option>
                                        @endforeach
                                   </select>
                                   <label for="country">{{__('property.country')}}</label>
                                </div>
                                <div class="input-field col s6">
                                   <select class="select2 browser-default" id="state" name="state">
                               
                                <option value="">--Select State--</option>                                   
                                @foreach (Helper::getStateByCountry($propertyEdit->country??old('country')) as $st)
                                   <option value="{{$st->id}}" @isset($propertyEdit) @selected($propertyEdit->state==$st->id) @else @selected(old('state')==$st->id) @endisset>{{$st->name}}</option>
                               @endforeach
                                   </select>
                                   <label for="state">{{__('property.state')}}</label>
                                </div>
                                <div class="input-field col s6">
                                   <select class="select2 browser-default"  id="city" name="city">
                                    <option value="">--Select City--</option>  
                                    @foreach (Helper::getCitiesByState($propertyEdit->state??old('state')) as $ct)
                                        <option value="{{$ct->id}}" @isset($propertyEdit) @selected($propertyEdit->city==$ct->id) @else @selected(old('city')==$ct->id) @endisset>{{$ct->name}}</option>
                                    @endforeach
                                   </select>
                                   <label for="city">{{__('property.city')}}</label>
                                </div>
                                <div class="input-field col s6">
                                    <input type="number" class="form-control" id="postcode" name="postcode"
                                        value="{{ isset($propertyEdit) ? $propertyEdit->postcode : old('postcode') }}" placeholder="Postcode">
                                   <label for="postcode">{{__('property.pincode')}}</label>
                                </div>
                            <!--end col-->
                        </div>
                        <div class="row gy-4">
                            <div class="input-field col s6">
                                <input type="number" class="form-control"  id="lattitude" name="lattitude"
                                value="{{ isset($propertyEdit) ? $propertyEdit->lattitude : (old('lattitude')??0) }}" placeholder="Lattitude" readonly>
                                <label for="lattitude">{{__('property.latitude')}}</label>
                            </div>

                            <div class="input-field col s6">
                                <input type="number" class="form-control"  id="longitude" name="longitude"
                                value="{{ isset($propertyEdit) ? $propertyEdit->longitude : (old('longitude')??0) }}" placeholder="Longitude" readonly>
                                <label for="longitude">{{__('property.longitude')}}</label>

                            </div>

                        <!--end col-->
                        </div>
                        <div class="row gy-4 mt-2">
                            <div class="input-field col s12">
                                <textarea class="materialize-textarea" id='address'name="address"  data-length="120" >{{ isset($propertyEdit) ? $propertyEdit->address : old('address') }}</textarea>
                            </div>
                           
                            <!--end col-->
                        </div>
                        <div class="btn">
        <span>Property images</span>
        <input type="file" name="property_pic[]" multiple>
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
      </div>
    </div>
                        <div class="row gy-4">
                            <div class="col-xxl-3 col md-4">
                                <button class="btn btn-primary" id="btn-btn"
                                        type="submit">{{ isset($propertyEdit) ? 'Update' : 'Submit' }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<div class="section">
    <div id="address-map-container" style="width:100%;height:400px; ">
        <div style="width: 100%; height: 100%" id="address-map"></div>
    </div>
</div>


@endsection
@section('script-area')
<script src="{{asset('app-assets/js/mapInput.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize" async defer></script>
<script>
       $(document).ready(function() {
     var a= $('input#address').characterCounter();
     console.log(a);
    });
</script>
@endsection
