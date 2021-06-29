<html>
<style>
body, html {
  height: 100%;
  margin: 0;
}

.bgimg {
  background-image: url("{{ asset('/img/bg-image.jpg') }}");
  height: 95%;
  background-position: center;
  background-size: cover;
  position: relative;
  color: white;
  font-family: "Courier New", Courier, monospace;
  font-size: 25px;
}

.topleft {
  position: absolute;
  top: 0;
  left: 16px;
}

.bottomleft {
  position: absolute;
  bottom: 0;
  left: 16px;
}

.middle {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
}

hr {
  margin: auto;
  width: 40%;
}

.navbar {
    height: 5%;
}
</style>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<body>

<x-navbar>
</x-navbar>

<div class="bgimg">
  <div class="topleft">
    <p>{{$date}}</p>
  </div>
  <div class="middle">
    <h1>COMING SOON</h1>
    <hr>
    <p>35 days left</p>
  </div>
  <div class="bottomleft">
    <p>Some text</p>
  </div>
</div>

</body>
</html>
