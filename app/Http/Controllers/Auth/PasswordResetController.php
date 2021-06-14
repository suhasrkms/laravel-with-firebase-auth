<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Auth;
use Kreait\Firebase\Exception\FirebaseException;
use Illuminate\Validation\ValidationException;
use Session;


class PasswordResetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view("passwords.reset");
    }

    public function verify_email()
    {
      $uid = Session::get('uid');
      $verify = app('firebase.auth')->getUser($uid)->emailVerified;
        if ($verify == 1) {
          return redirect()->route('home');
        }
        else{
          try {
            $email = app('firebase.auth')->getUser($uid)->email;
            $link = app('firebase.auth')->sendEmailVerificationLink($email);
          } catch (FirebaseException $e) {
            Session::flash('error', $e->getMessage());
          }
          return view("passwords.verify");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
          'email' => 'required',
        ]);
        try {
            $email = $request->email;
            $link = app('firebase.auth')->sendPasswordResetLink($email);
            Session::flash('message', 'An email has been sent. Please check your inbox.');
            return back()->withInput();
        } catch (FirebaseException $e) {
          Session::flash('error', $e->getMessage());
          return back()->withInput();
        }




        // $link = app('firebase.auth')->getPasswordResetLink('suhas01072002@gmail.com');
        // $data['link'] = $link;
        // Mail::send('passwords.reset', compact('data'),
        // function ($m) {
        //   $m->to('suhas01072002@gmail.com','hawle')
        //   ->subject('Password Reset');
        // });
        // return view('passwords.reset');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function verify($request)
    {
        //
        try {
          $uid = Session::get('uid');
          $email = app('firebase.auth')->getUser($uid)->email;
          $link = app('firebase.auth')->sendEmailVerificationLink($email);

          Session::flash('resent', 'An email has been sent. Please check your inbox.');
          return back()->withInput();
        } catch (FirebaseException $e) {
          Session::flash('error', $e->getMessage());
          return back()->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
