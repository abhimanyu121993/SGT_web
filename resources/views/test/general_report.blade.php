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
          <div class="col s12 m4 l8">
            <div class="row">
            <div class="col s12 m6 l3 floatcard">
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
                9504</p>
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
                9504</p>
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
                9504</p>
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
                9504</p>
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
                9504</p>
                </div>
                </div>
                </div>
                </div>
      </div>
      <a class="btn btn-light  waves-effect waves-light breadcrumbs-btn right modal-trigger addGuard" style="margin-top: 68px;"><span class="hide-on-small-onl">Export</span></a>
      </div>         
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
    <a class="btn btn-light  waves-effect waves-light breadcrumbs-btn  modal-trigger addGuard" style="background:white;color:navy;"><i class="material-icons left">clear</i><span class="hide-on-small-onl">Filter</span></a>
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
<a class='dropdown-trigger btn ' href='#' data-target='dropdown1' style="margin-left: 50px;width:250px;  ">Report!</a>
  <!-- Dropdown Structure -->
  <ul id='dropdown1' class='dropdown-content'>
  <li><a href="#!"><i class="material-icons">check_box</i>General Report</a></li>
  <li><a href="#!"><i class="material-icons">check_box</i>Maintenance Report</a></li>
  <li><a href="#!"><i class="material-icons">check_box</i>Parking Report</a></li>
  <li><a href="#!"><i class="material-icons">check_box</i>Emergency Report</a></li>
  </ul>
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
@endsection
@section('script-area')

@endsection