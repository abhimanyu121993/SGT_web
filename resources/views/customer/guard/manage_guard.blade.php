@extends('layout.panel')
@section('title', 'Manage Security Guard')
@section('breadcrumb-title', 'Manage Security Guard')
@section('breadcrumb-backpage', 'Manage Security Guard')
@section('breadcrumb-currentpage', 'Manage Security Guard')
@section('content-area')

<div class="card">
    <div class="card-content">
        <h4 class="card-title mb-0 flex-grow-1" id="h1">Manage Security Guard</h4>
        <table class="table table-nowrap container" id="example">
            <thead>
                <tr>
                    <th scope="col">{{__('security_guard.sr_no')}}</th>
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
                    <td>{{ $data->name??'' }}</td>
                    <td>{{ $data->gender??'' }}</td>
                    <td>{{ $data->phone??'' }}</td>
                    <td>{{ $data->email??''}}</td>
                    <td>{{$data->country->name??''}}</td>
                    <td>{{$data->state->name??''}}</td>
                    <td>{{$data->city->name??''}}</td>

                    <td>
                    <div class="input-group">
                                   <select class="browser-default status"  id="" data="{{$data->id}}" name="status">
                                        @foreach ($status as $st)
                                            <option value="{{ $st->id }}" {{ $data->status }}  @selected($data->status==$st->id)>{{ $st->name }}</option>
                                        @endforeach
                                   </select>
                                </div>

                    </td>
                    <td>
                        <div class="dropdown">
                            <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="ri-more-2-fill"></i>
                            </a>
                            @php $bid=Crypt::encrypt($data->id); @endphp
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a id="pop" class="dropdown-item"
                                        href="{{route(Helper::getGuard().'.secuirty-guard.edit',$bid)}}">Edit</a></li>
                                <li><a id="pop" class="dropdown-item" href="#"
                                        onclick="event.preventDefault();document.getElementById('delete-form-{{ $bid }}').submit();">Delete</a>
                                </li>

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
@endsection
@section('script-area')
<script>
    $(document).ready(function() {
        $(document).on('change','.status',function() {
            var guard_id = $(this).attr("data");
            $(this).find("option:selected").each(function() {
                var status_id = $(this).val();
                var newurl = "{{ route('customer.security-guard.status') }}";
                $.ajax({
                    url: newurl,
                    method: 'post',
                    data:{
                        '_token':"{{ csrf_token() }}",
                        'guard_id':guard_id,
                        'status_id':status_id
                    },
                    success: function(p) {   

                                     }
                });
            });
        }).change();
    });
</script>
@endsection