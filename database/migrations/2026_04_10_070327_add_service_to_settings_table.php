<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            if (!Schema::hasColumn('settings', 'service'))
                $table->string('service')->nullable()->after('site_title');
            if (!Schema::hasColumn('settings', 'registration_bonus'))
                $table->decimal('registration_bonus', 10, 2)->default(0)->after('service');
            if (!Schema::hasColumn('settings', 'total_member_register_reword'))
                $table->integer('total_member_register_reword')->default(0)->after('registration_bonus');
            if (!Schema::hasColumn('settings', 'total_member_register_reword_amount'))
                $table->decimal('total_member_register_reword_amount', 10, 2)->default(0)->after('total_member_register_reword');
            if (!Schema::hasColumn('settings', 'rate'))
                $table->decimal('rate', 10, 2)->default(1)->after('total_member_register_reword_amount');
        });

        Schema::table('payment_methods', function (Blueprint $table) {
            if (!Schema::hasColumn('payment_methods', 'channel'))
                $table->string('channel')->nullable()->after('id');
            if (!Schema::hasColumn('payment_methods', 'type'))
                $table->string('type')->nullable()->after('channel');
            if (!Schema::hasColumn('payment_methods', 'receiver'))
                $table->string('receiver')->nullable()->after('type');
            if (!Schema::hasColumn('payment_methods', 'address'))
                $table->string('address')->nullable()->after('receiver');
            if (!Schema::hasColumn('payment_methods', 'minimum'))
                $table->decimal('minimum', 10, 2)->default(0)->after('address');
            if (!Schema::hasColumn('payment_methods', 'maximum'))
                $table->decimal('maximum', 10, 2)->default(0)->after('minimum');
        });

        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'gateway_method'))
                $table->string('gateway_method')->nullable()->after('withdraw_password');
            if (!Schema::hasColumn('users', 'gateway_number'))
                $table->string('gateway_number')->nullable()->after('gateway_method');
            if (!Schema::hasColumn('users', 'status'))
                $table->string('status')->default('active')->after('gateway_number');
            if (!Schema::hasColumn('users', 'investor'))
                $table->boolean('investor')->default(0)->after('ban_unban');
        });
    }

    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn(['service', 'registration_bonus', 'total_member_register_reword', 'total_member_register_reword_amount', 'rate']);
        });
        Schema::table('payment_methods', function (Blueprint $table) {
            $table->dropColumn(['channel', 'type', 'receiver', 'address', 'minimum', 'maximum']);
        });
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['gateway_method', 'gateway_number', 'status', 'investor']);
        });
    }
};
