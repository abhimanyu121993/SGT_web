@extends('layout.panel')
@section('title', 'Property')
@section('breadcrumb')



<style>

    .ddbutton{
        font-size:18px;
        margin-right:5px;
        background-color:white;
        color:black;
    }

</style>


           <div class="col s10 m6 l6" >
              <h3 class="breadcrumbs-title mt-0 mb-0"><span style="color:white;">Leave Request</span></h3>
            <br><br>
            </div>

   <div class="col s10 m6 l6 mt-2 mb-0" style="display:flex; width:auto;" >
             
               <a class="btn  waves-effect waves-light breadcrumbs-btn right ddbutton"
            href="#"><span
                class="hide-on-small-onl">Approve</span></a>   

                  <a class="btn  waves-effect waves-light breadcrumbs-btn right ddbutton"
            href="#"><span
                class="hide-on-small-onl">Pending</span></a>   

                  <a class="btn  waves-effect waves-light breadcrumbs-btn right ddbutton"
            href="#"><span
                class="hide-on-small-onl">Rejected</span></a>   

              

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<div class="searchdibba ddbutton">
  <i class="fa fa-search"style="margin-left: 5px; margin-top:6px;"></i>
  <input class="inputworld" name="name" type="text">
  
</div>

<a class="btn waves-effect waves-light modal-trigger breadcrumbs-btn right ddbutton"
            href="#modal1"><span
                class="hide-on-small-onl">Shift duty to another</span></a>    

            </div>

     


@endsection
@section('content-area')


  <!-- Modal Structure -->
  <div id="modal1" class="xmodal modal">
    <div class="modal-content">
      <h5>Shift Duty To Another Guard</h5>
      <input type="text" class="border" style="border-bottom: 2px solid grey;
    height: 0rem !important;
" readonly>
      <p style="margin-top:-7px;">Add guard details below</p>
    </div>

       
       <form>
      
                            <div class="input-field col s12" style=" display:flex;">
                               
                               <span>SHIFT_1:</span> &nbsp;&nbsp;<input type="text" class="form-control shiftclass" id="property_name" name="name"
                                    value="" >
                                    <!-- <label for="property_name">{{__('property.property_name')}}</label> -->
                            </div>

                              <div class="input-field col s12" >
                               
                                <input type="text" class="form-control " id="property_name" name="name"
                                    value="" >
                                     <label for="property_name">AVAILABLE GUARD</label>
                            </div>


                         <div class="input-field col s12 " style="display:flex;">
                               
                              <span>SHIFT_2:</span> &nbsp;&nbsp;<input type="text" class="form-control shiftclass" id="property_name" name="name"
                                    value="" >
                                    <!-- <label for="property_name">{{__('property.property_name')}}</label> -->
                            </div>


                              <div class="input-field col s12 ">
                               
                                <input type="text" class="form-control" id="property_name" name="name"
                                    value="" >
                                    <label for="property_name">AVAILABLE GUARD</label>
                                   
                            </div>
   <div class="input-field col s12 " style="display:flex;">
                               
                                <span>SHIFT_3:</span> &nbsp;&nbsp; <input type="text" class="form-control shiftclass" id="property_name" name="name"
                                    value="" >
                                    </div>


                            <div class="input-field col s12">
                               
                                <input type="text" class="form-control" id="property_name" name="name"
                                    value="" >
                                      <label for="property_name">AVAILABLE GUARD</label>
                            </div>

                           &nbsp;&nbsp;<input
                               type="checkbox" class="makestyle"/><label for="scales">inactive duties for guard on leave</label>


                 <div class="input-field" style="float:right;">
                               
                                <input type="button" class="form-control btn btn-primary" id="property_name" name="name"
                                    value="Cancel" style="margin-bottom:10px;" >

                                     <input type="button" class="form-control btn btn-light" id="property_name" name="name"
                                    value="Approve" style="margin-bottom:10px;">
                            </div>
                       </form>


    <div class="modal-footer">
     
    </div>
  </div>
 

    <div class="row">
    <div class="col s12">
        <div class="card leavecard">
            <div class="card-content">
                <h4 class="card-title">{{ __('leaveRequest.title') }}
                </h4>
                <div class="row">
                    <div class="col s12">
                        <table id="page-length-option" class="display nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>{{__('leaveRequest.user')}}</th>
                                    <th>{{__('leaveRequest.shift')}}</th>
                                    <th>{{__('leaveRequest.shift1')}}</th>
                                    <th>{{__('leaveRequest.desc')}}</th>
                                    <th>{{__('leaveRequest.apply')}}</th>
                                    <th>{{__('leaveRequest.leaveFrom')}}</th>
                                    <th>{{__('leaveRequest.TillLeave')}}</th>
                                    <th>{{__('leaveRequest.act')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>abhi</td>
                                    <td>Rivi Property</td>
                                    <td>Rivi Property</td>
                                    <td>fsdafgd dtfstgs ffsfd tfwdfef</td>
                                    <td>21/02/2017</td>
                                    <td>21/02/2023</td>
                                    <td>24/02/2023</td>
                                   <td><a href="">view more</a>

                                     <a class="dropdown-trigger" href="#" data-target="3" > 
                                        <i class="material-icons white-text">more_vert</i>
                                       </a>

                                       <ul id="3" class="dropdown-content" tabindex="0">
                                        <li tabindex="0"><a href="#!">
                                            <span class="menu-item" style="color:green !important;">Approved</span>
                                        </a></li>
                                         <li tabindex="0"><a href="#!">
                                            <span class="menu-item" style="color:red !important;">Rejected</span>
                                        </a></li>
                                    </ul>
             
                                 </td>

                                 </tr>

                                  <tr>
                                    <td>abhi</td>
                                    <td>Rivi Property</td>
                                    <td>Rivi Property</td>
                                    <td>fsdafgd dtfstgs ffsfd tfwdfef</td>
                                    <td>21/02/2017</td>
                                    <td>21/02/2023</td>
                                    <td>24/02/2023</td>
                                   <td><a href="">view more</a>
                                     <a class="dropdown-trigger" href="#" data-target="3"> 
                                        <i class="material-icons white-text">more_vert</i>
                                       </a>

                                      <ul id="3" class="dropdown-content" tabindex="0">
                                        <li tabindex="0"><a href="#!">
                                            <span class="menu-item" style="color:green !important;">Approved</span>
                                        </a></li>
                                         <li tabindex="0"><a href="#!">
                                            <span class="menu-item" style="color:red !important;">Rejected</span>
                                        </a></li>
                                    </ul>
             
             
            </td>

                                 </tr>

                                  <tr>
                                    <td>abhi</td>
                                    <td>Rivi Property</td>
                                    <td>Rivi Property</td>
                                    <td>fsdafgd dtfstgs ffsfd tfwdfef</td>
                                    <td>21/02/2017</td>
                                    <td>21/02/2023</td>
                                    <td>24/02/2023</td>
                                    <td><a href="">view more</a>

                                       <a class="dropdown-trigger" href="#" data-target="3"> 
                                        <i class="material-icons white-text">more_vert</i>
                                       </a>

                                    <ul id="3" class="dropdown-content" tabindex="0">
                                        <li tabindex="0"><a href="#!">
                                            <span class="menu-item" style="color:green !important;">Approved</span>
                                        </a></li>
                                         <li tabindex="0"><a href="#!">
                                            <span class="menu-item" style="color:red !important;">Rejected</span>
                                        </a></li>
                                    </ul>
             
                                     </td>

                                 </tr>
                             
                            </tbody>
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



@section('script-area')
