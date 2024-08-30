<?php

namespace App\Http\Controllers;

use App\Models\UserCourse;
use App\Models\Reminder;
use App\Models\ReminderCourses;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        $courses = UserCourse::where('user_id', Auth::user()->id)->get();
        // $reminders = Reminder::whereDoesntHave('reminderCourses')->get();
        // $remindersCourses = ReminderCourses::all();
        //traer los ultimos 5 reminder del modelo reminders
        $reminders = Reminder::where('user_id', Auth::user()->id)->latest()->take(5)->get();
        // $aux = Reminder::where('user_id', Auth::user()->id)->latest()->take(5)->get();
        //$reminders =  json_encode($aux);
        // return $reminders;
        return view('home', compact('courses', 'reminders'));
    }
}
