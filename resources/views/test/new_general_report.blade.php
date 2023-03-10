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
                <select class="select2 browser-default" multiple="multiple" style="width: 15.33333% !important">
                  <optgroup label="Export">
                  <option value="Last Week" selected>Last Week</option>
                  <option value="Last Month"> Last Month</option>
                  <option value="Year to Date">Year to Date</option>
                    <option  value="Range Date">Range date </option>
                  </optgroup>
               </select>
                        <!-- <a class='dropdown-trigger btn' href='#' data-target='dropdown1' style="margin-top: 95px; background:white;  color: #244B8A; width: 164.719px!important;">Export</a> -->
                <!-- <ul id='dropdown1' class='dropdown-content' style="color: #244B8A; width: 200px;">
                     <li><a href="#!" style="color:#244B8A;"> <label>
                        <input type="checkbox" class="select-all" />
                        <span></span>
                      </label>
                      <span style="font-size:12px;"> Last Week </span></a></li>
                      <li><a href="#!" style="color:#244B8A;"> <label>
                        <input type="checkbox" class="select-all" />
                        <span></span>
                      </label>
                      <span style="font-size:12px;">   <span></a></li>
                    <li><a href="#!" style="color:#244B8A;"> <label>
                        <input type="checkbox" class="select-all" />
                        <span></span>
                      </label>
                      <span style="font-size:12px; ">Yearto Date <span></a></li>
                    <li><a href="#!" style="color:#244B8A;"> <label>
                        <input type="checkbox" class="select-all" />
                        <span></span>
                      </label>
                      
                      <span style="font-size:12px;"> Date Range <span></a></li>
                      <span style="font-size:12px; "> <input type="date"> <span></a></li>
                        <li><input type="date"></li>         
                      <a class='dropdown-trigger btn mb-2' href='#'  style="float:right;"data-target='dropdown1'>Apply</a>
                        
                </ul> -->
             </div>
            </div>
           </div> 
        </div>
    </div>
</div>

@endsection
@section('content-area')
<div class="row">
    <div class="col s12 m4 l2">
    <div class="input-field">
     <select class="select2 browser-default" multiple="multiple">
    <optgroup label="Property">
      <option value="Property 1"selected>Property 1</option>
      <option value="Property 2">Property 2</option>
      <option value="Property 3">Property 3</option>
    </optgroup>
  </select>
</div>

<!-- </div> -->
     <!-- <a class='dropdown-trigger-KK btn filterbtn' href='#' data-target='dropdown11'>Property </a>
     <ul id='dropdown11' class='dropdown-content' style="color: #244B8A; width: 200px;">
                     <li><a href="#!" style="color:#244B8A;"> <label>
                        <input type="checkbox" class="select-all" />
                        <span></span>
                      </label>
                      <span style="font-size:12px;">Property1 </span></a></li>
                      <li><a href="#!" style="color:#244B8A;"> <label>
                        <input type="checkbox" class="select-all" />
                        <span></span>
                      </label>
                      <span style="font-size:12px;">Property2 <span></a></li>
                    <li><a href="#!" style="color:#244B8A;"> <label>
                        <input type="checkbox" class="select-all" />
                        <span></span>
                      </label>
                      <span style="font-size:12px;">Property3<span></a></li>
                    <li><a href="#!" style="color:#244B8A;"> <label>
                        <input type="checkbox" class="select-all" />
                      </label>
                      <a class='dropdown-trigger btn' data-target='dropdown1' style="color:white;padding-top:10px !important">Apply</a>
                     
                </ul> -->
    </div>
    <div class="col s12 m4 l8">
    <div class="input-container" style="display: flex;
      width: 100%;
      margin-bottom: 15px; border-radius :10px;
">
    <i class="material-icons"  style="margin-top: 17px;">search</i>
    <input class="input-field" type="search" placeholder="Search by Guard name , shift name..." name="search">
  </div>
    </div>
    <div class="col s12 m4 l2">
    <div class="input-field">
                <select class="select2 browser-default" multiple="multiple">
                  <optgroup label="Filter">
                  <option value="General Reports" selected>General Reports</option>
                  <option value="Maintenance Repots"> Maintenance Repots</option>
                  <option value="Parking Reports">Parking Reports</option>
                    <option  value="Emergency Reports">Emergency Reports</option>
                  </optgroup>
               </select>
    <!-- <a class='dropdown-trigger-gggg btn filterbtn' href='#' data-target='dropdown12'>Filter</a>
    <ul id='dropdown12' class='dropdown-content'>
    <li><a href="#!">General Reports</a></li>
    <li><a href="#!">Maintenance Repots</a></li>
    <li><a href="#!"> Parking Reports</a></li>
    <li><a href="#!">Emergency Reports</a></li> 
    </ul> -->
    </div>
 </div>

 <div class="row  end">
 <div class="col s12 m4 l4">
 </div>
 <div class="col s12 m4 l8">
 <a class="waves-effect waves-light  btn exporttbtn">Export</a>
 <a class="waves-effect waves-light  btn deletebtn">Delete</a>
 </div>
</div>

<div class="row mt-3">
   <div class="col s12">
      <div class="card">
         <div class="card-content">
            <h4 class="card-title">{{__('guardshift.guard_shift' )}}
            </h4>
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
                           <td><a href="#modal4" class="waves-effect waves-light modal-trigger">Emergency</a></td> 
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
                           <td> <a href="#modal1" class="waves-effect waves-light modal-trigger">Parking</a></td> 
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
                           <td><a href="#modal1" class="waves-effect waves-light modal-trigger">General</a></td> 
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
                           <td ><a href="#modal2" class="waves-effect waves-light modal-trigger">Maintenance</a></td> 
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
                     <label for="uname0">Guard Name*</label>
                     <input class="validate" required id="uname0" name="uname0" type="text">
                  </div>
                  <div class="input-field col s12">
                     <label for="cemail0">Shift assigned *</label>
                     <input class="validate" required id="cemail0" type="text" name="cemail0">
                  </div>
                  <div class="input-field col s12">
                     <label for="property">Property Name *</label>
                     <input class="validate" required id="" type="text" name="">
                  </div>
                  <div class="input-field col s12">
                     <label for="cpassword0">Title *</label>
                     <input class="validate" required id="cpassword0" type="password" name="cpassword0">
                  </div>
                  <div class="input-field col s12">
                     <label for="cpassword0">Note *</label>
                     <input class="validate" required id="cpassword0" type="password" name="cpassword0">
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
            <button class="btn waves-effect waves-light breadcrumbs-btn" type="submit" name="action"> Download</button>
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
                     <label for="uname0">Guard Name*</label>
                     <input class="validate" required id="uname0" name="uname0" type="text">
                  </div>
                  <div class="input-field col s12">
                     <label for="cemail0">Shift assigned *</label>
                     <input class="validate" required id="cemail0" type="text" name="cemail0">
                  </div>
                  <div class="input-field col s12">
                     <label for="property">Property Name *</label>
                     <input class="validate" required id="" type="text" name="">
                  </div>
                  <div class="input-field col s12">
                     <label for="cpassword0">Title *</label>
                     <input class="validate" required id="cpassword0" type="password" name="cpassword0">
                  </div>
                  <div class="input-field col s12">
                     <label for="cpassword0">Note *</label>
                     <input class="validate" required id="cpassword0" type="password" name="cpassword0">
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
            <button class="btn waves-effect waves-light breadcrumbs-btn" type="submit" name="action"> Download</button>
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
               <input placeholder="John Doe" id="icon_prefix2" type="text" class="validate">
               <label for="icon_prefix2">Guard Name</label>
            </div>
            <div class="input-field col m6 s6">
               <input placeholder="Vehicle Name" id="icon_email" type="number" class="validate">
               <label for="icon_email">Vehicle Name</label>
            </div>
            <div class="input-field col m6 s6">
               <input placeholder="John Doe" id="icon_prefix2" type="text" class="validate">
               <label for="icon_prefix2">Shift assigned</label>
            </div>
            <div class="input-field col m6 s6">
               <input placeholder="John Doe" id="icon_prefix2" type="number" class="validate">
               <label for="icon_prefix2">Model</label>
            </div>
            <div class="input-field col m6 s6">
               <input placeholder="John Doe" id="icon_prefix2" type="text" class="validate">
               <label for="icon_prefix2">Property Name</label>
            </div>
            <div class="input-field col m6 s6">
               <input placeholder="white" id="icon_prefix2" type="text" class="validate">
               <label for="icon_prefix2">Color</label>
            </div>
            <div class="input-field col m6 s6">
               <input placeholder="John Doe" id="icon_prefix2" type="text" class="validate">
               <label for="icon_prefix2">Title</label>
            </div>
            <div class="input-field col m6 s6">
               <input placeholder="License Number" id="icon_prefix2" type="number" class="validate">
               <label for="icon_prefix2">License Number</label>
            </div>
            <p>Recorded Image Sample</p>
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
            </div>
            <div class="input-field col m6 s6">
               <input placeholder="" id="icon_prefix2" type="text" class="validate">
               <label for="icon_prefix2">State</label>
            </div>
            <p>Recorded Video Sample</p>
            <div class="input-field col m6 s6">
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
               <input placeholder="NO" id="icon_prefix2" type="text" class="validate">
               <label for="icon_prefix2">Towed</label>
            </div>  
         </div>
      </form>
       <div class="modal-footer right" >
            <div class="input-field col s12">
            <button class="btn waves-effect waves-light breadcrumbs-btn" type="submit" name="action"> Download</button>
           </div>
          </div>
   </div>
</div>
<!-- Emergency Report -->
<div id="modal4" class="xmodal modal"  style="width: 504px;">
   <div class="modal-content">
      <p class="Parking">Emergency Report</p>
      <form>
         <div class="row">
            <div class="input-field col m6 s6">
               <input placeholder="John Doe" id="icon_prefix2" type="text" class="validate">
               <label for="icon_prefix2">Guard Name</label>
            </div>
            <p>People Involved</p>
            <div class="input-field col m6 s6">
               <input placeholder="Name"  type="text" class="validate">
               <label for="">Name</label>
            </div>
            <div class="input-field col m6 s6">
               <input placeholder="Empire Polo Fields" id="icon_prefix2" type="text" class="validate">
               <label for="icon_prefix2">Title</label>
            </div>
            <div class="input-field col m6 s6">
               <input placeholder="Phone Number" id="icon_prefix2" type="number" class="validate">
               <label for="icon_prefix2">Phone Number</label>
            </div>
            <p class="headingg">Emergency Date & Time</p>
            <div class="input-field col m6 s6">
               <div class="row">
                  <div class="input-field col m6 s6">
                     <input placeholder="date" id="icon_prefix2" type="date" class="validate">
                     <label for="icon_prefix2">Date</label>
                  </div>
                  <div class="input-field col m6 s6">
                     <input placeholder="time"  type="time" class="validate">
                     <label for="">Time</label>
                  </div>
               </div>
            </div>
            <div class="input-field col m6 s6">
               <input placeholder="Witness" id="icon_prefix2" type="text" class="validate">
               <label for="icon_prefix2">Witness</label>
            </div>
            <div class="input-field col m6 s6">
               <input placeholder="Action Taker" id="icon_prefix2" type="text" class="validate">
               <label for="icon_prefix2">Action Taker</label>
            </div>
           
            <div class="input-field col m6 s6">
               <div class="row headingg">
                  <div class="input-field col m6 s6">
                     Location
                  </div>
               </div>
               <div id="googleMap" style="width:100%;height:100px; border-radius:10px;"></div>
            </div>
            <div class="input-field col m6 s6">
               <input placeholder="Police report#" id="icon_prefix2" type="text" class="validate">
               <label for="icon_prefix2">Police report#</label>
            </div>
            <div class="input-field col m6 s6">
               <input placeholder="Officer Name#" id="icon_prefix2" type="text" class="validate">
               <label for="icon_prefix2">Officer Name#</label>
            </div>
            <div class="input-field col m6 s6">
               <input placeholder="Officer#" id="icon_prefix2" type="text" class="validate">
               <label for="icon_prefix2">Officer#</label>
            </div>
            <div class="input-field col m6 s6">
               <input placeholder="Emergency Details" id="icon_prefix2" type="text" class="validate">
               <label for="icon_prefix2">Emergency Details</label>
            </div>
            <div class="input-field col m6 s6">
               <input placeholder="" id="icon_prefix2" type="text" class="validate">
               <label for="icon_prefix2">State</label>
            </div>
            <p>Recorded Image Sample</p>
            <div class="input-field col m6 s6">
               <div class="row">
                  <div class="col s12 m6 l3">
                     <img src="../../../app-assets/images/gallery/6.png" class="parking_image"> 
                  </div>
                  <div class="col s12 m6 l3">
                     <img src="../../../app-assets/images/gallery/6.png" class="parking_image"> 
                  </div>
                  <div class="col s12 m6 l3">
                     <img src="../../../app-assets/images/gallery/6.png" class="parking_image"> 
                  </div>
                  <div class="col s12 m6 l3">
                     <img src="../../../app-assets/images/gallery/6.png" class="parking_image"> 
                  </div>
               </div>
            </div>
            <div class="input-field col m6 s6">
               <input placeholder="NO" id="icon_prefix2" type="text" class="validate">
               <label for="icon_prefix2">Towed</label>
            </div>
            <p>Recorded Video Sample</p>
            <div class="input-field col m6 s6">
               <div class="row">
                  <div class="col s12 m6 l3">
                     <video width="45" height="45" controls  class="parking_vdo">
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
         </div>
      </form>
      <div class="modal-footer right" >
            <div class="input-field col s12">
            <button class="btn waves-effect waves-light breadcrumbs-btn" type="submit" name="action"> Download</button>
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
@endsection
