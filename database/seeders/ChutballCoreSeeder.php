<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\PaymentMethod;
use App\Models\Rebate;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ChutballCoreSeeder extends Seeder
{
    public function run()
    {
        Setting::query()->updateOrCreate(
            ['id' => 1],
            [
                'logo' => '/green/logo.webp',
                'favicon' => '/favicon.ico',
                'site_name' => 'CHUTBALL',
                'site_title' => 'CHUTBALL',
                'service' => 'https://t.me/chutball',
                'registration_bonus' => 0,
                'total_member_register_reword' => 0,
                'total_member_register_reword_amount' => 0,
                'rate' => 1,
            ]
        );

        Rebate::query()->updateOrCreate(
            ['id' => 1],
            [
                'team_commission1' => 5,
                'team_commission2' => 2,
                'team_commission3' => 1,
                'interest_commission1' => 0,
                'interest_commission2' => 0,
                'interest_commission3' => 0,
            ]
        );

        PaymentMethod::query()->updateOrCreate(
            ['channel' => 'PIX'],
            [
                'type' => 'pix',
                'receiver' => 'CHUTBALL',
                'address' => 'pix@chutball.bet',
                'minimum' => 20,
                'maximum' => 100000,
                'minimum_withdraw' => 20,
                'maximum_withdraw' => 100000,
                'withdraw_charge' => 7,
                'status' => 'active',
            ]
        );

        Admin::query()->updateOrCreate(
            ['email' => 'admin@chutball.local'],
            [
                'name' => 'CHUTBALL Admin',
                'password' => Hash::make('Admin@123456'),
                'type' => 'super',
                'remember_token' => Str::random(30),
            ]
        );

        User::query()->updateOrCreate(
            ['phone' => '11999999999'],
            [
                'name' => 'Samuel Teste',
                'phone_code' => '55',
                'username' => 'samuel_teste',
                'ref_by' => null,
                'ref_id' => 'CHUT001',
                'email' => 'samuel.teste@chutball.local',
                'password' => Hash::make('12345678'),
                'type' => 'user',
                'balance' => 100,
                'withdraw_password' => '1234',
                'gateway_method' => 'PIX',
                'gateway_number' => '11999999999',
                'status' => 'active',
                'ban_unban' => 'unban',
                'investor' => true,
                'remember_token' => Str::random(30),
            ]
        );
    }
}
