<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    {{-- compiled styles (laravel mix) --}}
    {{-- <link rel="stylesheet" type="text/css" href="{{ mix('/css/app.css') }}"> --}}

    {{-- vectorjs styles (the lib we use to display and control the grid) --}}
    <link rel="stylesheet" href="https://vectorjs.org/library.css">

    <title>Rover</title>
  </head>
  <body>

    <header>
      <div>
          <!-- No surplus words or unnecessary actions. - Marcus Aurelius -->
          <nav class="navbar navbar-expand navbar-dark bg-dark">
              <a class="navbar-brand" href="#">Rover Explorer</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>
          </nav>
      </div>
  </header>

  <div class="container-fluid">

      <div class="row">
          
          <main role="main" class="col-md-8 ml-sm-auto pt-3 px-4">
              <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                  <h1 class="h2">The Grid</h1>
              </div>

              <div class="my-4" style="position:relative">
                <div class="chart-container" style="position: relative">
                  <canvas id="myChart"></canvas>
                </div>
              </div>

              <h2>Location</h2>
              
              <div class="card mt-4" style="width: 18rem;">
                <div class="card-header">
                  Rover Location
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">Rover Position X: <span id="locationx"></span></li>
                  <li class="list-group-item">Rover Position Y: <span id="locationy"></span></li>
                  <li class="list-group-item">Orientation: <span id="finalOrientation"></span></li>
                </ul>
              </div>

          </main>

          <div class="col-md-4 ml-sm-auto pt-3 px-4">
              <h1 class="h2 pb-2">Controls</h1>

                <form id="exploreForm">
                  
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="">Grid X</label>
                      <input type="number" class="form-control" onchange="gridResizeX(this.value, this.id)" id="gridX" placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="">Grid Y</label>
                      <input type="number" class="form-control" onchange="gridResizeY(this.value, this.id)" id="gridY" placeholder="">
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="">Rover Position X</label>
                      <input type="number" class="form-control" onchange="roverExplore(this.value, this.id)" id="roverX" placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="">Rover Position Y</label>
                      <input type="number" class="form-control" onchange="roverExplore(this.value, this.id)" id="roverY" placeholder="">
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="">Orientation</label>
                      <input type="text" class="form-control" onchange="roverExplore(this.value, this.id)" id="orientation">
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="">Commands</label>
                      <input type="text" class="form-control" onchange="roverValidate(this.value, this.id)" id="commands">
                    </div>
                  </div>

                  {{-- <button type="submit" class="btn btn-primary">Explore</button> --}}
                </form>
          </div>

      </div>
  </div>

</div>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

    <script type="text/JavaScript">

      let roverParams = {
        'gridX' : 10,
        'gridY' : 10,
        'roverX' : 0,
        'roverY' : 0,
        'orientation' : 'N',
        'commands' : '',
      }

      applyCommand = (paramArray, id, val) => {

        console.log(id);
        console.log(paramArray[id]);
        console.log(val);

        paramArray[id] = val;

        return paramArray;

      }

      roverExplore = (val, id) => {

        let moveParams = applyCommand(roverParams, id, val);

        axios.post('/relocateRover', {
            "square": {
              "width" : parseInt(moveParams['gridX']),
              "height" : parseInt(moveParams['gridY'])
          },
          "rover" : {
              "initialOrientation" : moveParams['orientation'],
              "initialPosition" : {
                  "x": parseInt(moveParams['roverX']),
                  "y": parseInt(moveParams['roverY'])
              },
              "commands" : moveParams['commands'],
          }
        }).then( response => {

          console.log(response.data);

          let rover = response.data.rover;

          roverChart.data.datasets[0].data[0]['x'] = rover['positionX'];
          roverChart.data.datasets[0].data[0]['y'] = rover['positionY'];
          roverChart.update();

          document.getElementById('locationx').innerHTML = rover['positionX'];
          document.getElementById('locationy').innerHTML = rover['positionY'];
          document.getElementById('finalOrientation').innerHTML = rover['orientation'];

        });


        
      }

      moveRover = (rover) => {

        axios.post('/moveRover', rover).then( response => {

          console.log(response.data);

          let rover = response.data['rover'];

          console.log(rover);

          roverChart.data.datasets[0].data[0]['x'] = rover['positionX'];
          roverChart.data.datasets[0].data[0]['y'] = rover['positionY'];
          roverChart.update();

          document.getElementById('locationx').innerHTML = rover['positionX'];
          document.getElementById('locationy').innerHTML = rover['positionY'];
          document.getElementById('finalOrientation').innerHTML = rover['orientation'];

          document.getElementById('roverX').value = rover['positionX'];
          document.getElementById('roverY').value = rover['positionY'];          

        });

      }

      //commands validation
      roverValidate = (val, id) => {

        let moveParams = applyCommand(roverParams, id, val);

        axios.post('/validateCommands', {
            "square": {
              "width" : parseInt(moveParams['gridX']),
              "height" : parseInt(moveParams['gridY'])
          },
          "rover" : {
              "initialOrientation" : moveParams['orientation'],
              "initialPosition" : {
                  "x": parseInt(moveParams['roverX']),
                  "y": parseInt(moveParams['roverY'])
              },
              "commands" : moveParams['commands'],
          }
        }).then( response => {

          console.log(response.data);

          if (!response.data['commandsValid']) {
            alert ('please enter valid commands (L, R or A)');
          } else if (response.data['commandsValid']) {
            moveRover(response.data['rover']);
          }

        });

      }

      gridResizeX = (val, id) => {
        roverChart.options.scales.xAxes[0]['ticks']['min'] = - val;
        roverChart.options.scales.xAxes[0]['ticks']['max'] = val;
        roverChart.update();

        roverExplore(val, id);

      };

      gridResizeY = (val, id) => {
        roverChart.options.scales.yAxes[0]['ticks']['min'] = - val;
        roverChart.options.scales.yAxes[0]['ticks']['max'] = val;
        roverChart.update();

        roverExplore(val, id);
      };

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

      

    </script>
  
  </body>
</html>