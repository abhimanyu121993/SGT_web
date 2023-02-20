@extends('layout.panel')
@section('title', 'Manage User')
@section('breadcrumb')
<div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
    <!-- Search for small screen-->
    <div class="container">
        <div class="row">
            <div class="col s10 m6 l6">
                <h5 class="breadcrumbs-title mt-0 mb-0"><span>Manage Staff</span></h5>
                <ol class="breadcrumbs mb-0">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Staff</a>
                    </li>
                    <li class="breadcrumb-item active">Manage Staff
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
                <h4 class="card-title">{{__('staff.manage_staff')}}
                </h4>
                <div class="row">
                    <div class="col s12">
                        <table id="scroll-vert-hor" class="display nowrap" style="width:100%">
                            <thead class="">
                                <tr>
                                <th>{{__('user.sr_no')}}</th>
                                <th>{{__('user.name')}}</th>
                                 <th>{{__('user.email')}}</th>
                                 <th>{{__('user.is_active')}}</th>
                                 <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($admin as $data)
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td>{{ $data->name??'' }}</td>
                    <td>{{ $data->email??''}}</td>
                    <td>
                    <div class="switch">
                            <label>
                                <input type="checkbox" value="{{$data->id}}" data-url="{{route('admin.user.active-user',$data->id) }}" class="is_active" id="is_active"  {{ $data->isactive==0?'':'checked'   }} >
                                <span class="lever"></span>
                            </label>
                        </div>

                    </td>
                    <td>
                        <div class="dropdown">
                            <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="ri-more-2-fill"></i>
                            </a>
                            @php $bid=Crypt::encrypt($data->id); @endphp
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a id="pop" class="dropdown-item"
                                        href="{{route($guard.'.user.edit',$bid)}}">Edit</a></li>
                                <li><a id="pop" class="dropdown-item" href="#"
                                        onclick="event.preventDefault();document.getElementById('delete-form-{{ $bid }}').submit();">Delete</a>
                                </li>

                                <form id="delete-form-{{ $bid }}"
                                    action="{{ route($guard.'.user.destroy', $bid) }}" method="post"
                                    style="display: none;">
                                    @method('DELETE')
                                    @csrf
                                </form>
                            </ul>
                        </div>
                    </td>
                </tr>
                @endforeach
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
    $('.is_active').on('click', function() {
        var id = $(this).val();
        $.ajax({
            url: $(this).data('url'),
            method: 'get',
            beforeSend: function() {
                $('.is_active').attr('disabled', 'true');
            },
            success: function() {

                $('.is_active').removeAttr('disabled')

            }
        });
    });
</script>
<script src="{{asset('app-assets/vendors/data-tables/js/jquery.dataTables.min.js') }}"></script>

@endsection