@extends('layout.panel')
@section('title','Dashboard')
@section('breadcrumb-title','Dashboard')
@section('breadcrumb-backpage','Home')
@section('breadcrumb-currentpage','Dashboard')
@section('content-area')
<div id="card-with-analytics" class="section">
    <div class="row">
    <div class="col s12 m6 l8 card-width">
    <div class="row">
        <div class="col s12 m6 l3 card-width">
            <div class="card border-radius-6">
                <div class="card-content center-align">
                    <h5><b>21.5k</b></h5>
                </div>
            </div>
        </div>
        <div class="col s12 m6 l3 card-width">
            <div class="card border-radius-6">
                <div class="card-content center-align">
                   <h5><b>10.5k</b></h5>
                </div>
            </div>
        </div>
        <div class="col s12 m6 l3 card-width">
            <div class="card border-radius-6">
                <div class="card-content center-align">
                  <h5><b>5.5k</b></h5>
                </div>
            </div>
        </div>
        <div class="col s12 m6 l3 card-width">
            <div class="card border-radius-6">
                <div class="card-content center-align">
                  <h5><b>5.5k</b></h5>
                </div>
            </div>
        </div>
    </div>
</div><!-- START RIGHT SIDEBAR NAV -->
<div class="row">
    <div class="col s6">
<div class="card">
    <canvas id="myChart"></canvas>
  </div>
</div>
<div class="col s6">
  <div class="card">
    <canvas id="mychart2"></canvas>
  </div>
</div>
</div>
  
@endsection
@section('script-area')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.2.1/chart.min.js"></script>
<script>
    const ctx = document.getElementById('myChart');
  
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
          label: '# of Votes',
          data: [12, 19, 3, 5, 2, 3],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });










    const data = {
  labels: [
    'Red',
    'Blue',
    'Yellow'
  ],
  datasets: [{
    label: 'My First Dataset',
    data: [300, 50, 100],
    backgroundColor: [
      'rgb(255, 99, 132)',
      'rgb(54, 162, 235)',
      'rgb(255, 205, 86)'
    ],
    hoverOffset: 4
  }]
};

const config = {
  type: 'doughnut',
  data: data,
};

new Chart($('#mychart2'),config);
  </script>
  
    </div>
    </div>
</div>
@endsection