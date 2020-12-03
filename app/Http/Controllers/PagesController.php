<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

use Illuminate\Validation\ValidationException;
use Mail;

use Carbon\Carbon;
use Eloquent;
use Illuminate\Database\Eloquent\Model;

/**
 * Post
 *
 * @mixin Eloquent
 */

class PagesController extends Controller
{

    public function getIndex(){
        return view('pages.welcome');
    }
    public function getAbout(){
        return view('pages.about');
    }


}
