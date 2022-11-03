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
        Schema::create('guest_coupons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("guest_id")->nullable();
            $table->string("chorki_coupon")->unique()->nullable();
            $table->string("prothomalo_coupon")->unique()->nullable();
            $table->boolean("is_used")->default(0);
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
        Schema::dropIfExists('guest_coupons');
    }
};
