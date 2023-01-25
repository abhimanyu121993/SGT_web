@extends('layout.panel')
@section('title', 'Property')
@section('breadcrumb-title', 'Property')
@section('breadcrumb-backpage', 'Property')
@section('breadcrumb-currentpage', 'Register Property')
@section('link-area')

@endsection
@section('content-area')

    <div class="section">
        <div class="card">
            <div class="card-content">
                <div class="live-preview">
                    <form action="{{ isset($propertyEdit) ? route(Session::get('guard').'.property.update', $propertyEdit->id) : route(Session::get('guard').'.property.store') }}"
                        method="POST">
                        @if (isset($propertyEdit))
                            @method('patch')
                        @endif
                        @csrf
                        <div class="row gy-4">

                            <div class="input-group col s12">
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ isset($propertyEdit) ? $propertyEdit->name : '' }}" placeholder="Property Name">
                            </div>

                            <!--end col-->
                        </div>
                        <div class="row gy-4">
                            <div class="input-group col s4">
                                   <select class="select2 browser-default"  id="country" name="country">
                                        <option selected disabled>--Select Country--</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}" @isset($propertyEdit)@selected($propertyEdit->country==$country->id) @endisset>{{ $country->name }}</option>
                                        @endforeach
                                   </select>
                                </div>
                                <div class="input-group col s4">
                                   <select class="select2 browser-default" id="state" name="state">
                                        @if(isset($propertyEdit))
                                <option value="{{ isset($propertyEdit) ? $propertyEdit->state : '' }}"  selected>{{$propertyEdit->state_details->name}}</option>
                               @else
                                <option selected disabled>--Select State--</option>                                   
                                @endif
                                   </select>
                                </div>
                                <div class="input-group col s4">
                                   <select class="select2 browser-default"  id="city" name="city">
                                        @if(isset($propertyEdit))
                                <option value="{{ isset($propertyEdit) ? $propertyEdit->city : '' }}"  selected>{{$propertyEdit->city_details->name??''}}</option>
                                @else
                                <option selected disabled>--Select City--</option>
                                @endif
                                   </select>
                                </div>

                            <!--end col-->
                        </div>
                        <div class="row gy-4">

                            <div class="input-group col s4">
                                <input type="number" class="form-control" id="postcode" name="postcode"
                                    value="{{ isset($propertyEdit) ? $propertyEdit->postcode : '' }}" placeholder="Postcode">
                            </div>

                            <div class="input-group col s4">
                                <input type="text" class="form-control" id="lattitude" name="lattitude"
                                value="{{ isset($propertyEdit) ? $propertyEdit->lattitude : '' }}" placeholder="Lattitude">
                            </div>

                            <div class="input-group col s4">
                                <input type="text" class="form-control" id="longitude" name="longitude"
                                value="{{ isset($propertyEdit) ? $propertyEdit->longitude : '' }}" placeholder="Longitude">
                            </div>

                        <!--end col-->
                        </div>
                        <div class="row gy-4 mt-2">
                            <div class="input-group col s12">
                                <textarea class="form-control" name="address" placeholder="Address" >{{ isset($propertyEdit) ? $propertyEdit->address : '' }}</textarea>
                            </div>
                            <!--end col-->
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


</div>

@endsection
@section('script-area')

@endsection
