@extends('layout.panel')
@section('title', 'Role')
@section('breadcrumb')
<div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
    <!-- Search for small screen-->
    <div class="container">
        <div class="row">
            <div class="col s10 m6 l6">
                <h5 class="breadcrumbs-title mt-0 mb-0"><span>Role</span></h5>
                <ol class="breadcrumbs mb-0">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Role & Permission</a>
                    </li>
                    <li class="breadcrumb-item active">Role
                    </li>
                </ol>
            </div>       
        </div>
    </div>
</div>
@endsection
@section('link-area')

@endsection
@section('content-area')

<div class="section">
<div class="row">
    @foreach ($roles as $role)
    <div class="col m4 s2">
        <div class="card">
           
            <div class="card-content">
                <div class="card-title"><small>{{__('rolepermission.total')}} {{$role->users->count()}} {{__('rolepermission.users')}}</small> <div class="right">
                    <div class="card-text display-flex mt-2">
                        <a href="" class="mr-1">
                          <img src="../../../app-assets/images/avatar/avatar-10.png" class="circle1" width="38" alt="">
                        </a>
                        <a href="" class="mr-1">
                          <img src="../../../app-assets/images/avatar/avatar-11.png" class="circle1" width="38" alt="">
                        </a>
                        <a href="" class="mr-1">
                          <img src="../../../app-assets/images/avatar/avatar-12.png" class="circle1" width="38" alt="">
                        </a>
                        <a href="" class="mr-1">
                          <img src="../../../app-assets/images/avatar/avatar-13.png" class="circle1" width="38" alt="">
                        </a>
                      </div>    
                
                
                </div></div>
                <h6 class="grey-text lighten-1">{{Helper::role_name($role->name)}}</h6>
              
                    <div class="row">
                <div class="card-action pb-0 col s8">
                @php $bid=Crypt::encrypt($role->id); @endphp

                <a class="dropdown-item delete_confirm" data-form-id="delete-form-{{$bid}}" href="#"><i class="material-icons danger red-text text-accent-4">delete</i></a>
                    <form id="delete-form-{{ $bid }}" action="{{ route(Session::get('guard').'.role-permission.role.destroy', $bid) }}" method="post" style="display: none;">
                     @method('DELETE')
                     @csrf
                    </form>
                    @if (Auth::guard(Session::get('guard'))->user()->hasPermissionTo('user_create', Session::get('guard')))
                    <a href="javascript:void(0)" class="edit-role" data-url="{{route(Session::get('guard').'.role-permission.role.edit',$bid)}}"><i class="material-icons light-blue-text text-darken-3 ">edit</i></a>
                   @endif
                    @if($role->is_active==true)
                    <a class="" href="{{route(Session::get('guard').'.all-permission',$bid)}}"><i class="material-icons light-blue-text">cloud</i></a>
               @endif
                </div>
                    <div class="switch col s4 right">
                                            <label>
                                                <input type="checkbox" value="{{$role->id}}" data-url="{{route(Session::get('guard').'.role-permission.active-role',$role->id)}}" class="is_active" id="is_active" {{ $role->is_active==0?'':'checked'   }}>
                                                <span class="lever"></span>
                                            </label>
                                        </div>

                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div class="col m4 s2">
        <div class="card">
            <div class="card-content pb-0">
                <div class="row">
                    <div class="col s6 pb-0">
                        <img src="{{asset('app-assets/images/sgt/0277 1.png')}}" alt="">
                    </div>
                    <div class="col s6">
                        <div class="right mb-5"><button class="btn add-role" data-url="{{route(Helper::getGuard().'.role-permission.role.create')}}">Add Role</button></div>
                        <p><br><br><br><br></p>
                        <p class="mt-2">Add New Role if it Doesn't exist</p>
                        <br>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

</div>
</div>
    {{-- <div class="section">
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
                            <div class="col s12">
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
    </div> --}}

    <div id="modal1"  class="modal">
    
    </div>

@endsection
@section('script-area')
<script>
    $(document).on('click','.add-role',function(){
        $.ajax({
            url: $(this).data('url'),
            method: 'get',
            success: function(data) {

                $('#modal1').html(data);
                $('.modal').modal();
                $('#modal1').modal('open');

            }
        });
    });
    $(document).on('click','.edit-role',function(){
        $.ajax({
            url: $(this).data('url'),
            method: 'get',
            success: function(data) {

                $('#modal1').html(data);
                $('.modal').modal();
                $('#modal1').modal('open');

            }
        });
    });
</script>


@endsection