@extends('layout.panel')
@section('title', 'Manage Route')
@section('breadcrumb-title', 'Manage Route')
@section('breadcrumb-backpage', 'Manage Route')
@section('breadcrumb-currentpage', 'Manage Route')
@section('content-area')

<div class="section">
    <div class="card">
        <div class="card-content">
            <div class="live-preview">
                <form
                    action="{{ isset($route) ? route(Session::get('guard').'.route.update', $route->id) : route(Session::get('guard').'.route.store') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (isset($route))
                    @method('patch')
                    @endif
                    <div class="row gy-4">
                        <div class="col-xxl-3 col-md-6">
                            <div class="col s4">
                                <select class="select2 browser-default" id="property_id" name="property">
                                    <option value="">--Select Property--</option>
                                    @foreach ($property as $prop)
                                    <option value="{{ $prop->id }}" >
                                        {{ $prop->name   }}</option>
                                    @endforeach
                                </select>
                                <span class="active" for="property_id">{{__('route.property')}}</span>
                            </div>
                            <div class="col s4">
                                <select class="select2 browser-default" id="checkpoint_id" name="checkpoint">
                                <option value="">--Select Checkpoint--</option>   
                              
                                   </select>
                                <span class="active" for="checkpoint_id">{{__('route.checkpoint')}}</span>
                            </div>
                            <div class="input-group col s4">
                                <input type="number" class="form-control" id="time" name="time"
                                    value="{{ isset($route) ? $route->complition_time : old('complition_time') }}"
                                    placeholder="Complition Time">
                                <label class="active" for="time">{{__('route.time')}}</label>
                            </div>
                            <!--end col-->
                        </div>
                        <div class="row col s12 mt-2">
                            <div class="input-group col s4">
                                <button class="btn btn-primary" id="btn-btn"
                                    type="submit">{{ isset($route) ? 'Update' : 'Submit' }}</button>
                            </div>
                        </div>
                    </div>

                    <!--end col-->
            </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>

 {{--<div class="card">
    <div class="card-content">
        <h4 class="card-title mb-0 flex-grow-1" id="h1">{{__('route.manage')}}</h4>
<table class="table table-nowrap container" id="example">
    <thead>
        <tr>
            <th scope="col">{{__('route.sr_no')}}</th>
            <th scope="col">{{__('route.property')}}</th>
            <th scope="col">{{__('route.checkpoint')}}</th>
            <th scope="col">{{__('route.time')}}</th>
            <th scope="col">{{__('route.is_active')}}</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($routes as $data)
        <tr>
            <th scope="row">{{ $loop->index + 1 }}</th>
            <td>{{ $data->property->name??'' }}</td>
            <td>{{ $data->checkpoint->name??'' }}</td>
            <td>{{ $data->time??'' }}</td>
            <td>
                <div class="switch">
                    <label>
                        <input type="checkbox" value="{{$data->id}}"
                            data-url="{{route('customer.task.active-task',$data->id) }}" class="is_active"
                            id="is_active" {{ $data->is_active==0?'':'checked'   }}>
                        <span class="lever"></span>
                    </label>
                </div>
            </td>
            <td>
                <div class="dropdown">
                    <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="ri-more-2-fill"></i>
                    </a>
                    @php $bid=Crypt::encrypt($data->id); @endphp
                    <ul class="dropdown-menu " aria-labelledby="dropdownMenuLink">
                        <li><a id="pop" class="dropdown-item" href="{{route(Helper::getGuard().'.route.edit',$bid)}}">
                                <i class="material-icons light-blue-text text-darken-4">edit</i>
                            </a></li>
                        <li><a id="pop" class="dropdown-item" href="#"
                                onclick="event.preventDefault();document.getElementById('delete-form-{{ $bid }}').submit();">
                                <i class="material-icons danger red-text text-accent-4">delete</i>
                            </a>
                        </li>
                        <form id="delete-form-{{ $bid }}" action="{{ route(Helper::getGuard().'.route.destroy', $bid) }}"
                            method="post" style="display: none;">
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
</div>--}}
@endsection
@section('script-area')

@endsection