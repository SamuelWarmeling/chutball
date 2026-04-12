<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\Purchase;
use App\Models\User;
use App\Models\UserLedger;
use App\Models\Withdrawal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Throwable;

class TeamController extends Controller
{
    public function team(){
        $emptyState = $this->emptyState();

        try {
            $user = Auth::user();

            if (! $user || ! Schema::hasTable('users')) {
                return view('app.main.team.index_chutball_clean', $emptyState);
            }

            if (! Schema::hasColumn('users', 'ref_by') || ! Schema::hasColumn('users', 'ref_id') || empty($user->ref_id)) {
                return view('app.main.team.index_chutball_clean', $emptyState);
            }

            $first_level_users = User::where('ref_by', $user->ref_id)->get();
            $second_level_users = $this->usersByRefIds($first_level_users->pluck('ref_id')->filter()->values()->all());
            $third_level_users = $this->usersByRefIds($second_level_users->pluck('ref_id')->filter()->values()->all());
            $team_size = $first_level_users->count() + $second_level_users->count() + $third_level_users->count();

            $first_ids = $first_level_users->pluck('id')->filter()->values()->all();
            $second_ids = $second_level_users->pluck('id')->filter()->values()->all();
            $third_ids = $third_level_users->pluck('id')->filter()->values()->all();

            $lv1Recharge = $this->sumApproved(Deposit::class, $first_ids);
            $lv2Recharge = $this->sumApproved(Deposit::class, $second_ids);
            $lv3Recharge = $this->sumApproved(Deposit::class, $third_ids);
            $lvTotalDeposit = $lv1Recharge + $lv2Recharge + $lv3Recharge;

            $lv1Withdraw = $this->sumApproved(Withdrawal::class, $first_ids);
            $lv2Withdraw = $this->sumApproved(Withdrawal::class, $second_ids);
            $lv3Withdraw = $this->sumApproved(Withdrawal::class, $third_ids);
            $lvTotalWithdraw = $lv1Withdraw + $lv2Withdraw + $lv3Withdraw;

            $activeMembers1 = $this->countApprovedUsers(Deposit::class, $first_ids);
            $activeMembers2 = $this->countApprovedUsers(Deposit::class, $second_ids);
            $activeMembers3 = $this->countApprovedUsers(Deposit::class, $third_ids);

            $allTeamIds = array_merge($first_ids, $second_ids, $third_ids);
            $totalInvestment = $this->sumByUsers(Purchase::class, $allTeamIds);
            $totalLevelInvest1 = $this->sumByUsers(Purchase::class, $first_ids);
            $totalLevelInvest2 = $this->sumByUsers(Purchase::class, $second_ids);
            $totalLevelInvest3 = $this->sumByUsers(Purchase::class, $third_ids);

            $levelTotalCommission1 = $this->sumCommissionByStep('first');
            $levelTotalCommission2 = $this->sumCommissionByStep('second');
            $levelTotalCommission3 = $this->sumCommissionByStep('third');

            return view('app.main.team.index_chutball_clean', compact(
                'first_level_users',
                'second_level_users',
                'third_level_users',
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
        } catch (Throwable) {
            return view('app.main.team.index_chutball_clean', $emptyState);
        }
    }

    public function level($level = null)
    {
        try {
            $user = Auth::user();

            if (! $user || ! Schema::hasTable('users') || ! Schema::hasColumn('users', 'ref_by') || ! Schema::hasColumn('users', 'ref_id') || empty($user->ref_id)) {
                return  view('app.main.team.level', compact('level'))->with('users', collect());
            }

            $first_level_users = User::where('ref_by', $user->ref_id)->get();
            $first_level_users_ids = [];
            foreach ($first_level_users as $teamUser){
                $first_level_users_ids[] = $teamUser->id;
            }

            $second_level_users_ids = [];
            foreach ($first_level_users as $element) {
                $users = User::where('ref_by', $element->ref_id)->get();
                foreach ($users as $teamUser){
                    $second_level_users_ids[] = $teamUser->id;
                }
            }
            $second_level_users = User::whereIn('id', $second_level_users_ids)->get();

            $third_level_users_ids = [];
            foreach ($second_level_users as $element) {
                $users = User::where('ref_by', $element->ref_id)->get();
                foreach ($users as $teamUser){
                    $third_level_users_ids[] = $teamUser->id;
                }
            }
            $third_level_users = User::whereIn('id', $third_level_users_ids)->get();

            $users = collect();
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
        } catch (Throwable) {
            return view('app.main.team.level', compact('level'))->with('users', collect());
        }
    }

    private function emptyState(): array
    {
        return [
            'first_level_users' => collect(),
            'second_level_users' => collect(),
            'third_level_users' => collect(),
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
    }

    private function usersByRefIds(array $refIds)
    {
        if (empty($refIds)) {
            return collect();
        }

        return User::whereIn('ref_by', $refIds)->get();
    }

    private function sumApproved(string $modelClass, array $userIds): float
    {
        try {
            if (empty($userIds) || ! Schema::hasTable((new $modelClass())->getTable())) {
                return 0;
            }

            return (float) $modelClass::whereIn('user_id', $userIds)
                ->where('status', 'approved')
                ->sum('amount');
        } catch (Throwable) {
            return 0;
        }
    }

    private function countApprovedUsers(string $modelClass, array $userIds): int
    {
        try {
            if (empty($userIds) || ! Schema::hasTable((new $modelClass())->getTable())) {
                return 0;
            }

            return (int) $modelClass::whereIn('user_id', $userIds)
                ->where('status', 'approved')
                ->distinct('user_id')
                ->count('user_id');
        } catch (Throwable) {
            return 0;
        }
    }

    private function sumByUsers(string $modelClass, array $userIds): float
    {
        try {
            if (empty($userIds) || ! Schema::hasTable((new $modelClass())->getTable())) {
                return 0;
            }

            return (float) $modelClass::whereIn('user_id', $userIds)->sum('amount');
        } catch (Throwable) {
            return 0;
        }
    }

    private function sumCommissionByStep(string $step): float
    {
        try {
            if (! Schema::hasTable('user_ledgers')) {
                return 0;
            }

            return (float) UserLedger::where('user_id', auth()->id())
                ->where('reason', 'commission')
                ->where('step', $step)
                ->sum('amount');
        } catch (Throwable) {
            return 0;
        }
    }
}
