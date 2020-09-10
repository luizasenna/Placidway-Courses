<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Subject;
use App\Course;
use App\Enrollment;
use Auth;
use Illuminate\Support\Facades\DB;

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
       if ($id == $student or $id->type<>0){
        return view('home');
        }


       //$courses = Course::orderBy('idSubject')->get();
       $courses = DB::select('select courses.id as id, courses.name as name, courses.idsubject as idsubject, subjects.name as subname, ifnull(idcourse, 0) as done from courses
                  inner join subjects on subjects.id = courses.idsubject
                  left join enrollments on courses.id = enrollments.idcourse
                  and iduser = '.$stId.'
                  order by idSubject, id'); //dd($courses);

       $enrolls = Enrollment::orderBy('idSubject')->get();
       $enrolled = Enrollment::where('iduser','=',$stId)->get();


       return view('teacher.enroll', [
         'courses' => $courses,
         'id' => $id,
         'student' => $student,
         'enrolls' => $enrolls,
         'enrolled' => $enrolled
       ]);

      }

      public function goEnroll(Request $request)
         {
           $input = $request->all();
           $idcourse = $request->input('idcourse');
           $iduser = $request->input('iduser');

           $input['idcourse'] = $idcourse;
        //   dd($input['idcourse']);

        //  dd($iduser);
           Enrollment::where('iduser', $iduser)->delete();

           $x = 0;
           $size = count($idcourse)-1;
           for ($x = 0; $x <= $size; $x++) {
          //   dd($idcourse[$x]);
             $enrollment = Enrollment::create(array('iduser' => '0','idteacher' => '0','idcourse' => '0'));
             $enrollment->idcourse = $request->idcourse[$x];
              $enrollment->iduser = $request->iduser;
               $enrollment->idteacher = $request->idteacher;
             $enrollment->save();
            }

           //Flash::success('Emprestimo saved successfully.');

           //return self::enroll($iduser);
           return redirect()->intended('enroll/'.$iduser)->with('status' , 'Enrollment created or updated with success');

         }


}
