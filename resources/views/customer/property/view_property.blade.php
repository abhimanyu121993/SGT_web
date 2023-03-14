@extends('layout.panel')
@section('title','Dashboard')
@section('breadcrumb')

<link href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@800&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/app-sidebar.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/app-contacts.css')}}">
<style>

.ghjhgjh {
    font-family: 'Inter';
    font-style: normal;
    font-weight: 700;
    font-size: 30px !important;
    line-height: 21px !important;
    letter-spacing: -0.25px;
    color: #FFFFFF !important;
}

    </style>


    <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
          <!-- Search for small screen-->
          <div class="container">
            <div class="row">
              <!-- <div class="col s10 m6 l6"> -->

                <h3 class="breadcrumbs-title mt-0 mb-0 sizeBig ghjhgjh"><span>RIVI Properties</span></h3>
               
              <!-- </div> -->
              <!-- <div class="col s2 m6 l6"> -->

             

            <a class="btn waves-effect waves-light breadcrumbs-btn right" href="#!" style="margin-right:30px;"><i class="material-icons hide-on-med-and-up">settings</i><span class="hide-on-small-onl" style="color:black;">QR MAP</span></a>
               
              <!-- </div> -->
            </div>
          </div>
        </div>



@endsection
@section('breadcrumb-title','Dashboard')
@section('breadcrumb-backpage','Home')
@section('breadcrumb-currentpage','Dashboard')
@section('link-area')

<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/vendors.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/animate-css/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/chartist-js/chartist.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/chartist-js/chartist-plugin-tooltip.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/dashboard-modern.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/intro.css')}}">
@endsection
@section('content-area')
<style>

.white-text{

  font-size:16px;
}

  </style>

            <div class="section" id="materialize-sparkline">



               <div id="ecommerce-offer" style="margin-top: -30px;">
         <div class="row">
            <div class="col s12 m2">
               <div class="card gradient-shadow border-radius-3 animate fadeUp">
                  <div class="card-content center">
                     <img src="{{asset('app-assets/images/icon/Vector.png')}}"
                         style="float:right; height:30px; width:30px;" alt="image" />
                     <h5 class="white-text lighten-4">Total</h5>
                     <h5 class="white-text lighten-4">Manager</h5>

                   <h4 class="lighten-4" style="color:#244B8A;;">8546</h4>
                  </div>
               </div>
            </div>



              <div class="col s12 m2">
               <div class="card gradient-shadow  border-radius-3 animate fadeUp">
                  <div class="card-content center">
                    <img src="{{asset('app-assets/images/icon/Vector (1).png')}}"
                         style="float:right; height:30px; width:30px;" alt="image" />
                     <h5 class="white-text lighten-4">Total</h5>
                      <h5 class="white-text lighten-4">Reports</h5>

                    <h4 class="lighten-4" style="color:#244B8A;;">8546</h4>
                  </div>
               </div>
            </div>
            
       

        <div class="col s12 m2">
               <div class="card gradient-shadow border-radius-3 animate fadeUp">
                  <div class="card-content center">
                       <img src="{{asset('app-assets/images/icon/Vector (2).png')}}"
                        style="float:right; height:30px; width:30px;" alt="image" />
                     <h5 class="white-text lighten-4">Total</h5>
                      <h5 class="white-text lighten-4">Guards</h5>

                   <h4 class=" lighten-4" style="color:#244B8A;;">8546</h4>
                  </div>
               </div>
            </div>





            <div class="col s12 m2">
               <div class="card gradient-shadow border-radius-3 animate fadeUp">
                  <div class="card-content center">
                       <img src="{{asset('app-assets/images/icon/Vector (3).png')}}"
                         style="float:right; height:30px; width:30px;" alt="image" />
                     <h5 class="white-text lighten-4">Total</h5>
                     <h5 class="white-text lighten-4">Checkpoints</h5>

                    <h4 class=" lighten-4" style="color:#244B8A;;">8546</h4>
                  </div>
               </div>
            </div>
            <div class="col s12 m2">
               <div class="card gradient-shadow border-radius-3 animate fadeUp">
                  <div class="card-content center">
                     <img src="{{asset('app-assets/images/icon/Vector (4).png')}}"
                      style="float:right; height:30px; width:30px;" alt="image" />
                     <h5 class="white-text lighten-4">Total</h5>
                     <h5 class="white-text lighten-4">Shifts</h5>


                    <h4 class=" lighten-4" style="color:#244B8A;;">8546</h4>
                  </div>
               </div>
            </div>

             <div class="col s12 m2">
               <div class="card gradient-shadow border-radius-3 animate fadeUp">
                  <div class="card-content center">
                         <img src="{{asset('app-assets/images/icon/Vector (5).png')}}"
                        style="float:right; height:30px; width:30px;" alt="image" />
                     <h5 class="white-text lighten-4">Leave</h5>
                      <h5 class="white-text lighten-4">Request</h5>


                     <h4 class=" lighten-4" style="color:#244B8A;;">8546</h4>
                  </div>
               </div>
            </div>

         </div>
      </div>


  <!--Simple Line Chart-->
 



 <div class="row vertical-modern-dashboard">
  <div class="col s12 m4 l4">
     <!-- Current Balance -->
     <div class="card animate fadeLeft">
        <div class="card-content getjang">
           <img src="{{asset('app-assets/images/icon/Vector.png')}}"><h4 class="card-title langlang"><b>Total Checkpoint</b><br>CHECKPOINTS SUMMARY</h4>
           <img style="float: right;
                margin-top: -46px;" src="{{asset('app-assets/images/icon/claender.png')}}">
        </div>
          <div id="bar-chart-sample" class="center" style="margin-top: -113px;
      padding-bottom: 40px;"></div>
     </div>
  </div>


  <div class="col s12 m8 l8 animate fadeRight">
     <!-- Total Transaction -->
     <div class="card">
        <div class="card-content">
            <h3 class="card-title mb-0"><center><h6>Real Time Guard Location</h6>
                <p style="margin:-6px;">Tracking Summary</p></center> 

             <a class="btn waves-effect waves-light breadcrumbs-btn right" href="#!" style="margin-right:5px; margin-right: 5px;
    margin-bottom: 9px;
    margin-top: -45px;"><span class="hide-on-small-onl" style="color:white;">Map view</span>&nbsp;&nbsp;<img src="{{asset('app-assets/images/icon/map.png')}}"></a></h3>
    
          
         
         <table class="subscription-table responsive-table highlight">
           <thead style="background-color: #3f51b5; color:white;">
              <tr>
                 <th>Name</th>
                 <th>Company</th>
                 <th>Start Date</th>
                 <th>Status</th>
                 <th>Status</th>
                 <th>Status</th>
                
              </tr>
           </thead>
           <tbody>
              <tr>
                 <td>Michael Austin</td>
                 <td>ABC Fintech LTD.</td>
                 <td>Jan 1,2019</td>
                 <td><span class="badge pink lighten-5 pink-text text-accent-2">Close</span></td>
                 <td>$1000.00</td>
                 <td class="center-align"><a href="#"><i class="material-icons pink-text">clear</i></a></td>
              </tr>
              <tr>
                 <td>Aldin Rakić</td>
                 <td>ACME Pvt LTD.</td>
                 <td>Jan 10,2019</td>
                 <td><span class="badge green lighten-5 green-text text-accent-4">Open</span></td>
                 <td>$ 3000.00</td>
                 <td class="center-align"><a href="#"><i class="material-icons pink-text">clear</i></a></td>
              </tr>
              <tr>
                 <td>İris Yılmaz</td>
                 <td>Collboy Tech LTD.</td>
                 <td>Jan 12,2019</td>
                 <td><span class="badge green lighten-5 green-text text-accent-4">Open</span></td>
                 <td>$ 2000.00</td>
                 <td class="center-align"><a href="#"><i class="material-icons pink-text">clear</i></a></td>
              </tr>
              <tr>
                 <td>Lidia Livescu</td>
                 <td>My Fintech LTD.</td>
                 <td>Jan 14,2019</td>
                 <td><span class="badge pink lighten-5 pink-text text-accent-2">Close</span></td>
                 <td>$ 1100.00</td>
                 <td class="center-align"><a href="#"><i class="material-icons pink-text">clear</i></a></td>
              </tr>
           </tbody>
        </table>


        </div>
     </div>
  </div>


</div>

<style>

.belowsideOption{
display: inline-flex;
    justify-content: flex-start;
    align-items: center;
    flex-wrap: wrap;

}

.belowsideOption .waves-effect {
   margin-left: 486px !important;
    margin-right: -482px;
    background-color: white !important;
    float: left !important;
}


@media only screen and (max-width: 500px) {

 .belowsideOption .waves-effect {
  margin-left: 0px !important;
    margin-right: 0px;
    background-color: white !important;
}

.belowsideOption{
display: inline-flex;
    justify-content: flex-start;
    align-items: center;
    flex-wrap: wrap;

}

.new-area {
    width: calc(115% - 331px);
    margin-top: -10px;
    margin-left: 75px;
    margin-bottom: -26px;
}

}

    </style>

                  
   <div class="row">               
    <div class="card" style="height: 500px">


    <br><br>

  


<div class="sidebar-left sidebar-fixed">
  <div class="sidebar">
    <div class="sidebar-content">
     
      <div id="sidebar-list" class="sidebar-menu list-group position-relative animate fadeLeft delay-1">
        <div class="sidebar-list-padding app-sidebar sidenav" id="contact-sidenav">
          <ul class="contact-list display-grid">
            <li class="active"><a href="javascript:void(0)" class="text-sub"><i class="material-icons mr-2">
                  perm_identity </i> All
                Contact</a></li>
            <li><a href="javascript:void(0)" class="text-sub"><i class="material-icons mr-2"> history </i> Frequent</a>
            </li>
            <li><a href="javascript:void(0)" class="text-sub"><i class="material-icons mr-2"> star_border </i> Starred
                Contacts</a></li>
            <li class="sidebar-title">Options</li>
            <li><a href="javascript:void(0)" class="text-sub"><i class="material-icons mr-2"> keyboard_arrow_down </i>
                Import</a></li>
            <li><a href="javascript:void(0)" class="text-sub"><i class="material-icons mr-2"> keyboard_arrow_up </i>
                Export</a></li>
            <li><a href="javascript:void(0)" class="text-sub"><i class="material-icons mr-2"> print </i> Print</a></li>
            <li class="sidebar-title">Department</li>
            <li><a href="javascript:void(0)" class="text-sub"><i class="purple-text material-icons small-icons mr-2">
                  fiber_manual_record </i> Engineering</a></li>
            <li><a href="javascript:void(0)" class="text-sub"><i class="amber-text material-icons small-icons mr-2">
                  fiber_manual_record </i> Sales</a></li>
            <li><a href="javascript:void(0)" class="text-sub"><i
                  class="light-green-text material-icons small-icons mr-2">
                  fiber_manual_record </i> Support</a></li>
          </ul>
        </div>
      </div>
      <a href="#" data-target="contact-sidenav" class="sidenav-trigger hide-on-large-only"><i
          class="material-icons">menu</i></a>
    </div>
  </div>
</div>




<div class="content-area content-right">
  <div class="app-wrapper">


    <div class="datatable-search">
      <i class="material-icons mr-2 search-icon">search</i>
      <input type="text" placeholder="Search Contact" class="app-filter" id="global_filter">

       <a class="btn waves-effect waves-light breadcrumbs-btn " href="#!" ><i class="material-icons hide-on-med-and-up">settings</i><span class="hide-on-small-onl" style="color:white;">Filter</span></a>
      
           <a class="btn waves-effect waves-light breadcrumbs-btn " href="#!" ><i class="material-icons hide-on-med-and-up">settings</i><span class="hide-on-small-onl" style="color:white;">Sort</span></a>

           <a class="btn waves-effect waves-light breadcrumbs-btn " href="#!" ><i class="material-icons hide-on-med-and-up">settings</i><span class="hide-on-small-onl" style="color:white;">Export</span></a>
       </div>


    <div id="button-trigger" class="card card card-default scrollspy border-radius-6 fixed-width">
      <div class="card-content p-0">
        <table id="data-table-contact" class="display" style="width:100%">
          <thead style="color:white;">
            <tr>
              <th class="background-image-none center-align">
                <label>
                  <input type="checkbox" onClick="toggle(this)" />
                  <span></span>
                </label>
              </th>
              <th>User</th>
              <th>Full Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Favorite</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="center-align contact-checkbox">
                <label class="checkbox-label">
                  <input type="checkbox" name="foo" />
                  <span></span>
                </label>
              </td>
              <td><span class="avatar-contact avatar-online"><img src="../../../app-assets/images/avatar/avatar-1.png"
                    alt="avatar"></span></td>
              <td>John</td>
              <td>john@domain.com</td>
              <td>202-555-0119</td>
              <td><span class="favorite"><i class="material-icons"> star_border </i></span></td>
              <td><span><i class="material-icons delete">delete_outline</i></span></td>
            </tr>
            <tr>
              <td class="center-align contact-checkbox">
                <label class="checkbox-label">
                  <input type="checkbox" name="foo" />
                  <span></span>
                </label>
              </td>
              <td><span class="avatar-contact avatar-online"><img src="../../../app-assets/images/avatar/avatar-2.png"
                    alt="avatar"></span></td>
              <td>Rodolfo</td>
              <td>rodo@domain.com</td>
              <td>202-555-0125</td>
              <td><span class="favorite"><i class="material-icons"> star_border </i></span></td>
              <td><span><i class="material-icons delete">delete_outline</i></span></td>
            </tr>
            <tr>
              <td class="center-align contact-checkbox">
                <label class="checkbox-label">
                  <input type="checkbox" name="foo" />
                  <span></span>
                </label>
              </td>
              <td><span class="avatar-contact avatar-online"><img src="../../../app-assets/images/avatar/avatar-3.png"
                    alt="avatar"></span></td>
              <td>Marco</td>
              <td>marco@domain.com</td>
              <td>202-555-0177</td>
              <td><span class="favorite"><i class="material-icons"> star_border </i></span></td>
              <td><span><i class="material-icons delete">delete_outline</i></span></td>
            </tr>
            <tr>
              <td class="center-align contact-checkbox">
                <label class="checkbox-label">
                  <input type="checkbox" name="foo" />
                  <span></span>
                </label>
              </td>
              <td><span class="avatar-contact avatar-online"><img src="../../../app-assets/images/avatar/avatar-4.png"
                    alt="avatar"></span></td>
              <td>Joshua</td>
              <td>jos@domain.com</td>
              <td>202-555-0126</td>
              <td><span class="favorite"><i class="material-icons amber-text"> star_border </i></span></td>
              <td><span><i class="material-icons delete">delete_outline</i></span></td>
            </tr>
            <tr>
              <td class="center-align contact-checkbox">
                <label class="checkbox-label">
                  <input type="checkbox" name="foo" />
                  <span></span>
                </label>
              </td>
              <td><span class="avatar-contact avatar-online"><img src="../../../app-assets/images/avatar/avatar-4.png"
                    alt="avatar"></span></td>
              <td>Gene</td>
              <td>gene@domain.com</td>
              <td>202-555-0130</td>
              <td><span class="favorite"><i class="material-icons"> star_border </i></span></td>
              <td><span><i class="material-icons delete">delete_outline</i></span></td>
            </tr>
            <tr>
              <td class="center-align contact-checkbox">
                <label class="checkbox-label">
                  <input type="checkbox" name="foo" />
                  <span></span>
                </label>
              </td>
              <td><span class="avatar-contact avatar-online"><img src="../../../app-assets/images/avatar/avatar-5.png"
                    alt="avatar"></span></td>
              <td>Oscar</td>
              <td>oscar@domain.com</td>
              <td>+1-202-555-0119</td>
              <td><span class="favorite"><i class="material-icons"> star_border </i></span></td>
              <td><span><i class="material-icons delete">delete_outline</i></span></td>
            </tr>
            <tr>
              <td class="center-align contact-checkbox">
                <label class="checkbox-label">
                  <input type="checkbox" name="foo" />
                  <span></span>
                </label>
              </td>
              <td><span class="avatar-contact avatar-online"><img src="../../../app-assets/images/avatar/avatar-6.png"
                    alt="avatar"></span></td>
              <td>William</td>
              <td>will@domain.com</td>
              <td>+1-202-555-0125</td>
              <td><span class="favorite"><i class="material-icons amber-text"> star_border </i></span></td>
              <td><span><i class="material-icons delete">delete_outline</i></span></td>
            </tr>
            <tr>
              <td class="center-align contact-checkbox">
                <label class="checkbox-label">
                  <input type="checkbox" name="foo" />
                  <span></span>
                </label>
              </td>
              <td><span class="avatar-contact avatar-online"><img src="../../../app-assets/images/avatar/avatar-7.png"
                    alt="avatar"></span></td>
              <td>Dorian</td>
              <td>dori@domain.com</td>
              <td>202-555-0112</td>
              <td><span class="favorite"><i class="material-icons"> star_border </i></span></td>
              <td><span><i class="material-icons delete">delete_outline</i></span></td>
            </tr>
            <tr>
              <td class="center-align contact-checkbox">
                <label class="checkbox-label">
                  <input type="checkbox" name="foo" />
                  <span></span>
                </label>
              </td>
              <td><span class="avatar-contact avatar-online"><img src="../../../app-assets/images/avatar/avatar-8.png"
                    alt="avatar"></span></td>
              <td>Lester</td>
              <td>les@domain.com</td>
              <td>+1-202-555-0177</td>
              <td><span class="favorite"><i class="material-icons"> star_border </i></span></td>
              <td><span><i class="material-icons delete">delete_outline</i></span></td>
            </tr>
            <tr>
              <td class="center-align contact-checkbox">
                <label class="checkbox-label">
                  <input type="checkbox" name="foo" />
                  <span></span>
                </label>
              </td>
              <td><span class="avatar-contact avatar-online"><img src="../../../app-assets/images/avatar/avatar-9.png"
                    alt="avatar"></span></td>
              <td>Charles</td>
              <td>name@domain.com</td>
              <td>+1-202-555-0126</td>
              <td><span class="favorite"><i class="material-icons"> star_border </i></span></td>
              <td><span><i class="material-icons delete">delete_outline</i></span></td>
            </tr>
            <tr>
              <td class="center-align contact-checkbox">
                <label class="checkbox-label">
                  <input type="checkbox" name="foo" />
                  <span></span>
                </label>
              </td>
              <td><span class="avatar-contact avatar-online"><img src="../../../app-assets/images/avatar/avatar-1.png"
                    alt="avatar"></span></td>
              <td>William</td>
              <td>name@domain.com</td>
              <td>+1-202-555-0130</td>
              <td><span class="favorite"><i class="material-icons amber-text"> star_border </i></span></td>
              <td><span><i class="material-icons delete">delete_outline</i></span></td>
            </tr>
            <tr>
              <td class="center-align contact-checkbox">
                <label class="checkbox-label">
                  <input type="checkbox" name="foo" />
                  <span></span>
                </label>
              </td>
              <td><span class="avatar-contact avatar-online"><img src="../../../app-assets/images/avatar/avatar-11.png"
                    alt="avatar"></span></td>
              <td>John</td>
              <td>name@domain.com</td>
              <td>+1-202-555-0112</td>
              <td><span class="favorite"><i class="material-icons"> star_border </i></span></td>
              <td><span><i class="material-icons delete">delete_outline</i></span></td>
            </tr>
            <tr>
              <td class="center-align contact-checkbox">
                <label class="checkbox-label">
                  <input type="checkbox" name="foo" />
                  <span></span>
                </label>
              </td>
              <td><span class="avatar-contact avatar-online"><img src="../../../app-assets/images/avatar/avatar-12.png"
                    alt="avatar"></span></td>
              <td>John</td>
              <td>name@domain.com</td>
              <td>+1-202-555-0112</td>
              <td><span class="favorite"><i class="material-icons amber-text"> star_border </i></span></td>
              <td><span><i class="material-icons delete">delete_outline</i></span></td>
            </tr>
            <tr>
              <td class="center-align contact-checkbox">
                <label class="checkbox-label">
                  <input type="checkbox" name="foo" />
                  <span></span>
                </label>
              </td>
              <td><span class="avatar-contact avatar-online"><img src="../../../app-assets/images/avatar/avatar-13.png"
                    alt="avatar"></span></td>
              <td>John</td>
              <td>name@domain.com</td>
              <td>+1-202-555-0112</td>
              <td><span class="favorite"><i class="material-icons"> star_border </i></span></td>
              <td><span><i class="material-icons delete">delete_outline</i></span></td>
            </tr>
            <tr>
              <td class="center-align contact-checkbox">
                <label class="checkbox-label">
                  <input type="checkbox" name="foo" />
                  <span></span>
                </label>
              </td>
              <td><span class="avatar-contact avatar-online"><img src="../../../app-assets/images/avatar/avatar-14.png"
                    alt="avatar"></span></td>
              <td>Jake</td>
              <td>name@domain.com</td>
              <td>+1-202-555-0112</td>
              <td><span class="favorite"><i class="material-icons"> star_border </i></span></td>
              <td><span><i class="material-icons delete">delete_outline</i></span></td>
            </tr>
            <tr>
              <td class="center-align contact-checkbox">
                <label class="checkbox-label">
                  <input type="checkbox" name="foo" />
                  <span></span>
                </label>
              </td>
              <td><span class="avatar-contact avatar-online"><img src="../../../app-assets/images/avatar/avatar-15.png"
                    alt="avatar"></span></td>
              <td>Jake</td>
              <td>name@domain.com</td>
              <td>+1-202-555-0112</td>
              <td><span class="favorite"><i class="material-icons"> star_border </i></span></td>
              <td><span><i class="material-icons delete">delete_outline</i></span></td>
            </tr>
            <tr>
              <td class="center-align contact-checkbox">
                <label class="checkbox-label">
                  <input type="checkbox" name="foo" />
                  <span></span>
                </label>
              </td>
              <td><span class="avatar-contact avatar-online"><img src="../../../app-assets/images/avatar/avatar-16.png"
                    alt="avatar"></span></td>
              <td>Heather</td>
              <td>name@domain.com</td>
              <td>+1-202-555-0112</td>
              <td><span class="favorite"><i class="material-icons amber-text"> star_border </i></span></td>
              <td><span><i class="material-icons delete">delete_outline</i></span></td>
            </tr>
            <tr>
              <td class="center-align contact-checkbox">
                <label class="checkbox-label">
                  <input type="checkbox" name="foo" />
                  <span></span>
                </label>
              </td>
              <td><span class="avatar-contact avatar-online"><img src="../../../app-assets/images/avatar/avatar-17.png"
                    alt="avatar"></span></td>
              <td>Joanna</td>
              <td>name@domain.com</td>
              <td>+1-202-555-0112</td>
              <td><span class="favorite"><i class="material-icons amber-text"> star_border </i></span></td>
              <td><span><i class="material-icons delete">delete_outline</i></span></td>
            </tr>
            <tr>
              <td class="center-align contact-checkbox">
                <label class="checkbox-label">
                  <input type="checkbox" name="foo" />
                  <span></span>
                </label>
              <td><span class="avatar-contact avatar-online"><img src="../../../app-assets/images/avatar/avatar-1.png"
                    alt="avatar"></span></td>
              <td>Joanna</td>
              <td>name@domain.com</td>
              <td>+1-202-555-0112</td>
              <td><span class="favorite"><i class="material-icons"> star_border </i></span></td>
              <td><span><i class="material-icons delete">delete_outline</i></span></td>
            </tr>
            <tr>
              <td class="center-align contact-checkbox">
                <label class="checkbox-label">
                  <input type="checkbox" name="foo" />
                  <span></span>
                </label>
              </td>
              <td><span class="avatar-contact avatar-online"><img src="../../../app-assets/images/avatar/avatar-2.png"
                    alt="avatar"></span></td>
              <td>Cassandra</td>
              <td>name@domain.com</td>
              <td>+1-202-555-0112</td>
              <td><span class="favorite"><i class="material-icons"> star_border </i></span></td>
              <td><span><i class="material-icons delete">delete_outline</i></span></td>
            </tr>
            <tr>
              <td class="center-align contact-checkbox">
                <label class="checkbox-label">
                  <input type="checkbox" name="foo" />
                  <span></span>
                </label>
              </td>
              <td><span class="avatar-contact avatar-online"><img src="../../../app-assets/images/avatar/avatar-3.png"
                    alt="avatar"></span></td>
              <td>Dolores</td>
              <td>name@domain.com</td>
              <td>+1-202-555-0112</td>
              <td><span class="favorite"><i class="material-icons"> star_border </i></span></td>
              <td><span><i class="material-icons delete">delete_outline</i></span></td>
            </tr>
            <tr>
              <td class="center-align contact-checkbox">
                <label class="checkbox-label">
                  <input type="checkbox" name="foo" />
                  <span></span>
                </label>
              </td>
              <td><span class="avatar-contact avatar-online"><img src="../../../app-assets/images/avatar/avatar-4.png"
                    alt="avatar"></span></td>
              <td>Susan</td>
              <td>name@domain.com</td>
              <td>+1-202-555-0112</td>
              <td><span class="favorite"><i class="material-icons"> star_border </i></span></td>
              <td><span><i class="material-icons delete">delete_outline</i></span></td>
            </tr>
            <tr>
              <td class="center-align contact-checkbox">
                <label class="checkbox-label">
                  <input type="checkbox" name="foo" />
                  <span></span>
                </label>
              </td>
              <td><span class="avatar-contact avatar-online"><img src="../../../app-assets/images/avatar/avatar-5.png"
                    alt="avatar"></span></td>
              <td>Susan</td>
              <td>name@domain.com</td>
              <td>+1-202-555-0112</td>
              <td><span class="favorite"><i class="material-icons"> star_border </i></span></td>
              <td><span><i class="material-icons delete">delete_outline</i></span></td>
            </tr>
            <tr>
              <td class="center-align contact-checkbox">
                <label class="checkbox-label">
                  <input type="checkbox" name="foo" />
                  <span></span>
                </label>
              </td>
              <td><span class="avatar-contact avatar-online"><img src="../../../app-assets/images/avatar/avatar-6.png"
                    alt="avatar"></span></td>
              <td>Kathleen</td>
              <td>name@domain.com</td>
              <td>+1-202-555-0112</td>
              <td><span class="favorite"><i class="material-icons amber-text"> star_border </i></span></td>
              <td><span><i class="material-icons delete">delete_outline</i></span></td>
            </tr>
            <tr>
              <td class="center-align contact-checkbox">
                <label class="checkbox-label">
                  <input type="checkbox" name="foo" />
                  <span></span>
                </label>
              </td>
              <td><span class="avatar-contact avatar-online"><img src="../../../app-assets/images/avatar/avatar-7.png"
                    alt="avatar"></span></td>
              <td>Chief</td>
              <td>name@domain.com</td>
              <td>+1-202-555-0112</td>
              <td><span class="favorite"><i class="material-icons"> star_border </i></span></td>
              <td><span><i class="material-icons delete">delete_outline</i></span></td>
            </tr>
            <tr>
              <td class="center-align contact-checkbox">
                <label class="checkbox-label">
                  <input type="checkbox" name="foo" />
                  <span></span>
                </label>
              </td>
              <td><span class="avatar-contact avatar-online"><img src="../../../app-assets/images/avatar/avatar-8.png"
                    alt="avatar"></span></td>
              <td>Walter</td>
              <td>name@domain.com</td>
              <td>+1-202-555-0112</td>
              <td><span class="favorite"><i class="material-icons"> star_border </i></span></td>
              <td><span><i class="material-icons delete">delete_outline</i></span></td>
            </tr>
            <tr>
              <td class="center-align contact-checkbox">
                <label class="checkbox-label">
                  <input type="checkbox" name="foo" />
                  <span></span>
                </label>
              </td>
            <td><span class="avatar-contact avatar-online"><img src="../../../app-assets/images/avatar/avatar-9.png"
                    alt="avatar"></span></td>
              <td>Walter</td>
              <td>name@domain.com</td>
              <td>+1-202-555-0112</td>
              <td><span class="favorite"><i class="material-icons amber-text"> star_border </i></span></td>
              <td><span><i class="material-icons delete">delete_outline</i></span></td>
            </tr>
            <tr>
              <td class="center-align contact-checkbox">
                <label class="checkbox-label">
                  <input type="checkbox" name="foo" />
                  <span></span>
                </label>
              </td>
              <td><span class="avatar-contact avatar-online"><img src="../../../app-assets/images/avatar/avatar-10.png"
                    alt="avatar"></span></td>
              <td>Kathleen</td>
              <td>name@domain.com</td>
              <td>+1-202-555-0112</td>
              <td><span class="favorite"><i class="material-icons"> star_border </i></span></td>
              <td><span><i class="material-icons delete">delete_outline</i></span></td>
            </tr>
            <tr>
              <td class="center-align contact-checkbox">
                <label class="checkbox-label">
                  <input type="checkbox" name="foo" />
                  <span></span>
                </label>
              </td>
              <td><span class="avatar-contact avatar-online"><img src="../../../app-assets/images/avatar/avatar-11.png"
                    alt="avatar"></span></td>
              <td>Terry</td>
              <td>name@domain.com</td>
              <td>+1-202-555-0112</td>
              <td><span class="favorite"><i class="material-icons"> star_border </i></span></td>
              <td><span><i class="material-icons delete">delete_outline</i></span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>



      
@endsection
@section('script-area')

  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('app-assets/vendors/data-tables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('app-assets/js/search.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/app-contacts.js')}}"></script>

    <script src="{{asset('app-assets/vendors/sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/chartjs/chart.min.js')}}"></script>

     <script src="{{asset('app-assets/vendors/chartjs/chart.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/chartist-js/chartist.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/chartist-js/chartist-plugin-tooltip.js')}}"></script>
    <script src="{{asset('app-assets/vendors/chartist-js/chartist-plugin-fill-donut.min.js')}}"></script>
@endsection