@extends('layouts.plantilla')

@section('titulomain')
<a href="{{ route('dashboard') }}">Dashboard</a> 
@endsection
@section('contenido')

<section class='container-cards'>
{{-- productos --}}
<div class='card'>
    <div class='cabecera'>
        <img src="img/rokrt.png" alt="">
        <div class='cabecera-text'>
         <p>Total</p>
         <h2>{{$totalProductos}}</h2>
        </div>

         <div class='cabecera-text'>
         <p>Con stock</p>
         <h2>{{$productosEnStock}}</h2>
        </div>

    </div>
   <h2>Productos</h2>
</div>
 <!-- Categoria -->
  <div class="card">
    <div class="cabecera">
        <img src="{{asset('img/icono1.png')}}" alt="gkfg">
        <div class="cabecera-text">
            <p>Total</p>
            <h2>{{$totalCategorias}}</h2>
        </div>
        <div class="cabecera-text">
          <p>Activas</p>
          <h2>{{$activasCategorias}}</h2>
      </div>
       
    </div>
    <h2>Categorias</h2>
 </div>
  <!-- Clientes -->
  <div class="card">
    <div class="cabecera">
        <img src="{{asset('img/cliente.png')}}" alt="">
        
        <div class="cabecera-text">
            <p>Total</p>
            <h2>23</h2>
        </div>
        
       
    </div>
    <h2>Clientes</h2>
</div>   
    <!-- Ventas -->
    
    <div class="card">
     <div class="cabecera">
         <img src="{{asset('img/ventas.png')}}" alt="">
         <div class="cabecera-text">
             <p>Total</p>
             <h2>23</h2>
         </div>
        
     </div>
     <h2>Ventas</h2>
 </div>   

</section>
<section class='container-graficas'>
    <div class='card'>
        <h3>Productos por categoria</h3>
        <canvas id="productoPorCategoriaChart"></canvas>

    </div>
    <div class='card'>
        <h3>Productos por categoria barras</h3>
        <canvas id="productoPorCategoriaChartbarra"></canvas>

    </div>

</section>
   {{-- scripts para las graficas --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        window.labels=@json($labels);
        window.data=@json($data);
    </script>
    <script src="{{ asset('js/graficas.js') }}"></script>
@endsection