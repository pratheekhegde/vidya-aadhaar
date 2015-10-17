<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login</title>
     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="./assets/style.css">
    <script src="./assets/libs/jquery-1.11.3.min.js" type="text/javascript"></script>
    <script src="./assets/libs/underscore-1.8.3.min.js" type="text/javascript"></script>
    <script src="./assets/libs/backbone-1.2.3.min.js" type="text/javascript"></script>
    <script src="./assets/libs/parsley.min.js" type="text/javascript"></script>
    <script src="https://www.parsecdn.com/js/parse-1.6.5.min.js"></script>
    <script type="text/javascript">
       $(function(){
           Parse.$ = jQuery;
           Parse.initialize("6dlJGFlCY3dDn3cNU9d1HPKrvWzA6GhitE7FEYdt", "ac9lE4l7tMzwMfwe5xDwFVRSCDXtcNFXTYr6zzfe");
          var currentUser = Parse.User.current();
          if (currentUser) {
             if(currentUser.get("accountType")=="institution"){
                  window.location.href = './institution';
              }else if(currentUser.get("accountType")=="user"){
                  window.location.href = './myProfile';
              }
          }
          $('#login-form').on('submit', function(e) {
            $('#loginButton').prop('disabled', true);
             $('#login-msg').html("<b>Please wait ...</b>")
              // Prevent Default Submit Event
              e.preventDefault();
           
              // Get data from the form and put them into variables
                  username = $('#login-username').val();
                  password = $('#login-password').val();
           
              // Call Parse Login function with those variables
              Parse.User.logIn(username, password, {
                  // If the username and password matches
                  success: function(user) {
                      console.log(user);
                      if(user.get("accountType")=="institution"){
                          window.location.href = './institution';
                      }else if(user.get("accountType")=="user"){
                        window.location.href = './myProfile';
                      }else{
                           $('#login-msg').html("<div class=\"alert alert-danger alert-dismissible\" role=\"alert\" id=\"invalid_cred_alert\"> \
                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button> \
                       <strong>"+"Invalid Credentials"+"</strong></div>");
                          $('#loginButton').prop('disabled', false);
                      }
                  },
                  // If there is an error
                  error: function(user, error) {
                      console.log(error);
                      $('#login-msg').html("<div class=\"alert alert-danger alert-dismissible\" role=\"alert\" id=\"invalid_cred_alert\">\
                     <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>\
                     <strong>"+error.message+"</strong></div>");
                    $('#loginButton').prop('disabled', false);
                  }
              });
            });
        });
    </script>
    <style type="text/css">
    .roundbox {
        position: relative;
        padding: 15px;
        background-color: white;
        border: 1px solid #DDD;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
    }
    body{
        padding-top: 120px;
        font-family:'Open Sans',sans-serif;
    }
    input.parsley-error,
    select.parsley-error,
    textarea.parsley-error {
        color: #B94A48;
        background-color: #F2DEDE;
        border: 1px solid #EED3D7;
    }
    .parsley-errors-list {
      //text-transform: uppercase;
        list-style-type: none;
        padding: 0px;
      //font-weight :bold;
      //font-size: 0.8em;
        color: red;
        font-variant: small-caps;
    }
    </style>

  </head>
  <body>
   <nav class="navbar navbar-default navbar-fixed-top" id="navbarTop">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
           <img class="navbar-brand" style="height:80px;padding:10px" src="./assets/images/brand.png" height="100px"/>
          <a class="navbar-brand" style="height:80px;" href="./"><span class="h3"><font color="#70b246">Vidya</font><br><font color="#f37c21">Aadhaar</font></span></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
        <li><a href="./"><h3>Home</h3></a></li>
        <li><a href="#"><h3>Search</h3></a></li>
        <li><a href="#"><h3>Contact</h3></a></li>
        <li><a href="#"><h3>About Us</h3></a></li>
      </ul>
           
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <div class="roundbox">
            <form class="form-horizontal" id="login-form" data-parsley-validate>
              <div class="form-group">
                <label for="login-username" class="col-sm-3 control-label">User ID :</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="login-username" name="login-username" placeholder="Aadhaar / College ID" data-parsley-error-message="please enter your username" required />
                  </div>
            </div>
              <div class="form-group">
              <label for="login-password" class="col-sm-3 control-label">Password :</label>
                <div class="col-sm-9">
                  <input type="password" class="form-control" id="login-password" name="login-password" placeholder="Your Password" data-parsley-error-message="please enter your password" required />
                </div>
              </div>
              <div class="form-group" style="margin-top:15px">
                <div class="col-sm-12 text-center">
                    <button type="submit" id="loginButton" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Log in">Log in</button>
                </div>
            </div>
             <div class="form-group">
                <div class="col-sm-12 text-center">
                  <span id="login-msg"></span>
              </div>
            </div>
          </form>
        </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <b>Demo Login: test/test,test1/test1,smvitm/smvitm<b/>
        </div>
      </div>

    </div>



    <br><Br><br><br>
   <footer>      
    <div class="container">
    <div class="row">
        <div class="col-md-3">
                        <h4>Vidhya Aadhaar</h4>

                        <nav>
                            <ul class="footer-menu">
                                <li>
                                    <a title="Join us" href="/new-account">Join us</a>
                                </li>
                                <li>
                                    <a title="Login" href="../login">Login</a>
                                </li>
                                <li>
                                    <a title="Pricing" href="#">Recruiters</a>
                                </li>
                                 <li>
                                    <a title="Pricing" href="#">Institutions</a>
                                </li>
                                <li>
                                    <a title="Terms of Use" href="#">Terms of Use</a>
                                </li>
                                <li>
                                    <a title="Privacy policy" href="#">Privacy policy</a>
                                </li>
                            </ul>
                        </nav>

        </div>
                    <!-- .column -->

        <div class="col-md-3" style="border-right:solid 1px;">
                        
                        <h4>Support</h4>
                
                        <nav>
                            <ul class="footer-menu">
                                                                <li>
                                    <a title="Forgot your password?" href="/forgotten-password">Forgot your password?</a>
                                </li>
                                <li>
                                    <a title="FAQ" href="/faq">FAQ</a>
                                </li>
                                <li>
                                    <a title="Report a problem" href="/contact">Report a problem</a>
                                </li>
                            </ul>
                        </nav>
                        <br>
                         <h4>Follow us</h4>

                        <ul class="footer-menu">
                            <li>
                                <a class="text-icon" href="#" title="Bitport on Facebook" target="_blank">
                                    <span class="fa fa-facebook"></span>Vidya Aadhaar on Facebook
                                </a>
                            </li>
                            <li>
                                <a class="text-icon" href="#" title="Bitport on Twitter" target="_blank">
                                    <span class="fa fa-twitter"></span>Vidya Aadhaar on Twitter
                                </a>
                            </li>
                            <li>
                                <a title="Contact" href="#">
                                    Contact us
                                </a>
                            </li>
                                   
                        </ul>

        </div>
                    <!-- .column -->


       
                                        
        <div class="col-md-6 text-center">
                        
                        <h4>Powered by</h4>
                        <div class="footer-poweredby">
              <a class="nic ext" target="_blank" href="http://www.nic.in" title="National Informatics Centre (NIC) (External Site that opens in a new window)"></a>
              <a class="digitalindia ext" target="_blank" href="http://www.digitalindia.gov.in" title="Digital India (External Site that opens in a new window)"></a>
              <a class="mygov ext" href="http://mygov.nic.in" target="_blank" title="My Gov (External Site that opens in a new window)"></a>
               <a class="npi ext" href="http://www.india.gov.in" target="_blank" title="National Portal of India (External Site that opens in a new window)"></a>
              <a class="opengov ext" target="_blank" href="http://ogpl.gov.in" title="Open Gov Platform (External Site that opens in a new window)"></a>            
            </div>           
        </div>
                                                   
    </div>
    <!-- row --> 
    <div class="row" style="padding-top:48px">
        <div class="col-md-12 text-center">
            <div class="copyright">_ASBESTOS/VidyaAadhaar.webApp/beta/</div>
        </div>
    </div>
</div>
<!-- .container -->  
</footer>
  </body>
</html>