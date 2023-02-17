@extends('layout.panel')
@section('title','Permission')
@section('breadcrumb-title','Permissions')
@section('breadcrumb-backpage','Role & Permission')
@section('breadcrumb-currentpage','Role Has Permission')
@section('content-area')

<div class="section">
    <div class="card">
        <div class="card-content">
            <div class="live-preview">
                <form action="{{ route(Session::get('guard').'.role-permission.fetch-permissions') }}" method="POST" id="fetchpermission">
                    @csrf
                    <div class="row gy-4">
                        <div class="col md6 s6">
                            <h6>{{__('rolepermission.role')}}</h6>
                                    <div class="input-field">
                                        <select class="select2-theme browser-default" id="select2-theme" name="role">
                                          @foreach ($roles as $role)
                                              <option value="{{$role->id}}">{{$role->role_name}}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                 
                                  </div>
                                  <div class="col md6 s6"><button class="btn btn-primary mt-6" id="btn-btn" type="submit">Fetch</button></div>
                                
                            </div>
                       
                        <!--end col-->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="assignpermission"></div>


@endsection
@section('script-area')
<script>
    $(document).on('submit','#fetchpermission',function(e){
      e.preventDefault(); 
      $.ajax({
        url:$('#fetchpermission').attr('action'),
        method:'post',
        data:$('#fetchpermission').serialize(),
        success:function(res){
            $('#assignpermission').html(res);
        }
      });
    });
</script>
@endsection