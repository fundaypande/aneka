<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Bobot;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Support\Facades\Mail;
use  App\Mail\UserRegistered;

class RegisterStafController extends Controller
{
    /*
    |--------------------------------------------------------------- -----------
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
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }


    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        return redirect('/users')->with('status', 'New User Added');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
      $aneka = ['Accountability','Nationalism','Public Ethics','Quality Commitment', 'Anti-Corruption'];
      $thk = ['Parahyangan','Pawongan','Palemahan'];

      // dd(count($aneka));

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'token' => str_random(20),
            'role' => 1,
        ]);

        //membuat bobot kosong dulu ketika user evaluator dibuat
        for ($j=0; $j < count($thk); $j++) {
          for ($i=0; $i < count($aneka) ; $i++) {
            $bobotEvaluator = Bobot::create([
                'user_id' => $user -> id,
                'thk' => $thk[$j],
                'aneka' => $aneka[$i],
                'nilai' => 0,
            ]);
          }
        }





        Mail::to($user->email)->send(new UserRegistered($user ));
    }


}
