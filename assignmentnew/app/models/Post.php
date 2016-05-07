<?php

class Post extends Eloquent {
    protected $fillable = ['image', 'name', 'title', 'message', 'commentsAmount'];
    public static $rules = array('title' => 'required', 'name' => 'required', 'message' => 'required'); 
    function comments()
    {
        Eloquent::unguard();
        return $this->hasMany('Comment');
    }
}