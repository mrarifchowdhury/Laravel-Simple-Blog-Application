<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\User;
use Auth;
use Carbon\Carbon;
use Response;


class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        
        $user= User::all();
        $blog= Blog::all();

        $date = Carbon::now()->subDays(30);
        $blog7days = Blog::where('created_at', '>=', $date)->get();

        $current_user = Auth::user()->name;

        $last7BlogsByUser = Blog::select('*')
                            ->where('created_by','=', $current_user)
                            ->orderBy('blogs.created_at', 'desc')
                            ->limit(7)
                            ->get();
        $last7BlogsByAll = Blog::select('*')
                            ->orderBy('blogs.created_at', 'desc')
                            ->limit(7)
                            ->get();
        
        return view('Dashboard', compact('user','blog', 'blog7days','last7BlogsByUser','last7BlogsByAll') );
    }

    public function allblogs()
    {   
        $current_user = Auth::user()->name;

        if( $current_user == 'Admin' )
        {
            $data['allData'] = Blog::all();
        }
        else{
            $data['allData'] = Blog::select('*')
                                ->where('created_by', '=', $current_user)
                                ->orderBy('created_at', 'asc')
                                ->get();
        }
        
        
        return view('blogs.allblogs', $data);
    }


    
}
