@extends('admin.app')
@section('content')
  <div class="container">
    <div class="card">
      <div class="card-body"><x-filters /></div>
    </div>
    <div class="card">
      <div class="card-body">
        <canvas id="chart_revenue" width="800px" height="400px"></canvas>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script>
    let chart;
    function getData() {
      $.ajax({
        url: 'admin/revenue',
        method: 'GET',
        dataType: 'json',
        data: {
          'from': $('#from').val(),
          'to': $('#to').val(),
        },
        success: function(response) {
          console.log(response);
          const ctx = document.getElementById('chart_revenue').getContext('2d');
          if (chart) {
            chart.destroy();
          }
          const labels= response.labels;
          const data= response.data;
          chart = new Chart(ctx, {
            type: 'bar',
            data: {
              labels: labels,
              datasets: [{
                label: `Doanh thu từ ${$("#from").val()} đến ${$("#to").val()}`,
                data: data,
                fill: false,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
              }]
            },
            options: {
              responsive: true,
              maintainAspectRatio: false,
              scales: {
                y: {
                  beginAtZero: true,
                }
              }
            }
          })
        },
        error: function(error) {
          console.log(error);
        }
      });
    }
  </script>
@endsection
