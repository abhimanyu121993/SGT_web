@extends('layout.panel')
@section('title', 'Checkpoint')
@section('breadcrumb-title', 'Checkpoint')
@section('breadcrumb-backpage', 'Checkpoint')
@section('breadcrumb-currentpage', 'Manage Checkpoint')
@section('link-area')
@endsection
@section('content-area')

  <div class="card">
  <div class="card-content">
        <form action="{{ isset($checkpoint) ? route(Session::get('guard').'.checkpoint.update', $checkpoint->id) : route(Session::get('guard').'.checkpoint.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if (isset($checkpoint))
            @method('patch')
            @endif
           <div class="row">
            <div class="col s12 m6 l8">
            <div class="row gy-4">
                <div class="col-xxl-3 col-md-6">
                    <div class="input-group col s12">
                        <input type="text" class="form-control property_id" id="property_id" name="property_id" value="{{ isset($checkpoint) ? $checkpoint->property_id : $property->id }}" hidden>
                        <input type="text" class="form-control" id="name" name="name" value="{{ isset($checkpoint) ? $checkpoint->name : old('name') }}" placeholder="Name">
                        <label class="active" for="name">{{__('checkpoint.name')}}</label>
                    </div>
                    <div class="input-group col s12">
                        <input type="text" class="form-control" id="color" name="color" value="{{ isset($checkpoint) ? $checkpoint->color : old('color') }}" placeholder="Color">
                        <label class="active" for="color">{{__('checkpoint.color')}}</label>
                    </div>
                    <div class="input-group col s12">
                        <input type="text" class="form-control" id="lattitude" name="lattitude" value="{{ isset($checkpoint) ? $checkpoint->lattitude : (old('lattitude')??$property->lattitude) }}" placeholder="Lattitude">
                        <label class="active" for="lattitude">{{__('checkpoint.lattitude')}}</label>
                    </div>
                    <div class="input-group col s12">
                        <input type="text" class="form-control" id="longitude" name="longitude" value="{{ isset($checkpoint) ? $checkpoint->longitude : (old('longitude')??$property->longitude) }}" placeholder="Longitude">
                        <label class="active" for="longitude">{{__('checkpoint.longitude')}}</label>
                    </div>
                 

                    <div class="file-field input-field col s12" id="image">
                        <div class="btn">
                            <span>{{__('checkpoint.file')}}</span>
                            <input type="file" name="images">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                    </div>
                    <div class="input-group col s12">
                        <textarea type="text" class="form-control" id="desc" name="description" placeholder="Start Writting Here....">{{ isset($checkpoint) ? $checkpoint->desc : old('desc') }}</textarea>
                        <label class="active" for="desc">{{__('checkpoint.desc')}}</label>
                    </div>
                    <!--end col-->
                </div>
                <div class="row col s12 mt-2">
                    <div class="input-group col s2">
                        <button class="btn btn-primary" id="btn-btn" type="submit">{{ isset($checkpoint) ? 'Update' : 'Submit' }}</button>
                    </div>
                </div>
                <div class="section">
               <div id="address-map-container" style="width:100%;height:400px; ">
                <div style="width: 100%; height: 100%" id="address-map"></div>
                </div>
</div>
            </div>
            </div>
            <div class="col s12 m6 l4"> 
                <div class="right mr-5">
                <h6>Assign checkpoints Task</h6>
            @foreach ($tasks as $task)
                            <label>
                              <input type="checkbox" value="{{ $task->id }}" name='task_id[]'
                              />
                             <span>{{$task->name}}</span>
                              </label><br>
                    @endforeach
                    </div>
                    <div class="row col s12 mt-3">
                    <div class="col s3 m6 l8"><a class="  waves-effect waves-light  right modal-trigger modal1" data-url="{{route(Helper::getGuard().'.task.index')}}"><span>Add More Task?</span></a> 
            </div>
                </div>
            </div>
           </div>

            <!--end col-->
        </form>

        <div id="address-map-container mt-3" style="width:100%;height:400px; ">
            <div style="width: 100%; height: 100%" id="address-map"></div>
        </div>
</div>
  </div>
  <div id="modal1"  class="modal modal-fixed-footer">
   </div>
@endsection
@section('script-area')
<script>
    $(document).ready(function(){
    $(document).on('click','.modal1',function(){
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
   
<script src="{{asset('app-assets/js/mapInput.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize" async defer></script>


@endsection