@extends('layout.panel')
@section('title', 'Leave Management')
@section('breadcrumb')
<div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
    <!-- Search for small screen-->
    <div class="container">
        <div class="row">
            <div class="col s10 m6 l6">
                <h5 class="breadcrumbs-title mt-0 mb-0"><span>Leave Management</span></h5>
                <ol class="breadcrumbs mb-0">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Leave</a>
                    </li>
                    <li class="breadcrumb-item active">Leave Management
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
                <h4 class="card-title">{{ __('leave.staff_leave_request') }}
                </h4>
                <div class="row">
                    <div class="col s12">
                        <table id="page-length-option" class="display nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>{{ __('leave.sr_no') }}</th>
                                    <th>{{ __('leave.name') }}</th>
                                    <th>{{ __('leave.email') }}</th>
                                    <th>{{ __('leave.subject') }}</th>
                                    <th>{{ __('leave.desc') }}</th>
                                    <th>{{__('leave.status')}}</th>
                                    <th>{{__('leave.created_at')}}</th>
                                    <th>{{__('leave.created_on')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($leaves as $data)
                                <tr>
                                    <th>{{ $loop->index + 1 }}</th>
                                    <td>{{ $data->leaveable->name??'' }}</td>
                                    <td>{{ $data->leaveable->email??'' }}</td>
                                    <td>{{ $data->subject??''}}</td>
                                    <td>{{ $data->desc??'' }}</td>
                                    <td>
                                    <div class="input-group">
                                            <select class="browser-default status" id="" data="{{ $data->id }}" name="status">
                                                @foreach ($status as $st)
                                                <option value="{{ $st->id }}" {{ $data->status }} @selected($data->status == $st->id)>{{ $st->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </td>
                                    <td>{{ $data->created_at->format('d-M-Y') }}</td>
                                     <td>{{ $data->created_at->format('H:i:s a') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
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
<script>
    $(document).ready(function() {
        $(document).on('change', '.status', function() {
            var leave_id = $(this).attr("data");
            $(this).find("option:selected").each(function() {
                var status_id = $(this).val();
                var newurl = "{{ route('customer.leave.status') }}";
                $.ajax({
                    url: newurl,
                    method: 'post',
                    data: {
                        '_token': "{{ csrf_token() }}",
                        'leave_id': leave_id,
                        'status_id': status_id
                    },
                    success: function(p) {

                    }
                });
            });
        }).change();
    });
</script>
@endsectionō