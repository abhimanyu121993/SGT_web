    <div class="modal-content">
        <h4>{{isset($checkpoint)?'Update Checkpoint':'Add Checkpoint'}}</h4>
        <form action="{{ isset($checkpoint) ? route(Session::get('guard').'.checkpoint.update', $checkpoint->id) : route(Session::get('guard').'.checkpoint.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if (isset($checkpoint))
            @method('patch')
            @endif

            <div class="row gy-4">
                <div class="col-xxl-3 col-md-6">
                    <div class="input-field col s4">
                        <input type="text" class="form-control property_id" id="property_id" name="property_id" value="{{ isset($checkpoint) ? $checkpoint->property_id : $property->id }}" hidden>
                        <input type="text" class="form-control" id="name" name="name" value="{{ isset($checkpoint) ? $checkpoint->name : old('name') }}">
                        <label class="active" for="name">{{__('checkpoint.name')}}</label>
                    </div>
                    <div class="input-field col s4">
                        <input type="color" class="form-control" id="color" name="color" value="{{ isset($checkpoint) ? $checkpoint->color : old('color') }}">
                        <label class="active" for="color">{{__('checkpoint.color')}}</label>
                    </div>
                    <div class="input-field col s4">
                        <input type="text" class="form-control" id="lattitude" name="lattitude" value="{{ isset($checkpoint) ? $checkpoint->lattitude : (old('lattitude')??$property->lattitude) }}">
                        <label class="active" for="lattitude">{{__('checkpoint.lattitude')}}</label>
                    </div>
                    <div class="input-field col s4">
                        <input type="text" class="form-control" id="longitude" name="longitude" value="{{ isset($checkpoint) ? $checkpoint->longitude : (old('longitude')??$property->longitude) }}">
                        <label class="active" for="longitude">{{__('checkpoint.longitude')}}</label>
                    </div>
                    <div class="col s4">
                        <select class="select2 browser-default" id="task_id" name="task_id[]" multiple="multiple">
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
                    <div class="input-field col s12">
                        <textarea type="text" class="form-control" id="desc" name="description" placeholder="Start Writting Here....">{{ isset($checkpoint) ? $checkpoint->desc : old('desc') }}</textarea>
                        <label class="active" for="desc">{{__('checkpoint.desc')}}</label>
                    </div>
                    <!--end col-->
                </div>
                <div class="row col s12 mt-2">
                    <div class="input-field col s2">
                        <button class="btn btn-primary" id="btn-btn" type="submit">{{ isset($checkpoint) ? 'Update' : 'Submit'}}</button>
                    </div>
                </div>
              
            </div>

            <!--end col-->
        </form>
        <div class="col s12 mt-2">
            <div class="checkpoint-map" id="checkpoint-map"></div>
        </div>
</div>

<script>
     
</script>
