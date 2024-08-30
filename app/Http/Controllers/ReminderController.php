<?php

namespace App\Http\Controllers;

use App\Models\Reminder;
use App\Models\ReminderCourses;
use App\Models\UserCourse;
use Illuminate\Http\Request;

class ReminderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$reminders = Reminder::all();
        $reminderCourses = ReminderCourses::all();
//trae todos los reminder que no estes asifnados a un curso
//traeme los reminder que estes asignado a un cursos


        $reminders = Reminder::whereDoesntHave('reminderCourses')->get();

        return view('reminders.index', compact('reminders', 'reminderCourses'));

        // return view('reminders.index', compact('reminders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $courses = UserCourse::all();
        // return $courses;
        return view('reminders.create', compact('courses'));
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

        $request->validate(Reminder::$rules);

        $reminder = Reminder::create([
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'description' => $request->description,
            'color' => $request->color,
            'start' => $request->start,
            'end' => $request->end,
            'user_id' => auth()->user()->id,
        ]);
       //return $request->user_course_id;
        if ($request->confir == 'on') {

            ReminderCourses::create([
                'reminder_id' => $reminder->id,
                'user_course_id' => $request->user_courses_id,
            ]);
        }
        return redirect()->route('reminders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reminder  $reminder
     * @return \Illuminate\Http\Response
     */
    public function show(Reminder $reminder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reminder  $reminder
     * @return \Illuminate\Http\Response
     */
    public function edit(Reminder $reminder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reminder  $reminder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reminder $reminder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reminder  $reminder
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reminder $reminder)
    {
        //
    }
}
