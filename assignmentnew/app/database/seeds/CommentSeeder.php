<?php

class CommentSeeder extends Seeder {
    function run() {
        $comment = new Comment;
        $comment->name = 'Bob';
        $comment->message = 'This is a comment';
        $post = Post::find(1);
        
        $comment->user_id = 1;
        $post->comments()->save($comment);
        
        $comment = new Comment;
        $comment->name = 'Bob';
        $comment->message = 'This is a extra comment on the first post';
        $post = Post::find(1);
        
        $comment->user_id = 1;
        $post->comments()->save($comment);
        
        $comment = new Comment;
        $comment->name = 'Bob';
        $comment->message = 'This is a extra comment on the first post';
        $post = Post::find(1);
        
        $comment->user_id = 1;
        $post->comments()->save($comment);
        
        $comment = new Comment;
        $comment->name = 'Bob';
        $comment->message = 'This is a extra comment on the first post';
        $post = Post::find(1);
        
        $comment->user_id = 1;
        $post->comments()->save($comment);
        
        $comment = new Comment;
        $comment->name = 'Bob';
        $comment->message = 'This is a extra comment on the first post';
        $post = Post::find(1);
        
        $comment->user_id = 1;
        $post->comments()->save($comment);
        
        $comment = new Comment;
        $comment->name = 'Bob';
        $comment->message = 'This is a extra comment on the first post';
        $post = Post::find(1);
        
        $comment->user_id = 1;
        $post->comments()->save($comment);
        
        $comment = new Comment;
        $comment->name = 'Bob';
        $comment->message = 'This is a extra comment on the first post';
        $post = Post::find(1);
        
        $comment->user_id = 1;
        $post->comments()->save($comment);
        
        $comment = new Comment;
        $comment->name = 'Bob';
        $comment->message = 'This is a extra comment on the first post';
        $post = Post::find(1);
        
        $comment->user_id = 1;
        $post->comments()->save($comment);
        
        $comment = new Comment;
        $comment->name = 'Bob';
        $comment->message = 'This is a extra comment on the first post';
        $post = Post::find(1);
        
        $comment->user_id = 1;
        $post->comments()->save($comment);
        
        $comment = new Comment;
        $comment->name = 'Bob';
        $comment->message = 'This is a extra comment on the first post';
        $post = Post::find(1);
        
        $comment->user_id = 1;
        $post->comments()->save($comment);
        
        $comment = new Comment;
        $comment->name = 'Bob';
        $comment->message = 'This is another comment';
        $post = Post::find(2);
        
        $comment->user_id = 1;
        $post->comments()->save($comment);
        
        $comment = new Comment;
        $comment->name = 'Bob';
        $comment->message = 'This is another comment on the second post';
        $post = Post::find(2);
        
        $comment->user_id = 1;
        $post->comments()->save($comment); 
        
        $comment = new Comment;
        $comment->name = 'Bob';
        $comment->message = 'This is yet another comment';
        $post = Post::find(3);
        
        $comment->user_id = 1;
        $post->comments()->save($comment);
    }
}