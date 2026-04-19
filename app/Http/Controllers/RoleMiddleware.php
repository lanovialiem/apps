<?php

namespace App\Http\Controllers;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware extends Controller
{
    //cek siapa login
    // cek role apa yang dimiliki user
    // jika role admin, maka boleh akses semua halaman

    public function handle($request, Closure $next, $role)
    {
        $userRole = Auth::user()->role->name; // Ambil role pengguna yang sedang login
        if ($userRole === $role) {
            return $next($request);
        }

        abort(403, 'Unauthorized');
    }
}
