<div class="modal-content">
    <div class="card-content">
        <h4>{{__('leave.leave') }}</h4>
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
                            <div class="input-field col s12">
                                <input type="text" class="form-control" id="subject" name="subject"
                                    value="{{ isset($leave) ? $leave->subject : old('subject') }}"
                                   >
                                <label class="active" for="subject">{{__('leave.subject')}}</label>

                            </div>
                            
                                 
                            <div class="input-field col s12">
                                <textarea type="text" class="form-control" id="desc" name="desc">{{ isset($leave) ? $leave->desc : old('desc') }}</textarea>
                                <label class="active" for="desc">{{__('leave.desc')}}</label>
                            </div>   
                            <div class="input-field col s6">
                                <label class="active" for="leave_date">{{__('leave.leave_start')}}</label>
                                <input type="text" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'" class="form-control" id="leave_date" name="leave_start" value="{{ isset($leave) ? $leave->leave_start : '' }}">
                            </div>
                            <div class="input-field col s6">
                                <label class="active" for="leave_date">{{__('leave.leave_end')}}</label>
                                <input type="text" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'" class="form-control" id="leave_end" name="leave_end" value="{{ isset($leave) ? $leave->leave_end : '' }}">
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
   