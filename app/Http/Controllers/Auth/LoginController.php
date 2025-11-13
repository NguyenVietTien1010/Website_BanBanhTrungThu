<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    /**
     * Override login function để cho phép plain-text password (chỉ khi local)
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // ✅ 1. Thử login theo cách thông thường (bcrypt hash)
        if (Auth::attempt($credentials)) {
            return redirect()->intended($this->redirectPath());
        }

        // ⚙️ 2. Nếu là môi trường local -> cho phép plain-text password
        if (app()->environment('local')) {
            $user = User::where('email', $credentials['email'])
                        ->where('password', $credentials['password'])
                        ->first();

            if ($user) {
                Auth::login($user);
                return redirect()->intended($this->redirectPath());
            }
        }

        // ❌ 3. Nếu login thất bại
        return back()->withErrors([
            'email' => 'Thông tin đăng nhập không chính xác.',
        ]);
    }
}
