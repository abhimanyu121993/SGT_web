@extends('layout.panel')
@section('title', 'Role')
@section('breadcrumb-title', 'Role')
@section('breadcrumb-backpage', 'Role & Permission')
@section('breadcrumb-currentpage', 'Role')
@section('link-area')

@endsection
@section('content-area')

    <div class="section">
        <div class="card">
            <div class="card-content">
                <div class="live-preview">
                    <form
                        action="{{ isset($RoleEdit) ? route(Session::get('guard').'.role-permission.role.update', $RoleEdit->id) : route(Session::get('guard').'.role-permission.role.store') }}"
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
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Sr.No</th>
                    <th>Name</th>
                    <th>Guard</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{++$loop->index}}</td>
                        <td>{{$role->role_name}}</td>
                        <td>{{$role->guard_name}}</td>
                        <td><i class="material-icons danger red-text text-accent-4">delete</i>
                            <a href="{{route(Session::get('guard').'.role-permission.role.edit',$role->encrypted_id)}}"><i class="material-icons light-blue-text text-darken-4">edit</i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- {{$dataTable->table()}}
       
        {{$dataTable->scripts()}} --}}
    </div>

</div>

@endsection
@section('script-area')

@endsection