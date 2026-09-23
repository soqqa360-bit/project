<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function switchLang($locale) {
        $anaviableLocales = ['uz', 'ru', 'en'];

        if(in_array($locale, $anaviableLocales)) {
            session()->put('locale', $locale);
        }

        return redirect()->back();
    }
}
