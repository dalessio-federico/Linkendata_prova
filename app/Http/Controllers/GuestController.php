<?php

namespace App\Http\Controllers;

use App\guest;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function valida(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'birth_date' => 'required|date'
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $data = $request->all();
        $this->valida($request);
        $new_guest = new guest();
        $new_guest->fill($data);
        $new_guest->save();

        return redirect()->route('welcome')->with('success', 'Aggiunta nuovo utente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function show(guest $guest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function edit(guest $guest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, guest $guest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function destroy(guest $guest)
    {
        //
    }
}
