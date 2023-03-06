@extends('layout.panel')
@section('title', 'Property')
@section('breadcrumb')
<div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
    <!-- Search for small screen-->
    <div class="container-fluid">
        <div class="row">
            <div class="mx-2">
                <h2 class="breadcrumbs-title mt-0 mb-0 mx-2"><span class="guardstaff" style="">Guard Staff</span></h2>
                <div class="s12 m8 l6 all-guardbtn" >
                <a class=" waves-effect waves-light breadcrumbs-btn   btn mb-5"><i class="material-icons left">clear</i>General</a>
                &nbsp;
                <a class="waves-effect waves-light breadcrumbs-btn  btn mb-5"><i class="material-icons left">clear</i>Maintenance</a>
                &nbsp;
                <a class="waves-effect waves-light  breadcrumbs-btn btn mb-5"><i class="material-icons left">clear</i>  Parking</a>
                &nbsp;
                <a class="waves-effect waves-light  breadcrumbs-btn btn mb-5"><i class="material-icons left ">clear</i> Emergencey</a>
                &nbsp; 
                <a class="waves-effect waves-light  breadcrumbs-btn btn " style="margin-top: -147px;"> Assign Duty</a>
                &nbsp; 
                <a class="waves-effect waves-light  breadcrumbs-btn btn  " style="margin-top: -147px;"> Create Shift</a>
                &nbsp;  
            </div>         
        </div>
        <div class="row mx-2">
              <div class="col s12 m8 l6" style="margin-bottom: 3px;">
                <a class="Propertyview materialize-red-text" >View All</a>
                &nbsp;
                <a class="">Property 1</a>
                &nbsp;
                <a class="">Property 2</a>
                &nbsp;
                <a class="">Property 3</a>
                &nbsp;
            </div>
            &nbsp;   
            <div class="col s12 linewhite">
        </div>
    </div> 
</div>
@endsection
@section('content-area')

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
                                    <th>{{__('guardshift.date')}}</th>
                                    <th>{{__('guardshift.start_time')}}</th>
                                    <th>{{__('guardshift.report_type')}}</th>
                                    <th>{{__('guardshift.activity')}}</th>
                                    <th>Action</th>
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
                              <td>27/2/2023</td>   
                              <td>4:00 pm</td> 
                              <td> parking</td> 
                              <td>Active</td>   
                              <td>pending</td>  
                              </tr> 
                              <tr>
                              <td>1</td>  
                              <td>John Daly</td>  
                              <td>Rivi properties</td>  
                              <td>Rivi properties</td>  
                              <td>Rivi properties</td>  
                              <td>ASDF</td> 
                              <td>27/2/2023</td>   
                              <td>4:00 pm</td> 
                              <td> Maintenance</td> 
                              <td>Active</td>   
                              <td>pending</td>  
                              </tr> 
                              <tr>
                              <td>1</td>  
                              <td>John Daly</td>  
                              <td>Rivi properties</td>  
                              <td>Rivi properties</td>  
                              <td>Rivi properties</td>  
                              <td>ASDF</td> 
                              <td>27/2/2023</td>   
                              <td>4:00 pm</td> 
                              <td> General</td> 
                              <td>Active</td>   
                              <td>pending</td>  
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