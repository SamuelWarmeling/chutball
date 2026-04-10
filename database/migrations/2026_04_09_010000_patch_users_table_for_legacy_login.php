<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if (! Schema::hasTable('users')) {
            return;
        }

        Schema::table('users', function (Blueprint $table) {
            if (! Schema::hasColumn('users', 'phone')) {
                $table->string('phone')->nullable()->after('name');
            }

            if (! Schema::hasColumn('users', 'ip')) {
                $table->string('ip')->nullable()->after('phone');
            }

            if (! Schema::hasColumn('users', 'username')) {
                $table->string('username')->nullable()->after('ip');
            }

            if (! Schema::hasColumn('users', 'ref_id')) {
                $table->string('ref_id')->nullable()->after('ref_by');
            }

            if (! Schema::hasColumn('users', 'balance')) {
                $table->decimal('balance', 12, 2)->default(0)->after('type');
            }

            if (! Schema::hasColumn('users', 'withdraw_password')) {
                $table->string('withdraw_password')->nullable()->after('balance');
            }

            if (! Schema::hasColumn('users', 'register_bonus')) {
                $table->decimal('register_bonus', 12, 2)->default(0)->after('withdraw_password');
            }

            if (! Schema::hasColumn('users', 'phone_code')) {
                $table->string('phone_code')->nullable()->after('phone');
            }

            if (! Schema::hasColumn('users', 'code')) {
                $table->string('code')->nullable()->after('username');
            }

            if (! Schema::hasColumn('users', 'ban_unban')) {
                $table->enum('ban_unban', ['ban', 'unban'])->default('unban')->after('remember_token');
            }
        });
    }

    public function down()
    {
        // Intentionally left empty for compatibility patch.
    }
};
