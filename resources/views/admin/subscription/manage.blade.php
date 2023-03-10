@extends('layout.panel')
@section('title', 'Manage Subcription')
@section('breadcrumb')
<div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
    <!-- Search for small screen-->
    <div class="container">
        <div class="row">
            <div class="col s10 m6 l6">
                <h5 class="breadcrumbs-title mt-0 mb-0"><span>Manage Subscription</span></h5>
                <ol class="breadcrumbs mb-0">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Subscription</a>
                    </li>
                    <li class="breadcrumb-item active">Manage Subscription
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content-area')
@php
if(Auth::guard('superadmin')->check()){
$guard='superadmin';
}
else if(Auth::guard('admin')->check())
{
$guard='admin';
}
else if(Auth::guard('customer')->check()){
$guard='customer';
}
@endphp
<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                <h4 class="card-title">{{__('subscription.manage_subscription')}}
                </h4>
                <div class="row">
                    <div class="col s12">
                        <table id="page-length-option" class="display nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sr.No.</th>
                                    <th>Title</th>
                                    <th>Currency</th>
                                    <th>Price</th>
                                    <th>Free Trails Days</th>
                                    <th>Status</th>
                                    <th>Limit</th>
                                    <th>LifeTime</th>
                                    <th>Icon/Image</th>
                                    <th>Color</th>
                                    <th>Background Color</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subscription as $data)
                                <tr>
                                    <th>{{ $loop->index + 1 }}</th>
                                    <td>{{ $data->title??'' }}</td>
                                    <td>{{ $data->currencyInfo->code??''}}</td>
                                    <td>{{ $data->price??'' }}</td>
                                    <td>{{ $data->free_trial_days??'' }}</td>
                                    <td>
                                        <div class="switch">
                                            <label>
                                                <input type="checkbox" value="{{$data->id}}" data-url="{{route('admin.subscription.is_active',$data->id) }}" class="is_active" id="is_active" {{ $data->is_active==0?'':'checked'   }}>
                                                <span class="lever"></span>
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="switch">
                                            <label>
                                                <input type="checkbox" value="{{$data->id}}" class="is_active" id="is_active" data-url="{{route('admin.subscription.limit',$data->id) }}" {{ $data->limit==0?'':'checked' }}>
                                                <span class="lever"></span>
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="switch">
                                            <label>
                                                <input type="checkbox" value="{{$data->id}}" class="is_active" id="is_active" data-url="{{route('admin.subscription.life-time',$data->id) }}" {{ $data->life_time==0?'':'checked' }}>
                                                <span class="lever"></span>
                                            </label>
                                        </div>
                                    </td>
                                    </td>
                                    <td>
                                        <img src="{{!empty($data->icon)?asset('storage/'.$data->icon):asset('storage/'.$data->img)}}" class="me-75 bg-light-danger" style="height:60px;width:60px;border-radius:100%;" />
                                    </td>
                                    <td>{{ $data->color??'' }}</td>
                                    <td>{{ $data->bg_color??''}}</td>
                                    <td>
                                        <div class="dropdown">
                                            <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ri-more-2-fill"></i>
                                            </a>
                                            @php $bid=Crypt::encrypt($data->id); @endphp
                                            <a id="pop" class="dropdown-item" href="{{route($guard.'.subscription.edit',$bid)}}"><i class="material-icons light-warning-text text-darken-4">edit</i></a>
                                            <!-- <a id="pop" class="dropdown-item" href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $bid }}').submit();"><i class="material-icons danger red-text text-accent-4">delete</i></< /a>


                                                <form id="delete-form-{{ $bid }}" action="{{ route($guard.'.subscription.destroy', $bid) }}" method="post" style="display: none;">
                                                    @method('DELETE')
                                                    @csrf
                                                </form> -->
                                        </div>
                                    </td>
                                    @endforeach
                                </tr>
                            </tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script-area')
<script>
    $(document).ready(function() {
        $('#free_trails_days').hide();
        $("#free_trails").change(function() {
            $(this).find("option:selected").each(function() {
                var optionValue = $(this).attr("value");
                if (optionValue == 1) {
                    $('#free_trails_days').show();
                } else {
                    $('#free_trails_days').hide();
                }
            });
        }).change();
    });
</script>
@endsection