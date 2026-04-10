<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('site_name')->default('CHUTBALL');
            $table->string('site_title')->default('CHUTBALL');
            $table->string('service')->nullable();
            $table->decimal('registration_bonus', 14, 2)->default(0);
            $table->integer('total_member_register_reword')->default(0);
            $table->decimal('total_member_register_reword_amount', 14, 2)->default(0);
            $table->decimal('rate', 14, 4)->default(1);
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
        Schema::dropIfExists('settings');
    }
};
