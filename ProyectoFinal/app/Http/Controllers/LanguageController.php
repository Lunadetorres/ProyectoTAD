<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function changeLanguage($language, Request $request)
    {
        if (in_array($language, ['en', 'es', 'pl'])) {
            Session::put('locale', $language);
            App::setLocale($language);
        }

        return response()->json(['status' => 'success']);
    }
}
