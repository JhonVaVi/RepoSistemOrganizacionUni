<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Course
 *
 * @property $id
 * @property $name
 * @property $class
 * @property $description
 * @property $color
 * @property $teacher_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Teacher $teacher
 * @property UserCourse[] $userCourses
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Course extends Model
{
    
    static $rules = [
		'name' => 'required',
		'class' => 'required',
		'description' => 'required',
		'color' => 'required',
		'teacher_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','class','description','color','teacher_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function teacher()
    {
        return $this->hasOne('App\Models\Teacher', 'id', 'teacher_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userCourses()
    {
        return $this->hasMany('App\Models\UserCourse', 'course_id', 'id');
    }
    

}
