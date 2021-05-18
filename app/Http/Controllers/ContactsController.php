<?php

namespace App\Http\Controllers;

use App\Contacts;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function __invoke(){
        $contacts = Contacts::all();
        return view('contacts', ['contacts' => $contacts]);
    }
}
