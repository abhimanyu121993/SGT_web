@extends('layout.panel')
@section('title', 'Manage Checkpoint')
@section('breadcrumb')
<div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
    <!-- Search for small screen-->
    <div class="container">
        <div class="row">
            <div class="col s10 m5 l5">
                <h5 class="breadcrumbs-title mt-0 mb-0"><span>Manage Checkpoint</span></h5>
            </div>
            <div class="row m7 mb-2">
          <div class="col s3"><a class="btn  waves-effect waves-light breadcrumbs-btn right modal-trigger"
            href="{{ route(Helper::getGuard() . '.property.add-checkpoint', Crypt::encrypt($property_id)) }}"><span
                class="hide-on-small-onl">Add Checkpoint</span></a></div>
          <div class="col s2"><a class="btn  waves-effect waves-light breadcrumbs-btn right modal-trigger modal1"
            data-url="{{ route(Helper::getGuard() . '.route.show', $property_id) }}"><span class="hide-on-small-onl">Add
                Route</span></a></div>
          <div class="col s2"><a class="btn  waves-effect waves-light breadcrumbs-btn right modal-trigger modal1"
            data-url="{{ route(Helper::getGuard() . '.shift.show', $property_id) }}"><span class="hide-on-small-onl">Add
                Shift</span></a></div>

            </div>
        </div>
    </div>
</div>
@endsection
@section('link-area')

    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/chartist-js/chartist.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/chartist-js/chartist-plugin-tooltip.css') }}">
@endsection
@section('content-area')
    <section>
        <div class="row">
            <div class="col m4">
                <div class="card">
                    <div class="card-content">
                        <div class="row">
                            <div class="col s3 orange-text deep-purple lighten-4">
                                <i class="material-icons medium">texture</i>

                            </div>
                            <div class="col s9">
                                <b style="color:black;font-size:20px">Successful</b>
                                <p class="small">Successful Scanned Checkpoints</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                        <div class="current-balance-container">
                            <div id="current-balance-donut-chart" class="current-balance-shadow">

                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col m4">
                <div class="card">
                    <div class="card-content">
                        <div class="row">
                            <div class="col s3 orange-text deep-purple lighten-4">
                                <i class="material-icons medium">texture</i>

                            </div>
                            <div class="col s9">
                                <b style="color:black;font-size:20px">Successful</b>
                                <p class="small">Successful Scanned Checkpoints</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                        <div class="current-balance-container">
                            <div id="current-balance-donut-chart-a" class="current-balance-shadow">

                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div> <div class="col m4">
                <div class="card">
                    <div class="card-content">
                        <div class="row">
                            <div class="col s3 orange-text deep-purple lighten-4">
                                <i class="material-icons medium">texture</i>

                            </div>
                            <div class="col s9">
                                <b style="color:black;font-size:20px">Successful</b>
                                <p class="small">Successful Scanned Checkpoints</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                        <div class="current-balance-container">
                            <div id="current-balance-donut-chart-b" class="current-balance-shadow">

                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   
    <div>
        <div id="address-map-container" style="width:100%;height:400px; ">
            <div style="width: 100%; height: 100%" id="address-map"></div>
        </div>
    </div>
    <div class="container">
        <div class="modal-content">
            <h5>{{ __('checkpoint.manage') }}</h5>
            <div class="card border-radius-6">
                <div class="card-content">

                    {{-- <table class="table table-nowrap container" id="example">
                        <thead>
                            <tr>
                                <th scope="col">{{ __('checkpoint.sr_no') }}</th>
                                <th scope="col"></th>
                                <th scope="col">{{ __('checkpoint.name') }}</th>
                                <th scope="col">{{ __('checkpoint.file') }}</th>
                                <th scope="col">{{ __('checkpoint.color') }}</th>
                                <th scope="col">{{ __('checkpoint.desc') }}</th>
                                <th scope="col">{{ __('checkpoint.is_active') }}</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($checkpoints as $data)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <th>{{ QrCode::size(50)->generate($data->checkpoint_id) }}</th>
                                    <td>{{ $data->name ?? '' }}</td>
                                    <td> <img src="{{ asset($data->file) }}" height="50px"alt="" class="square" />
                                    </td>
                                    <td>{{ $data->color ?? '' }}</td>
                                    <td>{{ $data->desc ?? '' }}</td>
                                    <td>
                                        <div class="input-group">
                                            <select class="browser-default status" id=""
                                                data="{{ $data->id }}" name="status">
                                                @foreach ($status as $st)
                                                    <option value="{{ $st->id }}" {{ $data->status_id }}
                                                        @selected($data->status_id == $st->id)>{{ $st->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="ri-more-2-fill"></i>
                                            </a>
                                            @php $bid=Crypt::encrypt($data->id); @endphp
                                            <ul >
                                                <li><a id="pop" class="dropdown-item modal1"
                                                        data-url="{{ route(Session::get('guard') . '.checkpoint.edit', $bid) }}">
                                                        <i class="material-icons light-blue-text text-darken-4">edit</i>
                                                    </a></li>
                                                <li><a id="pop" class="dropdown-item" href="#"
                                                        onclick="event.preventDefault();document.getElementById('delete-form-{{ $bid }}').submit();">
                                                        <i class="material-icons danger red-text text-accent-4">delete</i>
                                                    </a>
                                                </li>
                                            </ul>
                                                <form id="delete-form-{{ $bid }}"
                                                    action="{{ route(Helper::getGuard() . '.checkpoint.destroy', $bid) }}"
                                                    method="post" style="display: none;">
                                                    @method('DELETE')
                                                    @csrf
                                                </form>
                                           
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                           
                        </tbody>
                    </table> --}}
                    @foreach ($checkpoints as $chk)
                    <ul class="collapsible collapsible-accordion">
                        <li>
                            <div class="collapsible-header">{{ QrCode::size(50)->generate($chk->checkpoint_id) }} <span class="ml-2">{{$chk->name}}</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span class="right">long- {{$chk->longitude}} , lat-{{$chk->lattitude}}</span>
                            </div>
                            <div class="collapsible-body">
                              
                            </div>
                        </li>
                    </ul>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

 
    <div id="modal1" class="modal xmodal modal-fixed-footer" style="width:30% !important;">

    </div>

@endsection
@section('script-area')
    <script>
        function initialize() {
            initmap({{ $property->lattitude }}, {{ $property->longitude }}, "{{ $property->name }}");
        }
    </script>
    <script src="{{ asset('app-assets/js/checkpointMap.js') }}"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize"
        async defer></script>
    <script>
        $(document).ready(function() {
            var a = $('input#address').characterCounter();
            console.log(a);
        });
    </script>
    <script></script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '.modal1', function() {
                $.ajax({
                    url: $(this).data('url'),
                    method: 'get',
                    success: function(data) {

                        $('#modal1').html(data);
                        $('#modal1').modal();
                        $('#modal1').modal('open');

                    }
                });
            });
        });
    </script>






    <script src="{{ asset('app-assets/vendors/chartjs/chart.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/chartist-js/chartist.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/chartist-js/chartist-plugin-tooltip.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/chartist-js/chartist-plugin-fill-donut.min.js') }}"></script>
    {{--<script src="{{asset('app-assets/js/scripts/dashboard-modern.js')}}"></script> --}}
    <script>
        $(document).ready(function() {
            new Chartist.Pie("#current-balance-donut-chart", {
                labels: [1, 2],
                series: [{
                    meta: "Completed",
                    value: 80
                }, {
                    meta: "Remaining",
                    value: 20
                }]
            }, {
                donut: !0,
                donutWidth: 8,
                showLabel: !1,
                plugins: [Chartist.plugins.tooltip({
                    class: "current-balance-tooltip",
                    appendToBody: !0
                }), Chartist.plugins.fillDonut({
                    items: [{
                        content: '<p class="small">Balance</p><h5 class="mt-0 mb-0">$ 10k</h5>'
                    }]
                })]
            });


            // send 
            new Chartist.Pie("#current-balance-donut-chart-a", {
                labels: [1, 2],
                series: [{
                    meta: "Completed",
                    value: 80
                }, {
                    meta: "Remaining",
                    value: 20
                }]
            }, {
                donut: !0,
                donutWidth: 8,
                showLabel: !1,
                plugins: [Chartist.plugins.tooltip({
                    class: "current-balance-tooltip",
                    appendToBody: !0
                }), Chartist.plugins.fillDonut({
                    items: [{
                        content: '<p class="small">Balance</p><h5 class="mt-0 mb-0">$ 10k</h5>'
                    }]
                })]
            });
            new Chartist.Pie("#current-balance-donut-chart-b", {
                labels: [1, 2],
                series: [{
                    meta: "Completed",
                    value: 80
                }, {
                    meta: "Remaining",
                    value: 20
                }]
            }, {
                donut: !0,
                donutWidth: 8,
                showLabel: !1,
                plugins: [Chartist.plugins.tooltip({
                    class: "current-balance-tooltip",
                    appendToBody: !0
                }), Chartist.plugins.fillDonut({
                    items: [{
                        content: '<p class="small">Balance</p><h5 class="mt-0 mb-0">$ 10k</h5>'
                    }]
                })]
            });
        });
    </script>

@endsection
