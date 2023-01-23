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
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">IsActive</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $data)
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
                                        href="{{route($guard.'.user.user.edit',$bid)}}">Edit</a></li>
                                <li><a id="pop" class="dropdown-item" href="#"
                                        onclick="event.preventDefault();document.getElementById('delete-form-{{ $bid }}').submit();">Delete</a>
                                </li>

                                <form id="delete-form-{{ $bid }}"
                                    action="{{ route($guard.'.user.user.destroy', $bid) }}" method="post"
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
@endsection