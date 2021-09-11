<?php

namespace App\Http\Controllers;

use App\Mail\ViewPropertyFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ViewPropertyFormController extends Controller
{
    public function create()
    {
        return view('inc.view-property');
    }

    public function store()
    {
        $data = request()->validate([

            'name' => 'required',
            'email' =>'required|email',
            'tel' => 'required|regex:/[0-9]{9}/',
            'date' => 'required|date_format:"m/d/Y"',
            'time' => 'required',
            'url' => 'required'
        ]);

        Mail::to('lazarbu2@gmail.com')->send(new ViewPropertyFormMail($data));
        return redirect()->back()->with('success', 'Uskoro ćemo Vas kontaktirati za potvrdu gledanja.');


    }

}
