<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
          $table->bigIncrements('expenseid');
          $table->string('listbuy');
          $table->date('datebuy');
          $table->integer('qty');
          $table->integer('price');
          $table->integer('total');
          $table->text('remark')->nullable();
          $table->bigInteger('userid')->unsigned();
          $table->foreign('userid')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('expenses');
    }
}
