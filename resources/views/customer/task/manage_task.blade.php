@extends('layout.panel')
@section('title', 'Manage Task')
@section('breadcrumb')
<div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
    <!-- Search for small screen-->
    <div class="container">
        <div class="row">
            <div class="col s10 m6 l6">
                <h5 class="breadcrumbs-title mt-0 mb-0"><span>Manage Task</span></h5>
            </div>
            <div class="col s2 m6 l6 mb-2"><a class="btn  waves-effect waves-light breadcrumbs-btn right modal-trigger modal1" data-url="{{route(Helper::getGuard().'.task.index')}}"><span>Add Task</span></a> </div>            
        </div>
    </div>
</div>
@endsection
@section('link-area')
<link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/dashboard.css">
@endsection
@section('content-area')


<div class="row ">
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                <h4 class="card-title">{{__('task.manage')}}
                </h4>
                <div class="row">
                    <div class="col s12">
                    <table id="page-length-option" class="display nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>{{__('task.sr_no')}}</th>
                                    <th>{{__('task.name')}}</th>
                                    <th colspan="1">{{__('task.file')}}</th>
                                    <th>{{__('task.desc')}}</th>
                                    <th>{{__('task.is_active')}}</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $data)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$data->name??''}}</td>
                                    <td><img src="{{ asset('storage/'.$data->file) }}" height="50px" alt="" class="square" /></td>
                                    <td>{{$data->desc??''}}</td>
                                    <td>
                                        <div class="switch">
                                            <label>
                                                <input type="checkbox" value="{{$data->id}}" data-url="{{route('customer.task.active-task',$data->id) }}" class="is_active" id="is_active" {{ $data->is_active==0?'':'checked'   }}>
                                                <span class="lever"></span>
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        
                                            @php $bid=Crypt::encrypt($data->id); @endphp
                                            <a  class="  waves-effect waves-light  right modal-trigger modal1" data-url="{{route(Helper::getGuard().'.task.edit',$bid)}}"><i class="material-icons light-blue-text text-darken-4">edit</i></a>
                                                <a  href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $bid }}').submit();"><i class="material-icons danger red-text text-accent-4">delete</i></a>
                                             

                                                <form id="delete-form-{{ $bid }}" action="{{ route(Helper::getGuard().'.task.destroy', $bid) }}" method="post" style="display: none;">
                                                    @method('DELETE')
                                                    @csrf
                                                </form>
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
<div id="modal1" class="modal white modal-header" style="max-width: 250px !important;">
</div>
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