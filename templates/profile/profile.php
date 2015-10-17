<!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8">
    <title>John's Profile</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>{{userFName}}'s Profile</title>
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
    <link rel="stylesheet" type="text/css" href="../assets/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Moment.js -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.js"></script>
    <script type="text/javascript">
    $(function(){
        $('#age').html(moment(Date.parse("{{userDob}}")).format("MMM D YYYY"));    
    })

    </script>
    <style type="text/css">
    body{

    	font-family: 'Droid Sans', sans-serif;
    }
    .circle{
	    margin: 24px auto;
	    width: 120px;
	    height: 120px;
	    padding: 40px 0 0;
	    border-radius: 50%;
	    border: 1px solid blue;
	    z-index: 10;
	    position: relative;
	    font-size: 20px;
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
           <img class="navbar-brand" style="height:80px;padding:10px" src="../assets/images/brand.png" height="100px"/>
          <a class="navbar-brand" style="height:80px;" href="./"><span class="h3"><font color="#70b246">Vidya</font><br><font color="#f37c21">Aadhaar</font></span></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
		    <li><a href="#"><h4>Aadhaar ID :{{aadhaarId}}</h4></a></li>
		  </ul>
           
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
    <!-- body starts -->
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="well" style="padding-top:0px;margin:48px">
					<div class="row">
						<div class="col-md-12">
							<div class="page-header">
							  <span class="h1"><small>Hey It's me,</small> {{ [userFName,userLName]|join(' ') }}</span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-5 text-center">
							<img src="{{userPicturePath}}" width="100px" class="img-rounded">
						</div>
						<div class="col-md-7">
							<div class="row">
								<div class="col-md-6">
								<h4><strong>DOB</strong></h4>
								<span id="age"></span>
								</div>
								<div class="col-md-6">
								<h4><strong>Gender</strong></h4>
								{{userGender}}
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
								<h4><strong>Qualification</strong></h4>
								{{userQualification}}
								</div>
								<div class="col-md-6">
								<h4><strong>Email</strong></h4>
								{{userEmail}}
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
								<h4><strong>Description</strong></h4>
								{{userDescription}}
						</div>
					
					</div>
					<div class="row" style="margin-top:15px">
						<div class="col-md-2" style="border-right: solid 1px">
						 <img src="{{userProfileQR}}" height="80px">
						</div>
						<div class="col-md-7">
								<h4><strong>Social</strong></h4>
								 <i class="fa fa-github fa-2x"></i>&nbsp;&nbsp;&nbsp;<i class="fa fa-stack-overflow fa-2x"></i>&nbsp;&nbsp;&nbsp;<i class="fa fa-linkedin-square fa-2x"></i>&nbsp;&nbsp;&nbsp;<i class="fa fa-facebook fa-2x"></i>&nbsp;<i class="fa fa-twitter fa-2x"></i>&nbsp;&nbsp;&nbsp;<i class="fa fa-google-plus fa-2x"></i> 
						</div>
					
					</div>
				</div> 
			</div>
		</div>
	</div>
         <div class="row" style="background-color:#ccc;margin-left:0px;margin-right:0px;padding-bottom:48px;">
            <div class="col-md-6 col-md-offset-3 text-center" style="margin-top:48px;">
                <h2>Academic history</h2><hr>
			<p>To view the academic details of this profile, enter your name and email and click Request your profile. The User
			will be notified and you'll recieve a mail after the user has confirmed.</p> 
			</div>
			
			<div class="col-md-4 col-md-offset-4 text-center" style="margin-top:48px;margin-bottom:48px">	
			<form class="form-horizontal">
				<div class="form-group">
                <div class="input-group input-group-lg">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                 <input type="text" class="form-control" placeholder="Enter your name" aria-describedby="name">
                </div>
				</div>
				<div class="form-group">
                <div class="input-group input-group-lg">
                    <span class="input-group-addon" ><i class="fa fa-envelope-o"></i></span>
                 <input type="text" class="form-control" placeholder="Enter your email" >
				</div>
				</div>
				<div class="form-group" style="margin-top:30px">
					  <button type="submit" class="btn btn-success btn-lg">Request Profile Details</button>
				  </div>
			</form>
		   </div>
		</div>
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
            <div class="copyright">_ASBESTOS/VidyaAadhaar.WebApp/beta/</div>
        </div>
    </div>
</div>
<!-- .container -->  
</footer>
</body>
</html>