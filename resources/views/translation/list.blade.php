@extends('layout.panel')
@section('title',_('sidebar.transalation'))
@section('breadcrumb-title','Translation')
@section('breadcrumb-backpage','Dashboard')
@section('breadcrumb-currentpage','transalation list')
@section('link-area')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/page-users.css')}}">
@endsection
@section('content-area')
<div class="users-list-table">
    <div class="card">
      <div class="card-content">
        <!-- datatable start -->
        <div class="responsive-table">
          <table id="users-list-datatable" class="table">
            <thead>
              <tr>
                <th></th>
                <th>id</th>
                <th>Language</th>
                <th>Progress</th>
                <th>Done</th>
                <th>Total</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($locales as $loc)
              <tr>
                <td></td>
                <td>{{++$loop->index}}</td>
                <td><a href="page-users-view.html">{{$loc}}</a>
                </td>
                <td>
                  <div class="progress">
                    <div class="determinate" style="width: {{$numTranslations}}%"></div>
                  </div>
                </td>
                <td><span class="chip green lighten-5">
                    <span class="green-text">Active</span>
                  </span>
                </td>
                <td><a href="page-users-edit.html"><i class="material-icons">edit</i></a></td>
                <td><a href="page-users-view.html"><i class="material-icons">remove_red_eye</i></a></td>
              </tr>
              @endforeach
            
             
            </tbody>
          </table>
        </div>
        <!-- datatable ends -->
      </div>
    </div>
  </div>

@endsection
@section('script-area')

<script src="{{asset('app-assets/js/scripts/page-users.js')}}"></script>
@endsection