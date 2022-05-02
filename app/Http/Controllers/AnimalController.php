<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Type;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
  public function create()
  {
    $types = Type::all();

    return view('animal.create', [
      'types' => $types,
    ]);
  }
  public function store(Request $request)
  {
    $request->validate([
      'name' => 'required',
      'sex' => 'required',
      'age' => 'required',
      'type' => 'required',
      'image' => 'required|image'
    ]);
    $path = $request->file('image')->store('public');

    $animal = new Animal();
    $animal->name = $request->input('name');
    $animal->sex = $request->input('sex');
    $animal->age = $request->input('age');
    $animal->type()->associate(Type::find($request->input('type')));
    $animal->image = $path;
    $animal->save();


    return redirect()->route('post.index')->with('success', "Successfully added {$request->input('name')}");
  }
}
