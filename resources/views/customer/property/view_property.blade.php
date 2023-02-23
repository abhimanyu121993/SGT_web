@extends('layout.panel')
@section('title', 'Property')
@section('breadcrumb')



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
@section('link-area')
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/app-sidebar.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/app-contacts.css">
@endsection
@section('content-area')

            <div class="section" id="materialize-sparkline">

  <!--Simple Line Chart-->
  <div class="row">
    <div class="col s12 m6 l3 floatcard">
      <div class="ct-chart card z-depth-2 border-radius-6 getCardSet">


        <div class="card-content">
          <div class="row">
            <div class="col s12">
              <h4 class="card-title">Total <br> Manager</h4>
               <i class="fa fa-user-circle" aria-hidden="true" style="float:right; margin-top:-64px;"></i>
            </div>

            <div class="col s12 display-flex">
             
              <p class="mt-4 pink-text accent-2">
                9504</p>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="col s12 m6 l3 floatcard">
      <div class="ct-chart card z-depth-2 border-radius-6 getCardSet">
        <div class="card-content">
          <div class="row">
            <div class="col s12">
              <h4 class="card-title truncate">Total <br> Property</h4>
              <i class="fa fa-briefcase" aria-hidden="true" style="float:right; margin-top:-64px;"></i>
            </div>
            <div class="col s12 display-flex">
              <div ></div>
              <p class="mt-4 blue-text">
                1896</p>
            </div>
          </div>
        </div>
      </div>
    </div>





    <div class="col s12 m6 l3 floatcard">
      <div class="ct-chart card z-depth-2 border-radius-6 getCardSet">
        <div class="card-content">
          <div class="row">
            <div class="col s12">
              <h4 class="card-title">Total <br> Guard</h4>
              <i class="fa fa-address-book" aria-hidden="true" style="float:right; margin-top:-64px;"></i>
            </div>
            <div class="col s12 display-flex light-green-text">
            
              <p class="mt-4 ">
                8546</p>
            </div>
          </div>
        </div>
      </div>
    </div>
   

    <div class="col s12 m6 l3 floatcard">
      <div class="ct-chart card z-depth-2 border-radius-6 getCardSet">
        <div class="card-content">
          <div class="row">
            <div class="col s12">
              <h4 class="card-title">Total <br> Checkpoints</h4>
              <i class="fa fa-address-book" aria-hidden="true" style="float:right; margin-top:-64px;"></i>
            </div>
            <div class="col s12 display-flex light-green-text">
            
              <p class="mt-4 ">
                8546</p>
            </div>
          </div>
        </div>
      </div>
    </div>

 <div class="col s12 m6 l3 floatcard">
      <div class="ct-chart card z-depth-2 border-radius-6 getCardSet">
        <div class="card-content">
          <div class="row">
            <div class="col s12">
              <h4 class="card-title">Total <br> Shifts</h4>
              <i class="fa fa-address-book" aria-hidden="true" style="float:right; margin-top:-64px;"></i>
            </div>
            <div class="col s12 display-flex light-green-text">
            
              <p class="mt-4 ">
                8546</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col s12 m6 l3 floatcard">
      <div class="ct-chart card z-depth-2 border-radius-6 getCardSet">
        <div class="card-content">
          <div class="row">
            <div class="col s12">
              <h4 class="card-title">Leave<br> Requests</h4>
              <i class="fa fa-address-book" aria-hidden="true" style="float:right; margin-top:-64px;"></i>
            </div>
            <div class="col s12 display-flex light-green-text">
            
              <p class="mt-4 ">
                8546</p>
            </div>
          </div>
        </div>
      </div>
    </div>









   
    <div class="col s12 m12 l6 ">
      <div class="ct-chart card z-depth-2 border-radius-6 newBox">
        <div class="card-content getjang">
         <img src="{{asset('app-assets/images/icon/Vector.png')}}"><h4 class="card-title langlang"><b>Total Checkpoint</b><br>CHECKPOINTS SUMMARY</h4>
           <img style="float: right;
                margin-top: -46px;" src="{{asset('app-assets/images/icon/claender.png')}}">
        </div>
              <div id="bar-chart-sample" class="center" style="margin-top: -113px;
      padding-bottom: 40px;"></div>
  
      </div>
    </div>



  <div class="col s12 m12 l6">
    
     <div class="card subscriber-list-card animate fadeRight  kangjang">
        <div class="card-content pb-1 ">
           <h4 class="card-title mb-0">Live tracking of guard<i class="material-icons float-right">more_vert</i></h4>
        </div>
        <table class="subscription-table responsive-table highlight">
           <thead>
              <tr>
                 <th>Name</th>
                 <th>Company</th>
                 <th>Start Date</th>
                 <th>Status</th>
                 <th>Amount</th>
                 <th>Action</th>
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

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />


<div class="search-widget" >
  <i class="fa fa-search"></i>
  <input name="name" type="text" placeholder="search">
  
</div>


    <div class="col s12 m12 l6">
      <div class="ct-chart card z-depth-2 border-radius-6">
        <div class="card-content">
          <h4 class="card-title">Tristate chart</h4>
          <div id="profit-tristate" class="center"></div>
        </div>
      </div>
    </div>
    <div class="col s12 m12 l6">
      <div class="ct-chart card z-depth-2 border-radius-6">
        <div class="card-content">
          <div class="row">
            <div class="col s12">
              <h4 class="card-title">Bar Chart</h4>
            </div>
            <div class="col s12">
              <div id="bar-chart-sample" class="center"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col s12 m12 l6">
      <div class="ct-chart card z-depth-2 border-radius-6">
        <div class="card-content">
          <h4 class="card-title">Bar + line composite charts</h4>
          <div id="sales-compositebar" class="center"></div>
        </div>
      </div>
    </div>
    <div class="col s12 m12 l6">
      <div class="ct-chart card z-depth-2 border-radius-6">
        <div class="card-content">
          <div class="row">
            <div class="col s12">
              <h4 class="card-title">Pie Chart</h4>
            </div>
            <div class="col s12">
              <div id="pie-chart-sample" class="center"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div><!-- START RIGHT SIDEBAR NAV -->
            


 
    <!-- END: Page Main-->

@endsection
@section('script-area')
    <script src="{{asset('app-assets/vendors/data-tables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('app-assets/js/search.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/app-contacts.js')}}"></script>

    <script src="{{asset('app-assets/vendors/sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/chartjs/chart.min.js')}}"></script>
@endsection