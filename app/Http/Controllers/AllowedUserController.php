<?php

namespace App\Http\Controllers;

use App\AllowedUser;
use Illuminate\Http\Request;

class AllowedUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = AllowedUser::all();
        return view('alloweduser.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $allowedUser = new AllowedUser;
        if($request->getMethod()=='GET'){
            return view('alloweduser.create', []);
        }

        $allowedUser->name = $request->input('name');
        $allowedUser->tell = $request->input('tell');
        $allowedUser->save();
        return redirect()->route('allowusers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AllowedUser  $allowed_user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $allowedUser = AllowedUser::where('id', $id)->first();
        if($allowedUser==null){
            $request->session()->flash("msg_error", "خطا!");
            return redirect()->route('allowusers');
        }

        $allowedUser->delete();
        return redirect()->route('allowusers');
    }
}
