<div class="modal-content">
    <h4>
    {{ isset($duty) ? __('duty.update_duty') : __('duty.assign_duty') }}
    </h4>
    <div class="live-preview">
    <form action="{{ isset($duty) ? route(Session::get('guard').'.guard-duty.update', $duty->id) : route(Session::get('guard').'.guard-duty.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row gy-4">
                <div class="col-xxl-3 col-md-6">    
                <div class="input-field col s12">
                        <select class="select2 browser-default" id="guard" name="guard">
                            <option value="">--Select Guard--</option>
                            @foreach ($guards as $G)
                            <option value="{{$G->id}}" @isset($duty) @selected($duty->guard_id==$G->id) @else @selected(old('guard_id')==$G->id) @endisset>{{$G->name}}</option>
                            @endforeach
                        </select>
                        <span class="active" for="state">{{__('duty.guard')}}</span>
                    </div>              
                    <div class="input-field col s12">
                        <select class="select2 browser-default property_route_shift" id="property_route" name="property">
                            <option selected disabled>--Select Property--</option>
                            @foreach ($properties as $property)
                            <option value="{{ $property->id }}" @isset($duty) @selected($duty->property_id==$property->id) @else @selected(old('property_id')==$property->id) @endisset>{{ $property->name }}</option>
                            @endforeach
                        </select>
                        <span class="active" for="country">{{__('duty.property')}}</span>
                    </div>
                    <div class="input-field col s12">
                        <select class="select2 browser-default" id="route" name="route">
                            <option value="">--Select Route--</option>
                            @foreach (Helper::getRouteByProperty($duty->property_id??old('property_id')) as $R)
                            <option value="{{$R->id}}" @isset($duty) @selected($duty->route_id==$R->id) @else @selected(old('route_id')==$R->id) @endisset>{{$R->name}}</option>
                            @endforeach
                        </select>
                        <span class="active" for="state">{{__('duty.route')}}</span>
                    </div>
                    <div class="input-field col s12">
                        <select class="select2 browser-default" id="shift" name="shift">
                            <option value="">--Select Shift--</option>
                            @foreach (Helper::getShiftByProperty($duty->shift_id??old('shift_id')) as $s)
                            <option value="{{$s->id}}" @isset($duty) @selected($duty->shift_id==$s->id) @else @selected(old('shift_id')==$s->id) @endisset>{{$s->name}}</option>
                            @endforeach
                        </select>
                        <span class="active" for="shift">{{__('duty.shift')}}</span>
                    </div>                   
                    <!--end col-->
                </div>
                <div class="row col s12 mt-2">
                    <div class="input-field col s4">
                        <button class="btn btn-primary" id="btn-btn" type="submit">{{ isset($duty) ? __('duty.update') : __('duty.submit') }}</button>
                    </div>
                </div>
            </div>
            <!--end col-->
    </div>
    </form>
</div>