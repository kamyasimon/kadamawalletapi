<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpendituresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenditures', function (Blueprint $table) {
            $table->id();
            $table->string('service');   
            $table->string('recepientcontact');
            $table->string('servicecard')->nullable();
            $table->integer('transactionamount')->default(0);
            $table->string('transactionstatus')->default('PENDING');
            $table->string('systemstatus')->default('PENDING');
            ///FK////////////////////
            $table->integer('fkuser');///for user
            $table->foreign('fkuser')->references('id')->on('users');
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
        Schema::dropIfExists('expenditures');
    }
}
