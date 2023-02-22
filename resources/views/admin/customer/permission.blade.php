@extends('layout.panel')
@section('title','Permission')
@section('breadcrumb')
<div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
    <!-- Search for small screen-->
    <div class="container">
        <div class="row">
            <div class="col s10 m6 l6">
                <h5 class="breadcrumbs-title mt-0 mb-0"><span>Permissions</span></h5>
                <ol class="breadcrumbs mb-0">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Role & Permission</a>
                    </li>
                    <li class="breadcrumb-item active">Permissions
                    </li>
                </ol>
            </div>         
        </div>
    </div>
</div>
@endsection
@section('content-area')
    <div class="section">

        <div class="row">
            <div class="col s12">
                <div class="card">
                    <div class="card-content">

                        <form action="{{ route(Session::get('guard') . '.customer.assign-permission') }}" method="post">
                            @csrf
                            <input type="hidden" name='customerid' value="{{ $customer->id }}">
                            <table id="page-length-option" class="display nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Permissions Name</th>
                                        <th>Menu</th>
                                        <th>Create</th>
                                        <th>Read</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!isset($permissionnames))
                                        <tr>
                                            <td colspan="7">No permission assigned</td>
                                        </tr>
                                    @else
                                        @foreach ($permissionnames as $pname)
                                            <tr>
                                                <th class="text-capitalize">
                                                    {{ $pname->permission_name }}
                                                </th>
                                                
                                                @foreach ($pname->permissions as $permission)
                                                
                                                    <td>
                                                        <label>
                                                            <input type="checkbox" value="{{ $permission->id }}" name='customerpermissions[]'
                                                            {{ $customer->hasPermissionTo($permission->name,'customer') ? 'checked' : '' }}/>
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    @endif

                                </tbody>
                            </table>
                            <button class="btn btn-primary mt-2" type="submit"> Update Permission</button>
                        </form>

                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
<script src="{{asset('app-assets/js/scripts/data-tables.js')}}"></script>