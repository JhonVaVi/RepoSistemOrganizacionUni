<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Reminder
 *
 * @property $id
 * @property $title
 * @property $description
 * @property $start
 * @property $end
 * @property $color
 * @property $created_at
 * @property $updated_at
 *
 * @property ReminderCourse[] $reminderCourses
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Reminder extends Model
{

    static $rules = [
		'title' => 'required',
		'description' => 'required',
		'start' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title','description','start','end','color','user_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reminderCourses()
    {
        return $this->hasMany(ReminderCourses::class, 'reminder_id', 'id');
    }


}
