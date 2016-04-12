<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
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
                <div class='postFeed'>
                <div class='feedTitle'>Recent Posts</div>
                <div>
                @section('postContainer')
                @show
                </div>
                <div class='postBox'>
                    <div class='postHeader'>
                        <div class='postIcon'>
                            <img src="http://rockstartemplate.com/blogheaders/bannerdesign1.jpg" width='50px'></img>
                        </div>
                        <div class='postDescription'>
                            <span class='postTitle'>Example Title</span></br>
                            <span class='postName'>Example Name</span>
                        </div>
                        <div class='dropdown postOptions'>
                            <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                              
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                              <li><a href="#">Edit</a></li>
                              <li><a href=''>Delete</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class='postContent'>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam non neque et mauris tempor venenatis a in ante. 
                        Nullam viverra arcu ipsum, id fringilla augue venenatis hendrerit. Curabitur quis cursus sem. 
                        Mauris nec nunc ac magna luctus pharetra eu nec libero. Fusce dictum non felis vitae porttitor. 
                        Nunc ullamcorper, dui in scelerisque maximus, est mauris gravida massa, in blandit dolor.
                    </div>
                    <div class='postComments'>
                        <span class='commentCount'>XY Comments</span><span class='commentLink'><a href=''>View Comments</a></span>
                    </div>
                </div>
                </div>
            </div>
        </div><!-- /.container -->
    </body>
</html>