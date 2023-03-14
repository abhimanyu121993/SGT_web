@extends('layout.panel')
@section('title', 'Property')
@section('breadcrumb')
<div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
    <div class="container">
        <div class="row">
            <div class="col s10 m6 l6" style="margin-top:-42px;">
                <h5 class="breadcrumbs-title mt-0 mb-0" ><span>Greylock Security Reports</span></h5> 
            </div> 
            </div> 
            <div class="row">
            <div class="col s12 m4 l10" style="margin-top:-16px;">
            <div class="col s10 m5 l3">
            <div class="card gradient-shadow border-radius-3 animate fadeUp">
                  <div class="card-content">
                    <p class="cardhedding">General
                        <br> Reports</p>
                         <i class="material-icons cardimage">donut_small</i>
                      <h5 class="lighten-4 center">8546</h5>
                    <i class="material-icons cardimage"  style="float:right; margin-top:-11px;">insert_invitation</i>
                  </div>
               </div>
            </div>
            <div class="col s10 m5 l3">
            <div class="card gradient-shadow border-radius-3 animate fadeUp">
                  <div class="card-content">
                    <p class="cardhedding">Maintenance
                        <br> Reports</p>
                         <i class="material-icons cardimage">donut_small</i>
                      <h5 class="lighten-4 center">8546</h5>
                    <i class="material-icons cardimage"  style="float:right; margin-top:-11px;">insert_invitation</i>
                  </div>
               </div>
            </div>
            <div class="col s10 m5 l3">
            <div class="card gradient-shadow border-radius-3 animate fadeUp">
                  <div class="card-content">
                    <p class="cardhedding">Parking
                        <br> Reports</p>
                         <i class="material-icons cardimage">donut_small</i>
                      <h5 class="lighten-4 center">8546</h5>
                    <i class="material-icons cardimage"  style="float:right; margin-top:-11px;">insert_invitation</i>
                  </div>
               </div>
            </div>
            <div class="col s10 m5 l3">
            <div class="card gradient-shadow border-radius-3 animate fadeUp">
                  <div class="card-content">
                    <p class="cardhedding">Emergency
                        <br> Reports</p>
                         <i class="material-icons cardimage">donut_small</i>
                      <h5 class="lighten-4 center">8546</h5>
                    <i class="material-icons cardimage"  style="float:right; margin-top:-11px;">insert_invitation</i>
                  </div>
               </div>
            </div>
           </div>
           <div class="row">
            <div class="col s12 m4 l2">
            <div class="input-field">
           <div id="view-flat-button">
            <div class="row">
              <div class="col s12 mt-3">
                <div class="col s12 m4 l2">
                <a class="btn-flat mb-1 dropdown-trigger waves-effect" href="#!" data-target="dropdown562" style="background:white;color: #244B8A;     margin-top: 78px;">Export<i
                    class="material-icons right">arrow_drop_down</i></a>
                <ul id="dropdown562" class="dropdown-content">
                  <li ><a href="#!" class="-text" style="color:#244B8A;">Last Week </a>
                  </li>
                  <li ><a href="#!" class="-text" style="color:#244B8A;">Last Month</a>
                  </li>
                  <li ><a href="#!" class="-text" style="color:#244B8A;">Year to Date</a>
                  </li>
                  <li><a href="#!" class="-text" style="color:#244B8A;">Date Range</a>
                 </li>
                 
                </ul>
              </div>
            </div>
          </div>
             </div>
            </div>
           </div> 
        </div>
    </div>
</div>

@endsection
@section('content-area')
<div class="row">
    <div class="col s12 m4 l3">
    
     <select class="select2 browser-default"  id="propertyList" name="property">
        <option> Property List</option>  
        <option value="">Property 1</option>
        <option value="">Property 2</option>
        <option value="">Property 3</option>
       </select>            
    </div>
    <div class="col s12 m4 l7">
    <div class="input-container" style="display: flex;
      width: 100%;
      margin-bottom: 15px; border-radius :10px;
    ">
    <i class="material-icons"  style="margin-top: 17px;">search</i>
    <input class="input-field" type="search" placeholder="Search by Guard name , shift name..." name="search">
  </div>
    </div>
    <div class="col s12 m4 l2">
      <select class="select2 browser-default"  id="Filter" name="filter">
        <option value="">Filter</option>  
        <option value="">General Reports</option>
        <option value="">Parking Reports</option>
        <option value="">Emergency Reports</option>
       </select> 
    </div>
 </div>

 <div class="row  end">
 <div class="col s12 m4 l4">
 </div>
 <div class="col s12 m4 l8 mt-2">
 <a class="waves-effect waves-light  btn exporttbtn">Export</a>
 <a class="waves-effect waves-light  btn deletebtn">Delete</a>
 </div>
</div>

<div class="row mt-3">
   <div class="col s12">
      <div class="card">
         <div class="card-content">
         
            <div class="row">
               <div class="col s12">
                  <table id="page-length-option" class="display nowrap" style="width:100%">
                     <thead style="background-color:#224B8A;color: white;">
                        <tr>
                        <th>
                      <label>
                        <input type="checkbox" class="select-all" />
                        <span></span>
                      </label>
                    </th>
                           <th>{{__('guardshift.guard_name')}}</th>
                           <th>{{__('guardshift.shift_name')}}</th>
                           <th>{{__('guardshift.property')}}</th>
                           <th>{{__('guardshift.assignBy')}}</th>
                           <th>{{__('guardshift.checkpoint')}}</th>
                           <th>{{__('guardshift.time')}}</th>
                           <th>REPORT TYPE</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                          <tr>
                          <td>
                      <label>
                        <input type="checkbox" />
                        <span></span>
                      </label>
                    </td>
                           <td>John Daly</td>
                           <td>Rivi properties</td>
                           <td>Rivi properties</td>
                           <td>Rivi properties</td>
                           <td>ASDF</td>
                           <td>2:00PM</td>
                           <td><a href="#modal4" class="waves-effect waves-light modal-trigger"  style="color: #6b6f82; text-decoration: underline;">Emergency</a></td> 
                           <td>
                           <i class="material-icons"> file_download</i>
                           <i class="material-icons"> delete</i>
                          
                           </td>      
                        </tr>
                        <tr>
                        <td>
                      <label>
                        <input type="checkbox" />
                        <span></span>
                      </label>
                    </td>
                           <td>John Daly</td>
                           <td>Rivi properties</td>
                           <td>Rivi properties</td>
                           <td>Rivi properties</td>
                           <td>ASDF</td>
                           <td>2:00PM</td>
                           <td> <a href="#modal3" class="waves-effect waves-light modal-trigger"   style="color: #6b6f82; text-decoration: underline;">Parking</a></td> 
                           <td>
                           <i class="material-icons"> file_download</i>
                           <i class="material-icons"> delete</i>
                          
                           </td>      
                        </tr>
                        <tr>
                        <td>
                      <label>
                        <input type="checkbox" />
                        <span></span>
                      </label>
                    </td>
                           <td>John Daly</td>
                           <td>Rivi properties</td>
                           <td>Rivi properties</td>
                           <td>Rivi properties</td>
                           <td>ASDF</td>
                           <td>2:00PM</td>
                           <td><a href="#modal1" class="waves-effect waves-light modal-trigger"   style="color: #6b6f82; text-decoration: underline;">General</a></td> 
                           <td>
                           <i class="material-icons"> file_download</i>
                           <i class="material-icons"> delete</i>
                           </td>      
                        </tr>
                        <tr>
                        <td>
                      <label>
                        <input type="checkbox" />
                        <span></span>
                      </label>
                    </td>
                           <td>John Daly</td>
                           <td>Rivi properties</td>
                           <td>Rivi properties</td>
                           <td>Rivi properties</td>
                           <td>ASDF</td>
                           <td>2:00PM</td>
                           <td ><a href="#modal2" class="waves-effect waves-light modal-trigger"  style="color: #6b6f82; text-decoration: underline;">Maintenance</a></td> 
                           <td>
                           <i class="material-icons"> file_download</i>
                           <i class="material-icons"> delete</i>
                           </td>      
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- General model -->
<div id="modal1" class="xmodal modal" style="width: 348px !important;">
   <div class="modal-content">
      <p class="genrel">General Report</p>
      <div class="col s12">
         <div id="html-view-validations">
            <form class="formValidate0" id="formValidate0" method="get">
               <div class="row">
                  <div class="input-field col s12">
                     <label for="uname0" id="lableformodel">Guard Name</label>
                     <input class="validate" required id="uname0" name="uname0" type="text" placeholder="Guard Name">
                  </div>
                  <div class="input-field col s12">
                     <label for="cemail0"id="lableformodel">Shift assigned </label>
                     <input class="validate" required id="cemail0" type="text" name="cemail0" placeholder="Shift assigned">
                  </div>
                  <div class="input-field col s12">
                     <label for="property"id="lableformodel" >Property Name </label>
                     <input class="validate" required id="" type="text" name="" placeholder="Property Name">
                  </div>
                  <div class="input-field col s12">
                     <label for="cpassword0" id="lableformodel">Title</label>
                     <input class="validate" required id="cpassword0" type="password" name="cpassword0" placeholder="Title">
                  </div>
                  <div class="input-field col s12">
                     <label for="cpassword0" id="lableformodel">Note </label>
                     <input class="validate" required id="cpassword0" type="password" name="cpassword0" placeholder="Note">
                  </div>
                  <p>Recorded Image Sample</p>
                  <div class="row">
                     <div class="col s12 m6 l3">
                        <img src="../../../app-assets/images/gallery/6.png" class="generalImage" > 
                     </div>
                     <div class="col s12 m6 l3">
                        <img src="../../../app-assets/images/gallery/6.png" class="generalImage" > 
                     </div>
                     <div class="col s12 m6 l3">
                        <img src="../../../app-assets/images/gallery/6.png"  class="generalImage"> 
                     </div>
                     <div class="col s12 m6 l3">
                        <img src="../../../app-assets/images/gallery/6.png" class="generalImage"> 
                     </div>
                     <div class="col s12 m6 l3">
                        <img src="../../../app-assets/images/gallery/6.png" class="generalImage"> 
                     </div>
                     <div class="col s12 m6 l3">
                        <img src="../../../app-assets/images/gallery/6.png" class="generalImage" > 
                     </div>
                     <div class="col s12 m6 l3">
                        <img src="../../../app-assets/images/gallery/6.png" class="generalImage"> 
                     </div>
                     <div class="col s12 m6 l3">
                        <img src="../../../app-assets/images/gallery/6.png"  class="generalImage"> 
                     </div>
                    </div> 
               </div>
            </form>
            <div class="modal-footer right" >
            <div class="input-field col s12">
            <button class="btn waves-effect waves-light breadcrumbs-btn" type="submit" name="action" style="background:#244B8A;
            color: antiquewhite !important; float:right;"> Download</button>
           </div>
          </div>
         </div>
      </div>
   </div>
</div>
<!-- Maintenance Report  -->
<div id="modal2" class="xmodal modal" style="width: 348px !important;">
   <div class="modal-content">
      <p class="genrel">Maintenance Report</p>
      <div class="col s12">
         <div id="html-view-validations">
            <form class="formValidate0" id="formValidate0" method="get">
               <div class="row">
                  <div class="input-field col s12">
                     <label for="uname0" id="lableformodel">Guard Name</label>
                     <input class="validate" required id="uname0" name="uname0" type="text" placeholder="Guard Name">
                  </div>
                  <div class="input-field col s12">
                     <label for="cemail0"id="lableformodel">Shift assigned </label>
                     <input class="validate" required id="cemail0" type="text" name="cemail0" placeholder=">Shift assigned">
                  </div>
                  <div class="input-field col s12">
                     <label for="property"id="lableformodel" >Property Name </label>
                     <input class="validate" required id="" type="text" name="" placeholder="Property Name">
                  </div>
                  <div class="input-field col s12">
                     <label for="cpassword0" id="lableformodel">Title</label>
                     <input class="validate" required id="cpassword0" type="password" name="cpassword0" placeholder="Title">
                  </div>
                  <div class="input-field col s12">
                     <label for="cpassword0" id="lableformodel">Note </label>
                     <input class="validate" required id="cpassword0" type="password" name="cpassword0" placeholder="Note">
                  </div>
                  <p>Recorded Image Sample</p>
                  <div class="row">
                     <div class="col s12 m6 l3">
                        <img src="../../../app-assets/images/gallery/6.png" class="generalImage" > 
                     </div>
                     <div class="col s12 m6 l3">
                        <img src="../../../app-assets/images/gallery/6.png" class="generalImage" > 
                     </div>
                     <div class="col s12 m6 l3">
                        <img src="../../../app-assets/images/gallery/6.png"  class="generalImage"> 
                     </div>
                     <div class="col s12 m6 l3">
                        <img src="../../../app-assets/images/gallery/6.png" class="generalImage"> 
                     </div>
                     <div class="col s12 m6 l3">
                        <img src="../../../app-assets/images/gallery/6.png" class="generalImage"> 
                     </div>
                     <div class="col s12 m6 l3">
                        <img src="../../../app-assets/images/gallery/6.png" class="generalImage" > 
                     </div>
                     <div class="col s12 m6 l3">
                        <img src="../../../app-assets/images/gallery/6.png" class="generalImage"> 
                     </div>
                     <div class="col s12 m6 l3">
                        <img src="../../../app-assets/images/gallery/6.png"  class="generalImage"> 
                     </div>
                    </div> 
               </div>
            </form>
            <div class="modal-footer right" >
            <div class="input-field col s12">
            <button class="btn waves-effect waves-light breadcrumbs-btn" type="submit" name="action" style="background:#244B8A;
       color: antiquewhite !important; float:right;"> Download</button>
           </div>
          </div>
         </div>
      </div>
   </div>
</div>
<!-- parking model -->
<div id="modal3" class="xmodal modal" style="width: 504px;">
   <div class="modal-content">
      <p class="Parking">Parking Report</p>
      <form>
           <div class="row">
           <div class="input-field col m6 s6">
              <label for="Guard_name" id="lableformodel">Guard Name</label>
               <input  id="Guard_name" type="text" class="validate" placeholder="Guard Name" >
            </div>
            <div class="input-field col m6 s6">
                <label for="model" id="lableformodel">Model</label>
               <input placeholder="Model" id="model" type="number" class="model">
            </div>
            </div>
            <div class="row">
            <div class="input-field col m6 s6">
                <label for="shiftassigned" id="lableformodel">Shift assigned</label>
                <input placeholder="Empire Polo Fields" id="shiftassigned" type="number" class="validate">

            </div> 
            <div class="input-field col m6 s6">
             <label for="vehicle" id="lableformodel">Vehicle Name</label>
            <input placeholder="7978980890890890" id="icon_prefix2" type="number"  class="validate">
            </div>
            </div>
            <div class="row">
            <div class="input-field col m6 s6">
              <label for="propertyname" id="lableformodel">Property Name</label>
               <input placeholder=" Property Name" id="icon_prefix2" type="text" id="propertyname" class="validate">
            </div>
            <div class="input-field col m6 s6">
                <label for="white" id="lableformodel">Color</label>
               <input placeholder="white" id="icon_prefix2" type="text" id="white" class="validate">
                  </div>
            </div>
            <div class="row">
            <div class="input-field col m6 s6">
            <label for="title" id="lableformodel">Title</label>
               <input placeholder="Title" id="icon_prefix2" type="text" class="validate" id="title">
            
            </div>
            <div class="input-field col m6 s6">
            <label for="licensenumber" id="lableformodel">License Number</label>
               <input placeholder="License Number" id="licensenumber" type="number" class="validate">
            </div>
            </div>
            <div class="row">     
            <div class="input-field col m6 s6">
            <h6 id="" style="padding:7px;">Recorded Image Sample</h6>
               <div class="row">
                  <div class="col s12 m6 l3">
                     <img src="../../../app-assets/images/gallery/6.png"  class="parking_image"> 
                  </div>
                  <div class="col s12 m6 l3">
                     <img src="../../../app-assets/images/gallery/6.png" class="parking_image"> 
                  </div>
                  <div class="col s12 m6 l3">
                     <img src="../../../app-assets/images/gallery/6.png" class="parking_image"> 
                  </div>
                  <div class="col s12 m6 l3">
                     <img src="../../../app-assets/images/gallery/6.png"  class="parking_image"> 
                  </div>
               </div>
               <h6 id="" style="padding:7px;">Recorded video Sample</h6>
               <div class="row">
                  <div class="col s12 m6 l3">
                     <video width="45" height="45" controls class="parking_vdo" >
                        <source src="" type="video/mp4">
                        <source src="movie.ogg" type="video/ogg">
                        Your browser does not support the video tag.
                     </video>
                  </div>
                  <div class="col s12 m6 l3">
                     <video width="45" height="45" controls class="parking_vdo">
                        <source src="movie.mp4" type="video/mp4">
                        <source src="movie.ogg" type="video/ogg">
                        Your browser does not support the video tag.
                     </video>
                  </div>
                  <div class="col s12 m6 l3">
                     <video width="45" height="45" controls class="parking_vdo">
                        <source src="movie.mp4" type="video/mp4">
                        <source src="movie.ogg" type="video/ogg">
                        Your browser does not support the video tag.
                     </video>
                  </div>
                  <div class="col s12 m6 l3">
                     <video width="45" height="45" controls class="parking_vdo">
                        <source src="movie.mp4" type="video/mp4">
                        <source src="movie.ogg" type="video/ogg">
                        Your browser does not support the video tag.
                     </video>
                  </div>
               </div>
              </div>  
              <div class="input-field col m6 s6" >
               <label for="state"  id="lableformodel">State</label>
               <input placeholder="State" id="state" type="text" class="validate">
             
            </div>
            </div>
            <div class="row">
            <div class="input-field col m6 s6">
            </div>
            <div class="input-field col m6 s6" style=" margin-top: -72px;">
              <label for="towed"  id="lableformodel">Towed</label>
               <input placeholder="NO" id="towed" type="text" class="validate">
            </div>
            </div>
            <div class="row">
            <div class="input-field col m6 s6">
            </div>
            <div class="input-field col m6 s6" >
            <button class="btn waves-effect waves-light breadcrumbs-btn" type="submit" name="action" style="background:#244B8A;
                      color: antiquewhite !important; float:right;"> Download</button>
            </div>
            </div>



   
   </div>
</div>
<!-- Emergency Report -->
<div id="modal4" class="xmodal modal"  style="width: 504px;">
   <div class="modal-content">
      <p class="Parking">Emergency Report</p>
      <div class="col s12">
         <div id="html-view-validations">
         <h6 style="text-align: center;
         margin-top: -34px;
         margin-left: 147px;">People Involved</h6>
         &nbsp;
            <form class="formValidate0" id="formValidate0" method="get" >
        
                  <div class="row"style="margin-top:10px;" >
                  <div class="input-field col m6 s6">
                     <label for="Guard_name" id="lableformodel">Guard Name</label>
                     <input  id="Guard_name" type="text" class="validate" placeholder="Guard Name" >
                  </div>
                  <div class="input-field col m6 s6">
                        <label for="name" id="lableformodel">Model</label>
                       <input  id="name" type="number" class="model" placeholder="Anushka">
                  </div>
                 </div>
                 <div class="row"style="margin-top:10px;" >
                  <div class="input-field col m6 s6">
                     <label for="title" id="lableformodel">Title</label>
                     <input  id="title" type="text" class="validate" placeholder="Empire Polo Fields" >
                  </div>
                  <div class="input-field col m6 s6">
                        <label for="phone" id="lableformodel">Phone Number</label>
                       <input  id="name" type="number" id="phone" class="model" placeholder="78787877887">
                  </div>
                 </div>
                   <h6>Emergency Date & Time</h6>
                   <div class="row"style="margin-top:10px;" >
                   <div class="input-field col m6 s6">
                   <div class="row"style="margin-top:10px;" >
                   <div class="input-field col m6 s6">
                     <label for="title" id="lableformodel">Date</label>
                     <input  id="title" type="date" class="validate" placeholder="Date">
                  </div>
                  <div class="input-field col m6 s6">
                        <label for="time" id="lableformodel">Time</label>
                       <input  id="time" type="time" id="phone" class="model" placeholder="Time">
                  </div>
                 </div>
                  </div>
                  <h6>&nbsp;&nbsp; &nbsp;Witness</h6>
                   &nbsp;
                   <div class="input-field col m6 s6">
                        <label for="name" id="lableformodel">Name</label>
                       <input  id="name" type="text" id="phone" class="model" placeholder="KV Sir">
                  </div>
                 </div>
                 <div class="row"style="margin-top:10px;" >
                  <div class="input-field col m6 s6">
                   <h6>Location</h6>
                  <div id="googleMap" style="width:100%;height:100px;"></div>
                  </div>
                  <div class="input-field col m6 s6">
                        <label for="phone" id="lableformodel">Phone Number</label>
                       <input  id="name" type="number" id="phone" class="model" placeholder="898989900">
                  </div>
                 </div>
                 <div class="row"style="margin-top:10px;" >
                  <div class="input-field col m6 s6">
                 
                  <label for="name" id="lableformodel"> Emergency Details</label>
                   <input  id="name" type="number" id="phone" class="model" placeholder="ABCD......">
                  </div>
                  <div class="input-field col m6 s6">
                        <label for="action" id="lableformodel">Action Taker</label>
                       <input  id="action" type="number" id="phone" class="model" placeholder="ASDFG.........">
                  </div>
                 </div>
                 <div class="row"style="margin-top:10px;" >
                  <div class="input-field col m6 s6">
                  <!-- <label for="name" id="lableformodel">Emergency Details</label>
                   <input  id="name" type="number" id="phone" class="model" placeholder="ABCD......"> -->
                  </div>
                  <div class="input-field col m6 s6">
                        <label for="police" id="lableformodel">Police report#</label>
                       <input  id="police" type="number" id="phone" class="model" placeholder="ASDFG.........">
                  </div>
                 </div>

                 <div class="row"style="margin-top:10px;" >
                  <div class="input-field col m6 s6">
                  <div class="row">
                  <div class="col s12 m6 l3">
                     <img src="../../../app-assets/images/gallery/6.png"  class="parking_image"> 
                  </div>
                  <div class="col s12 m6 l3">
                     <img src="../../../app-assets/images/gallery/6.png" class="parking_image"> 
                  </div>
                  <div class="col s12 m6 l3">
                     <img src="../../../app-assets/images/gallery/6.png" class="parking_image"> 
                  </div>
                  <div class="col s12 m6 l3">
                     <img src="../../../app-assets/images/gallery/6.png"  class="parking_image"> 
                  </div>
               </div>
               <h6 id="" style="padding:7px;">Recorded video Sample</h6>
               <div class="row">
                  <div class="col s12 m6 l3">
                     <video width="45" height="45" controls class="parking_vdo" >
                        <source src="" type="video/mp4">
                        <source src="movie.ogg" type="video/ogg">
                        Your browser does not support the video tag.
                     </video>
                  </div>
                  <div class="col s12 m6 l3">
                     <video width="45" height="45" controls class="parking_vdo">
                        <source src="movie.mp4" type="video/mp4">
                        <source src="movie.ogg" type="video/ogg">
                        Your browser does not support the video tag.
                     </video>
                  </div>
                  <div class="col s12 m6 l3">
                     <video width="45" height="45" controls class="parking_vdo">
                        <source src="movie.mp4" type="video/mp4">
                        <source src="movie.ogg" type="video/ogg">
                        Your browser does not support the video tag.
                     </video>
                  </div>
                  <div class="col s12 m6 l3">
                     <video width="45" height="45" controls class="parking_vdo">
                        <source src="movie.mp4" type="video/mp4">
                        <source src="movie.ogg" type="video/ogg">
                        Your browser does not support the video tag.
                     </video>
                  </div>
               </div>
                  </div>
                  <div class="input-field col m6 s6">
                        <label for="officer" id="lableformodel">Officer Name#</label>
                       <input  id="officername" type="text"  class="model" placeholder="ASDFG.........">
                  </div>
                 </div>
                 <div class="row"style="margin-top:10px;" >
                  <div class="input-field col m6 s6">
                  </div>
                  <div class="input-field col m6 s6">
                        <label for="OfficerOfficer" id="lableformodel">#Officer</label>
                       <input  id="Officer" type="text"  class="model" placeholder="dev">
                  </div>
                 </div>
                 <div class="row"style="margin-top:10px;" >
                  <div class="input-field col m6 s6">
                  </div>
                  <div class="input-field col m6 s6">
                        <label for="tomed" id="lableformodel">Tomed</label>
                       <input  id="tomed" type="text"  class="model" placeholder="Yes">
                  </div>
                 </div>
                 </form>
                </div>
               </div>

      <div class="modal-footer right" >
            <div class="input-field col s12">
            <button class="btn waves-effect waves-light breadcrumbs-btn" type="submit" name="action" style="background:#244B8A;
       color: antiquewhite !important; float:right;"> Download</button>
           </div>
          </div>
   </div>
</div>

@endsection
@section('script-area')
<script>
    $('.dropdown-trigger-KK').dropdown({
  inDuration: 300,
  outDuration: 225,
  constrainWidth: false, // Does not change width of dropdown to that of the activator
  hover: true, // Activate on hover
  gutter: 0, // Spacing from edge
  coverTrigger: false, // Displays dropdown below the button
  alignment: 'left', // Displays dropdown with edge aligned to the left of button
  stopPropagation: false // Stops event propagation
  }
  );
</script>
<script>
    $('.dropdown-trigger-gggg').dropdown({
  inDuration: 300,
  outDuration: 225,
  constrainWidth: false, // Does not change width of dropdown to that of the activator
  hover: true, // Activate on hover
  gutter: 0, // Spacing from edge
  coverTrigger: false, // Displays dropdown below the button
  alignment: 'left', // Displays dropdown with edge aligned to the left of button
  stopPropagation: false // Stops event propagation
  }
  );


  $(".max-length").select2({
    dropdownAutoWidth: true,
    width: '100%',
    maximumSelectionLength: 2,
    placeholder: "Select maximum 2 items"
});

</script>

<script>
function myMap() {
var mapProp= {
  center:new google.maps.LatLng(51.508742,-0.120850),
  zoom:5,
};
var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script>

<!-- 
<script>
 $(".select-all").click(function(e){
  e.preventDefault(e);


  alert('ewrer');
});  
</script> -->

@endsection
