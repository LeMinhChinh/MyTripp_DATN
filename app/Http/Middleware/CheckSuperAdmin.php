<?php

namespace App\Http\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use Closure;

class CheckSuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!$this->checkLogin()){
            return redirect()->route('login');
        }
        return $next($request);
    }

    private function getIdSessionAdmin()
    {
        $id = Session::get('idSession');
        return (is_numeric($id) && $id > 0) ? $id : 0;
    }

    private function getRoleSessionAdmin()
    {
        $id = Session::get('roleSession');
        return (is_numeric($id) && $id > 0) ? $id : 0;
    }

    private function getEmailSessionAdmin()
    {
        $email = Session::get('emailSession');
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            return $email;
        }
        return null;
    }

    private function checkLogin()
    {
        $id = $this->getIdSessionAdmin();
        $email = $this->getEmailSessionAdmin();
        $role = $this->getRoleSessionAdmin();
        // dd($id, $email, $role);
        if($id > 0 && $email && $role == 2){
            return true;
        }
        return false;
    }
}
