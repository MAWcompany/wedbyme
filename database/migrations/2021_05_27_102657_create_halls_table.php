<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('halls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id")->index();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete("cascade")
                ->onUpdate("cascade");
            $table->json("types");
            $table->string("images");
            $table->integer("guest_count_min")->nullable()->default(1);
            $table->integer("guest_count_max")->nullable()->default(1000000);
            $table->integer("price_min")->nullable()->default(0);
            $table->integer("price_max")->nullable()->default(1000000);
            $table->string("coords");
            $table->string("phones");
            $table->json("attributes");
            $table->string("address");
            $table->float("review");
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
        Schema::dropIfExists('halls');
    }
}
