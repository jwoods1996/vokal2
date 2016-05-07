<?php

class PostSeeder extends Seeder {
    function run() {
        $post = new Post;
        $post->image = 'https://s3.amazonaws.com/whisperinvest-images/default.png';
        $post->name = 'Ed';
        $post->title = 'This is a title';
        $post->message = 'This is a message';
        $post->commentsAmount = 0;
        $post->save(); 
        
        $post = new Post;
        $post->image = 'https://s3.amazonaws.com/whisperinvest-images/default.png';
        $post->name = 'Edd';
        $post->title = 'This is another title';
        $post->message = 'This is another message';
        $post->commentsAmount = 0;
        $post->save();       
        
        $post = new Post;
        $post->image = 'https://s3.amazonaws.com/whisperinvest-images/default.png';
        $post->name = 'Eddy';
        $post->title = 'This is yet another title';
        $post->message = 'This is yet another message';
        $post->commentsAmount = 0;
        $post->save();   
    }
}