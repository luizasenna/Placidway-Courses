<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Subject;
use App\Course;
use App\Enrollment;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      if (Auth::guard($guard)->check()) {
           return redirect('/welcome');
       }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       $id = User::find(Auth::id());
       $courses = Course::orderBy('idsubject')->get();
       $students = User::where('type','=','1')->get();


       if ($id->type==0) {

         return view('teacher', [
           'courses' => $courses,
           'id' => $id,
           'students' => $students
         ]);

       }

         return view('home');


    }
}
