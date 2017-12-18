<?php

namespace App\Http\Controllers\Api;

use App\Models\Person;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PeopleController extends Controller
{
    public function index() {
        return Person::all();
    }
 
    public function show($id) {
        return Person::with('products')->find($id);
    }

    public function edit($id) {
        return Person::find($id);
    }
 
    public function update(Request $request, $id) {
        $person = Person::find($id);
        $person->update($request->all());
 
        return $person;
    }
 
    public function store(Request $request) {
        $person = Person::create($request->all());
        return $person;
    }
 
    public function destroy($id) {
        $person = Person::find($id);
        $person->delete();
        return '';
    }
}
