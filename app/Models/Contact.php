<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Contact
 *
 * @property $id
 * @property $name
 * @property $surname
 * @property $email
 * @property $number
 * @property $user_id
 * @property $created_at
 * @property $updated_at
 *
 * @property ContactEmail[] $contactEmails
 * @property ContactNumber[] $contactNumbers
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Contact extends Model
{

    static $rules = [
		'name' => 'required',
		'surname' => 'required',
		'email' => 'required | unique:contacts',
		'number' => 'required',

    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','surname','email','number','user_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contactEmails()
    {
        return $this->hasMany('App\Models\ContactEmail', 'contact_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contactNumbers()
    {
        return $this->hasMany('App\Models\ContactNumber', 'contact_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }


}
