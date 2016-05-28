<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
    public static $rules = array('email' => 'required|unique:users', 'password' => 'required', 'firstName' => 'required', 'lastName' => 'required', 'dob' => 'required');    
    public static $searchrules = array('searchTerm' => 'required');    
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
    function posts()
    {
        Eloquent::unguard();
        return $this->hasMany('Post');
    }
    function friends()
    {
        Eloquent::unguard();
        return $this->hasMany('Friend');
    }
    //function friends()
    //{
    //    Eloquent::unguard();
    //    return $this->hasMany('Friend');
    //}
}
