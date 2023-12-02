<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class ContactsController extends Controller
{
    public function __invoke(){
        return view('front.contacts');
    }
}
