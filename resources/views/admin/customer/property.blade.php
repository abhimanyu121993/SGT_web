@extends('layout.panel')
@section('title', 'Property')
@section('breadcrumb')
<div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
    <!-- Search for small screen-->
        <div class="container">
          <div class="row">
            <div class="col s10 m6 l6">
              <h5 class="breadcrumbs-title mt-0 mb-0"><span>GreyLock Security Properties</span></h5>
            <br><br>
            </div>
            <div class="col s2 m6 l6 mb-2">
            <a class="btn  waves-effect waves-light breadcrumbs-btn right ccbutton"
            href="{{route(Session::get('guard') . '.property.index')}}"><span
                class="hide-on-small-onl">Add Property</span></a>    
            </div>

          </div>

        </div>
   





</div>
@endsection
@section('content-area')
<div class="card-content">
    <div  id="card-reveal" class="seaction">
        <div class="row">
            @foreach ($properties as $property)
            <div class="col s12 m6 l4">
                <div class="card excard">
                  <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="{{asset($property->file)}}" onerror="this.onerror=null;this.src='{{asset('app-assets/images/gallery/23.png')}}';" alt="sample" />
                  </div>
                  <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4">{{ $property->name ?? '' }} <i
                        class="material-icons right">more_vert</i>
                    </span>
                    <p class="truncate"><a href="#">{{$property->address}}</a></p>
                  </div>
                  <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">{{ $property->name ?? '' }}<i class="material-icons right">close</i>
                    </span>
                   <p>
                   <b>City : </b>{{$property->city_details->name??''}} <br>
                    <b>State : </b>{{$property->state_details->name??''}} <br>
                    <b>Country : </b>{{$property->country_details->name??''}}<br>
                    @php $bid=Crypt::encrypt($property->id); @endphp
                    <a id="pop" class="btn" href="{{route(Session::get('guard').'.property.edit',$bid)}}"><i class="material-icons light-warning-text text-darken-4">edit</i></a>
                    <a id="pop" class="btn" href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $bid }}').submit();"><i class="material-icons danger red-text text-accent-4">delete</i></< /a>
            <form id="delete-form-{{ $bid }}" action="{{ route(Session::get('guard').'.property.destroy', $bid) }}" method="post" style="display: none;">
                                                    @method('DELETE')
                                                    @csrf
                                                </form>
                   </p>
                  </div>
          
                    <div class="card-action"></div>          
                </div>
                
            </div>
            @endforeach
           </div>
    </div>
</div>
@endsection
@section('script-area')

<script>
$(document).ready(function() {
    $(document).on('click', '.property_route', function() {
        $.ajax({
            url: $(this).data('url'),
            method: 'get',
            success: function(data) {
                $('#modal1').html(data);
                $('#modal1').modal('open');
            }
        });
    });
});
</script>
@endsection