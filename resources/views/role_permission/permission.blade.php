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
                <form action="{{ route(Session::get('guard').'.role-permission.permission.store') }}" method="POST">
                    @csrf
                    <div class="row gy-4">
                        <div class="col-xxl-3 col-md-6">
                            <label for="permission" class="form-label">{{__('rolepermission.permission-name')}}</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="permission" name="permission"
                                    placeholder="{{__('rolepermission.permission-name')}}">
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
<div class="row">
    <div class="col s12">
      <div class="card">
        <div class="card-content">
          <h4 class="card-title">{{__('rolepermission.permission-list')}}
          </h4>
          <div class="row">
            <div class="col s12">
              <table id="scroll-vert-hor" class="display nowrap" style="width:100%">
                <thead >
                    <tr>
                        <th >Sr.No.</th>
                        <th >Name</th>
                        <th >Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $data)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $data->permission_name }}</td>
                        <td>{{ $data->created_at->format('d-M-Y') }}</td>
                        {{-- <td>
                            <div class="dropdown">
                                <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="ri-more-2-fill"></i>
                                </a>
        
                               
                            </div>
                        </td> --}}
                    </tr>
                @endforeach
                   
                </tbody>              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



@endsection
@section('script-area')
   <!-- BEGIN PAGE VENDOR JS-->
  
   <!-- END PAGE VENDOR JS-->
@endsection