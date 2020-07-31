<?php

namespace App\Http\Controllers;

use App\User;
use App\Service;
use App\Fonction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('services')
                   ->join('users', 'users.service_id','services.id')
                   ->get();
        return view('users/index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();
        $fonctions = Fonction::all();
        return view('users/create')->with('services',$services)
                                       ->with('fonctions', $fonctions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'prenom' => 'required',
            'service_id' => 'required',
            'fonction_id' => 'required',
            'genre' => 'required',
            'age' => 'required',
            'tel' => 'required',
            'email' => 'required',
            'cni' => 'required',
            'adresse' => 'required',
         ]);
  
        $user= new User();
        $user->name = $request->name;
        $user->prenom = $request->prenom;
        $user->service_id = $request->service_id;
        $user->fonction_id = $request->fonction_id;
        $user->genre = $request->genre;
        $user->age = $request->age;
        $user->adresse = $request->adresse;
        $user->tel = $request->tel;
        $user->email = $request->email;
        $user->cni = $request->cni;
        $user->save();
        return redirect('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user= User::find($user->id);
        $service = DB::table('services')->where('id',$user->service_id)
                                        ->first();
        $fonction = DB::table('fonctions')->where('id',$user->fonction_id)
                                          ->first();
        $services = Service::all();
        $fonctions = Fonction::all();
        return view('users/edit', [
            'user' => $user,
            'services' => $services,
            'fonctions' => $fonctions,
            'service' => $service,
            'fonction' => $fonction
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'prenom' => 'required',
            'service_id' => 'required',
            'fonction_id' => 'required',
            'genre' => 'required',
            'age' => 'required',
            'tel' => 'required',
            'email' => 'required',
            'cni' => 'required',
            'adresse' => 'required',
         ]);
        
        $user->name = $request->name;
        $user->prenom = $request->prenom;
        $user->genre = $request->genre;
        $user->age = $request->age;
        $user->adresse = $request->adresse;
        $user->tel = $request->tel;
        $user->email = $request->email;
        $user->cni = $request->cni;
        $user->save();
        return redirect('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id)->first();
        $user->delete();
        return redirect('users');
    }
}
