<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class='col-sm-4'>
                <div class='sidebar'>
                    <a class="logo" href=".">Vokal</a></br>
                    
                    <div id='userinfo'>
                        <img src='https://s3.amazonaws.com/whisperinvest-images/default.png' width='50'>
                        Logged in as </br>
                        FirstName Lastname <!-- Placehold -->
                    </div><!-- User Info -->
                    <div class="btn-group-vertical" role="group">
                          <button type="button" class="btn btn-default">Friends</button>
                          <button type="button" class="btn btn-default">Messages</button>
                          <button type="button" class="btn btn-default">Notification</button>
                          <button type="button" class="btn btn-default">Settings</button>
                          <button type="button" class="btn btn-default">Logout</button>
                    </div>
                </div><!-- Sidebar -->
            </div>
            <div class='col-sm-8'>
                <form>
                    Name: <br>
                    <input type="text" name="enterName"/><br>
                    Message: <br>
                    <input type="textarea" name="enterMessage"/><br>
                    <button>Submit</button>
                </form>
                <div class='postBox'>
                    Title</br>
                    Posted by FirstName Lastname</br>
                    Lorem Ipsum
                </div>
            </div>
        </div><!-- /.container -->
    </body>
</html>