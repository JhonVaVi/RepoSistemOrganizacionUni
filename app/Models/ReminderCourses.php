<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReminderCourses extends Model
{
    use HasFactory;
    protected $table = 'reminder_courses';

    protected $fillable = ['reminder_id','user_course_id'];

    public function reminder()
    {
        return $this->belongsTo(Reminder::class);
    }

    public function userCourse()
    {
        return $this->belongsTo(UserCourse::class);
    }
}
