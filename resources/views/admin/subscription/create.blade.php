@extends('layout.panel')
@section('title', 'Subcription')
@section('breadcrumb-title', 'Subscription')
@section('breadcrumb-backpage', 'Subscription')
@section('breadcrumb-currentpage', 'Subscription')
@section('content-area')

<div class="section">
    <div class="card">
        <div class="card-content">
            <div class="live-preview">
                <form
                    action="{{ isset($EditSubscription) ? route(Session::get('guard').'.subscription.update', $EditSubscription->id) : route(Session::get('guard').'.subscription.store') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (isset($EditSubscription))
                    @method('patch')
                    @endif
                  
                    <div class="row gy-4">
                        <div class="col-xxl-3 col-md-6">
                            <div class="input-group col s4">
                                <input type="text" class="form-control" id="title" name="title"
                                    value="{{ isset($EditSubscription) ? $EditSubscription->title : '' }}"
                                    placeholder="Title">
                                <label class="active" for="title">{{__('subscription.title')}}</label>

                            </div>
                            <div class="input-group col s4">
                                <select id="currency" name="currency">
                                @if(!isset($EditSubscription))
                                <option value="" disabled selected>{{__('subscription.currency')}}</option>
                                   @endif
                                    @foreach($currency as $c)
                                    <option value="{{$c->id}}" @isset($EditSubscription)@selected($EditSubscription->currency==$c->id) @endisset>{{$c->code??''}} ({{$c->symbol??''}})</option>
                                     @endforeach
                                </select>
                            </div>
                            <div class="input-group col s4">
                                <input type="text" class="form-control" id="price" name="price"
                                    value="{{ isset($EditSubscription) ? $EditSubscription->price : '' }}"
                                    placeholder="Price">
                                <label class="active" for="price">{{__('subscription.price')}}</label>

                            </div>
                            <div class="input-group col s4" id="days">
                                <input type="number" class="form-control" id="days" name="days"
                                    value="{{ isset($EditSubscription) ? $EditSubscription->days : '' }}"
                                    placeholder="Validity">
                                <!-- <label class="active" for="days">{{__('subscription.validity')}}</label> -->
                            </div>
                            <div class="input-group col s4">
                                <select id="status" name="status">
                                    @if(!isset($EditSubscription))
                                <option value="" disabled selected>{{__('subscription.status')}}</option>
                                   @endif
                                    @foreach($status as $s)
                                    <option value="{{$s->id}}" @isset($EditSubscription)@selected($EditSubscription->status_id==$s->id) @endisset>{{$s->name??''}}</option>
                                     @endforeach
                                </select>
                            </div>
                            <div class="input-group col s4">
                                <select id="free_trails">
                              
                                    <option value="" disabled selected>{{isset($EditSubscription)?$EditSubscription->free_trial_days>0?'Yes':'No':__('subscription.free_trails')}}</option>
                                    <option value="1">{{__('subscription.yes')}}</option>
                                    <option value="0">{{__('subscription.no')}}</option>
                                </select>
                            </div>
                            
                            <div class="input-group col s4" id="free_trails_days">
                                <input type="number" class="form-control" id="free_trial_days" name="free_trial_days"
                                    value="{{ isset($EditSubscription) ? $EditSubscription->free_trial_days : '' }}"
                                    placeholder="Free Trial Days">
                                <label class="active" for="free_trial_days">{{__('subscription.free_trial_days')}}</label>
                            </div>
                            <div class="input-group col s4">
                                <select class="form-select" id="thumbnail" name="thumbnail">
                                    <option selected disabled>{{__('subscription.thumbnail')}}</option>
                                    <option value="icon">{{__('subscription.icon')}}</option>
                                    <option value="img">{{__('subscription.img')}}</option>
                                </select>
                            </div>
                            <div class="file-field input-field col s4" id="icon">
                                <div class="btn">
                                    <span>Icon</span>
                                    <input type="file" name="icon">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                            </div>
                            <div class="file-field input-field col s4" id="images">
                                <div class="btn">
                                    <span>File</span>
                                    <input type="file" name="image">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                            </div>
                            <div class="input-group col s4">
                                <input type="text" class="form-control" id="color" name="color"
                                    value="{{ isset($EditSubscription) ? $EditSubscription->color : '' }}"
                                    placeholder="Color">
                                <label class="active" for="color">{{__('subscription.color')}}</label>

                            </div>
                            <div class="input-group col s4">
                                <input type="text" class="form-control" id="bg-color" name="bg_color"
                                    value="{{ isset($EditSubscription) ? $EditSubscription->bg_color : '' }}"
                                    placeholder="Background Color">
                                <label class="active" for="bg_color">{{__('subscription.bg_color')}}</label>

                            </div>
                            <div class="row">
                                <div class="input-group col s12">
                                    <textarea name="desc" id="" cols="30" rows="20"
                                        placeholder="Write Something here!">{{ isset($EditSubscription) ? $EditSubscription->desc : '' }}</textarea>
                                </div>
                                <!-- Switch -->
                                <div class="row">
                                    <div class="switch col s2">
                                        <label>
                                            Limit
                                            <input type="checkbox" class="check" name="limit" value=""
                                                {{ isset($EditSubscription) ? $EditSubscription->limit==0?'':'checked':''}}>
                                            <span class="lever"></span>
                                        </label>
                                    </div>
                                    <div class="switch col s2">
                                        <label>
                                            Life Time
                                            <input type="checkbox" class="check" name="lifetime" value=""
                                                {{isset($EditSubscription) ? $EditSubscription->life_time==0?'':'checked':'' }}>
                                            <span class="lever"></span>
                                        </label>
                                    </div>

                                </div>

                            </div>
                            <div class="row col s12 mt-2">
                                <div class="input-group col s4">
                                    <button class="btn btn-primary" id="btn-btn" type="submit">{{ isset($EditSubscription) ? 'Update' : 'Submit' }}</button>
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

@endsection
@section('script-area')
<script>
$(document).ready(function() {

     @if(isset($EditSubscription) && $EditSubscription->free_trial_days!=0)
     $('#free_trails_days').show();
     @else
     $('#free_trails_days').hide();
     @endif   
    $('#free_trails').change(function() {
        $(this).find("option:selected").each(function() {
            var optionValue = $(this).attr("value");
            if (optionValue == 1) {
                $('#free_trails_days').show();
            } else {
                $('#free_trails_days').hide();
            }
        });
    }).change();
});
</script>
<!-- Image and Icon slection -->
<script>
$(document).ready(function() {
    $('#icon').hide();
    $('#images').hide();
    $("#thumbnail").change(function() {
        $(this).find("option:selected").each(function() {
            var optionValue = $(this).attr("value");
            if (optionValue == 'icon') {
                $('#icon').show();
                $('#images').hide();
            } else if (optionValue == 'img') {
                $('#icon').hide();
                $('#images').show();
            }
        });
    }).change();
});
</script>
<script>
$('.check').on('change', function() {
    this.value = this.checked ? 1 : 0;
    // alert(this.value);
}).change();
</script>
@endsection