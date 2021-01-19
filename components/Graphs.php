<html>
    <head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    </head>
    <body id="graphs">
    <div class="row mt-5">
        <div class="col-6">

        <div class="chart" style="width: 600px; height: 450px;">
<canvas id="bar-chart"></canvas>
</div>
        </div>
        <div class="col-6">
        <div class="chart" style="width: 600px; height: 450px;">
        <canvas id="bar-chart-horizontal"></canvas>
</div>
        </div>
    </div>
    </body>
</html>
<script>
new Chart(document.getElementById("bar-chart"), {
    type: 'bar',
    data: {
      labels: ["2016", "2017", "2018", "2019", "2020"],
      datasets: [
        {
          label: "New Clients",
          backgroundColor: ["pink", "AntiqueWhite","IndianRed","grey","LightCoral"],
          data: [600,1450,2354,1990,3400]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'New Clients',
        
      }
    }
});

new Chart(document.getElementById("bar-chart-horizontal"), {
    type: 'horizontalBar',
    data: {
      labels: ["2016", "2017", "2018", "2019", "2020"],
      datasets: [
        {
          label: "New Houses",
          backgroundColor: ["pink", "AntiqueWhite","IndianRed","grey","LightCoral"],
          data: [1000,2300,3800,900,2890]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'New Houses'
      }
    }
});
</script>
<script src="../assets/js/main.js"></script>