@extends('layout.panel')
@section('title', 'Manage Staff')
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
<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                <h4 class="card-title">{{__('staff.manage_staff')}}
                </h4>
                <div class="row">
                    <div class="col s12">
                    <table id="page-length-option" class="display nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>{{__('user.sr_no')}}</th>
                                    <th>{{__('user.name')}}</th>
                                    <th>{{__('user.email')}}</th>
                                    <th>{{__('user.role')}}</th>
                                    <th>{{__('user.is_active')}}</th>
                                    <th>{{__('user.created_at')}}</th>
                                    <th>{{__('user.created_on')}}</th>
                                    <th>{{__('user.activity')}}</th>
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
                                        @foreach($data->roles as $role)
                                        {{ Helper::role_name($role->name )}}
                                        @endforeach
                                     </td>
                                    <td>
                                        <div class="switch">
                                            <label>
                                                <input type="checkbox" value="{{$data->id}}" data-url="{{route('admin.user.active-user',$data->id) }}" class="is_active" id="is_active" {{ $data->isactive==0?'':'checked'   }}>
                                                <span class="lever"></span>
                                            </label>
                                        </div>

                                    </td>
                                    <td>{{ $data->created_at->format('d-M-Y') }}</td>
                                     <td>{{ $data->created_at->format('H:i:s a') }}</td>
                                     <td><a href="{{route(Session::get('guard').'.activity.staff-activity',Crypt::encrypt($data->id))}}" class=""><i class="material-icons left">visibility</i></a></td>

                                    <td>
                                        <div class="dropdown">
                                            <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ri-more-2-fill"></i>
                                            </a>
                                            @php $bid=Crypt::encrypt($data->id); @endphp
                                               <a id="pop" class="dropdown-item" href="{{route(Helper::getGuard().'.user.edit',$bid)}}"><i class="material-icons light-blue-text text-darken-4">edit</i></a>
                                                <a id="pop" class="dropdown-item" href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $bid }}').submit();"><i class="material-icons danger red-text text-accent-4">delete</i></a>
                                               

                                                <form id="delete-form-{{ $bid }}" action="{{ route(Helper::getGuard().'.user.destroy', $bid) }}" method="post" style="display: none;">
                                                    @method('DELETE')
                                                    @csrf
                                                </form>
                                            
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
@endsection