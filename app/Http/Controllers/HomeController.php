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
        $this->middleware('auth');
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

         return view('teacher.teacher', [
           'courses' => $courses,
           'id' => $id,
           'students' => $students
         ]);

       }

         return view('home');

    }

     public function enroll($stId)
     {

       $id = User::find(Auth::id());
       $student =  User::find($stId);
       $courses = Course::orderBy('idSubject')->get();
       $enrolls = Enrollment::orderBy('idSubject')->get();

       if ($id == $student or $id->type<>0){
        return view('home');
        }

       return view('teacher.enroll', [
         'courses' => $courses,
         'id' => $id,
         'student' => $student,
         'enrolls' => $enrolls
       ]);

      }

      public function goEnroll(Request $request)
         {
           $input = $request->all();
           Enrollment::where('iduser', '1')->delete();
           $enrollment = Enrollment::create($request->all());
           $enrollment->save();


           //Flash::success('Emprestimo saved successfully.');

           return enroll();

         }


}
