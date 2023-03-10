@extends('layout.panel')
@section('title', 'Property')
@section('breadcrumb')
<div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
   <!-- Search for small screen-->
   <div class="container" style="min-height:100%">
      <div class="row">
         <div class="col s10 m6 l6">
            <h5 class="breadcrumbs-title mt-20 mb-0" style="margin-top:-42px;"><span>Greylock Security Reports</span></h5>
         </div>
         <div class="row">
         <div class="col s12 m6 l6 x">
            <div class="card gradient-45deg-light-blue-cyan gradient-shadow min-height-100 white-text animate fadeLeft">
               <div class="padding-4">
                  <div class="row">
                     <div class="col s7 m7">
                        <i class="material-icons background-round mt-5">add_shopping_cart</i>
                        <p>Orders</p>
                     </div>
                     <div class="col s5 m5 right-align">
                        <h5 class="mb-0 white-text">690</h5>
                        <p class="no-margin">New</p>
                        <p>6,00,00</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col s12 m6 l6 xl3">
            <div class="card gradient-45deg-red-pink gradient-shadow min-height-100 white-text animate fadeLeft">
               <div class="padding-4">
                  <div class="row">
                     <div class="col s7 m7">
                        <i class="material-icons background-round mt-5">perm_identity</i>
                        <p>Clients</p>
                     </div>
                     <div class="col s5 m5 right-align">
                        <h5 class="mb-0 white-text">1885</h5>
                        <p class="no-margin">New</p>
                        <p>1,12,900</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col s12 m6 l6 xl3">
            <div class="card gradient-45deg-amber-amber gradient-shadow min-height-100 white-text animate fadeRight">
               <div class="padding-4">
                  <div class="row">
                     <div class="col s7 m7">
                        <i class="material-icons background-round mt-5">timeline</i>
                        <p>Sales</p>
                     </div>
                     <div class="col s5 m5 right-align">
                        <h5 class="mb-0 white-text">80%</h5>
                        <p class="no-margin">Growth</p>
                        <p>3,42,230</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col s12 m6 l6 xl3">
            <div class="card gradient-45deg-green-teal gradient-shadow min-height-100 white-text animate fadeRight">
               <div class="padding-4">
                  <div class="row">
                     <div class="col s7 m7">
                        <i class="material-icons background-round mt-5">attach_money</i>
                        <p>Profit</p>
                     </div>
                     <div class="col s5 m5 right-align">
                        <h5 class="mb-0 white-text">$890</h5>
                        <p class="no-margin">Today</p>
                        <p>$25,000</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

         <!-- <div class="row">
            <div class="col s12 m4 l8">
               <div class="row">
                  <div class="col s12 m6 l3 floatcard">
                     <div class="ct-chart card z-depth-2 border-radius-6 getCardSet" style="display: flex;
                        width: 127px;
                        margin: -1rem 0 1rem 0 !important;">
                        <div class="card-content center">
                           <div class="row">
                              <div class="col s12">
                                 <h4 class="card-title ">Total <br> Manager</h4>
                                 <i class="fa fa-user-circle" aria-hidden="true" style="float:right; margin-top:-64px;"></i>
                              </div>
                              <div class="col s12 display-flex">
                                 <p class="mt-4 pink-text accent-2">
                                    9504
                                 </p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col s12 m6 l3">
                     <div class="ct-chart card z-depth-2 border-radius-6 getCardSet" style="display: flex;
                        width: 127px;
                        margin: -1rem 0 1rem 0 !important;">
                        <div class="card-content">
                           <div class="row">
                              <div class="col s12">
                                 <h4 class="card-title ">Total <br> Manager</h4>
                                 <i class="fa fa-user-circle" aria-hidden="true" style="float:right; margin-top:-64px;"></i>
                              </div>
                              <div class="col s12 display-flex">
                                 <p class="mt-4 pink-text accent-2">
                                    9504
                                 </p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col s12 m6 l3">
                     <div class="ct-chart card z-depth-2 border-radius-6 getCardSet" style="display: flex;
                        width: 127px;
                        margin: -1rem 0 1rem 0 !important;">
                        <div class="card-content">
                           <div class="row">
                              <div class="col s12">
                                 <h4 class="card-title ">Total <br> Manager</h4>
                                 <i class="fa fa-user-circle" aria-hidden="true" style="float:right; margin-top:-64px;"></i>
                              </div>
                              <div class="col s12 display-flex">
                                 <p class="mt-4 pink-text accent-2">
                                    9504
                                 </p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col s12 m6 l3">
                     <div class="ct-chart card z-depth-2 border-radius-6 getCardSet" style="display: flex;
                        width: 127px;
                        margin: -1rem 0 1rem 0 !important;">
                        <div class="card-content">
                           <div class="row">
                              <div class="col s12">
                                 <h4 class="card-title ">Total <br> Manager</h4>
                                 <i class="fa fa-user-circle" aria-hidden="true" style="float:right; margin-top:-64px;"></i>
                              </div>
                              <div class="col s12 display-flex">
                                 <p class="mt-4 pink-text accent-2">
                                    9504
                                 </p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col">
               <div class="ct-chart card z-depth-2 border-radius-6" style="height:160px; display: flex;
                  margin: -2rem 0 1rem 0 !important;">
                  <div class="card-content">
                     <div class="row">
                        <div class="col s12">
                           <h4 class="card-title ">Total <br> Manager</h4>
                           <i class="fa fa-user-circle" aria-hidden="true" style="float:right; margin-top:-64px;"></i>
                        </div>
                        <div class="col s12 display-flex">
                           <p class="mt-4 pink-text accent-2">
                              9504
                           </p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <a class="btn btn-light  waves-effect waves-light breadcrumbs-btn right modal-trigger addGuard" style="margin-top: 68px;"><span class="hide-on-small-onl">Export</span></a>
         </div> -->
      </div>
   </div>
</div>
@endsection
@section('content-area')
<div class="row">
   <div class="col s12">
      <a class="btn btn-light  waves-effect waves-light breadcrumbs-btn modal-trigger addGuard" style="background:white;color:navy;"><i class="material-icons left">clear</i> <span class="hide-on-small-onl">General</span></a>
      <a class="btn btn-light  waves-effect waves-light breadcrumbs-btn  modal-trigger addGuard"style="background:white;color:navy;" ><i class="material-icons left" >clear</i><span class="hide-on-small-onl">Maintenance</span></a>
      <a class="btn btn-light  waves-effect waves-light breadcrumbs-btn  modal-trigger addGuard" style="background:white;color:navy;"><i class="material-icons left">clear</i><span class="hide-on-small-onl">Parking</span></a>
      <a class="btn btn-light  waves-effect waves-light breadcrumbs-btn  modal-trigger addGuard" style="background:white;color:navy;"><i class="material-icons left">clear</i><span class="hide-on-small-onl">Emergency</span></a>
      <!-- <a class="btn btn-light  waves-effect waves-light breadcrumbs-btn  modal-trigger addGuard" style="background:white;color:navy;"><i class="material-icons left">clear</i><span class="hide-on-small-onl">Filter</span></a> -->
      <a class='dropdown-trigger btn ' href='#' data-target='dropdown1' style="margin-left: 50px;width:250px;  ">Filter</a>
        <ul id='dropdown1' class='dropdown-content'>
        <li><a class=" waves-effect waves-light modal-trigger "
        href="#modal1"><i class="material-icons">check_box</i><span
        class="hide-on-small-onl">General Report</span></a></li>
        <li><a class=" waves-effect waves-light modal-trigger "
        href="#modal2"><i class="material-icons">check_box</i><span
        class="hide-on-small-onl">Maintenance Report</span></a></li>
        <li><a class=" waves-effect waves-light modal-trigger "
        href="#modal3"><i class="material-icons">check_box</i><span
        class="hide-on-small-onl">Parking Report</span></a></li>
        <li><a class=" waves-effect waves-light modal-trigger "
        href="#modal4"><i class="material-icons">check_box</i><span
        class="hide-on-small-onl">Emergency Report</span></a></li>
        </ul>
      <a class="search-widgett" style="box-shadow: 0 3px 3px 0 rgb(0 0 0 / 14%), 0 1px 7px 0 rgb(0 0 0 / 12%), 0 3px 1px -1px rgb(0 0 0 / 20%);">
   </div>
</div>
<div class="row">
<div class="col s12 mt-2 ">
<a class="mx-2" style="background:white;color:navy;margin-left: 10px;
   "><span class="hide-on-small-onl">View All</span></a>
<a class="mx-2" style="background:white;color:navy;margin-left: 13px;"><span class="hide-on-small-onl">Property 1</span></a>
<a class="mx-2" style="background:white;color:navy;margin-left: 13px;"><span class="hide-on-small-onl">Property 2</span></a>
<a class="mx-2" style="background:white;color:navy;margin-left: 13px;"><span class="hide-on-small-onl">Property 3</span></a>
<!-- <a class='dropdown-trigger btn ' href='#' data-target='dropdown1' style="margin-left: 50px;width:250px;  ">Report!</a>
<ul id='dropdown1' class='dropdown-content'>
<li><a class=" waves-effect waves-light modal-trigger "
   href="#modal1"><i class="material-icons">check_box</i><span
   class="hide-on-small-onl">General Report</span></a></li>
<li><a class=" waves-effect waves-light modal-trigger "
   href="#modal2"><i class="material-icons">check_box</i><span
   class="hide-on-small-onl">Maintenance Report</span></a></li>
<li><a class=" waves-effect waves-light modal-trigger "
   href="#modal3"><i class="material-icons">check_box</i><span
   class="hide-on-small-onl">Parking Report</span></a></li>
<li><a class=" waves-effect waves-light modal-trigger "
   href="#modal4"><i class="material-icons">check_box</i><span
   class="hide-on-small-onl">Emergency Report</span></a></li>
</ul> -->
<a class="mx-2" style="background:white;color:navy;margin-left: 13px; float:right;"><lable>Range Date<lable><span class="hide-on-small-onl"><input type="date"></span></a>
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
                           <th>{{__('guardshift.sr_no')}}</th>
                           <th>{{__('guardshift.guard_name')}}</th>
                           <th>{{__('guardshift.shift_name')}}</th>
                           <th>{{__('guardshift.property')}}</th>
                           <th>{{__('guardshift.assignBy')}}</th>
                           <th>{{__('guardshift.checkpoint')}}</th>
                           <th>{{__('guardshift.time')}}</th>
                           <th>{{__('guardshift.Apply')}}</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td>1</td>
                           <td>John Daly</td>
                           <td>Rivi properties</td>
                           <td>Rivi properties</td>
                           <td>Rivi properties</td>
                           <td>ASDF</td>
                           <td>2:00PM</td>
                        </tr>
                        <tr>
                           <td>1</td>
                           <td>John Daly</td>
                           <td>Rivi properties</td>
                           <td>Rivi properties</td>
                           <td>Rivi properties</td>
                           <td>ASDF</td>
                           <td>2:00PM</td>
                        </tr>
                        <tr>
                           <td>1</td>
                           <td>John Daly</td>
                           <td>Rivi properties</td>
                           <td>Rivi properties</td>
                           <td>Rivi properties</td>
                           <td>ASDF</td>
                           <td>2:00PM</td>
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
   function myMap() {
   var mapProp= {
     center:new google.maps.LatLng(51.508742,-0.120850),
     zoom:5,
   };
   var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
   }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script>
@endsection