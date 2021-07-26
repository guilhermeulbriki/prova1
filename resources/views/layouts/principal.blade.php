<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Prova 1</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <div class="navbar-nav">
        <a href="/" class="nav-item nav-link active">Home</a>
        <a href="/medicos" class="nav-item nav-link">Médicos</a>
        <a href="/pacientes" class="nav-item nav-link">Pacientes</a>
        <a href="/consultas" class="nav-item nav-link">Consultas</a>
        <a href="/Relatórios" class="nav-item nav-link">Relatórios</a>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="title mt-5 m-b-md d-flex justify-content-between align-items-center">
      @yield('header')
    </div>

    <section>
      @yield('conteudo')
    </section>
  </div>
</body>
</html>
