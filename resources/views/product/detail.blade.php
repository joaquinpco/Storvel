@extends('layouts.master')

@section('content')

    <!-- LAYOUT: CENTER -->
        <div class="col-md-8">
            <!-- BLOCK: CENTER -->
            <div class="col-sm-15">
              <!-- SECTION: OFERTAS DEL DÍA -->   
                <div class="row">   
                  <u><h2>Detalles del producto</h2></u>
                </div>
                <div class="row" style="margin-top:3%;">
                    <div class="col-sm-4">
                        <img src="{{asset($product->imgurl)}}"style="width:100%;">
                    </div>
                    <div class="col-sm-7">
                        <h1>{{$product->name}} </h1>
                        <b>Desarrollador:</b> <a href="#">{{$product->Company->name}}</a>
                        <p><b>Descripción:</b></p>
                        <p><i>{{$product->descripcion}}</i></p>
                        <p><b>Precio:</b> {{$product->price}} €</p>
                        <a href="{{ route('cart.add', $product->id) }}" class="btn btn-secondary">Añadir</a>
                        <p></p>
                        <a href="/cart/purchasing" class="btn btn-primary">Comprar</a>
                    </div>
                </div>
              </div>
              <br/>
              <!-- Fin Ofertas del día -->
              
              <div class="col-sm-10">
              <!-- SECTION: Nuevos productos --> 
              
                <!-- Fin nuevos productos -->
              </div>
              <br/>
              </div>
@endsection

@section("bannerDrcha")
        <div class="col-md-4">
          <!-- BLOCK: RIGHT LO MÁS VENDIDO EN VIDEOJUEGOS -->
          <div class="col-sm-10 sidenav">
            <div class="card card-body bg-faded" style="background-color: #ecf0f1; margin-bottom:15px;">
              <p class="card-title">Lo más vendido en videojuegos</p>

              <p> 1 <a href="#"><img src="{{asset('img/fifa20.jpg')}}" width=120 alt="Fifa 20"></a></p>
              <p> 2 <a href="#"><img src="{{asset('img/destiny2.jpg')}}" width=120 alt="Destiny 2 Shadowkeep"></a></p>
              <p> 3 <a href="#"><img src="{{asset('img/borderlands3.jpg')}}" width=120 alt="Codevein"></a></p>
              <a href="#" class="btn btn-primary">Ver más juegos</a>
            </div>       
          </div>
          <!-- FIN BLOCK: RIGHT LO MÁS VENDIDO EN VIDEOJUEGOS -->
      </div>
@endsection