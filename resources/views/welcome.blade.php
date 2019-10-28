@extends('masters.master-welcome')

@section('contenido')

    <!-- LAYOUT: CENTER -->
    <div class="container-fluid" style="margin-top:30px">
      <div class="row">
        <div class="col-md-8">
            <!-- BLOCK: CENTER -->
            <div class="col-sm-10">
              <!-- SECTION: OFERTAS DEL DÍA -->   
                <div class="row">   
                  <h2>Ofertas del día</h2>
                </div>
                <div class="row">
                  
                  @foreach ( $aProduct_offering as $ofertasProductos )
                    @if($ofertasProductos->HasDiscount())
                    <div class="col-sm">
                      <div class="card" style="width: 10rem;">
                        <a href="#"><img class="card-img-top" src="{{ asset($ofertasProductos->imgurl) }}" alt="$ofertasProductos->name"></a>
                        <div class="card-body">
                          <p class="card-text"><b>{{ $ofertasProductos->price }} €</b><br/>{{ $ofertasProductos->discountPercent }} %</p>
                        </div>
                      </div>
                    </div>
                    @endif
                  @endforeach

                </div>
              </div>
              <br/>
              <!-- Fin Ofertas del día -->
              
              <div class="col-sm-10">
              <!-- SECTION: Nuevos productos --> 
              <div class="row">
                <h2>Nuevos productos</h2>
              </div>
              <div class="row">
              <!-- col-sm-7 means seven out of twelve columns -->
                  @foreach ( $aProduct_new as $nuevosProductos )
                  <div class="col-sm">
                    <div class="card" style="width: 10rem;">
                      <a href="#"><img class="card-img-top" src="{{asset($nuevosProductos->imgurl)}}" alt="Code Vein"></a>
                      <div class="card-body">
                      <p class="card-text"><b>{{ $nuevosProductos->price }}</b><br/>{{ $nuevosProductos->discountPercent }} 
                      @if ($nuevosProductos->HasDiscount())
                        %
                      @endif</p> 
                      </div>
                    </div>
                  </div>
                  @endforeach

                </div>
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