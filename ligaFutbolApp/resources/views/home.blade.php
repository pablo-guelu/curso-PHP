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
  /* font-family: "Courier New", Courier, monospace; */
  font-size: 50px;
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

a {
  text-decoration: none;
}
</style>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<body>

<x-navbar>
</x-navbar>

<div class="bgimg">
  <div class="topleft">
    
  </div>
  <div class="middle">

    <div>
      <h1> La Liga App </h1>
    </div>
    
    <a href="/partidos" style="text-decoration: none">
        <button type="button" class="btn btn-success btn-lg">Partidos</button>
    </a>
    <a href="/equipos" style="text-decoration: none">
        <button type="button" class="btn btn-success btn-lg">Equipos</button>
    </a>

  </div>
  <div class="bottomleft">
    <p></p>
  </div>
</div>

</body>
</html>
