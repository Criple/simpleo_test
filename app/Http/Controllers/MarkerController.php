<?php

namespace App\Http\Controllers;

use App\Models\Marker;
use Illuminate\Http\Request;

class MarkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $markers = Marker::all();

        return view('marker.index', compact('markers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('marker.create');
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
            'lat' => 'required|numeric',
            'lon' => 'required|numeric',
            'tel' => 'string|nullable',
            'description' => 'string|nullable'
        ]);
        Marker::create($request->all());

        return redirect()->route('marker.index')->with('success','Marker created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Marker $marker)
    {
        return view('marker.show',compact('marker'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Marker $marker)
    {
        return view('marker.edit',compact('marker'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Marker $marker)
    {
        $request->validate([
            'lat' => 'required|numeric',
            'lon' => 'required|numeric',
            'tel' => 'string|nullable',
            'description' => 'string|nullable'
        ]);
        $marker->update($request->all());

        return redirect()->route('marker.index')->with('success','Marker updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marker $marker)
    {
        $marker->delete();

        return redirect()->route('marker.index')
            ->with('success','Marker deleted successfully!');
    }

    /**
     * Show markers map.
     *
     * @return \Illuminate\Http\Response
     */

    public function showMap(){
        $markers = Marker::all();

        return view('marker.markers_map',compact('markers'));
    }

}
