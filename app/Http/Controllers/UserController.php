<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::withTrashed()->get();
        return view('users.index', ['msg' => "", 'users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
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
        'name_lastname' => 'required|max:255',
        'email' => 'required|unique:users',
        'password' => 'required|max:255'
    ]);
    User::create([
        'name' => $request->input('name_lastname'),
        'email' => $request->input('email'),
        'password' => bcrypt($request->input('password'))
    ]);

    return redirect()->route('users.index')->with('success', 'El usuario ha sido guardado con éxito.');
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
        $users = User::find($id);
        return view('users.edit', ['users' => $users]);
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
            'name_lastname' => 'required|max:255',
            'email' => 'required|unique:users,email,' . $id
        ]);

        User::where('id', $id)->update([
            'name' => $request->input('name_lastname'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);

        return redirect()->route('users.index')->with('success', 'El usuario ha sido actualizado correctamente.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::withTrashed()->find($id);
        $users->delete();
        return redirect()->route('users.index')->with('success', 'El usuario ha sido eliminado correctamente.');
    }
}
