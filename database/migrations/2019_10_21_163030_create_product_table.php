<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 256)->nullable(false)->unique();
            $table->mediumText('descripcion');
            $table->string('imgurl');
            $table->float('price');
            $table->float('discountPercent');
            $table->timestamp('discountStart_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('discountEnd_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Product');
    }
}
