<?php
    // Check if the user coming from A Request
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Define variabls 
        $user = filter_var($_POST['username'] , FILTER_SANITIZE_STRING);
        $mail = filter_var($_POST['Email'] , FILTER_SANITIZE_EMAIL);
        $cell = filter_var($_POST['cellphone'] , FILTER_SANITIZE_NUMBER_INT);
        $msg =  filter_var($_POST['message'] , FILTER_SANITIZE_STRING);

        // Creating array of errors 
        $formErrors = array(); // let array empty

        if (strlen($user) < 3 ) {
            $formErrors[] = 'username must be larger than <strong> 3 </strong> charcters'; // Add an error to array
        }
        if (strlen($msg) < 10 ) {
            $formErrors[] = 'Your Message is too short !!'; // Add an error to array
        }
        
        // If no errors send the Email
        $headers ='from ' . $mail . ' \r\n';
        
        if (empty($formErrors)) {
            mail('ayadm536@gmail.com' , 'Contact Form' , $msg , $headers);
            
            $user ='';
            $mail ='';
            $cell ='';
            $msg ='';
            
            $success= '<div class="alert alert-success">Done ! </div>';
        }
    }
?>

<!DOCTYPE html>
<html lan="lang">
    <haed>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Contact Form</title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/index.css">  <!-- the file name of css-->
        <link rel="stylesheet" href="css/hover.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,400i,700,900">
        <!--[if lt IE 9]>
		<script src="js/html5shiv.min.js"></script>
		<script src="js/respond.min.js"></script>
		<![endif]-->
    </haed>
    <body>
        <!-- Start Form-->
            <div class="container">
                <h2 class="text-center">Contact Me</h2>
                <form class="contact-form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                    <?php if (! empty ($formErrors)) { ?>      <!-- without it will have error as $formErrors not exist here so i ask him to do if there is an error -->
                                                            <!-- this button to appear if there is an error only i separate php of html -->
                        <div class="alert alert-danger alert-dismissible" role="start" >
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        <?php
                            foreach($formErrors as $error) {
                                echo $error . "<br>";
                            }
                        ?>
                        </div>
                    <?php  } ?>     <!-- This is the close of if isset() -->
                    <?php if (isset($success)) { echo $success; } ?>
                    <div class="form-group">
                        <input class="username form-control" type="text" name="username" placeholder="UserName" value="<?php if (isset($user)) {echo $user; } ?>" />
                        <i class="fa fa-user fa-fw"></i>
                        <span class="asterisk">*</span>
                        <div class="alert alert-danger custom-alert">
                            'username must be larger than <strong> 3 </strong> charcters'
                        </div>
                    </div>
                    <div class="form-group">
                        <input class="email form-control" type="email" name="Email" placeholder="E-mail" value="<?php if (isset($mail)) {echo $mail; } ?>" />
                        <i class="fa fa-envelope fa-fw"></i>
                        <span class="asterisk">*</span>
                        <div class="alert alert-danger custom-alert">
                            Email Can't be Empty
                        </div>
                    </div>
                    <input class="form-control" type="text" name="cellphone" placeholder="Cell Phone" value="<?php if (isset($cell)) {echo $cell; } ?>"  />
                    <i class="fa fa-phone fa-fw"></i>
                    <textarea class="form-control" name="message" placeholder="Your Message!"> <?php if (isset($msg)) {echo $msg; } ?> </textarea>
                    <input class="btn btn-success" type="submit" value="Send Message"/>
                    <i class="fa fa-send fa-fw send-icon"></i>
                </form>
            </div>
        <!-- End Form-->
        
        
        
        
        
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/index.js"></script>   <!-- the file name of js-->
        <script src="js/jquery.nicescroll.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script>new WOW().init();</script>
    </body>
</html>