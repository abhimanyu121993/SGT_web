@extends('layout.panel')
@section('title','Dashboard')
@section('breadcrumb')

<link href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



    <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
          <!-- Search for small screen-->
          <div class="container">
            <div class="row">
              <!-- <div class="col s10 m6 l6"> -->

                <h3 class="breadcrumbs-title mt-0 mb-0  sizeBig"><span>RIVI Properties</span></h3>
               
              <!-- </div> -->
              <!-- <div class="col s2 m6 l6"> -->

              <a class="btn waves-effect waves-light breadcrumbs-btn right" href="#!" style="margin-right:70px;"><i class="material-icons hide-on-med-and-up">settings</i><span class="hide-on-small-onl" style="color:black">Routes</span></a>

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
                     <h5 class="white-text lighten-4" >Total Manager</h5>
                   <h4 class="lighten-4">8546</h4>
                  </div>
               </div>
            </div>



              <div class="col s12 m2">
               <div class="card gradient-shadow  border-radius-3 animate fadeUp">
                  <div class="card-content center">
                    <img src="{{asset('app-assets/images/icon/Vector (1).png')}}"
                         style="float:right; height:30px; width:30px;" alt="image" />
                     <h5 class="white-text lighten-4">Total Reports</h5>
                    <h4 class=" lighten-4">8546</h4>
                  </div>
               </div>
            </div>
            
       

        <div class="col s12 m2">
               <div class="card gradient-shadow border-radius-3 animate fadeUp">
                  <div class="card-content center">
                       <img src="{{asset('app-assets/images/icon/Vector (2).png')}}"
                        style="float:right; height:30px; width:30px;" alt="image" />
                     <h5 class="white-text lighten-4">Total Guards</h5>
                   <h4 class=" lighten-4">8546</h4>
                  </div>
               </div>
            </div>





            <div class="col s12 m2">
               <div class="card gradient-shadow border-radius-3 animate fadeUp">
                  <div class="card-content center">
                       <img src="{{asset('app-assets/images/icon/Vector (3).png')}}"
                         style="float:right; height:30px; width:30px;" alt="image" />
                     <h5 class="white-text lighten-4">Total Checkpoints</h5>
                    <h4 class=" lighten-4">8546</h4>
                  </div>
               </div>
            </div>
            <div class="col s12 m2">
               <div class="card gradient-shadow border-radius-3 animate fadeUp">
                  <div class="card-content center">
                     <img src="{{asset('app-assets/images/icon/Vector (4).png')}}"
                      style="float:right; height:30px; width:30px;" alt="image" />
                     <h5 class="white-text lighten-4">Total Shifts</h5>
                    <h4 class=" lighten-4">8546</h4>
                  </div>
               </div>
            </div>

             <div class="col s12 m2">
               <div class="card gradient-shadow border-radius-3 animate fadeUp">
                  <div class="card-content center">
                         <img src="{{asset('app-assets/images/icon/Vector (5).png')}}"
                        style="float:right; height:30px; width:30px;" alt="image" />
                     <h5 class="white-text lighten-4">Leave Request</h5>
                     <h4 class=" lighten-4">8546</h4>
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
            <h3 class="card-title mb-0"><center>Real Time Guard Location</center> <a class="btn waves-effect waves-light breadcrumbs-btn right" href="#!" style="margin-right:5px; margin-right: 5px;
    margin-bottom: 9px;
    margin-top: -24px;"><span class="hide-on-small-onl" style="color:black;">Map view</span>&nbsp;&nbsp;<img src="{{asset('app-assets/images/icon/map.png')}}"></a></h3>
    <p style="margin-left: 250px;">Tracking Summary</p>
          
         
         <table class="subscription-table responsive-table highlight">
           <thead style="background-color: #3f51b5; color:black;">
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
<div class="card" style="height: 500px;">
  <br>

                 <div class="new-area content-right">
                           <div class="app-wrapper">

                            <div class="datatable-search">
                                <i class="material-icons mr-2 search-icon">search</i>
                                <input type="text" placeholder="Search Contact" class="app-filter oldbox" id="global_filter">
                            </div>

                          </div>
                        </div>

                       
<div class="belowsideOption">
         <a class="btn waves-effect waves-light breadcrumbs-btn " href="#!" ><i class="material-icons hide-on-med-and-up">settings</i><span class="hide-on-small-onl" style="color:black;">Filter</span></a>
        


          <a class="btn waves-effect waves-light breadcrumbs-btn " href="#!" ><i class="material-icons hide-on-med-and-up">settings</i><span class="hide-on-small-onl" style="color:black;">Sort</span></a>

    

           <a class="btn waves-effect waves-light breadcrumbs-btn " href="#!" ><i class="material-icons hide-on-med-and-up">settings</i><span class="hide-on-small-onl" style="color:black;">Export</span></a>

      </div>


    <br><br>


    
 
  
      <div class="col s12 m2 16 animate fadeRight" style="margin-top: -47px;">
         <ul class="collapsible collapsible-accordion">
            <li>
               <div class="collapsible-header"> Shifts</div>
               <div class="collapsible-body">
                 <a href="">completed</a>
                 <br>
                  <a href="">Upcoming</a>
                  <br>
                 <a href="">Missed</a>
                 <br>
                  <a href="">In Progress</a>

               </div>
            </li>
            <li>
               <div class="collapsible-header">Guards Assigned</div>
               <div class="collapsible-body">
                  <a href="">completed</a>
                  <br>
                  <a href="">Upcoming</a>
                  <br>
                  <a href="">Missed</a>
                  <br>
                  <a href="">In Progress</a>

               </div>
            </li>
            <li>
               <div class="collapsible-header">Time Sheets</div>
               <div class="collapsible-body">
                    <a href="">completed</a>
                    <br>
                  <a href="">Upcoming</a>
                  <br>
                 <a href="">Missed</a>
                 <br>
                  <a href="">In Progress</a>
               </div>
            </li>

             
             <li>
               <div class="collapsible-header">Property Details</div>
               <div class="collapsible-body">
                   <a href="">completed</a>
                   <br>
                  <a href="">Upcoming</a>
                  <br>
                 <a href="">Missed</a>
                 <br>
                  <a href="">In Progress</a>
               </div>
            </li>


            <li>
               <div class="collapsible-header">Reports</div>
               <div class="collapsible-body">
                    <a href="">completed</a>
                    <br>
                  <a href="">Upcoming</a>
                  <br>
                 <a href="">Missed</a>
                 <br>
                  <a href="">In Progress</a>
               </div>
            </li>


            <li>
               <div class="collapsible-header">Activity Log</div>
               <div class="collapsible-body">
                   <a href="">completed</a>
                   <br>
                  <a href="">Upcoming</a>
                  <br>
                 <a href="">Missed</a>
                 <br>
                  <a href="">In Progress</a>
               </div>
            </li>

         </ul>
      </div>



     
   



<div class="col s12 m10 20 animate fadeRight">
     <!-- Total Transaction -->
     <div class="card">
        <div class="card-content">
            <h3 class="card-title mb-0"><center>Real Time Guard Location</center> <a class="btn waves-effect waves-light breadcrumbs-btn right" href="#!" style="margin-right:5px; margin-right: 5px;
    margin-bottom: 9px;
    margin-top: -24px;"><span class="hide-on-small-onl" style="color:black;">Map view</span>&nbsp;&nbsp;<img src="{{asset('app-assets/images/icon/map.png')}}"></a></h3>
    <p style="margin-left: 250px;">Tracking Summary</p>
          
         
         <table class="subscription-table responsive-table highlight">
           <thead style="background-color: #3f51b5; color:black;">
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