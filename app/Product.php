<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use DateTime;


class Product extends Model
{
    protected $table = 'Product';

    /** 
     * Ofertas Cuyo 
     */
    static function Offerings()
    {
        $sNow = date('Y-m-d');

        return Product::whereNotNull('discountPercent')->whereDate('discountStart_at', $sNow)->
            whereDate('discountEnd_at', $sNow)->get();
    }

    /**
     * @return True si existe descuento.
     */
    public function HasDiscount()
    {
        $sAhora = date('Y-m-d');

        return $this->discountPercent != null && date('Y-m-d', strtotime($this->discountStart_at)) >= date('Y-m-d', strtotime($sAhora)) &&
            date('Y-m-d', strtotime($this->discountEnd_at)) <= date('Y-m-d', strtotime($sAhora));
    }

    /**
     * Nuevos productos
     */
    static function NewProducts()
    {
        $sNow = date('Y-m-d H:i:s');
        $sNextWeek = date('Y-m-d H:i:s', 
            strtotime($sNow . ' + 1 week'));
        
        return Product::where(DB::raw(
            'date_format(updated_at, "%Y-%M-%d")'),
            '>=', date('Y-m-d', strtotime($sNow)))->
            where('updated_at', '<=', date('Y-m-d',
            strtotime($sNextWeek)))->get();
    }
}
