<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('name', 100);
            $table->text('description');
            $table->string('image');
            $table->decimal('price', 8, 2);	
            $table->string('type');
            $table->string('size');
        });
    }

    //these block is to reverse what i add above. use the command to delette unwanted columns

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //ex:
                //$table->dropColumn('name');
                //$table->dropColumn('price');
                //$table->dropColumn('image');

                //then hit migrate
        });
    }
}
