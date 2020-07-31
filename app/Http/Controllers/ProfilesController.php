<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(Auth::id());
        return view('profiles/index',[
            'user' => $user
        ]);
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
        $user = User::find($id);

        return view('profiles/edit', [
            'user' => $user
        ]);
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
        $request->validate([
            'name' => 'required',
            'prenom' => 'required',
            'genre' => 'required',
            'age' => 'required',
            'tel' => 'required',
            'adresse' => 'required',
            'cni' => 'required',
            'email' => 'required',
            'password' => ['required', 'min:8', 'confirmed']
        ]);
        $user = User::find($id);

        $user->name = $request->name;
        $user->prenom = $request->prenom;
        $user->genre = $request->genre;
        $user->age = $request->age;
        $user->adresse = $request->adresse;
        $user->tel = $request->tel;
        $user->email = $request->email;
        $user->cni = $request->cni;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect('profile')->with('success', 'Infos modifier avec succes');
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
