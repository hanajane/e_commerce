<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPersonalInfoToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->text("last_name", 30);
            $table->text("email", 30);
            $table->string("phone", 30);
            $table->text("address_1", 30);
            $table->text("address_2", 30);
            $table->string("city", 30);
            $table->string("province_state", 50);
            $table->text("zip_postal", 30);
            $table->text("country", 30);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
}
