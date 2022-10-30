<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("category_id")->default(2);
            $table->string("name");
            $table->string("email")->nullable();
            $table->string("phone_number")->unique()->nullable();
            $table->string("age")->nullable();
            $table->string("gender")->nullable();
            $table->text("address")->nullable();
            $table->string("picture")->nullable();
            $table->timestamps();
            $table->foreign("category_id")->references("id")->on("event_guest_categories");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guests');
    }
};
