<!DOCTYPE html>
<?php
 $posts = array(
    array('date' => '6 Mar 2016', 'message' => 'Hi!', 'image' => 'http://rockstartemplate.com/blogheaders/bannerdesign1.jpg'),
    array('date' => '7 Mar 2016', 'message' => 'Hello', 'image' => 'http://rockstartemplate.com/blogheaders/bannerdesign1.jpg'),
    array('date' => '8 Mar 2016', 'message' => 'Ciao!', 'image' => 'http://rockstartemplate.com/blogheaders/bannerdesign1.jpg'),
    array('date' => '9 Mar 2016', 'message' => 'Hey', 'image' => 'http://rockstartemplate.com/blogheaders/bannerdesign1.jpg'),
    array('date' => '10 Mar 2016', 'message' => 'Yooo', 'image' => 'http://rockstartemplate.com/blogheaders/bannerdesign1.jpg'),
    array('date' => '11 Mar 2016', 'message' => 'Good Morning', 'image' => 'http://rockstartemplate.com/blogheaders/bannerdesign1.jpg'),
    array('date' => '12 Mar 2016', 'message' => 'Good Afternoon', 'image' => 'http://rockstartemplate.com/blogheaders/bannerdesign1.jpg'),
    array('date' => '13 Mar 2016', 'message' => 'Bonjour', 'image' => 'http://rockstartemplate.com/blogheaders/bannerdesign1.jpg'),
    array('date' => '14 Mar 2016', 'message' => 'Sup', 'image' => 'http://rockstartemplate.com/blogheaders/bannerdesign1.jpg'),
    array('date' => '15 Mar 2016', 'message' => 'what up', 'image' => 'http://rockstartemplate.com/blogheaders/bannerdesign1.jpg'),
  );
?> 
<html lang='en'>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Social Network</title>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <nav class="navbar navbar-default">
              <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="#">Social Network</a>
                </div>
            
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#">Photos</a>
                    </li>
                    <li>
                      <a href="#">Friends</a>
                    </li>
                    <li>
                      <a href="#">Login</a>
                    </li>
                  </ul>
                </div><!-- /.navbar-collapse -->
              </div><!-- /.container-fluid -->
            </nav>
            <div class = 'row'>
                <div class='col-sm-4 ' id='leftBar'>
                    <div class='row'>
                        Name<br>
                        <input type="text" name="enterName"/>
                    </div>
                    <div class='row'>
                        Message<br>
                        <input type="text" name="enterMessage"/>
                    </div>
                </div>
                <div class='col-sm-8'>
                    <div class='row'>FirstName LastName</div><br><br>
                    <?php
                        $postamount = rand(1,10);                       //Select a random amount of posts to be made
                        echo "Post Amount = "; 
                        echo $postamount;                               //Display post amount in HTML
                        for ($i=0; $i<($postamount); $i++)           //Loop through until the post quota has been reached
                        {
                            echo "<div class='row'><div class='col-md-6'><img width='100%' src= '";
                            echo $posts[$i][image];               //Retrieve the URL from the array of the selected post and add it to the HTML
                            echo "'></div><div class='col-md-6'>";              //Column for text
                            echo $posts[$i][date];                //Retrieve the 'date' attribute from the array of the selected post and add it to the HTML
                            echo $posts[$i][message];             //Retrieve the 'message' attribute from the array of the selected post and add it to the HTML
                            echo "</div></div>";
                        }
                    ?>
                </div>
            </div>
        </div><!-- /.container -->
    </body>
</html>