<?php

namespace App\Http\Controllers;

use App\Mail\OfferFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OfferFormController extends Controller
{
    public function create()
    {
        return view('offer.offering');
    }

    public function  store()
    {
        $data = request()->validate([
            'name' => 'required',
            'email' =>'required|email',
            'tel' => 'required|regex:/[0-9]{9}/',
            'adress' => 'required',
            'area' => 'required',
            'bedrooms' => 'required',
            'floor' => 'required',
            'price' => 'required'
        ]);

        Mail::to('lazarbu2@gmail.com')->send(new OfferFormMail($data));

        return redirect()->back()->with('success', 'Uspešno poslato. Uskoro ćemo Vas kontaktirati.');
    }
}
