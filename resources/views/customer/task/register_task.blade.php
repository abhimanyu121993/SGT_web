        <div class="modal-content">
            <h6>{{ isset($task) ? 'Update Task' : 'Add Task' }}</h6>
            <div class="live-preview">
                <form action="{{ isset($task) ? route(Session::get('guard').'.task.update', $task->id) : route(Session::get('guard').'.task.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (isset($task))
                    @method('patch')
                    @endif

                    <div class="row gy-4">
                        <div class="col-xxl-3 col-md-6">
                            <div class="input-group col s6">
                                <input type="text" class="form-control" id="name" name="name" value="{{ isset($task) ? $task->name : old('name') }}" placeholder="Name">
                                <label class="active" for="name">{{__('task.name')}}</label>
                            </div>
                            <div class="file-field input-field col s6" id="image">
                                <div class="btn">
                                    <span>{{__('task.file')}}</span>
                                    <input type="file" name="images">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                            </div>
                            <div class="input-group col s12">
                                <textarea type="text" class="form-control" id="desc" name="description" placeholder="Start Writting Here....">{{ isset($task) ? $task->desc : old('desc') }}</textarea>
                                <label class="active" for="desc">{{__('task.desc')}}</label>
                            </div>
                            <!--end col-->
                        </div>
                        <div class="row col s12 mt-2">
                            <div class="input-group col s4">
                                <button class="btn btn-primary" id="btn-btn" type="submit">{{ isset($task) ? 'Update' : 'Submit' }}</button>
                            </div>
                        </div>
                    </div>

                    <!--end col-->
            </div>
            </form>
        </div>