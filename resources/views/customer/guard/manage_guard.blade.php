@extends('layout.panel')
@section('title', 'Guard')
@section('breadcrumb-title', 'Guard')
@section('breadcrumb-backpage', 'Guard')
@section('breadcrumb-currentpage', 'Guard')
@section('link-area')

<link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/dashboard.css">


@endsection
@section('breadcrumb-menu')
<!-- Content Area Starts -->
<div class="col s2 m6 l6"><a class="btn btn-light  waves-effect waves-light breadcrumbs-btn right modal-trigger addGuard" data-url="{{route('customer.secuirty-guard.index') }}"><span class="hide-on-small-onl">Add User</span></a>
</div>

@endsection
@section('content-area')


<div id="card-with-analytics" class="section">
    <div class="row">
        <div class="col s12 m6 l3 card-width">
            <div class="card border-radius-6">
                <div class="card-content center-align">
                    <h6><b>{{__('security_guard.total_guard')}}</b></h6>
                    <p>{{__('security_guard.locations_contracted')}}</p>
                    <h6 class="m-0"><b>21.5k</b></h6>
                </div>
            </div>
        </div>
        <div class="col s12 m6 l3 card-width">
            <div class="card border-radius-6">
                <div class="card-content center-align">
                    <h6><b>{{__('security_guard.active_guard')}}</b></h6>
                    <p>{{__('security_guard.locations_contracted')}}</p>
                    <h6 class="m-0"><b>21.5k</b></h6>
                </div>
            </div>
        </div>
        <div class="col s12 m6 l3 card-width">
            <div class="card border-radius-6">
                <div class="card-content center-align">
                    <h6><b>{{__('security_guard.inactive_guard')}}</b></h6>
                    <p>{{__('security_guard.locations_contracted')}}</p>
                    <h6 class="m-0"><b>21.5k</b></h6>
                </div>
            </div>
        </div>
        <div class="col s12 m6 l3 card-width">
            <div class="card border-radius-6">
                <div class="card-content center-align">
                    <h6><b>{{__('security_guard.guard_on_leave')}}</b></h6>
                    <p>{{__('security_guard.locations_contracted')}}</p>
                    <h6 class="m-0"><b>21.5k</b></h6>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content">
            <h4 class="card-title">{{__('security_guard.user_activity')}}</h4>
                <div class="row">
                    <div class="col s12">
                        <table id="scroll-vert-hor" class="display nowrap">
                        <thead>
                                            <tr>
                                                <th scope="col"></th>
                                                <th scope="col">{{__('security_guard.username')}}</th>
                                                <th scope="col">{{__('security_guard.country')}}</th>
                                                <th scope="col">{{__('security_guard.state')}}</th>
                                                <th scope="col">{{__('security_guard.city')}}</th>
                                                <th scope="col">{{__('security_guard.email')}}</th>
                                                <th scope="col">{{__('security_guard.total_report')}}</th>
                                                <th scope="col">{{__('security_guard.shift_completed')}}</th>
                                                <th scope="col">{{__('security_guard.shift_missed')}}</th>
                                                <th scope="col">{{__('security_guard.ip_address')}}</th>
                                                <th scope="col">{{__('security_guard.media')}}</th>
                                                <th scope="col">{{__('security_guard.role')}}</th>
                                                <th scope="col">{{__('security_guard.property')}}</th>
                                                <th scope="col">{{__('security_guard.phone')}}</th>
                                                <th scope="col">{{__('security_guard.joined')}}</th>
                                                <th scope="col">{{__('security_guard.last_login')}}</th>
                                                <th scope="col">{{__('security_guard.status')}}</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($guards as $data)
                                            <tr>
                                                <td> <img src="{{ asset($data->images) }}" height="50px" alt="" class="circle" /></td>
                                                <td>{{ $data->name??'' }}</td>
                                                <td>{{$data->country->name??''}}</td>
                                                <td>{{$data->state->name??''}}</td>
                                                <td>{{$data->city->name??''}}</td>
                                                <td><a href="{{ route(Helper::getGuard().'.secuirty-guard.show', Crypt::encrypt($data->id)) }}">{{ $data->email??''}}</a></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>{{ $data->property->name??''}}</td> 
                                                <td>{{ $data->phone??''}}</td>
                                                <td></td>
                                                <td></td>

                                                <td>
                                                    <div class="input-group">
                                                        <select class="browser-default status" id="" data="{{ $data->id }}" name="status">
                                                            @foreach ($status as $st)
                                                            <option value="{{ $st->id }}" {{ $data->status }} @selected($data->status == $st->id)>{{ $st->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="ri-more-2-fill"></i>
                                                        </a>
                                                        @php $bid=Crypt::encrypt($data->id); @endphp
                                                        <ul class="dropdown-menu " aria-labelledby="dropdownMenuLink">
                                                            <li><a id="pop" class="dropdown-item addGuard" data-url="{{route(Helper::getGuard().'.secuirty-guard.edit',$bid)}}" <i class="material-icons light-blue-text text-darken-4">edit</i>
                                                                </a></li>
                                                            <li><a id="pop" class="dropdown-item" href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $bid }}').submit();">
                                                                    <i class="material-icons danger red-text text-accent-4">delete</i>
                                                                </a>
                                                                </li0>
                                                                <form id="delete-form-{{ $bid }}" action="{{ route(Helper::getGuard().'.secuirty-guard.destroy', $bid) }}" method="post" style="display: none;">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                </form>
                                                        </ul>
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
<div id="modal1" class="modal modal-fixed-footer">

</div>

@endsection
@section('script-area')
<script>
    $(document).ready(function() {
        $(document).on('change', '.status', function() {
            var guard_id = $(this).attr("data");
            $(this).find("option:selected").each(function() {
                var status_id = $(this).val();
                var newurl = "{{ route('customer.security-guard.status') }}";
                $.ajax({
                    url: newurl,
                    method: 'post',
                    data: {
                        '_token': "{{ csrf_token() }}",
                        'guard_id': guard_id,
                        'status_id': status_id
                    },
                    success: function(p) {

                    }
                });
            });
        }).change();
    });
</script>

<script>
    $(document).ready(function() {
        $(document).on('click', '.addGuard', function() {
            $.ajax({
                url: $(this).data('url'),
                method: 'get',
                success: function(data) {
                    console.log(data);
                    $('#modal1').html(data);
                    $('#modal1').modal('open');
                }
            });
        });
    });
</script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
 
    <script src="{{asset('app-assets/vendors/data-tables/js/jquery.dataTables.min.js') }}"></script>

    <!-- END THEME  JS-->
    <!-- BEGIN PAGE LEVEL JS-->
@endsection