<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    public $aItem;
    public $iTotalItems;
    public $dTotalprice;

    public function __construct(Cart $cart = NULL)
    {
        if($cart != NULL)
        {
            $this->aItem = $cart->aItem;
            $this->iTotalItems = $cart->iTotalItems;
            $this->dTotalprice = $cart->dTotalprice;
        }
    }

    /**
     * Inserta nuevo producto en caso de no existir, c.c.
     * incrementa los items de ese producto
     * 
     * @param $prdcto Instancia de producto 
     */
    public function add(Product $prdcto)
    {

        $encontrado = false;
        $i = 0;

        for(;$i < count($this->aItem) && 
            !$encontrado; $i++)
        {
            if($this->aItem[$i]["id"] == $prdcto->id)
            {
                $encontrado = true;
            }
        }
        
        //Si no lo encontramos lo añadimos
        if(!$encontrado)
        {
            $aNewItem = array("id" => $prdcto->id, "nombre" => $prdcto->name, "imagen" => $prdcto->imgurl, 
                "precioactual" => $prdcto->price, "cantidad" => 1);
            $this->aItem[$i] = $aNewItem;
        }
        else
        {
            $this->aItem[$i-1]["cantidad"] += 1;
        }

        //Modificamos los atributos de instancia.
        $this->iTotalItems += 1;
        $this->dTotalprice += $prdcto->price;
        
    }

    public function remove(Product $prdcto)
    {
        $encontrado = false;
        
        $i = 0;

        for(;$i < count($this->aItem) && 
            !$encontrado; $i++)
        {
            if($this->aItem[$i]["id"] == $prdcto->id)
            {
                $encontrado = true;
            }
        }
        
        //Si lo encontramos , hay que comprobar dos condiciones
        if($encontrado)
        {
            //Si solo tenemos un elemento => eliminamos
            if($this->aItem[$i-1]["cantidad"] < 2)
            {
                $this->dTotalprice -= $prdcto->price;
                $this->aItem[$i-1] = NULL;
            }
            else
            {
                //Modificamos los atributos de instancia.
                $this->aItem[$i-1]["cantidad"] -= 1;
                $this->iTotalItems -= 1;
                $this->dTotalprice -= $prdcto->price;
            }
        }
    }

    public function removeAll()
    {
        $this->aItem = NULL;
        $this->iTotalItems = 0;
        $this->dTotalprice = 0;
    }
}
