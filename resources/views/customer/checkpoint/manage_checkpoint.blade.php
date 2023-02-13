@extends('layout.panel')
@section('title', 'Manage Checkpoint')
@section('breadcrumb-title', 'Manage Checkpoint')
@section('breadcrumb-backpage', 'Manage Checkpoint')
@section('breadcrumb-currentpage', 'Manage Checkpoint')

@section('content-area')

<div class="card">
        <div class="card-content">
                <form
                    action="{{ isset($checkpoint) ? route(Session::get('guard').'.checkpoint.update', $checkpoint->id) : route(Session::get('guard').'.checkpoint.store') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (isset($checkpoint))
                    @method('patch')
                    @endif
                   
                    <div class="row gy-4">
                        <div class="col-xxl-3 col-md-6">
                            <div class="input-group col s4">
                            <input type="text" class="form-control property_id" id="property_id" name="property_id"
                                    value="{{ isset($checkpoint) ? $checkpoint->property_id : $property_id }}" hidden>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ isset($checkpoint) ? $checkpoint->name : old('name') }}"
                                    placeholder="Name">
                                <label class="active" for="name">{{__('checkpoint.name')}}</label>
                            </div>
                            <div class="input-group col s4">
                                <input type="text" class="form-control" id="color" name="color"
                                    value="{{ isset($checkpoint) ? $checkpoint->color : old('color') }}"
                                    placeholder="Color">
                                <label class="active" for="color">{{__('checkpoint.color')}}</label>
                            </div>
                            <div class="input-group col s4">
                                <input type="text" class="form-control" id="lattitude" name="lattitude"
                                    value="{{ isset($checkpoint) ? $checkpoint->lattitude : old('lattitude') }}"
                                    placeholder="Lattitude">
                                <label class="active" for="lattitude">{{__('checkpoint.lattitude')}}</label>
                            </div>
                            <div class="input-group col s4">
                                <input type="text" class="form-control" id="longitude" name="longitude"
                                    value="{{ isset($checkpoint) ? $checkpoint->longitude : old('longitude') }}"
                                    placeholder="Longitude">
                                <label class="active" for="longitude">{{__('checkpoint.longitude')}}</label>
                            </div>
                            <div class="col s4">
                                   <select class="select2 browser-default"  id="task_id" name="task_id[]" multiple="multiple">
                                        <option value="">--Select Task--</option>
                                        @foreach ($tasks as $task)
                                            <option value="{{ $task->id }}" {{isset($checkpoint)?in_array($task->id,$checkpoint->checkpointhastask->pluck('task_id')->toArray())?'selected':'':''}}> {{ $task->name   }}</option>
                                            @endforeach
                                   </select>
                                <span class="active" for="task_id">{{__('checkpoint.task')}}</span> 
                                </div>
                            
                                <div class="file-field input-field col s4" id="image">
                                <div class="btn">
                                    <span>{{__('checkpoint.file')}}</span>
                                    <input type="file" name="images">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                            </div>
                            <div class="input-group col s12">
                                <textarea type="text" class="form-control" id="desc" name="description"
                                    placeholder="Start Writting Here....">{{ isset($checkpoint) ? $checkpoint->desc : old('desc') }}</textarea>
                                <label class="active" for="desc">{{__('checkpoint.desc')}}</label>
                            </div>
                            <!--end col-->
                                </div>
                            <div class="row col s12 mt-2">
                                <div class="input-group col s2">
                                    <button class="btn btn-primary" id="btn-btn" type="submit">{{ isset($checkpoint) ? 'Update' : 'Submit' }}</button>
                                </div>
                            </div>
                        </div>

                        <!--end col-->
                    </div>
                </form>
        </div>
        </div>

</div>

   <div class="container">
   <div class="modal-content">
        <h5>{{__('checkpoint.manage')}}</h5>
                <div class="card border-radius-6">
        <div class="card-content">

        <table class="table table-nowrap container" id="example">
            <thead>
                <tr>
                    <th scope="col">{{__('checkpoint.sr_no')}}</th>
                    <th scope="col">{{__('checkpoint.name')}}</th>
                    <th scope="col">{{__('checkpoint.file')}}</th>
                    <th scope="col">{{__('checkpoint.color')}}</th>
                    <th scope="col">{{__('checkpoint.desc')}}</th>
                    <th scope="col">{{__('checkpoint.is_active')}}</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($checkpoints as $data)
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td>{{ $data->name??'' }}</td>
                    <td> <img src="{{ asset($data->file) }}" height="50px"alt="" class="square" /></td>
                    <td>{{ $data->color??'' }}</td>
                    <td>{{ $data->desc??'' }}</td>
                    <td>
                    <div class="input-group">
                                    <select class="browser-default status" id="" data="{{ $data->id }}"
                                        name="status">
                                        @foreach ($status as $st)
                                            <option value="{{ $st->id }}" {{ $data->status_id }}
                                                @selected($data->status_id == $st->id)>{{ $st->name }}</option>
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
                                <li><a id="pop" class="dropdown-item checkpoint" href="{{route(Session::get('guard').'.checkpoint.edit',$bid)}}" >
                                        <i class="material-icons light-blue-text text-darken-4">edit</i>
                                    </a></li>
                                <li><a id="pop" class="dropdown-item" href="#"
                                        onclick="event.preventDefault();document.getElementById('delete-form-{{ $bid }}').submit();">
                                        <i class="material-icons danger red-text text-accent-4">delete</i>
                                    </a>
                                </li>
                                <form id="delete-form-{{ $bid }}"
                                    action="{{ route(Helper::getGuard().'.checkpoint.destroy', $bid) }}" method="post"
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
    </div>
   </div>
@endsection
