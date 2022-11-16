<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Models\Ship;
use Illuminate\Http\Request;
use Image;

class CargoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cargos = Cargo::all();
        return view('cargo.index', ['cargos' => $cargos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cargo.create', [
            'ships' => Ship::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cargo = new Cargo;

        if ($request->file('image')) {
            $image = $request->file('image');

            $ext = $image->getClientOriginalExtension();

            $name = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);

            $file = $name . '-' . rand(100000, 999999) . '.' . $ext;

            $Image = Image::make($image)->resize(100, 100);

            $Image->save(public_path() . '/cargos/' . $file);

            // $image->move(public_path() . '/cargos', $file);

            $cargo->image = asset('/cargos') . '/' . $file;
        }

        $cargo->title = $request->title;
        $cargo->type = $request->type;
        $cargo->client = $request->client;
        $cargo->ship_id = $request->ship_id;
        $cargo->save();

        return redirect()->route('cargo_index')->with('msg', 'Cargo registered!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function show(Cargo $cargo)
    {
        return view('cargo.show', ['cargo' => $cargo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function edit(Cargo $cargo)
    {
        return view('cargo.edit', ['cargo' => $cargo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cargo $cargo)
    {
        $cargo->title = $request->title;
        $cargo->type = $request->type;
        $cargo->client = $request->client;
        $cargo->ship_id = $request->ship_id;

        if ($request->delete_image) {
            unlink(public_path() . '/cargos/' . pathinfo($cargo->image, PATHINFO_FILENAME) . '.' . pathinfo($cargo->image, PATHINFO_EXTENSION));
            $cargo->image = null;
        }

        if ($request->file('image')) {
            if ($cargo->image) {
                unlink(public_path() . '/cargos/' . pathinfo($cargo->image, PATHINFO_FILENAME) . '.' . pathinfo($cargo->image, PATHINFO_EXTENSION));
            }
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $name = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $file = $name . '-' . rand(100000, 999999) . '.' . $ext;
            $Image = Image::make($image)->resize(100, 100);
            $Image->save(public_path() . '/cargos/' . $file);
            $cargo->image = asset('/cargos') . '/' . $file;
        }

        $cargo->save;
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cargo $cargo)
    {
        $cargo->delete();
        return redirect()->route('cargo_index');
    }
}
