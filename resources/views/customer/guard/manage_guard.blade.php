@extends('layout.panel')
@section('title', 'Guard')
@section('breadcrumb')
<div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
    <!-- Search for small screen-->
    <div class="container">
        <div class="row">
            <div class="col s10 m6 l6">
                <h5 class="breadcrumbs-title mt-0 mb-0"><span>Guard</span></h5>
            </div>
            <div class="col s2 m6 l6 mb-2"><a class="btn btn-light  waves-effect waves-light breadcrumbs-btn right modal-trigger addGuard" data-url="{{route('customer.secuirty-guard.index') }}"><span class="hide-on-small-onl">Add Guard</span></a></div>
        </div>
        <div class="col s2 m6 l6 mb-2"><a class="btn btn-light  waves-effect waves-light breadcrumbs-btn right modal-trigger addGuard" data-url="{{route('customer.guard-duty.index') }}"><span class="hide-on-small-onl">Add Duty</span></a></div>
        </div>
    </div>
</div>
@endsection
@section('link-area')

<link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/dashboard.css">


@endsection
@section('content-area')


<div id="card-with-analytics" class="section">
    <div class="row">
        <div class="col s12 m6 l3 card-width">
            <div class="card border-radius-6">
                <div class="card-content center-align">
                    <h6><b>{{__('security_guard.total_guard')}}</b></h6>
                    <h6 class="m-0"><b>21.5k</b></h6>
                </div>
            </div>
        </div>
        <div class="col s12 m6 l3 card-width">
            <div class="card border-radius-6">
                <div class="card-content center-align">
                    <h6><b>{{__('security_guard.active_guard')}}</b></h6>
                    <h6 class="m-0"><b>21.5k</b></h6>
                </div>
            </div>
        </div>
        <div class="col s12 m6 l3 card-width">
            <div class="card border-radius-6">
                <div class="card-content center-align">
                    <h6><b>{{__('security_guard.inactive_guard')}}</b></h6>
                    <h6 class="m-0"><b>21.5k</b></h6>
                </div>
            </div>
        </div>
        <div class="col s12 m6 l3 card-width">
            <div class="card border-radius-6">
                <div class="card-content center-align">
                    <h6><b>{{__('security_guard.guard_on_leave')}}</b></h6>
                    <h6 class="m-0"><b>21.5k</b></h6>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                <h4 class="card-title">{{__('security_guard.user_activity')}}</h4>
                <div class="row">
                    <div class="col s12">
                    <table id="page-length-option" class="display nowrap" style="width:100%">
                            <thead>

                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">{{__('security_guard.username')}}</th>
                                    <th scope="col">{{__('security_guard.country')}}</th>
                                    <th scope="col">{{__('security_guard.state')}}</th>
                                    <th scope="col">{{__('security_guard.city')}}</th>
                                    <th scope="col">{{__('security_guard.email')}}</th>
                                    <th scope="col">{{__('security_guard.total_report')}}</th>
                                    <th scope="col">{{__('security_guard.shift_completed')}}</th>
                                    <th scope="col">{{__('security_guard.shift_missed')}}</th>
                                    <th scope="col">{{__('security_guard.ip_address')}}</th>
                                    <th scope="col">{{__('security_guard.media')}}</th>
                                    <th scope="col">{{__('security_guard.role')}}</th>
                                    <th scope="col">{{__('security_guard.property')}}</th>
                                    <th scope="col">{{__('security_guard.phone')}}</th>
                                    <th scope="col">{{__('security_guard.joined')}}</th>
                                    <th scope="col">{{__('security_guard.last_login')}}</th>
                                    <th scope="col">{{__('security_guard.verify')}}</th>
                                    <th scope="col">{{__('security_guard.status')}}</th>
                                    <th scope="col">{{__('security_guard.activity')}}</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($guards as $data)
                                <tr>
                                    <td> <img src="{{ asset('storage/'.$data->images) }}" height="50px" alt="" class="circle" /></td>
                                    <td>{{ $data->name??'' }}</td>
                                    <td>{{$data->country->name??''}}</td>
                                    <td>{{$data->state->name??''}}</td>
                                    <td>{{$data->city->name??''}}</td>
                                    <td><a href="{{ route(Helper::getGuard().'.secuirty-guard.show', Crypt::encrypt($data->id)) }}">{{ $data->email??''}}</a></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>{{ $data->property->name??''}}</td>
                                    <td>{{ $data->phone??''}}</td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                     @if($data->verify?? '')
                                    <button class="btn btn-success verifybtnyes">Yes</button>
                                    @else
                                    <button class="btn btn-danger verifybtnno">No</button>
                                    @endif
                                    </td>

                                    <td>
                                        <div class="input-group">
                                            <select class="browser-default status" id="" data="{{ $data->id }}" name="status">
                                                @foreach ($status as $st)
                                                <option value="{{ $st->id }}" {{ $data->status }} @selected($data->status == $st->id)>{{ $st->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </td>
<<<<<<< Updated upstream
                                    <td><a href="{{route(Session::get('guard').'.activity.guard-activity',Crypt::encrypt($data->id))}}" class=""><i class="material-icons left">visibility</i></a></td>

=======
                                   
>>>>>>> Stashed changes
                                    <td>
                                        <div class="dropdown">
                                            <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ri-more-2-fill"></i>
                                            </a>
                                            @php $bid=Crypt::encrypt($data->id); @endphp
                                               <a id="pop" class="dropdown-item" href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $bid }}').submit();">
                                                        <i class="material-icons danger red-text text-accent-4">delete</i>
                                                    </a>
                                                
                                                <form id="delete-form-{{ $bid }}" action="{{ route(Helper::getGuard().'.secuirty-guard.destroy', $bid) }}" method="post" style="display: none;">
                                                    @method('DELETE')
                                                    @csrf
                                                </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<div id="modal1" style="border-radius: 8px;" class="modal modal-fixed-footer">
</div>

@endsection
@section('script-area')
<script>
    $(document).ready(function() {
        $(document).on('change', '.status', function() {
            var guard_id = $(this).attr("data");
            $(this).find("option:selected").each(function() {
                var status_id = $(this).val();
                var newurl = "{{ route('customer.security-guard.status') }}";
                $.ajax({
                    url: newurl,
                    method: 'post',
                    data: {
                        '_token': "{{ csrf_token() }}",
                        'guard_id': guard_id,
                        'status_id': status_id
                    },
                    success: function(p) {

                    }
                });
            });
        }).change();
    });
</script>

<script>
    $(document).ready(function() {
        $(document).on('click', '.addGuard', function() {
            $.ajax({
                url: $(this).data('url'),
                method: 'get',
                success: function(data) {
                    console.log(data);
                    $('#modal1').html(data);
                    $('#modal1').modal('open');
                }
            });
        });
    });



</script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->

<script src="{{asset('app-assets/vendors/data-tables/js/jquery.dataTables.min.js') }}"></script>

<link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/pepper-grinder/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="https://cdn.rawgit.com/dubrox/Multiple-Dates-Picker-for-jQuery-UI/master/jquery-ui.multidatespicker.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdn.rawgit.com/dubrox/Multiple-Dates-Picker-for-jQuery-UI/master/jquery-ui.multidatespicker.js"></script>

<table id="table-data" border="1"></table>


<script>

var arr = [];

function removeRow(r) {
  var index = arr.indexOf(r);
  if (index > -1) {
    arr.splice(index, 1);
  }
}
$('#multiple-date-select').multiDatesPicker({
  onSelect: function(datetext) {
    let table = $('#table-data');
    let rowLast = table.data('lastrow');
    let rowNext = rowLast + 1;
    let r = table.find('tr').filter(function() {
      return ($(this).data('date') == datetext);
    }).eq(0);
    // a little redundant checking both here 
    if (!!r.length && arr.includes(datetext)) {
      removeRow(datetext);
      r.remove();
    } else {
      // not found so add it
      let col = $('<td></td>').html(datetext);
      let row = $('<tr></tr>');
      row.data('date', datetext);
      row.attr('id', 'newrow' + rowNext);
      row.append(col).appendTo(table);
      table.data('lastrow', rowNext);
      arr.push(datetext);
    }
  }
});
// set start, first row will be 0 could be in markup
$('#table-data').data('lastrow', -1);


</script>
<!-- END THEME  JS-->
<!-- BEGIN PAGE LEVEL JS-->
@endsection