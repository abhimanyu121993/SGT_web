@extends('layout.panel')
@section('title', 'Property')
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
              <h4 class="card-title ">Total <br> Manager</h4>
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
  </div>
   





    <div class="col s6 m4 12">
      <div id="basic-form" class="card card card-default scrollspy">
        <div class="card-content getjang">
           <img src="{{asset('app-assets/images/icon/Vector.png')}}"><h4 class="card-title langlang"><b>Total Checkpoint</b><br>CHECKPOINTS SUMMARY</h4>
           <img style="float: right;
                margin-top: -46px;" src="{{asset('app-assets/images/icon/claender.png')}}">
        </div>
          <div id="bar-chart-sample" class="center" style="margin-top: -113px;
      padding-bottom: 40px;"></div>
      </div>
    </div>


    <!-- Form with placeholder -->
    <div class="col s16 m8 12">
      <div id="placeholder" class="card card card-default scrollspy">
        <div class="card-content">
  <h4 class="card-title mb-0">Live tracking of guard<i class="material-icons float-right">more_vert</i></h4>
         
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



   

                  
                           <div class="new-area content-right">
                           <div class="app-wrapper">

                            <div class="datatable-search">
                                <i class="material-icons mr-2 search-icon">search</i>
                                <input type="text" placeholder="Search Contact" class="app-filter oldbox" id="global_filter">
                            </div>

                          </div>
                        </div>



      <a class="btn waves-effect newlightbutton waves-light breadcrumbs-btn right" href="#!" ><i class="material-icons hide-on-med-and-up">settings</i><span class="hide-on-small-onl" style="color:black">Filter</span></a>

        <a class="btn waves-effect Xnewlightbutton waves-light breadcrumbs-btn right" href="#!" ><i class="material-icons hide-on-med-and-up">settings</i><span class="hide-on-small-onl" style="color:black;">Sort</span></a>

        <br><br>


      <div class="belowsideOption">

       
 

        <a class="btn waves-effect waves-light breadcrumbs-btn right" href="#!" ><i class="material-icons hide-on-med-and-up">settings</i><span class="hide-on-small-onl" style="color:black;">Completed</span></a>
       

         <a class="btn waves-effect waves-light breadcrumbs-btn right" href="#!" ><i class="material-icons hide-on-med-and-up">settings</i><span class="hide-on-small-onl" style="color:black;">Upcoming</span></a>



          <a class="btn waves-effect waves-light breadcrumbs-btn right" href="#!" ><i class="material-icons hide-on-med-and-up">settings</i><span class="hide-on-small-onl" style="color:black;">Missed</span></a>

    

           <a class="btn waves-effect waves-light breadcrumbs-btn right" href="#!" ><i class="material-icons hide-on-med-and-up">settings</i><span class="hide-on-small-onl" style="color:black;">In-progress</span></a>

      </div>
    <br><br>


    <div class="newFloat">
 
      <a class="btn waves-effect waves-light breadcrumbs-btn right" href="#!" ><i class="material-icons hide-on-med-and-up">settings</i><span class="hide-on-small-onl" style="color:black">Shifts</span></a>

       <br>
 

    <a class="btn waves-effect waves-light breadcrumbs-btn right" href="#!" ><i class="material-icons hide-on-med-and-up">settings</i><span class="hide-on-small-onl" style="color:black;">Completed</span></a>

     <br>
       

      <a class="btn waves-effect waves-light breadcrumbs-btn right" href="#!" ><i class="material-icons hide-on-med-and-up">settings</i><span class="hide-on-small-onl" style="color:black;">Upcoming</span></a>
  <br>


    <a class="btn waves-effect waves-light breadcrumbs-btn right" href="#!" ><i class="material-icons hide-on-med-and-up">settings</i><span class="hide-on-small-onl" style="color:black;">Missed</span></a>
  
   <br>
    

    <a class="btn waves-effect waves-light breadcrumbs-btn right" href="#!" ><i class="material-icons hide-on-med-and-up">settings</i><span class="hide-on-small-onl" style="color:black;">In-progress</span></a>

</div>











 <div class="col s16 m7 12">
      <div id="placeholder" class="card card card-default scrollspy">
        <div class="card-content">
  <h4 class="card-title mb-0">Live tracking of guard<i class="material-icons float-right">more_vert</i></h4>
         
         <table class="subscription-table responsive-table highlight">
           <thead style="background-color: #3f51b5;color:black; ">
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

  <div class="col s6 m3 12" style="float:right;margin-left: -27px;">
      <div id="basic-form" class="card card card-default scrollspy">
        <div class="card-content ">
          Share on Twitter Share via Email Download PDF In the pursuit of wisdom, executives may find themselves taking off their masks to become truly authentic and reflective leaders. “I cannot teach anyone anything, I can only make them think.” - Socrates The day after becoming the CEO of a company facing turbulent times, David had a dream. In it, while walking on a 
        </div>
         
      </div>
   
      <div id="basic-form" class="card card card-default scrollspy">
        <div class="card-content">
          Share on Twitter Share via Email Download PDF In the pursuit of wisdom, executives may find themselves taking off their masks to become truly authentic and reflective leaders. “I cannot teach anyone anything, I can only make them think.” - Socrates The day after becoming the CEO of a company facing turbulent times, David had a dream. In it, while walking on a 
        </div>
        
      </div>
    </div>
















    <!-- <div class="col s12 m12 l6 classessmonster">


      <div class="ct-chart card z-depth-2 border-radius-6  bigsizemake">
        <div class="card-content">
         
<table id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
               
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                
            </tr>
            <tr>
                <td>Garrett Winters</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>63</td>
        
      
            </tr>
            <tr>
                <td>Ashton Cox</td>
                <td>Junior Technical Author</td>
                <td>San Francisco</td>
                <td>66</td>
        
     
            </tr>
            <tr>
                <td>Cedric Kelly</td>
                <td>Senior Javascript Developer</td>
                <td>Edinburgh</td>
                <td>22</td>
        
      
            </tr>
            <tr>
                <td>Airi Satou</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>33</td>
        
      
            </tr>
            <tr>
                <td>Brielle Williamson</td>
                <td>Integration Specialist</td>
                <td>New York</td>
                <td>61</td>
        
      
            </tr>
            <tr>
                <td>Herrod Chandler</td>
                <td>Sales Assistant</td>
                <td>San Francisco</td>
                <td>59</td>
      
    
            </tr>
            <tr>
                <td>Rhona Davidson</td>
                <td>Integration Specialist</td>
                <td>Tokyo</td>
                <td>55</td>
      
    
            </tr>
            <tr>
                <td>Colleen Hurst</td>
                <td>Javascript Developer</td>
                <td>San Francisco</td>
                <td>39</td>
      
    
            </tr>
            <tr>
                <td>Sonya Frost</td>
                <td>Software Engineer</td>
                <td>Edinburgh</td>
                <td>23</td>
      
    
            </tr>
            <tr>
                <td>Jena Gaines</td>
                <td>Office Manager</td>
                <td>London</td>
                <td>30</td>
      
    
            </tr>
            <tr>
                <td>Quinn Flynn</td>
                <td>Support Lead</td>
                <td>Edinburgh</td>
                <td>22</td>
      
    
            </tr>
            <tr>
                <td>Charde Marshall</td>
                <td>Regional Director</td>
                <td>San Francisco</td>
                <td>36</td>
      
    
            </tr>
            <tr>
                <td>Haley Kennedy</td>
                <td>Senior Marketing Designer</td>
                <td>London</td>
                <td>43</td>
      
    
            </tr>
            <tr>
                <td>Tatyana Fitzpatrick</td>
                <td>Regional Director</td>
                <td>London</td>
                <td>19</td>
      
    
            </tr>
            <tr>
                <td>Michael Silva</td>
                <td>Marketing Designer</td>
                <td>London</td>
                <td>66</td>
      
    
            </tr>
            <tr>
                <td>Paul Byrd</td>
                <td>Chief Financial Officer (CFO)</td>
                <td>New York</td>
                <td>64</td>
      
    
            </tr>
            <tr>
                <td>Gloria Little</td>
                <td>Systems Administrator</td>
                <td>New York</td>
           
            </tr>
          
        </tbody>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
    

            </tr>
        </tfoot>
    </table>


        </div>
      </div>
    </div>

















   
   <div class="sidecard" style="display:grid;">

    <div class="col s12 m12 l6 classesdino">
      <div class="ct-chart card z-depth-2 border-radius-6">
        <div class="card-content">
          <div class="row">
            <div class="col s12">
              <h4 class="card-title">Reports</h4>
            </div>
           

Share on Twitter
Share via Email
Download PDF
In the pursuit of wisdom, executives may find themselves taking off their masks to become truly authentic and reflective leaders.
“I cannot teach anyone anything, I can only make them think.” - Socrates

The day after becoming the CEO of a company facing turbulent times, David had a dream. In it, while walking on a beach he discovered a bottle. On opening, a genie appeared offering him a wish in exchange for her freedom. Eschewing riches, fame or a long life, David opted for the one thing he knew he needed to help him guide his people in the best way possible. He chose the gift of wisdom. -->



          </div>
        </div>
      </div>
    </div>




<!-- 
    <div class="col s12 m12 l6 smallclassesdino">
      <div class="ct-chart card z-depth-2 border-radius-6">
        <div class="card-content">
          <h4 class="card-title">Activity Log</h4>
          <div id="sales-compositebar" class="center"></div>


          Share on Twitter
Share via Email
Download PDF
In the pursuit of wisdom, executives may find themselves taking off their masks to become truly authentic and reflective leaders.
“I cannot teach anyone anything, I can only make them think.” - Socrates

The day after becoming the CEO of a company facing turbulent times, David had a dream. In it, while walking on a beach he discovered a bottle. On opening, a genie appeared offering him a wish in exchange for her freedom. Eschewing riches, fame or a long life, David opted for the one thing he knew he needed to help him guide his people in the best way possible. He chose the gift of wisdom.
        </div>


      </div>
    </div>
 -->

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

    <script>
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );

    </script>
@endsection