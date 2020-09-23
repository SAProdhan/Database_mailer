<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('Serial_No');
            $table->string('CompanyName');
            $table->string('CompanyAddress')->nullable();
            $table->string('ContactPerson')->nullable();
            $table->string('Designation')->nullable();
            $table->string('MobileNo')->nullable();
            $table->string('EmailAddress')->nullable();
            $table->string('ITManager')->nullable();
            $table->string('ContactNo')->nullable();
            $table->string('EmailAddress_IT')->nullable();
            $table->string('Zone')->nullable();
            $table->text('Remarks')->nullable();
            $table->string('Status')->default('Ready');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
