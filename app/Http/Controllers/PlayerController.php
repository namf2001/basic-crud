<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    // index is a method that will return a view with all players
    public function index()
    {
        $players = Player::all();
        return view('players.index', compact('players'));
    }

    // create is a method that will return a view with a form to create a new player
    public function create()
    {
        return view('players.create');
    }

    // store is a method that will store a new player in the database
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'date_of_birth' => 'required|date',
            'phone' => 'required',
            'address' => 'required',
            'position' => 'required',
        ]);

        Player::create($data);

        return redirect()->route('players.index')->with('success', 'Product created successfully');
    }

    // show is a method that will return a view with a single player
    public function edit($id)
    {
        $player = Player::findOrFail($id);
        return view('players.edit', compact('player'));
    }

    // update is a method that will return a view with a form to update a player
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'date_of_birth' => 'required|date',
            'phone' => 'required',
            'address' => 'required',
            'position' => 'required',
        ]);

        $player = Player::findOrFail($id);
        $player->update($request->all());
        return redirect()->route('players.index')->with('success', 'Product updated successfully');
    }

    // destroy is a method that will delete a player from the database
    public function destroy($id)
    {
        $player = Player::findOrFail($id);
        $player->delete();
        return redirect()->route('players.index')->with('success', 'Product deleted successfully');
    }
}
