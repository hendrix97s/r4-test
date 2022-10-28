<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthenticateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateController extends Controller
{
    //
    public function authenticate(AuthenticateRequest $request)
    {
      $credentials = $request->validated();
      $user = User::where('email', $credentials['email'])->first();
      if(!$user) 
        return response()->json(['message' => 'Unauthorized'], 401);
      
      if(!auth()->attempt($credentials))
        return response()->json(['message' => 'Unauthorized'], 401);
  
      // registra ultimo acesso
      return response()->json([
        'message' => 'User authenticated',
        'user' => Auth::user(),
      ]);
    }

    public function logout()
    {
      Auth::logout();
      return response()->json(['message' => 'Successfully logged out']);
    }
}
