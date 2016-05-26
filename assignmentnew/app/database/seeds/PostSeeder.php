<?php

class PostSeeder extends Seeder {
    function run() {
        $post = new Post;
        $post->image = 'https://s3.amazonaws.com/whisperinvest-images/default.png';
        $post->name = 'Bob';
        $post->title = "Bob's post 1";
        $post->message = "Bob's public post";
        $post->commentsAmount = 0;
        $post->save(); 
        
        $post = new Post;
        $post->image = 'https://s3.amazonaws.com/whisperinvest-images/default.png';
        $post->name = 'Bob';
        $post->title = "Bob's post 1";
        $post->message = "Bob's friends post";
        $post->commentsAmount = 0;
        $post->save();     
        
        $post = new Post;
        $post->image = 'https://s3.amazonaws.com/whisperinvest-images/default.png';
        $post->name = 'Bob';
        $post->title = "Bob's post 1";
        $post->message = "Bob's private post";
        $post->commentsAmount = 0;
        $post->save();   
    }
}