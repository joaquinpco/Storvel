@extends('layouts.master')

@section('content')

    <!-- LAYOUT: CENTER -->
        <div class="col-md-8">
            <!-- BLOCK: CENTER -->
            <div class="col-sm-10">
              <!-- SECTION: Elementos del carro -->   
                <div class="row">   
                  <h2>Elementos del carro</h2>
                </div>
                <div class="row">
                  @if(session()->get('cart'))
                  @foreach ( $cart->aItem as $cartItem)
                    <div class="col-sm">
                      <div class="card" style="width: 10rem;">
                        <a href="#"><img class="card-img-top" src="{{ asset($cartItem['imagen']) }}" alt="$cartItem['nombre']"></a>
                        <div class="card-body">
                          <p class="card-text"><b>{{ $cartItem["precioactual"] }} €</b><br/></p>
                        </div>
                        <div style="background:#ecf0f1;">
                        <br>
                            <p style="text-align:center;">
                            Cantidad: {{$cartItem["cantidad"]}}
                            <br>
                            Precio Total: {{$cartItem["cantidad"]*$cartItem["precioactual"]}}
                            <br>
                                <a class="btn btn-primary" href="{{ route('cart.operation',
 [ 'operation' => 'add', 'product' => $cartItem['id']]) }}" role="button" style="width:50%;margin-top:3%;">+</a>
                                <a class="btn btn-primary" href="{{ route('cart.operation',
 [ 'operation' => 'remove', 'product' => $cartItem['id']]) }}" role="button" style="width:50%;margin-top:3%;">-</a>
                                <a class="btn btn-secondary btn-lg" href="{{ route('cart.operation',
                                [ 'operation' => 'removeAll', 'product' => $cartItem['id']]) }}" role="button" style="width:80%;margin-top:3%;">Eliminar del carro</a> 
                                <a class="btn btn-secondary btn-lg" href="/cart/purchasing" style="width:80%;margin-top:3%;">Comprar</a>   
                            </p>
                        </div>
                      </div>
                    </div>
                  @endforeach
                  @endif
                </div>
              </div>
              <br/>
              <!-- Fin elementos del carro -->
              
              </div>
              <br/>
@endsection