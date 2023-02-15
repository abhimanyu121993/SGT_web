@extends('layout.panel')
@section('title', 'Property')
@section('breadcrumb-title', 'Property')
@section('breadcrumb-backpage', 'Property')
@section('breadcrumb-currentpage', 'Manage Property')
@section('link-area')

@endsection
@section('content-area')
<div class="card-content">
    <div id="work-collections" class="seaction">
        <div class="row">
            <div class="col s12 m12 xl4">
                <div class="card">
                    <div class="card-content dark-text">
                        <span class="card-title">Total Guards</span>
                        <p>
                            Guards in this property.
                        </p>
                        <span class="card-title">15</span>

                    </div>
                    <div class="card-action">
                        <a href="#!" class="lime-text text-accent-1">This is a link</a>
                        <a href="#!" class="lime-text text-accent-1">This is a link</a>
                    </div>
                </div>
            </div>
            <div class="col s12 m12 xl4">
                <div class="card">
                    <div class="card-content dark-text">
                        <span class="card-title">Missed Shifts</span>
                        <p>
                            Shift missed in this property.
                        </p>
                        <span class="card-title">3</span>

                    </div>
                    <div class="card-action">
                        <a href="#!" class="lime-text text-accent-1">This is a link</a>
                        <a href="#!" class="lime-text text-accent-1">This is a link</a>
                    </div>
                </div>
            </div>
            <div class="col s12 m12 xl4">
                <div class="card">
                    <div class="card-content dark-text">
                        <span class="card-title">Total Reports</span>
                        <p>
                            Incident Reported.
                        </p>
                        <span class="card-title">100</span>

                    </div>
                    <div class="card-action">
                        <a href="#!" class="lime-text text-accent-1">This is a link</a>
                        <a href="#!" class="lime-text text-accent-1">This is a link</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="card-content">
    <div id="work-collections" class="seaction">
        <div class="row">
            <div class="col s12 m12 xl5">
                <div class="card">
                    <div class="card-content dark-text">
                        <span class="card-title">Missed Shifts</span>
                        <p>
                            Shift missed in this property.
                        </p>
                        <span class="card-title">3</span>

                    </div>
                    <div class="card-action">
                        <a href="#!" class="lime-text text-accent-1">This is a link</a>
                        <a href="#!" class="lime-text text-accent-1">This is a link</a>
                    </div>
                </div>
            </div>
            <div class="col s12 m12 xl7">
                <div class="card">
                <div class="card-content">
        <h4 class="card-title mb-0 flex-grow-1" id="h1">{{__('property.guards_on_duty')}}</h4>
        <table class="table table-nowrap container" id="example">
            <thead>
                <tr>
                    <th scope="col">{{__('security_guard.name')}}</th>
                    <th scope="col"></th>
                    <th scope="col">{{__('security_guard.name')}}</th>
                    <th scope="col">{{__('security_guard.property')}}</th>
                    <th scope="col">{{__('security_guard.date')}}</th>
                    <th scope="col">{{__('security_guard.time')}}</th>
                    <th scope="col">{{__('security_guard.route')}}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td> <img src="" height="50px"alt="" class="circle" /></td>
                    <td>uguigol</td>
                    <td><td>
                    <td>464</td>
                    <td>jhiuhou</td>

                            <td>
                            

                    </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
                </div>
            </div>

        </div>
    </div>
</div>


@endsection
@section('script-area')
@endsection