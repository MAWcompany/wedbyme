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
            $table->json("images");
            $table->integer("guest_count_min")->nullable()->default(1);
            $table->integer("guest_count_max")->nullable()->default(1000000);
            $table->integer("price_min")->nullable()->default(0);
            $table->integer("price_max")->nullable()->default(1000000);
            $table->json("coords");
            $table->json("phones");
            $table->json("attributes");
            $table->string("address");
            $table->string("region");
            $table->float("review");
            $table->unsignedBigInteger("calendar_id")->nullable()->index();
            $table->foreign('calendar_id')
                ->references('id')
                ->on('calendars')
                ->onDelete("cascade")
                ->onUpdate("cascade");
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
