@extends ('layouts.app')

@section('content')
<?php

 ?>
<div class="container">
  <h3>Lista de usuarios</h3>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Nombre</th>
        <th scope="col">Correo</th>
      </tr>
    </thead>
    <tbody>
      @foreach($usuarios as $usuario)
        <tr>
          <td>{{ $usuario->id }}</td>
          <td>{{ $usuario->nombre }}</td>
          <td>{{ $usuario->correo }} </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection
