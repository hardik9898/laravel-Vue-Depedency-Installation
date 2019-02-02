<?php

namespace App\Http\Controllers;

use App\Phonebook;
use App\Http\Requests\PhonebookRequest;
use Illuminate\Http\Request;

class PhonebookController extends Controller
{
    public $view='phonebook';

    public function index()
    {
        return view($this->view);
    }

    public function getData()
    {
        return Phonebook::orderBy('id','desc')->get();
    }

    public function create()
    {
        //
    }

    public function store(PhonebookRequest $request)
    {
       return Phonebook::create([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'email'=>$request->email
        ]);
    }

   
    public function show(Phonebook $phonebook)
    {
        //
    }

   
    public function edit(Phonebook $phonebook)
    {
        //
    }

    public function update(Request $request, Phonebook $phonebook)
    {
        $phonebook->update([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'email'=>$request->email

        ]);
    }

    public function destroy(Phonebook $phonebook)
    {
        $phonebook->delete();
    }
}
