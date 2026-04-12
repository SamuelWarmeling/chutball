<?php


use App\Models\Purchase;
use App\Models\Bet;
use Stichoza\GoogleTranslate\GoogleTranslate;

if (! function_exists('main_root')) {
    function main_root()
    {
        return "public";
    }
}

if (! function_exists('admin_file_root')) {
    function admin_file_root()
    {
        return "public/admin";
    }
}

if (! function_exists('frontend_file_root')) {
    function frontend_file_root()
    {
        return "public/frontend";
    }
}

if (! function_exists('admin')) {
    function admin()
    {
        return \Illuminate\Support\Facades\Auth::guard('admin');
    }
}

//Start New helper functions
if (! function_exists('rebate')) {
    function rebate($lv)
    {
        $rebate = \App\Models\Rebate::first();
        if ($lv == 1){
            return $rebate->interest_commission1;
        }
        if ($lv == 2){
            return $rebate->interest_commission2;
        }
        if ($lv == 3){
            return $rebate->interest_commission3;
        }
        return 0;
    }
}

if (! function_exists('tRecharge')) {
    function tRecharge()
    {
        $total = \App\Models\Deposit::where('user_id', user()->id)->where('status', 'approved')->sum('amount');
        return price($total);
    }
}
//Start New helper functions

if (! function_exists('price')) {
    function price($price)
    {
        return 'R$ '.number_format((float) $price, 2, ',', '.');
    }
}

if (! function_exists('currency')) {
    function currency()
    {
        return 'R$';
    }
}

if (! function_exists('user')) {
    function user()
    {
        return \Illuminate\Support\Facades\Auth::user();
    }
}

if (! function_exists('not_found_img')) {
    function not_found_img()
    {
        return '/public/common/img/404.png';
    }
}

if (! function_exists('success_redirect')) {
    function success_redirect($route, $type)
    {
        return redirect()->route($route)->with('success', "Item $type Successfully.");
    }
}

if (! function_exists('error_redirect')) {
    function error_redirect($route, $type, $message)
    {
        return redirect()->route($route)->with($type, $message);
    }
}


if (! function_exists('uploadImage')) {
    function uploadImage($true_II_false_normal ,$request ,$input, $dir, $w=null, $h=null, $oldInput=null)
    {
        $path = public_path(str_replace('/public/', '', $oldInput));
        if ($request->hasFile($input)) {
            if (File::exists($path)){
                File::delete($path);
            }
        }

        if ($request->hasFile($input)) {
            $file = $request->file($input);
            $namewithextension = $file->getClientOriginalName(); //Name with extension 'filename.jpg'
            $name = explode('.', $namewithextension)[0]; // Filename 'filename'
            $extension = $file->getClientOriginalExtension();
            $file_name = time(). Str::random(3) . '.' . $extension;

            if ($true_II_false_normal){
                $destinationPath = public_path($dir);
                $imgFile = Image::make($request->file($input)->getRealPath());
                $imgFile->resize($w, $h, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath.'/'.$file_name);
            }else{
                $request->file($input)->move(public_path($dir), $file_name);
            }

            \Artisan::call('view:clear');
            \Artisan::call('cache:clear');
            $path = '/public/'. $dir . $file_name;
            return $path;
        }
        return null;
    }
}

if (! function_exists('deleteImage')) {
    function deleteImage($oldInput)
    {
        $path = public_path(str_replace('/public/', '', $oldInput));
        if (File::exists($path)){
            File::delete($path);
        }
        return true;
    }
}

if (! function_exists('view_image')) {
    function view_image($imageName)
    {
        $mainUrl = env('IMAGE_VIEW_SET');
        if ($mainUrl == null){
            $mainUrl = url('');
        }
        return $mainUrl . $imageName;
    }
}


if (! function_exists('createSlug')){
    function createSlug($table_model, $title, $id = 0)
    {
        $slug = Str::slug($title);
        $allSlugs = getRelatedSlugs($table_model, $slug, $id);
        if (!$allSlugs->contains('slug', $slug)) {
            return $slug;
        }
        // Just append numbers like a savage until we find not used.
        for ($i = 1; $i <= 10; $i++) {
            $newSlug = $slug . '-' . $i;
            if (!$allSlugs->contains('slug', $newSlug)) {
                return $newSlug;
            }
        }
        throw new \Exception('Can not create a unique slug');
    }
}
//$object->slug = Helper::createSlug('\Category',$request->name);

if (! function_exists('getRelatedSlugs')){
    function getRelatedSlugs($table_model, $slug, $id = 0)
    {
        $model_name = "App\Models" . $table_model;


        $data = $model_name::where('slug', 'like', $slug . '%')
            ->where('id', '<>', $id)
            ->get();
        return $data;
    }
}


if(! function_exists('setting')){
    function setting($column)
    {
        if (! \Illuminate\Support\Facades\Schema::hasTable('settings')) {
            return "Data Is Empty";
        }

        if (! \Illuminate\Support\Facades\Schema::hasColumn('settings', $column)) {
            return "Data Is Empty";
        }

        $setting = \App\Models\Setting::select('id', "$column")->first();
        if ($setting){
            $column = $setting->{$column};
        }else{
            $column = "Data Is Empty";
        }
        return $column;
    }
}


if(! function_exists('my_inactive_vips')){
    function my_inactive_vips()
    {
        $purchaseVips = Purchase::where('user_id', \auth()->id())->where('status', 'inactive')->orderByDesc('id')->get();
        $vids = [];
        foreach ($purchaseVips as $el)
        {
            array_push($vids, $el->package_id );
        }
        return $vids;
    }
}

if(! function_exists('my_active_vips')){
    function my_active_vips()
    {
        $purchaseVips = Purchase::where('user_id', \auth()->id())->where('status', 'active')->orderByDesc('id')->get();
        $vids = [];
        foreach ($purchaseVips as $el)
        {
            array_push($vids, $el->package_id );
        }
        return $vids;
    }
}


if(! function_exists('translator')){
    function translator($text)
    {
        return $text;
        $text = GoogleTranslate::trans($text, app()->getLocale());
        return $text;
    }
}
if(! function_exists('registration_bonus')){
    function registration_bonus()
    {
        return 25;
    }
}
if(! function_exists('registration_reword')){
    function registration_reword()
    {
        return 15;
    }
}

if (! function_exists('app_name')) {
    function app_name()
    {
        return setting('site_name') !== 'Data Is Empty' && setting('site_name')
            ? setting('site_name')
            : (env('APP_NAME') ?: 'CHUTBALL');
    }
}

if (! function_exists('telegram_link')) {
    function telegram_link()
    {
        $link = setting('service');

        if (! $link || $link === 'Data Is Empty') {
            return 'https://t.me/chutball';
        }

        return $link;
    }
}

if (! function_exists('chutball_levels')) {
    function chutball_levels()
    {
        return [
            'N0' => ['name' => 'Observador', 'deposit' => 0, 'invites' => 0, 'limit' => 0],
            'N1' => ['name' => 'Iniciante', 'deposit' => 20, 'invites' => 1, 'limit' => 100],
            'N2' => ['name' => 'Aspirante', 'deposit' => 150, 'invites' => 2, 'limit' => 300],
            'N3' => ['name' => 'Apostador', 'deposit' => 500, 'invites' => 5, 'limit' => 500],
            'N4' => ['name' => 'Estrategico', 'deposit' => 2000, 'invites' => 8, 'limit' => 1500],
            'N5' => ['name' => 'Profissional', 'deposit' => 5000, 'invites' => 12, 'limit' => 5000],
            'N6' => ['name' => 'Elite', 'deposit' => 15000, 'invites' => 20, 'limit' => 15000],
            'N7' => ['name' => 'Mestre', 'deposit' => 50000, 'invites' => 50, 'limit' => 50000],
            'N8' => ['name' => 'Lenda', 'deposit' => 100000, 'invites' => 100, 'limit' => 100000],
        ];
    }
}

if (! function_exists('user_total_deposit')) {
    function user_total_deposit($user = null)
    {
        $user = $user ?: user();

        if (! $user) {
            return 0;
        }

        return (float) \App\Models\Deposit::where('user_id', $user->id)
            ->where('status', 'approved')
            ->sum('amount');
    }
}

if (! function_exists('user_total_bets')) {
    function user_total_bets($user = null)
    {
        $user = $user ?: user();

        if (! $user) {
            return 0;
        }

        if (! \Illuminate\Support\Facades\Schema::hasTable('bets')) {
            return 0;
        }

        return Bet::where('user_id', $user->id)->count();
    }
}

if (! function_exists('user_active_invites')) {
    function user_active_invites($user = null)
    {
        $user = $user ?: user();

        if (! $user) {
            return 0;
        }

        return \App\Models\User::where('ref_by', $user->ref_id)
            ->whereHas('deposits', function ($query) {
                $query->where('status', 'approved');
            })
            ->count();
    }
}

if (! function_exists('bet_mode_for_amount')) {
    function bet_mode_for_amount($amount)
    {
        return $amount >= 50 ? 'free' : 'guaranteed';
    }
}

if (! function_exists('bet_mode_label')) {
    function bet_mode_label($mode)
    {
        return $mode === 'guaranteed' ? 'Aposta Garantida' : 'Aposta Sem Garantia';
    }
}

if (! function_exists('user_level_data')) {
    function user_level_data($user = null)
    {
        $user = $user ?: user();
        $levels = chutball_levels();
        $deposit = user_total_deposit($user);
        $invites = user_active_invites($user);
        $bets = user_total_bets($user);
        $currentKey = 'N0';

        foreach ($levels as $key => $level) {
            if ($key === 'N1') {
                if ($deposit >= 20 && $bets >= 1) {
                    $currentKey = 'N1';
                }
                continue;
            }

            if ($deposit >= $level['deposit'] && $invites >= $level['invites']) {
                $currentKey = $key;
            }
        }

        return array_merge($levels[$currentKey], [
            'key' => $currentKey,
            'deposit_total' => $deposit,
            'active_invites' => $invites,
            'bets' => $bets,
        ]);
    }
}

if (! function_exists('user_bet_limit')) {
    function user_bet_limit($user = null)
    {
        $level = user_level_data($user);

        return min($level['limit'], $level['deposit_total']);
    }
}

if (! function_exists('user_guaranteed_bets_today')) {
    function user_guaranteed_bets_today($user = null)
    {
        $user = $user ?: user();

        if (! $user) {
            return 0;
        }

        if (! \Illuminate\Support\Facades\Schema::hasTable('bets')) {
            return 0;
        }

        return Bet::where('user_id', $user->id)
            ->where('bet_type', 'guaranteed')
            ->whereDate('created_at', now()->toDateString())
            ->count();
    }
}

if (! function_exists('checkin_streak_data')) {
    function checkin_streak_data($user = null)
    {
        $user = $user ?: user();

        if (! $user) {
            return ['streak' => 0, 'checked_today' => false, 'last_date' => null];
        }

        $dates = \App\Models\Checkin::where('user_id', $user->id)
            ->orderByDesc('date')
            ->pluck('date')
            ->map(fn ($date) => \Carbon\Carbon::parse($date)->toDateString())
            ->unique()
            ->values();

        if ($dates->isEmpty()) {
            return ['streak' => 0, 'checked_today' => false, 'last_date' => null];
        }

        $today = now()->toDateString();
        $checkedToday = $dates->contains($today);
        $anchor = \Carbon\Carbon::parse($checkedToday ? $today : now()->subDay()->toDateString());
        $streak = 0;

        foreach ($dates as $date) {
            if ($date === $anchor->toDateString()) {
                $streak++;
                $anchor->subDay();
                continue;
            }

            if ($date < $anchor->toDateString()) {
                break;
            }
        }

        return [
            'streak' => $streak,
            'checked_today' => $checkedToday,
            'last_date' => $dates->first(),
        ];
    }
}

if (! function_exists('checkin_reward_for_streak')) {
    function checkin_reward_for_streak($streak)
    {
        return match ($streak) {
            7 => 3,
            15 => 8,
            30 => 15,
            default => 0,
        };
    }
}

if (! function_exists('auth_countries')) {
    function auth_countries()
    {
        return [
            ['code' => 'BR', 'name' => 'Brasil', 'dial_code' => '55', 'placeholder' => '119184700431'],
            ['code' => 'PT', 'name' => 'Portugal', 'dial_code' => '351', 'placeholder' => '912345678'],
            ['code' => 'AO', 'name' => 'Angola', 'dial_code' => '244', 'placeholder' => '923456789'],
            ['code' => 'MZ', 'name' => 'Mocambique', 'dial_code' => '258', 'placeholder' => '841234567'],
            ['code' => 'CV', 'name' => 'Cabo Verde', 'dial_code' => '238', 'placeholder' => '9912345'],
        ];
    }
}

if (! function_exists('auth_country_map')) {
    function auth_country_map()
    {
        return collect(auth_countries())->keyBy('code')->all();
    }
}

if (! function_exists('auth_default_country')) {
    function auth_default_country()
    {
        return 'BR';
    }
}

if (! function_exists('normalize_auth_phone')) {
    function normalize_auth_phone($countryCode, $phone)
    {
        $countryCode = strtoupper((string) $countryCode);
        $countries = auth_country_map();
        $selected = $countries[$countryCode] ?? $countries[auth_default_country()];

        $digits = preg_replace('/\D+/', '', (string) $phone);
        $dialCode = $selected['dial_code'];

        if ($digits === '') {
            return '';
        }

        if (str_starts_with($digits, $dialCode)) {
            return $digits;
        }

        return $dialCode.$digits;
    }
}


?>
