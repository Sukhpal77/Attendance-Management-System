<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    // app/Http/Controllers/SessionController.php
public function refreshToken() {
    return response()->json([
        'token' => csrf_token(),
    ]);
}

}
