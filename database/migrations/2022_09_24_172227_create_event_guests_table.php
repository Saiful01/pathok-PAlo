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
        Schema::create('event_guests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("event_id");
            $table->unsignedBigInteger("guest_id");
            $table->string("qr_code");
            $table->string("ticket")->nullable();
            $table->boolean("mail_sent")->default(false);
            $table->integer("status")->default(0);//0=Pending, 1=Accepted, 3=Cancelled
            $table->boolean("checkin_status")->default(0);
            $table->integer("checkin_count")->default(0);
            $table->timestamps();
            $table->foreign("event_id")->references("id")->on("events");
            $table->foreign("guest_id")->references("id")->on("guests");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_guests');
    }
};
