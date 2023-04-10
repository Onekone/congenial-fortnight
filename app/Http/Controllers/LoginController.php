<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\SocialiteCallbackRequest;
use App\Http\Requests\Auth\SocialiteLoginRequest;
use App\Models\User;
use GuzzleHttp\Exception\ServerException;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\InvalidStateException;

class LoginController extends Controller
{
    public function loginView()
    {
        return view('login');
    }

    public function login(LoginRequest $request)
    {
        [$login, $password, $remember] = [$request->get('login'), $request->get('password'), $request->get('remember')];

        $attempt = auth()->attempt([
            'name'            => $login,
            'password'        => $password,
            'external_driver' => null,
            'external_id'     => null,
        ], $remember);

        if (!$attempt) {
            if (!User::whereName($request->get('login'))->whereExternalDriver(null)->exists()) {
                $user = User::updateOrCreate([
                    'name'     => $login,
                    'password' => Hash::make($password),
                ], [
                    'display_name' => $login,
                ]);

                auth()->login($user);

                return redirect('/');
            }

            return back()->withErrors(['login' => 'Неверно введен логин или пароль'])->withInput($request->except('password'));
        }

        return redirect('/');
    }

    public function logout()
    {
        auth()->logout();

        return redirect('/login');
    }

    public function socialite($driver, SocialiteLoginRequest $request)
    {
        return Socialite::driver($driver)->redirect();
    }

    public function socialiteCallback($driver, SocialiteCallbackRequest $request)
    {
        try {
            $socialite = Socialite::driver($driver)->stateless()->user();
        } catch (ServerException $exception) {
            return back()->withErrors(['login' => 'Технические проблемы с ВК. Попробуйте позже']);
        } catch (InvalidStateException $exception) {
            return back()->withErrors(['login' => 'Попробуйте войти снова']);
        }

        $user = User::updateOrCreate([
            'external_driver' => $driver,
            'external_id'     => $socialite->getId(),
        ], [
            'name'                   => $socialite->getNickname(),
            'display_name'           => $socialite->getName(),
            'external_access_token'  => $socialite->token,
            'external_refresh_token' => $socialite->refreshToken ?? null,
            'password'               => 'external',
        ]);

        auth()->login($user, true);

        return redirect('/');
    }
}
