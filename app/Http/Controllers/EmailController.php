<?php

namespace miniCRM\Http\Controllers;

use Illuminate\Http\Request;
use miniCRM\Mail\NewCompany;
use Illuminate\Support\Facades\Auth;
use Lang;

class EmailController extends Controller
{
    public function sendMail()
    {
      $user = Auth::user();
      \Mail::to($user)->send(new NewCompany);
      return redirect('companies/index')->withErrors(Lang::get('ui.deleted'));
    }
}
