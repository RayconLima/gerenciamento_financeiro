<?php

namespace App\Http\Controllers\Api\Auth;

use App\Domains\User\Actions\LoginUserAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\SignInFormRequest;

class LoginController extends Controller
{
    public function __invoke(SignInFormRequest $request, LoginUserAction $loginAction)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        $token = $loginAction->execute(LoginData::fromArray($credentials));

        if (!$token) {
            return response()->json(['message' => 'Credenciais inválidas'], 401);
        }

        return response()->json(['token' => $token]);
        // $input = $request->validated();

        // if (!auth()->attempt($input)) {
        //     throw new LoginInvalidException();
        // }

        // try {    
        //     session()->regenerate();
        //     $data = $this->authenticate($input['email'], $input['password']);
    
        //     return UserResource::make($data['user'])->additional($data['token']);
        // } catch (Exception $e) {
        //     throw new InternalServerException();
        // }
    }

    private function authenticate($email, $password)
    {
        $user = User::where('email', $email)->first();

        if (!$user || !Hash::check($password, $user->password)) {
            throw new LoginInvalidException();
        }

        $user->tokens()->delete();
        $token = $user->createToken('auth_token')->plainTextToken;

        return [
            'user' => $user,
            'token' => ['token' => $token],
        ];
    }
}