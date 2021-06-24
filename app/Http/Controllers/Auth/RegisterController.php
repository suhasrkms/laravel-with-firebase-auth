<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Kreait\Firebase\Auth as FirebaseAuth;
use Kreait\Firebase\Exception\FirebaseException;
use Illuminate\Validation\ValidationException;
use Session;

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
    protected $auth;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
     protected $redirectTo = RouteServiceProvider::HOME;
    public function __construct(FirebaseAuth $auth) {
       $this->middleware('guest');
       $this->auth = $auth;
    }
    protected function validator(array $data) {
       return Validator::make($data, [
          'name' => ['required', 'string', 'max:255'],
          'email' => ['required', 'string', 'email', 'max:255'],
          'password' => ['required', 'string', 'min:8', 'max:12', 'confirmed'],
       ]);
    }
    protected function register(Request $request) {
       try {
         $this->validator($request->all())->validate();
         $userProperties = [
            'email' => $request->input('email'),
            'emailVerified' => false,
            'password' => $request->input('password'),
            'displayName' => $request->input('name'),
            'disabled' => false,
         ];
         $createdUser = $this->auth->createUser($userProperties);
         return redirect()->route('login');
       } catch (FirebaseException $e) {
          Session::flash('error', $e->getMessage());
          return back()->withInput();
       }
    }
 }
