@extends('layout.panel')
@section('title', 'Property')
@section('breadcrumb')

<style>

.ymodal{

position: fixed !important;
    right: 0 !important;
    left: 0 !important;
    display: none;
    overflow-y: auto !important;
    width: 34% !important;
    max-height: 70% !important;
    margin: auto !important;
    padding: 0 !important;
    border-radius: 8px !important;
    background-color: #fafafa !important;
    will-change: top, opacity !important;

}

</style>


<div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
    <!-- Search for small screen-->
        <div class="container">
          <div class="row">
            <div class="col s10 m6 l6">
              <h5 class="breadcrumbs-title mt-0 mb-0"><span>GreyLock Security Properties</span></h5>
            <br><br>
            </div>

 
            <div class="col s2 m6 l6 mb-2">
            <a class="btn  waves-effect waves-light modal-trigger breadcrumbs-btn right ccbutton"
            href="#modal1"><span
                class="hide-on-small-onl">Create Shift</span></a>    
            </div>
          </div>
</div>
   
</div>


@endsection
@section('content-area')


<div id="modal1" class="ymodal modal">
    <div class="modal-content">
      <h5>Add new shift</h5>
      <input type="text" class="border" style="border-bottom: 2px solid grey;
    height: 0rem !important;
" readonly>
    </div>
                          <form>
          
                              <div class="input-field col s11" >
                               
                                <input type="text" class="form-control " id="property_name" name="name"
                                    value="" >
                                     <label for="property_name">Shift Name</label>
                             </div>
                             

                             <div class="input-field col s6" >
                               
                                <input type="datetime-local" class="form-control " id="property_name" name="name"
                                    value="" >
                                  
                             </div>


                             <div class="input-field col s6" >
                               
                                <input type="datetime-local" class="form-control " id="property_name" name="name"
                                    value="" >
                                     
                             </div>
                          
                       </form>


    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn  ">cancel</a>
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn btn-primary ">next</a>
    </div>
  </div>
 






 <div id="basic-calendar" style="display:none;"></div>

<div class="col s12">
      <div class="card">
        <div class="card-content">
       
            <a class="btn  waves-effect waves-light breadcrumbs-btn "
            href="#"><span
                class="hide-on-small-onl">Add New</span></a>    
            
          <div class="row">
            <div class="col m3 s12">
              <div id='external-events'>
                <h5>Properties</h5>
                <div class="fc-events-container mb-5">
                  <div class='fc-event' >Property 1</div>
                  <div class='fc-event' >Property 2</div>
                  <div class='fc-event' >Property 3</div>
                  <div class='fc-event' >Property 4</div>
                  <div class='fc-event' >Property 5</div>
                  <div class='fc-event' >Property 6</div>
                  <div class='fc-event' >Property 7</div>
                  <p>
                    <label>
                      <input type="checkbox" id="drop-remove" />
                      <span>Remove After Drop</span>
                    </label>
                  </p>
                </div>
              </div>
            </div>
            <div class="col m9 s12">
              <div id='fc-external-drag'></div>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection
@section('script-area')


@endsection