@extends('layout.panel')
@section('title', 'Property')
@section('breadcrumb')
<div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
   <
   <div class="container">
      <div class="row">
         <div class="col s10 m6 l6">
            <h5 class="mt-0 mb-0 perportyheading" ><span>Greylock Security Properties</span></h5>
            <h5 class="perportyheading2 mt-0 mb-0"><span>New Property Details</span></h5>
            <p class="perportyheading3 mt-0 mb-0"><span>Add property details here </span></p>
         </div>
         <div class="col s2 m6 l6"><a class="btn breadcrumbs-btn right modal-trigger" href="{{route(Helper::getGuard().'.property.index')}}"><span class="hide-on-small-onl" style="color: #244B8A;">Back To Properties</span></a> 
         </div>
      </div>
   </div>
</div>
@endsection
@section('content-area')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@800&display=swap" rel="stylesheet">
<style>
   .perportyheading{
   margin-top: -15px !important;
   color: white;
   font-size: 31px;
   font-weight: 700;
   margin-bottom:10px;
   }
   .perportyheading2{
   margin-top: 16px !important;
   color: white;
   font-weight: 400;
   margin-bottom: 10px;
   font-size: 25px;
   }
   .perportyheading3{
   margin-top: 17px !important;
   color: #FFFFFF;
   margin-bottom: 10px;
   font-weight: 200;
   font-size: 14px;
   padding-bottom:10px;
   }
   .profile-pic {
   width: 76px;
   height: 78px;
   display: inline-block;
    margin-top: 31px; 
   }
   .file-upload {
   display: none;
   }
   .circle {
   border-radius: 100% !important;
   overflow: hidden;
   width: 128px;
   height: 128px;
   /* border: 2px solid rgba(255, 255, 255, 0.2); */
   position: absolute;
   top: -4px;
   }
   img {
   max-width: 100%;
   height: auto;
   }
   .p-image {
   position: absolute;
   top: 63px;
   /* right: 30px; */
   margin-left:100px;
   /* color: #666666; */
   transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
   }
   .p-image:hover {
   transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
   }
   .imagebtn{
   color: black;
   margin-top: -15px;
   margin-left: 36px; font-weight:600;
   background: white;
   /* width: 103px;
   height: 38px; */
   }
   .upload-button {
   font-size: 1.2em;
   float: right;
   margin-right: 338px;
   }
   .upload-button:hover {
   transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
   color: #999;
   }
</style>
<div class="section" style="margin-top: 50px;">
   <div class="card" style="margin-top: 5px;">
   <div class="card-content">
   <div class="live-preview">
   <form action="{{ isset($propertyEdit) ? route(Session::get('guard').'.property.update', $propertyEdit->id) : route(Session::get('guard').'.property.store') }}"
               method="POST" enctype="multipart/form-data">
               @if (isset($propertyEdit))
               @method('patch')
               @endif
               @csrf
          
               <div class="row">
              <div class="input-field col s12" style="
                  margin-top: -106px; margin-bottom:30px;" id="image">
              <div class="small-12 medium-2 large-2 columns">
                     <div class="circle">
                        <img class="profile-pic" src="{{ asset('app-assets/images/sgt/Rectangle.png')}}">
                     </div>
                     <div class="p-image" style="margin-left:50px important;">
                        <a class="btn upload-button imagebtn"  id="btn-btn" style="font-size:11px; font-weight:bold; padding-left: 6px; height:40px; margin-top: -4px; ">&nbsp; &nbsp; &nbsp; ADD &nbsp;IMAGE</a>
                        <input class="file-upload" name="images" type="file" style="display:none;" accept="image/*"/>
                     </div>
                  </div>
              </div>
            </div>
            <h4 class="card-title"> &nbsp; &nbsp;Property Information</h4>
            <div class="row">
              <div class="input-field col m6 s12">
              <label for="property_name" class="">Property name</label>
              <input type="text" class="form-control" id="property_name" name="name"
                        value="{{ isset($propertyEdit) ? $propertyEdit->name : old('name') }}"  >
              </div>
              <div class="input-field col m6 s12">
                     <select class="select2 browser-default"  id="country" name="country">
                           <option selected disabled>--Select Country--</option>
                           @foreach ($countries as $country)
                           <option value="{{ $country->id }}" @isset($propertyEdit) @selected($propertyEdit->country==$country->id) @else @selected(old('country')==$country->id) @endisset>{{ $country->name }}</option>
                           @endforeach
                        </select>
                 </div>
               </div>
            <div class="row">
              <div class="input-field col m6 s12">
              <select class="select2 browser-default" id="state" name="state">
                        <option value="">--Select State--</option>
                        @foreach (Helper::getStateByCountry($propertyEdit->country??old('country')) as $st)
                        <option value="{{$st->id}}" @isset($propertyEdit) @selected($propertyEdit->state==$st->id) @else @selected(old('state')==$st->id) @endisset>{{$st->name}}</option>
                        @endforeach
                     </select>
              </div>
              <div class="input-field col m6 s12">
              <select class="select2 browser-default"  id="city" name="city">
                        <option value="">--Select City--</option>
                        @foreach (Helper::getCitiesByState($propertyEdit->state??old('state')) as $ct)
                        <option value="{{$ct->id}}" @isset($propertyEdit) @selected($propertyEdit->city==$ct->id) @else @selected(old('city')==$ct->id) @endisset>{{$ct->name}}</option>
                        @endforeach
                     </select>
              </div>
             </div>
              
              <div class="row">
              <div class="input-field col m6 s12">
              <label for="lattitude" class="">Lattitude</label>
              <input type="number" class="form-control"  id="lattitude" name="lattitude"
                value="{{ isset($propertyEdit) ? $propertyEdit->lattitude : (old('lattitude')?? 0) }}" placeholder="Lattitude" readonly>
              </div>
              <div class="input-field col m6 s12">
              <label for="longitude" class="">Longitude</label>
              <input type="number" class="form-control"  id="longitude" name="longitude"
                value="{{ isset($propertyEdit) ? $propertyEdit->longitude : (old('longitude')?? 0) }}" placeholder="Longitude" readonly>  
              </div>
            </div>
            <div class="row">
               
              <div class="input-field col m6 s12">
              <label for="postcode" class="">Postcode</label>
              <input type="number" class="form-control" id="postcode" name="postcode"
                        value="{{ isset($propertyEdit) ? $propertyEdit->postcode : old('postcode') }}" >
                 </div>
                 <div class="input-field col m6 s12">
                 <!-- <label for="address" class=""> Location</label> -->
                <input class="materialize-textarea" id='address' name="address" 
              value="{{ isset($propertyEdit) ? $propertyEdit->address : old('address') }}">
               </div>
              </div> 

               <h4 class="card-title"> &nbsp; &nbsp;Emergency Contact</h4>
              <div class="row">
              <div class="input-field col m6 s12">
                <div class="row">
                  <div class="input-field col m6 s12">
                 
                  <label for="contact_name" class="">Contact Name</label>
                     <input type="text" class="form-control" id="contact_name" >
                 
                  </div>
                  <div class="input-field col m6 s12">
                  <label for="contact_number" class="">Contact Number</label>
                  
                  <input type="number" class="form-control" id="contact_number">
                  
                 </div>
                </div>
                <div id="more-email"></div>
                <div class="form-group mx-2">
                  <a href="javascript:;" id="addEmail" > &nbsp;  &nbsp; &nbsp; + Add more</a> 
                 <!-- <a id="removeEmail" class="btn btn-warning">Remove last</a>  -->
                 </div>
                 </div>
                 
               
                 <div class="input-field col m6 s12">  
                <textarea id="message5" class="materialize-textarea" name="property_description"></textarea>
                <label for="message5">Property Description</label>
             
                  </div>
                  </div> 

                   <div class="row">
                  <div class="col-xxl-3 col md-4" style="float:right;">
                     <button class="btn btn-primary" id="btn-btn"
                        type="submit">{{ isset($propertyEdit) ? 'Update' : 'Submit' }}</button>
                  </div>
               </div>
                 
            <div class="section">
             <div id="address-map-container" style="width:100%;height:400px; ">
               <div style="width: 100%; height: 100%" id="address-map"></div>
            </div>
            </div>
           
          </form>
          </div>
        </div>
 
@endsection
@section('script-area')
<script src="{{asset('app-assets/js/mapInput.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize" async defer></script>
<script>
       $(document).ready(function() {
     var a= $('input#address').characterCounter();
     console.log(a);
    });
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<script>

    $(document).ready(function() {

    
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.profile-pic').attr('src', e.target.result);
            }
    
            reader.readAsDataURL(input.files[0]);
        }
    }
    

    $(".file-upload").on('change', function(){
        readURL(this);
    });
    
    $(".upload-button").on('click', function() {
       $(".file-upload").click();
    });
});


    </script>

 <script>
  $(document).ready(function() {  
		$("#addEmail").on("click", function() {  
			var html="<div class='row'>\
         <div class='col s6'>\
         <div class='form-group'><input type='text' class='form-control' id='' placeholder='Contact Name'/></div>\
        </div> <div class='col s6'>\
         <div class='form-group'><input type='number' class='form-control' id='' placeholder='+91-88888-88888'/></div>\
         </div></div>";
      $('#more-email').append(html);            
		}); 
 
		$("#removeEmail").on("click", function() {  
			$("#more-email").children().last().remove();  
		});  
	 
	}); 
   </script>  
@endsection
