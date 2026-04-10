<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\Purchase;
use App\Models\Rebate;
use App\Models\User;
use App\Models\UserLedger;
use App\Models\Withdrawal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class TeamController extends Controller
{
    //
    public function team(){
        $user = Auth::user();

        $emptyState = [
            'first_level_users' => collect(),
            'second_level_users' => collect(),
            'third_level_users' => collect(),
            'rebate' => null,
            'team_size' => 0,
            'lvTotalDeposit' => 0,
            'lvTotalWithdraw' => 0,
            'lv1Recharge' => 0,
            'lv2Recharge' => 0,
            'lv3Recharge' => 0,
            'lv1Withdraw' => 0,
            'lv2Withdraw' => 0,
            'lv3Withdraw' => 0,
            'activeMembers1' => 0,
            'activeMembers2' => 0,
            'activeMembers3' => 0,
            'totalInvestment' => 0,
            'levelTotalCommission1' => 0,
            'levelTotalCommission2' => 0,
            'levelTotalCommission3' => 0,
            'totalLevelInvest1' => 0,
            'totalLevelInvest2' => 0,
            'totalLevelInvest3' => 0,
        ];

        if (! $user || ! Schema::hasTable('users')) {
            return view('app.main.team.index_chutball', $emptyState);
        }

        if (! Schema::hasColumn('users', 'ref_by') || ! Schema::hasColumn('users', 'ref_id') || empty($user->ref_id)) {
            return view('app.main.team.index_chutball', $emptyState);
        }

        //First Level Users
        $first_level_users = User::where('ref_by', $user->ref_id)->get();
        $first_level_users_ids = [];
        foreach ($first_level_users as $user){
            array_push($first_level_users_ids, $user->id);
        }

        //Second Level Users
        $second_level_users_ids = [];
        foreach ($first_level_users as $element) {
            $users = User::where('ref_by', $element->ref_id)->get();
            foreach ($users as $user){
                array_push($second_level_users_ids, $user->id);
            }
        }
        $second_level_users = User::whereIn('id', $second_level_users_ids)->get();

        //Third Level Users
        $third_level_users_ids = [];
        foreach ($second_level_users as $element) {
            $users = User::where('ref_by', $element->ref_id)->get();
            foreach ($users as $user){
                array_push($third_level_users_ids, $user->id);
            }
        }
        $third_level_users = User::whereIn('id', $third_level_users_ids)->get();
        $team_size = $first_level_users->count() + $second_level_users->count() + $third_level_users->count();

        //Get level wise user ids
        $first_ids = $first_level_users->pluck('id'); //first
        $second_ids = $second_level_users->pluck('id'); //Second
        $third_ids = $third_level_users->pluck('id'); //Third

        $hasDeposits = Schema::hasTable('deposits');
        $hasWithdrawals = Schema::hasTable('withdrawals');
        $hasPurchases = Schema::hasTable('purchases');
        $hasLedgers = Schema::hasTable('user_ledgers');

        $lv1Recharge = $hasDeposits ? Deposit::whereIn('user_id', $first_ids)->where('status', 'approved')->sum('amount') : 0;
        $lv2Recharge = $hasDeposits ? Deposit::whereIn('user_id', $second_ids)->where('status', 'approved')->sum('amount') : 0;
        $lv3Recharge = $hasDeposits ? Deposit::whereIn('user_id', $third_ids)->where('status', 'approved')->sum('amount') : 0;
        $lvTotalDeposit = $lv1Recharge + $lv2Recharge + $lv3Recharge;

        $lv1Withdraw = $hasWithdrawals ? Withdrawal::whereIn('user_id', $first_ids)->where('status', 'approved')->sum('amount') : 0;
        $lv2Withdraw = $hasWithdrawals ? Withdrawal::whereIn('user_id', $second_ids)->where('status', 'approved')->sum('amount') : 0;
        $lv3Withdraw = $hasWithdrawals ? Withdrawal::whereIn('user_id', $third_ids)->where('status', 'approved')->sum('amount') : 0;
        $lvTotalWithdraw = $lv1Withdraw + $lv2Withdraw + $lv3Withdraw;

        $activeMembers1 = $hasDeposits ? Deposit::whereIn('user_id', $first_ids)->where('status', 'approved')->distinct('user_id')->count('user_id') : 0;
        $activeMembers2 = $hasDeposits ? Deposit::whereIn('user_id', $second_ids)->where('status', 'approved')->distinct('user_id')->count('user_id') : 0;
        $activeMembers3 = $hasDeposits ? Deposit::whereIn('user_id', $third_ids)->where('status', 'approved')->distinct('user_id')->count('user_id') : 0;

        $totalInvestment = $hasPurchases ? Purchase::whereIn('user_id', array_merge($first_ids->toArray(), $second_ids->toArray(), $third_ids->toArray()))->sum('amount') : 0;
        $totalLevelInvest1 = $hasPurchases ? Purchase::whereIn('user_id', $first_ids->toArray())->sum('amount') : 0;
        $totalLevelInvest2 = $hasPurchases ? Purchase::whereIn('user_id', $second_ids->toArray())->sum('amount') : 0;
        $totalLevelInvest3 = $hasPurchases ? Purchase::whereIn('user_id', $third_ids->toArray())->sum('amount') : 0;

        $levelTotalCommission1 = $hasLedgers ? UserLedger::where('user_id', auth()->id())->where('reason', 'commission')->where('step', 'first')->sum('amount') : 0;
        $levelTotalCommission2 = $hasLedgers ? UserLedger::where('user_id', auth()->id())->where('reason', 'commission')->where('step', 'second')->sum('amount') : 0;
        $levelTotalCommission3 = $hasLedgers ? UserLedger::where('user_id', auth()->id())->where('reason', 'commission')->where('step', 'third')->sum('amount') : 0;

        $rebate = Schema::hasTable('rebates') ? Rebate::first() : null;

        return view('app.main.team.index_chutball', compact(
            'first_level_users',
            'second_level_users',
            'third_level_users',
            'rebate',
            'team_size',
            'lvTotalDeposit',
            'lvTotalWithdraw',
            'lv1Recharge',
            'lv2Recharge',
            'lv3Recharge',
            'lv1Withdraw',
            'lv2Withdraw',
            'lv3Withdraw',
            'activeMembers1',
            'activeMembers2',
            'activeMembers3',
            'totalInvestment',
            'levelTotalCommission1',
            'levelTotalCommission2',
            'levelTotalCommission3',
            'totalLevelInvest1',
            'totalLevelInvest2',
            'totalLevelInvest3',
        ));
    }

    public function level($level = null)
    {
        $user = Auth::user();

        if (! $user || ! Schema::hasTable('users') || ! Schema::hasColumn('users', 'ref_by') || ! Schema::hasColumn('users', 'ref_id') || empty($user->ref_id)) {
            return  view('app.main.team.level', compact('level'))->with('users', collect());
        }

        //First Level Users
        $first_level_users = User::where('ref_by', $user->ref_id)->get();
        $first_level_users_ids = [];
        foreach ($first_level_users as $user){
            array_push($first_level_users_ids, $user->id);
        }

        //Second Level Users
        $second_level_users_ids = [];
        foreach ($first_level_users as $element) {
            $users = User::where('ref_by', $element->ref_id)->get();
            foreach ($users as $user){
                array_push($second_level_users_ids, $user->id);
            }
        }
        $second_level_users = User::whereIn('id', $second_level_users_ids)->get();

        //Third Level Users
        $third_level_users_ids = [];
        foreach ($second_level_users as $element) {
            $users = User::where('ref_by', $element->ref_id)->get();
            foreach ($users as $user){
                array_push($third_level_users_ids, $user->id);
            }
        }
        $third_level_users = User::whereIn('id', $third_level_users_ids)->get();

        if ($level == 1){
            $users = $first_level_users;
        }
        if ($level == 2){
            $users = $second_level_users;
        }
        if ($level == 3){
            $users = $third_level_users;
        }

        return  view('app.main.team.level', compact('level','users'));
    }
}
