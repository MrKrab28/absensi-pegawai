<?php
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Auth;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
           RedirectIfAuthenticated::redirectUsing(function (){
            if (Auth::guard('admin')->check()){
                return route('admin.dashboard');
            }
            elseif (Auth::guard('pegawai')->check()){
                return route('pegawai.dashboard');
            }
            elseif(Auth::guard('user')->check()){
                return route('user.dashboard');
            }
            else{
                Auth::logout();
                return route('login');
            }
        });
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
