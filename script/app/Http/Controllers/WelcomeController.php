<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Video;
use App\Option;
use DB;

class WelcomeController extends Controller
{
    
	public function index()
	{
		 try {
        DB::connection()->getPdo();
        if(DB::connection()->getDatabaseName()){
            	if(!Auth::check()) {
			        session_start();
			        if(!isset($_SESSION['last_activity']))
			        {
			            $_SESSION['last_activity'] = time();
					}
					return redirect()->route('videos.index');
				}

				if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
					$ip = $_SERVER['HTTP_CLIENT_IP'];  
				}elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
					$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
				}else{  
					$ip = $_SERVER['REMOTE_ADDR'];  
				}
				return (new PostController())->index();
  

	        }else{
	            return redirect()->route('install');
	        }
	    } catch (\Exception $e) {
	        return redirect()->route('install');
	    }
	}

	public function logout()
	{
		request()->session()->flush();
		Auth::logout();

		return redirect()->route('login');
	}

	public function faq()
	{
		return view('faq');
	}

	public function terms()
	{
		return view('terms');	
	}

	public function privacy()
	{
		return view('privacy');
	}

	public function contact()
	{
		return view('contact');
	}

	public function about()
	{
		return view('about');	
	}
}
