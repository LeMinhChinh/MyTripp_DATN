<?php

namespace App\Http\Middleware;

use Closure;

class checkAccountLogin
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

    private function getIdSession()
    {
        $id = Session::get('idSession');
        return (is_numeric($id) && $id > 0) ? $id : 0;
    }

    private function getEmailSession()
    {
        $email = Session::get('emailSession');
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            return $email;
        }
        return null;
    }

    private function checkLogin()
    {
        $id = $this->getIdSession();
        $email = $this->getEmailSession();
        if($id > 0 && $email){
            return true;
        }
        return false;
    }
}
