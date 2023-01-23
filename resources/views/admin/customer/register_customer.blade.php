@extends('layout.panel')
@section('title', 'Customer')
@section('breadcrumb-title', 'Customer')
@section('breadcrumb-backpage', 'Customer')
@section('breadcrumb-currentpage', 'Register Customer')
@section('link-area')

@endsection
@section('content-area')

    <div class="section">
        <div class="card">
            <div class="card-content">
                <div class="live-preview">
                    <form
                        action="{{ isset($CustomerEdit) ? route(Session::get('guard').'.customer.update', $CustomerEdit->id) : route(Session::get('guard').'.customer.store') }}"
                        method="POST">
                        @if (isset($CustomerEdit))
                            @method('patch')
                        @endif
                        @csrf
                        <div class="row gy-4">
                            <div class="col-xxl-3 col md-6">
                                <div class="input-group">
                                    <label>Choose Subscription Plan</label>
                                    <input type="radio" class="form-control" id="membership_plan" name="membership_plan"
                                        value="" >Gold Plan
                                </div>
                            </div>
                        </div>
                        <div class="row gy-4">
                            <div class="col-xxl-3 col md-6">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="first_name" name="first_name"
                                        value="{{ isset($CustomerEdit) ? $CustomerEdit->first_name : '' }}" placeholder="First Name">
                                </div>
                            </div>
                            <div class="col-xxl-3 col md-6">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="last_name" name="last_name"
                                    value="{{ isset($CustomerEdit) ? $CustomerEdit->last_name : '' }}" placeholder="Last Name">
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <div class="row gy-4">
                            <div class="col-xxl-3 col md-6">
                                <div class="input-group">
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ isset($CustomerEdit) ? $CustomerEdit->email : '' }}" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-xxl-3 col md-6">
                                <div class="input-group">
                                    <input type="number" class="form-control" id="mobileno" name="mobileno"
                                    value="{{ isset($CustomerEdit) ? $CustomerEdit->mobileno : '' }}" placeholder="Mobile Number">
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <div class="row gy-4">
                            <div class="col-xxl-3 col md-4">
                                <div class="input-group">
                                   <select class="form--control" id="country" name="country">
                                        <option>--Select Country--</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endforeach
                                   </select>
                                </div>
                            </div>
                            <div class="col-xxl-3 col md-4">
                                <div class="input-group">
                                   <select class="form--control" id="state" name="state">
                                        <option>--Select State--</option>
                                   </select>
                                </div>
                            </div>
                            <div class="col-xxl-3 col md-4">
                                <div class="input-group">
                                   <select class="form--control" id="city" name="city">
                                        <option>--Select City--</option>
                                   </select>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <div class="row gy-4">
                            <div class="col-xxl-3 col md-4">
                                <div class="input-group">
                                   <select class="form--control" name="country">
                                        <option>--Select Timezone--</option>
                                   </select>
                                </div>
                            </div>
                            <div class="col-xxl-3 col md-4">
                                <div class="input-group">
                                   <select class="form--control" name="state">
                                        <option>--Select Currency--</option>
                                   </select>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <div class="row gy-4">
                            <div class="col-xxl-3 col md-12">
                                <textarea class="form-control" name="address" placeholder="Address" ></textarea>
                            </div>
                            <!--end col-->
                        </div>
                        <div class="row gy-4">
                            <div class="col-xxl-3 col md-4">
                                <button class="btn btn-primary" id="btn-btn"
                                        type="submit">{{ isset($CustomerEdit) ? 'Update' : 'Submit' }}</button>
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
