<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Auth;
use Kreait\Auth\Request\UpdateUser;
use Kreait\Firebase\Exception\FirebaseException;
use App\Http\Controllers\Controller;
use Session;

class ProfileController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    //
    $uid = Session::get('uid');
    $user = app('firebase.auth')->getUser($uid);
    return view('auth.profile',compact('user'));
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
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {
    //
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
    $auth = app('firebase.auth');

    $user = $auth->getUser($id);
    try {
      if ($request->new_password == '' && $request->new_confirm_password =='') {
        $request->validate([
          'displayName' => 'required|min:3|max:12',
          'email' =>'required',
        ]);
        $properties =[
          'displayName' => $request->displayName,
          'email' => $request->email,
        ];
        $updatedUser = $auth->updateUser($id, $properties);
        if ($user->email != $request->email) {
          $auth->updateUser($id, ['emailVerified'=>false]);
        }
        Session::flash('message', 'Profile Updated');
        return back()->withInput();
      } else {
        $request->validate([
          'new_password' => 'required|max:18|min:8',
          'new_confirm_password' => 'same:new_password',
        ]);
        $updatedUser = $auth->changeUserPassword($id, $request->new_password);
        Session::flash('message', 'Password Updated');
        return back()->withInput();
      }
      return $input;
    } catch (\Exception $e) {
      Session::flash('error', $e->getMessage());
      return back()->withInput();
    }

  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    $updatedUser = app('firebase.auth')->disableUser($id);
    Session::flush();
    return redirect('/login');
  }
}
