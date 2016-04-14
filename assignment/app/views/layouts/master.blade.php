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
                    
                    <div id='userinfo'>
                        <img src='https://s3.amazonaws.com/whisperinvest-images/default.png' width='50'>
                        Logged in as </br>
                        FirstName Lastname <!-- Placehold -->
                    </div><!-- User Info -->
                    <div class="btn-group-vertical" role="group">
                          <button type="button" class="btn btn-default"><a href='friends'>Friends</a></button>
                          <button type="button" class="btn btn-default"><a href='messages'>Messages</a></button>
                          <button type="button" class="btn btn-default"><a href='notifications'>Notifications</a></button>
                          <button type="button" class="btn btn-default"><a href='settings'>Settings</a></button>
                          <button type="button" class="btn btn-default">Logout</button>
                    </div>
                </div><!-- Sidebar -->
            </div>
            <div class='col-sm-1'></div>
            <div class='col-sm-8'>
                @section('postForm')
                @show
                @section('postEditor')
                @show
                <div class='postFeed'>
                    <div>
                       @section('postContainer')
                       @show
                    </div>
                    <div>
                        @section('post')
                        @show
                    </div>
                    <div>
                        @section('commentForm')
                        @show
                    </div>
                    <div>
                        @section('comments')
                        @show
                    </div>

                </div>
            </div>
        </div><!-- /.container -->
    </body>
</html>