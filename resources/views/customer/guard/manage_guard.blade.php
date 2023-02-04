@extends('layout.panel')
@section('title', 'Manage Security Guard')
@section('breadcrumb-title', 'Manage Security Guard')
@section('breadcrumb-backpage', 'Manage Security Guard')
@section('breadcrumb-currentpage', 'Manage Security Guard')
@section('link-area')

    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/dashboard.css">
@endsection
@section('content-area')

<div class="card">
    <div class="card-content">
        <h4 class="card-title mb-0 flex-grow-1" id="h1">{{__('security_guard.manage_guard')}}</h4>
        <table class="table table-nowrap container" id="example">
            <thead>
                <tr>
                    <th scope="col">{{__('security_guard.sr_no')}}</th>
                    <th scope="col"></th>
                    <th scope="col">{{__('security_guard.name')}}</th>
                    <th scope="col">{{__('security_guard.gender')}}</th>
                    <th scope="col">{{__('security_guard.phone')}}</th>
                    <th scope="col">{{__('security_guard.email')}}</th>
                    <th scope="col">{{__('security_guard.country')}}</th>
                    <th scope="col">{{__('security_guard.state')}}</th>
                    <th scope="col">{{__('security_guard.city')}}</th>
                    <th scope="col">status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($guards as $data)
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td> <img src="{{ asset($data->images) }}" height="50px"alt="" class="circle" /></td>
                    <td>{{ $data->name??'' }}</td>
                    <td>{{ $data->gender??'' }}</td>
                    <td>{{ $data->phone??'' }}</td>
                    <td>{{ $data->email??''}}</td>
                    <td>{{$data->country->name??''}}</td>
                    <td>{{$data->state->name??''}}</td>
                    <td>{{$data->city->name??''}}</td>

                            <td>
                                <div class="input-group">
                                    <select class="browser-default status" id="" data="{{ $data->id }}"
                                        name="status">
                                        @foreach ($status as $st)
                                            <option value="{{ $st->id }}" {{ $data->status }}
                                                @selected($data->status == $st->id)>{{ $st->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                    </td>
                    <td>
                        <div class="dropdown" >
                            <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="ri-more-2-fill"></i>
                            </a>
                            @php $bid=Crypt::encrypt($data->id); @endphp
                            <ul class="dropdown-menu " aria-labelledby="dropdownMenuLink">
                                <li><a id="pop" class="dropdown-item"
                                        href="{{route(Helper::getGuard().'.secuirty-guard.edit',$bid)}}">
                                        <i class="material-icons light-blue-text text-darken-4">edit</i>
                                    </a></li>
                                <li><a id="pop" class="dropdown-item" href="#"
                                        onclick="event.preventDefault();document.getElementById('delete-form-{{ $bid }}').submit();">
                                        <i class="material-icons danger red-text text-accent-4">delete</i>
                                    </a>
                                </li0>
                                <form id="delete-form-{{ $bid }}"
                                    action="{{ route(Helper::getGuard().'.secuirty-guard.destroy', $bid) }}" method="post"
                                    style="display: none;">
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
    <div class="row">
        @foreach ($guards as $data)
        <div class="col s4">
        <div id="profile-card" class="card animate fadeRight">
            <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" src="../../../app-assets/images/gallery/3.png" alt="user bg" />
            </div>
            <div class="card-content">
                <img src="{{asset($data->images??'app-assets/images/sgt/male.webp')}}" alt="profile" onerror="this.onerror=null; this.src='{{asset('app-assets/images/sgt/male.webp')}}'"
                    class="circle responsive-img activator card-profile-image cyan lighten-1 padding-2" />
                <a class="btn-floating activator btn-move-up waves-effect waves-light red accent-2 z-depth-4 right">
                    <i class="material-icons">edit</i>
                </a>
                <h5 class="card-title activator grey-text text-darken-4">{{ ucfirst($data->name?? '') }}</h5>
                <p><i class="material-icons profile-card-i">location_city
                </i>Proprty <span class="badge" style="background-color: {{$data->statusDetail->bg_color}}">{{ucfirst($data->statusDetail->name)}}</span></p>
                <p><i class="material-icons profile-card-i">perm_phone_msg</i>+(91) {{$data->phone}}</p>
                <p><i class="material-icons profile-card-i">email</i>{{$data->email}}</p>
            </div>
            <div class="card-reveal">
                <span class="card-title grey-text text-darken-4">Roger Waters <i class="material-icons right">close</i>
                </span>
                <p>Here is some more information about this card.</p>
                <p><i class="material-icons">perm_identity</i> Project Manager</p>
                <p><i class="material-icons">perm_phone_msg</i> +1 (612) 222 8989</p>
                <p><i class="material-icons">email</i> yourmail@domain.com</p>
                <p><i class="material-icons">cake</i> 18th June 1990</p>
                <p><i class="material-icons">cake</i> 18th June 1990</p>
                <p><i class="material-icons">cake</i> 18th June 1990</p>
                <p><i class="material-icons">cake</i> 18th June 1990</p>
                <p></p>
                <p><i class="material-icons">airplanemode_active</i> BAR - AUS</p>
                <p></p>
            </div>
        </div>
    </div>
    @endforeach
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
@endsection
