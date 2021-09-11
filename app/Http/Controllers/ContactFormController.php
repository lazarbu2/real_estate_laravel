<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    public function create(){
        return view('pages.contact');
    }

    public function store(){
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
            'url' => 'required'


        ]);

        Mail::to('lazarbu2@gmail.com')->send(new ContactFormMail($data));

        return redirect()->back()->with('success', 'Poruka uspešno poslata');

    }
}
