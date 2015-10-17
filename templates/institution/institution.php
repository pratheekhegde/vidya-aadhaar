<!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Institution Page</title>
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
        <link href='https://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>    
        <link rel="stylesheet" type="text/css" href="./assets/style.css">
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- Moment.js -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.js"></script>
        <script src="./assets/libs/underscore-1.8.3.min.js" type="text/javascript"></script>
        <script src="./assets/libs/backbone-1.2.3.min.js" type="text/javascript"></script>
        <script src="./assets/libs/parsley.min.js" type="text/javascript"></script>
        <script src="https://www.parsecdn.com/js/parse-1.6.5.min.js"></script>
    </head>
    <style type="text/css">
    body{

        font-family: 'Droid Sans', sans-serif;
    }
    .squarebox {
        position: relative;
        padding: 15px;
        background-color: white;
        border: 1px solid #DDD;
        -webkit-border-radius: 0px;
        -moz-border-radius: 0px;
        border-radius: 0px;
        border-color: orange;
    }
    .no-padding{
        padding:0px;
    }

    </style>
    <script type="text/javascript">
     $(function(){

           Parse.$ = jQuery;
           Parse.initialize("6dlJGFlCY3dDn3cNU9d1HPKrvWzA6GhitE7FEYdt", "ac9lE4l7tMzwMfwe5xDwFVRSCDXtcNFXTYr6zzfe");
           if (Parse.User.current()) {
              //console.log("Institution Account Logged in");
                //User or Institution Logged In
                Parse.User.current().fetch().then(function (institution) {
                    //Load College data (TODO: data.gov.in REST)
                    var CollegeList = Parse.Object.extend("CollegeList");
                    var query = new Parse.Query(CollegeList);
                    query.equalTo('instAccountId',institution);
                    query.find({
                        success: function(insts) {
                            var coll = insts[0];
                            var instName = coll.get("CollegeName");
                            var instEmail = institution.get("email");
                            var instType = coll.get("CollegeType");
                            var instDistrict = coll.get("DistrictName");
                            var instState= coll.get("StateName");
                            var instUniversity = coll.get("UniversityName");
                            $('#instImage').html("<img src=\""+institution.get("profilePicture").toJSON().url+"\" width=\"100px\" class=\"img-rounded\">");
                            $('#instName').html(instName);
                            $('#instType').html(instType);
                            $('#instEmail').html(instEmail);
                            $('#instUniversity').html(instUniversity);
                            $('#instStateDist').html(instDistrict+"/"+instState);

                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });
                });
            } else {
              console.log("logged out");
              window.location.href = "./";
            }

            $("#logout").click(function(e){
                e.preventDefault();
                //logout current user
                if ( Parse.User.current() ) {
                    Parse.User.logOut();
                    // check if really logged out
                    if (Parse.User.current()) {
                        console.log("Failed to log out!");
                    }
                    window.location.href = "./";
                }   
            });
    });

    </script>
<body>
    <nav class="navbar navbar-default" id="navbarTop">
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
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><h3>Settings <span class="caret"></span></h3></a>
                <ul class="dropdown-menu">
                  <li><a href="#"><h4><i class="fa fa-edit"></i> Edit Profile</h4></a></li>
                  <li role="separator" class="divider"></li>
                  <li class="dropdown-header"><h5>Account</h5></li>
                  <li><a href="#" id="logout"><h4><i class="fa fa-sign-out"></i> Logout</h4></a></li>
                </ul>
            </li>
          </ul>
           
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
<!-- Nav Ends -->
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="well">
                    <div class="page-header">
                              <span class="h4" id="instName"><i class="fa fa-circle-o-notch fa-spin text-center" style="color:green;"></i></span>
                    </div>
                    <div class="row">
                        <div class="col-md-5 text-center" id="instImage">
                            <i class="fa fa-circle-o-notch fa-spin fa-4x text-center" style="color:green;"></i>
                        </div>
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-6">
                                <h4><strong>District/State</strong></h4>
                                <span id="instStateDist"></span>
                                </div>
                                <div class="col-md-6">
                                <h4><strong>Type</strong></h4>
                                <span id="instType"><i class="fa fa-circle-o-notch fa-spin text-center" style="color:green;"></i></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                <h4><strong>University</strong></h4>
                                <span id="instUniversity"><i class="fa fa-circle-o-notch fa-spin text-center" style="color:green;"></i></span>
                                </div>
                                <div class="col-md-6">
                                <h4><strong>Email</strong></h4>
                                <span id="instEmail"><i class="fa fa-circle-o-notch fa-spin text-center" style="color:green;"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                            <div class="page-header">
                            <h3 class="text-center"><small>Register a student with his Aadhaar ID.</small></h3>
                            </div>
                        </div>
                        <div class="col-md-8 col-md-offset-4">
                            <form class="form-inline">
                             <div class="form-group">
                                <div class="row">
                                        <label for="aadharId">Aadhaar ID :</label>
                                        <input type="text" class="form-control" id="aadharId" placeholder="12  Digit Aadhaar">
                                        <button type="submit" class="btn btn-success">Register</button>
                               </div> 
                            </div>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>













<!-- footer start -->
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
                                    <span class="fa fa-facebook"></span> Vidya Aadhaar on Facebook
                                </a>
                            </li>
                            <li>
                                <a class="text-icon" href="#" title="Bitport on Twitter" target="_blank">
                                    <span class="fa fa-twitter"></span> Vidya Aadhaar on Twitter
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
            <div class="copyright">_ASBESTOS/VidyaAadhaar.webApp/beta/
            </div>
        </div>
    </div>
</div>
<!-- .container -->  
</footer>
</body>
</html>