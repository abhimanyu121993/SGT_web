@extends('layout.panel')
@section('title', 'Role')
@section('breadcrumb-title', 'Role')
@section('breadcrumb-backpage', 'Role & Permission')
@section('breadcrumb-currentpage', 'Role')
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
    <div class="section">
        <div class="card">
            <div class="card-content">
                <div class="live-preview">
                    <form
                        action="{{ isset($RoleEdit) ? route($guard.'.role-permission.role.update', $RoleEdit->id) : route($guard.'.role-permission.role.store') }}"
                        method="POST">
                        @if (isset($RoleEdit))
                            @method('patch')
                        @endif
                        @csrf
                        <div class="row gy-4">
                            <div class="col-xxl-3 col-md-6">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="role" name="role"
                                        value="{{ isset($RoleEdit) ? $RoleEdit->role_name : '' }}" placeholder="Role Name">
                                    <button class="btn btn-primary" id="btn-btn"
                                        type="submit">{{ isset($RoleEdit) ? 'Update' : 'Submit' }}</button>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        
    <div class="card-content">
        <h4 class="card-title mb-0 flex-grow-1" id="h1">Manage Roles</h4>
        <table class="table table-nowrap container" id="example">
            <thead>
                <tr>
                    <th scope="col">Sr.No.</th>
                    <th scope="col">Role Name</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Roles as $data)
                            <tr>
                                <th scope="row">{{ $loop->index + 1 }}</th>
                                <td>{{ $data->role_name }}</td>
                                <td>{{ $data->created_at }}</td>
                                <td>
                                    <div class="dropdown">
                                        <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="ri-more-2-fill"></i>
                                        </a>
                                        @php $bid=Crypt::encrypt($data->id); @endphp
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <li><a id="pop" class="dropdown-item" href="{{route($guard.'.role-permission.role.edit',$bid)}}">Edit</a></li>
                                            <li><a id="pop" class="dropdown-item" href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $bid }}').submit();">Delete</a></li>

                                            <form id="delete-form-{{ $bid }}" action="{{ route($guard.'.role-permission.role.destroy', $bid) }}"
                                                method="post" style="display: none;">
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
