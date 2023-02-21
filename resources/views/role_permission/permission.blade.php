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
    <div class="card">
        <div class="card-content">
            <div class="live-preview">
                <form action="{{ route(Session::get('guard').'.role-permission.permission.store') }}" method="POST">
                    @csrf
                    <div class="row gy-4">
                        <div class="col-xxl-3 col-md-6">
                            <div class="input-field">
                                <input type="text" class="form-control" id="permission" name="permission"
                                   >
                                   <label for="permission" class="form-label">{{__('rolepermission.permission-name')}}</label>

                                <button class="btn btn-primary" id="btn-btn" type="submit">Add</button>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
  <div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                <h4 class="card-title">{{__('rolepermission.permission-list')}}</h4>
                <div class="row">
                    <div class="col s12">
                    <table id="page-length-option" class="display nowrap" style="width:100%">
                            <thead>
                            <tr>
                            <th >Sr.No.</th>
                            <th >Name</th>
                            <th >Created At</th>
                            <th >Created On</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($permissions as $data)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $data->permission_name }}</td>
                        <td>{{ $data->created_at->format('d-M-Y') }}</td>
                        <td>{{ $data->created_at->format('H:i:s a') }}</td>
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
   <!-- BEGIN PAGE VENDOR JS-->
   <script src="{{asset('app-assets/vendors/data-tables/js/jquery.dataTables.min.js') }}"></script>

   <!-- END PAGE VENDOR JS-->
@endsection