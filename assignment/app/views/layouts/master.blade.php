<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="{{{ secure_url('css/style.css') }}}" rel="stylesheet">
        <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class='col-sm-3'>
                <div class='sidebar'>
                    <a class="logo" href=".">Vokal</a></br>
                    <div class='userInfo'>
                        <div class='userIcon'>
                            <img src='https://s3.amazonaws.com/whisperinvest-images/default.png' width='50'>
                        </div>              
                        <div id='userName'>
                            Logged in as </br>
                            FirstName Lastname <!-- Placehold -->
                        </div><!-- User Info -->                        
                    </div>

                    <ul class='nav-bar'>
                         <li><a href="{{{ url('feed') }}}" class="btn btn-default">Home</a></li>
                         <li><a href="{{{ url('documentation') }}}" class="btn btn-default">Documentation</a></li>
                         <li><a href="{{{ url('friends') }}}" class="btn btn-default">Friends</a></li>
                          <li><a href="{{{ url('messages') }}}" class="btn btn-default">Messages</a></li>
                        <li><a href="{{{ url('notifications') }}}" class="btn btn-default">Notifications</a></li>                    
                    </ul>

                </div><!-- Sidebar -->
            </div>
            <div class='col-sm-1'></div>
            <div class='col-sm-8'>
                @section('postForm')
                @show
                @section('postEditor')
                @show
                       @section('postContainer')
                       @show
                        @section('post')
                        @show
                        @section('commentForm')
                        @show
                        @section('comments')
                        @show

            </div>
        </div><!-- /.container -->
    </body>
</html>