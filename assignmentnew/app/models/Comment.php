<?php

class Comment extends Eloquent {
    protected $fillable = ['image', 'name', 'message'];
    public static $rules = array('title' => 'required|min:5', 'message' => 'required'); 
    function post()
    {
        Eloquent::unguard();
        return $this->belongsTo('Post');
    }
}