@extends('layout.panel')
@section('title', 'Leave')
@section('breadcrumb')
<div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
    <!-- Search for small screen-->
    <div class="container">
        <div class="row">
            <div class="col s10 m6 l6">
                <h5 class="breadcrumbs-title mt-0 mb-0"><span>Leave</span></h5>
                <ol class="breadcrumbs mb-0">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Leave</a>
                    </li>
                    <li class="breadcrumb-item active">Add Leave
                    </li>
                </ol>
            </div>  
            <div class="col s2 m6 l6 mb-2">
            <a class="btn  waves-effect waves-light breadcrumbs-btn right modal-trigger modal1"
            data-url="{{route(Helper::getGuard() . '.leave.index') }}"><span class="hide-on-small-onl">Apply Leave</span></a> 
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
                <form
                    action="{{ isset($leave) ? route(Session::get('guard').'.leave.update', $leave->id) : route(Session::get('guard').'.leave.store') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (isset($leave))
                    @method('patch')
                    @endif
                    <div class="row gy-4">
                        <div class="col-xxl-3 col-md-6">
                            <div class="input-field col s4">
                                <input type="text" class="form-control" id="subject" name="subject"
                                    value="{{ isset($leave) ? $leave->subject : old('subject') }}"
                                   >
                                <label class="active" for="subject">{{__('leave.subject')}}</label>

                            </div>
                            
                              <div class="input-field col s4">
                                <label class="active" for="leave_date">{{__('leave.leave_start')}}</label>
                                <input type="text" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'" class="form-control" id="leave_date" name="leave_start" value="{{ isset($leave) ? $leave->leave_start : '' }}">
                            </div>
                            <div class="input-field col s4">
                                <label class="active" for="leave_date">{{__('leave.leave_end')}}</label>
                                <input type="text" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'" class="form-control" id="leave_end" name="leave_end" value="{{ isset($leave) ? $leave->leave_end : '' }}">
                            </div>    
                            <div class="input-field col s12">
                                <textarea type="text" class="form-control" id="desc" name="desc">{{ isset($leave) ? $leave->desc : old('desc') }}</textarea>
                                <label style="margin-left:12px;" class="active" for="desc">{{__('leave.desc')}}</label>
                            </div>                
                                </div>
                            <div class="row col s12 mt-2">
                                <div class="input-field col s4">
                                    <button class="btn btn-primary" id="btn-btn" type="submit">{{ isset($leave) ? 'Update' : 'Submit' }}</button>
                                </div>
                            </div>
                        </div>

                        <!--end col-->
                    </div>
                </form>
            </div>
        </div>
    </div>
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
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($leaves->leaves as $data)
                                <tr>
                                    <th>{{ $loop->index + 1 }}</th>
                                    <td>{{ $data->leaveable->name??'' }}</td>
                                    <td>{{ $data->leaveable->email??'' }}</td>
                                    <td>{{ $data->subject??''}}</td>
                                    <td>{{ $data->desc??'' }}</td>
                                    <td>
                                    {{ $data->status_info->name}}
                                    </td>
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

<div id="modal1" class="modal modal-fixed-footer"></div>
@endsection
@section('script-area')
<script>
        $(document).ready(function() {
            $(document).on('click', '.modal1', function() {
                $.ajax({
                    url: $(this).data('url'),
                    method: 'get',
                    success: function(data) {

                        $('#modal1').html(data);
                        $('#modal1').modal();
                        $('#modal1').modal('open');

                    }
                });
            });
        });
    </script>
@endsection