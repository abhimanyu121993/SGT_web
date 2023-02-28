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
                                            <div class="switch">
                                                <label>
                                                    <input type="checkbox" value="{{ $data->id}}" data-url="" class="is_verified" id="is_verified" {{ $data->status==0?'':'checked'}}>
                                                    <span class="lever"></span>
                                                </label>
                                            </div>
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

@endsection
@section('script-area')
@endsection