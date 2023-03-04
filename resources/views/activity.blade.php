@extends('layout.panel')
@section('title', 'Activity')
@section('breadcrumb')
<div class="col s10 m6 l6">
    <h5 class="breadcrumbs-title mt-0 mb-0"><span style="color:white;">Activity Log</span></h5>
    <br><br>
</div>
@endsection
@section('content-area')

<style>
</style>
<div class="card" style="height: 100%;">
    <br><br>
    <div class="rt-container" style="margin-top:25px;">
        <div class="col-rt-12">
            <div class="Scriptcontent" style="margin-left: 24px;">

              @foreach($activities as $activity)
                <div class="step">
                    <div>
                        <div class="circle"></div>
                    </div>
                    <div>
                        <div class="title">{{ $activity->subject->name??'' }}  {{ $activity->description ??'' }} {{ $activity->subject->email ??'' }}</div>
                        <span style="float:right; margin-right: 21px;">{{$activity->created_at->diffForHumans()??''}}</span>
                        <div class="caption">updated at {{$activity->created_at->format('d-M-Y H:i:s a') ??''}}</div>

                        <table style="width: 52% !important;border-collapse: unset;" cellspacing="0" cellpadding="5">
                            <thead>
                                <th class="hello">IP ADDRESS</th>
                                <th class="hello">DEVICE TYPE</th>
                                <th class="hello">Browser</th>
                                <th class="hello">Version</th>

                            </thead>
                            <tbody>
                                <tr>
                                    <td class="hello">{{ $activity->getExtraproperty('ip')??''}}</td>
                                    <td class="hello">{{ $activity->getExtraproperty('os')??''}}</td>
                                    <td class="hello">{{ $activity->getExtraproperty('browser') ??''}}</td>
                                    <td class="hello">{{ $activity->getExtraproperty('version') ??''}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <br><br>
</div>


@endsection