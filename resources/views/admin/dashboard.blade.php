@extends('layout.panel')
@section('title','Dashboard')
@section('breadcrumb-title','Dashboard')
@section('breadcrumb-backpage','Home')
@section('breadcrumb-currentpage','Dashboard')
@section('content-area')
<div class="section">
    <div class="card">
        <div class="card-content">
            <p class="caption mb-0">
                Sample blank page for getting start!! Created and designed by Google, Material
                Design is a design
                language that combines the classic principles of successful design along with
                innovation and
                technology.
            </p>
        </div>
    </div>
</div><!-- START RIGHT SIDEBAR NAV -->
<div>
    <canvas id="myChart"></canvas>
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
  </script>
  
@endsection