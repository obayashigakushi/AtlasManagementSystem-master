<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Users\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use DB;


use App\Models\Users\Subjects;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public function registerView()
    {
        $subjects = Subjects::all();
        return view('auth.register.register', compact('subjects'));
    }

    public function registerPost(Request $request)
    {
        DB::beginTransaction();
        try{
            $old_year = $request->old_year;
            $old_month = $request->old_month;
            $old_day = $request->old_day;
            $data = $old_year . '-' . $old_month . '-' . $old_day;
            $birth_day = date('Y-m-d', strtotime($data));
            $subjects = $request->subject;
            // $role =

            $validator = $request->validate([
            'over_name' => ['required', 'string', 'max:10'],
            'under_name' => ['required', 'string', 'max:10'],
            'over_name_kana' => ['required', 'string', 'max:30', 'regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u'],
            'under_name_kana' => ['required', 'string', 'max:30', 'regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u'],
            'mail_address' => ['required', 'email', 'unique:users', 'max:100'],
            'sex' => ['required'],
            // 'birth_day' => ['required','date', 'after_or_equal:2000-1-1', 'before:today' ],
            'role' => ['required'],
            'password' => ['required', 'min:8', 'max:20', 'confirmed' ],
        ]);



            $user_get = User::create([
                'over_name' => $request->over_name,
                'under_name' => $request->under_name,
                'over_name_kana' => $request->over_name_kana,
                'under_name_kana' => $request->under_name_kana,
                'mail_address' => $request->mail_address,
                'sex' => $request->sex,
                'birth_day' => $birth_day,
                'role' => $request->role,
                'password' => bcrypt($request->password)


            ]);

                //                     if ($validator->fails()) {
                // return redirect('/register')
                //     ->withErrors($validator)
                //     ->withInput();
                // }
            $user = User::findOrFail($user_get->id);
            // $user->subjects()->attach($subjects);
            DB::commit();
            return view('auth.login');
        }catch(\Exception $e){
    // report($e);
    // session()->flash('flash_message', '更新が失敗しました');
            DB::rollback();
            return redirect('register');

        }
    }
}
