<?php

class Comment extends Eloquent {
    protected $fillable = ['name', 'message'];
    public static $rules = array('name' => 'required', 'message' => 'required'); 
    function post()
    {
        Eloquent::unguard();
        return $this->belongsTo('Post');
    }
}