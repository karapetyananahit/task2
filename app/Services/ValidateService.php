<?php

namespace App\Services;

use Illuminate\Http\Request;

/**
 * Class ValidateService
 * @package App\Services
 */
class ValidateService
{
 public function val(Request $request){
     $request->validate([
         'title' => ['required', 'string', 'max:255'],
         'description' => ['required', 'string', 'max:255'],
         'text' => ['required', 'string'],

     ]);
     return $request;
 }
}
