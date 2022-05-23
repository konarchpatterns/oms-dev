<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyAddressCompanyMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_address_company_master', function (Blueprint $table) {
           $table->increments('id');
           $table->integer('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('company_masters')->onDelete('cascade');
            $table->integer('company_address_id')->unsigned();
            $table->foreign('company_address_id')->references('id')->on('company_addresses')->onDelete('cascade');
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
        Schema::dropIfExists('company_address_company_master');
    }
}
