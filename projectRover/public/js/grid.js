let roverChart = new Chart('myChart', {
    type: 'scatter',
    plugins:[{
      beforeDraw: chart => {
        var xAxis = chart.scales['x-axis-1'];
        var yAxis = chart.scales['y-axis-1'];
        const scales = chart.chart.config.options.scales;
        scales.xAxes[0].ticks.padding = yAxis.top - yAxis.getPixelForValue(0) + 6;
        scales.yAxes[0].ticks.padding = xAxis.getPixelForValue(0) - xAxis.right + 6;
      }
    }],
    data: {
      datasets: [{
        label: 'Rover Location',
        data: [{x:0,y:0}],
        borderColor: 'red'
      }]
    },
    options: {
      scales: {
        xAxes: [{
          ticks: {
            min: -10,
            max: 10,
            stepSize: 1,
            callback: v => v == 0 ? '' : v
          },
          gridLines: {
            drawTicks: false
          }        
        }],
        yAxes: [{
          ticks: {
            min: -10,
            max: 10,
            stepSize: 1,
            callback: v => v == 0 ? '' : v
          },
          gridLines: {
            drawTicks: false
          } 
        }]
      }
    }
  });