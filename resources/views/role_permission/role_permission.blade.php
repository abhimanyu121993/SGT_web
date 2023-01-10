@extends('layout.panel')
@section('title','Permission')
@section('breadcrumb-title','Permissions')
@section('breadcrumb-backpage','Role & Permission')
@section('breadcrumb-currentpage','Permission')
@section('content-area')

<div class="section">
    <div class="card">
        <div class="card-content">
            <div class="live-preview">
                <form action="{{ route('superadmin.role-permission.permission.store') }}" method="POST">
                    @csrf
                    <div class="row gy-4">
                        <div class="col-xxl-3 col-md-6">
                            <label for="permission" class="form-label">Permission Name</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="permission" name="permission"
                                    placeholder="Permission Name">
                                <button class="btn btn-primary" id="btn-btn" type="submit">Submit</button>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="card-content">
    <h4 class="card-title mb-0 flex-grow-1" id="h1">Manage Permissions</h4>
    <table class="table table-nowrap container" id="example">
        <thead >
            <tr>
                <th scope="col">Sr.No.</th>
                <th scope="col">Name</th>
                <th scope="col">Created At</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            {{-- @foreach ($permissions as $data)
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->created_at }}</td>
                    <td>
                        <div class="dropdown">
                            <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="ri-more-2-fill"></i>
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="#" id="pop">View</a></li>
                                <li><a class="dropdown-item" href="#" id="pop">Edit</a></li>
                                <li><a class="dropdown-item" href="#" id="pop">Delete</a></li>
                            </ul>
                        </div>
                    </td>
            @endforeach
            </tr> --}}
        </tbody>
    </table>
</div>


@endsection