<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teacher;
use App\Models\UserCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Termwind\Components\Dd;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //


        $courses = UserCourse::where('user_id', Auth::user()->id)->get();

        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $teachers = Teacher::all();
        return view('courses.create', compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate(
            Course::$rules
        );
        $curso = Course::create([
            'name' => $request->name,
            'class' => $request->class,
            'color' => $request->color,
            'description' => $request->description,
            'teacher_id' => $request->teacher_id,
        ]);

        UserCourse::create([
            'user_id' => Auth::user()->id,
            'course_id' => $curso->id,
        ]);

        return redirect()->route('courses.index')->with('success', 'Curso creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
        return view('courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
        //Dd($course);
        $teachers = Teacher::all();
        return view('courses.edit', compact('course', 'teachers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
        $request->validate(
            Course::$rules
        );
        $course->update([
            'class' => $request->class,
            'color' => $request->color,
            'description' => $request->description,
            'teacher_id' => $request->teacher_id,
        ]);
        return redirect()->route('courses.index')->with('success', 'Curso actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        /**
         * !verificar poque lo elimina si le paso ese dado
         * !verificar por que cuando le paso id del curso lo elimina en la bd
         *
         *  **/
        $aux = UserCourse::Destroy($course->id);
        return $aux;
        return redirect()->route('courses.index')->with('success', 'Curso eliminado con éxito');
        //return $course;
        // $course->delete();
        // return redirect()->route('courses.index')->with('success', 'Course deleted successfully');
    }
}
