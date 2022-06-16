<?php

namespace App\Http\Controllers;

use App\Models\Char;
use Illuminate\Http\Request;

class CharController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Char::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $maxid = Char::max('charid');
        $charid = $maxid ? $maxid + 1 : 1;
        $request->validate([
            'character' => 'required',
            'actor' => 'required'
        ]);
        $request['charid'] = $charid;

        return Char::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $charid
     * @return \Illuminate\Http\Response
     */
    public function show($charid)
    {
        return Char::where('charid', $charid)->get();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $charid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $charid)
    {
        $char = Char::where('charid', $charid);
        $char->update($request->all());
        return $char->get();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $charid
     * @return \Illuminate\Http\Response
     */
    public function destroy($charid)
    {
        return Char::where('charid', $charid)->delete();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  str  $name
     * @return \Illuminate\Http\Response
     */
    public function search($name)
    {
        return Char::where('character', 'like', '%' . $name . '%')->get();
    }
}
