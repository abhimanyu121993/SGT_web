@extends('layout.panel')
@section('title', 'Manage Subcription')
@section('breadcrumb-title', 'Manage Subscription')
@section('breadcrumb-backpage', 'Manage Subscription')
@section('breadcrumb-currentpage', 'Manage Subscription')
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
<div class="card">
    <div class="card-content">
        <h4 class="card-title mb-0 flex-grow-1" id="h1">Manage Subscription</h4>
        <table class="table table-nowrap container" id="example">
            <thead>
                <tr>
                    <th scope="col">Sr.No.</th>
                    <th scope="col">Title</th>
                    <th scope="col">Currency</th>
                    <th scope="col">Price</th>
                    <th scope="col">Free Trails Days</th>
                    <th scope="col">Status</th>
                    <th scope="col">Limit</th>
                    <th scope="col">LifeTime</th>
                    <th scope="col">Icon/Image</th>
                    <th scope="col">Color</th>
                    <th scope="col">Background Color</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subscription as $data)
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td>{{ $data->title??'' }}</td>
                    <td>{{ $data->currencyInfo->code??''}}</td>
                    <td>{{ $data->price??'' }}</td>
                    <td>{{ $data->free_trial_days??'' }}</td>
                    <td>
                    {{ $data->statusInfo->name??'' }}
                    </td>
                    <td>
                        <div class="switch">
                            <label>
                                <input type="checkbox" value="{{$data->id}}" class="is_limit" id="is_limit" data-url="{{route('admin.subscription.limit',$data->id) }}"
                                    {{ $data->limit==0?'':'checked' }}>
                                <span class="lever"></span>
                            </label>
                        </div>
                    </td>
                    <td>
                        <div class="switch">
                            <label>
                                <input type="checkbox" value="{{$data->id}}" class="is_life_time" id="is_life_time" data-url="{{route('admin.subscription.life-time',$data->id) }}"
                                    {{ $data->life_time==0?'':'checked' }}>
                                <span class="lever"></span>
                            </label>
                        </div>
                    </td>
                    </td>
                    <td>
                        <img src="{{!empty($data->icon)?asset($data->icon):asset($data->img)}}" class="me-75 bg-light-danger"
                            style="height:60px;width:60px;border-radius:100%;" />
                    </td>
                    <td>{{ $data->color??'' }}</td>
                    <td>{{ $data->bg_color??''}}</td>
                    <td>
                        <div class="dropdown">
                            <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="ri-more-2-fill"></i>
                            </a>
                            @php $bid=Crypt::encrypt($data->id); @endphp
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a id="pop" class="dropdown-item"
                                        href="{{route($guard.'.subscription.subscription.edit',$bid)}}">Edit</a></li>
                                <li><a id="pop" class="dropdown-item" href="#"
                                        onclick="event.preventDefault();document.getElementById('delete-form-{{ $bid }}').submit();">Delete</a>
                                </li>

                                <form id="delete-form-{{ $bid }}"
                                    action="{{ route($guard.'.subscription.subscription.destroy', $bid) }}" method="post"
                                    style="display: none;">
                                    @method('DELETE')
                                    @csrf
                                </form>
                            </ul>
                        </div>
                    </td>
                    @endforeach
                </tr>
            </tbody>
        </table>
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
<!-- Image and Icon slection -->
<!-- Ajax for Checking IsLimit -->
<script>
    $('.is_limit').on('click', function() {
        var id = $(this).val();
        $.ajax({
            url: $(this).data('url'),
            method: 'get',
            beforeSend: function() {
                $('.is_limit').attr('disabled', 'true');
            },
            success: function() {

                $('.is_limit').removeAttr('disabled')

            }
        });
    });
</script>

<!-- Ajax for Checking IsLife_Time -->
<script>
    $('.is_life_time').on('click', function() {
        var id = $(this).val();
        $.ajax({
            url: $(this).data('url'),
            method: 'get',
            beforeSend: function() {
                $('.is_life_time').attr('disabled', 'true');
            },
            success: function() {

                $('.is_life_time').removeAttr('disabled')

            }
        });
    });
</script>
@endsection