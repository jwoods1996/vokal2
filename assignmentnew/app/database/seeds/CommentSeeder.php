<?php

class CommentSeeder extends Seeder {
    function run() {
        $comment = new Comment;
        $comment->image = 'https://s3.amazonaws.com/whisperinvest-images/default.png';
        $comment->name = 'Ed';
        $comment->message = 'This is a comment';
        $post = Post::find(1);
        $post->comments()->save($comment);
        
        $comment = new Comment;
        $comment->image = 'https://s3.amazonaws.com/whisperinvest-images/default.png';
        $comment->name = 'Ed';
        $comment->message = 'This is a extra comment on the first post';
        $post = Post::find(1);
        $post->comments()->save($comment); 
        
        $comment = new Comment;
        $comment->image = 'https://s3.amazonaws.com/whisperinvest-images/default.png';
        $comment->name = 'Edd';
        $comment->message = 'This is another comment';
        $post = Post::find(2);
        $post->comments()->save($comment);  
        
        $comment = new Comment;
        $comment->image = 'https://s3.amazonaws.com/whisperinvest-images/default.png';
        $comment->name = 'Edd';
        $comment->message = 'This is another comment on the second post';
        $post = Post::find(2);
        $post->comments()->save($comment);     
        
        $comment = new Comment;
        $comment->image = 'https://s3.amazonaws.com/whisperinvest-images/default.png';
        $comment->name = 'Eddy';
        $comment->message = 'This is yet another comment';
        $post = Post::find(3);
        $post->comments()->save($comment); 
    }
}