<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Phuge Packcorp</title>
    <meta name="author" content="Phuge Packcorp">
    <meta name="description" content="Phuge Packcorp - ">
    <meta name="keywords" content="Phuge Packcorp - ">
    <meta name="robots" content="INDEX,FOLLOW">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">

    <link rel="manifest" href="assets/img/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/img/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.min.css">
    <link rel="stylesheet" href="assets/css/slick.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
       
<?php include 'header.php' ?>

    <div class="breadcumb-wrapper" data-bg-src="https://ik.imagekit.io/3veo40ctc/phugepackcorp/breadcumb/breadcumb-bg.jpg">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Request a Quote</h1>
                <div class="breadcumb-menu-wrapper">
                    <ul class="breadcumb-menu">
                        <li><a href="index.php">Home</a></li>
                        <li>Request a Quote</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="space">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="nav nav-tabs request-quote-tabs style3" id="nav-tab" role="tablist"><button
                            class="nav-link active" id="nav-step1-tab" data-bs-toggle="tab" data-bs-target="#nav-step1"
                            type="button">Request a quote</button></div>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade active show" id="nav-step1" role="tabpanel">
                            <div class="themeholy-request-form">
                                	 <?php
                                        if(isset($_POST['enquiry-submit'])){
                                         
                                           $name       = @trim(stripslashes($_POST['name']));
                                           $email      =  @trim(stripslashes($_POST['email']));
                                           $bname      =  @trim(stripslashes($_POST['bname']));
                                            $product      =  @trim(stripslashes($_POST['product']));
                                           $message1  =  @trim(stripslashes($_POST['msg']));
                                         
                                         $to = "phugepackcorp@gmail.com"; // this is your Email address
                                     //     $to = "pratikshabirdawade1996@gmail.com"; // this is your Email address
                                           $subject = "Website Enquiry";
                                        
                                           $headers = "From: Contact Phuge Packcorp <noreply@phugepackcorp.in>\r\n";
                                           $headers .= "Reply-To: noreply@phugepackcorp.in\r\n";
                                           $headers .= "MIME-Version: 1.0\r\n";
                                           $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
                                           $returnpath = '-f noreply@phugepackcorp.in';
                                        
                                           $message = 'Hello Sir <Br> You have received new Contact Enquiry From Phuge Packcorp Website ';
                                           $message .= '<h3>Follwing are the Contact details</h3>';
                                           $message .= '<table><tr><td>Date :</td><td>'.date("d-m-Y").'</td></tr><tr><td>Name :</td><td>'.$name.'</td></tr><tr><td>Business :</td><td>'.$bname.'</td></tr><tr><td>Mail :</td><td>'.$email.'</td></tr>';
                                           $message .= '<tr><td>Message :</td><td>'.$message1.'</td></tr>';
                                           $message .= '</table><br><br>Thank You <br><b>This is auto Generated Email.Plase do not reply on this mail</b>';
                                           /*$success = @mail($email_to, $name, $body, 'From: <'.$email_from.'>');*/
                                           
                                         if (preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $message1)) {
                                        
                                        echo "<script type='text/javascript'>alert('Sorry. Try Again Letter')</script>";
                                          }
                                          else{
                                           $mail= mail($to,$subject,$message,$headers,$returnpath);
                                           if($mail == 1){
                                            echo "<script type='text/javascript'>alert('Thank You. We will contact you soon')</script>";
                                           
                                        }else{
                                            echo "<script type='text/javascript'>alert('Sorry. Try Again Letter')</script>";
                                        }
                                          }
                                         }
                                        ?>
                                <form action ="" method="post">
                                <div class="row">
                                    
                                    <div class="col-md-6 form-group"><input type="text" placeholder="Full Name" name="name"
                                            class="form-control"> <i class="fal fa-user"></i></div>
                                    <div class="col-md-6 form-group"><input type="text" placeholder="Your Email" name="email"
                                            class="form-control"> <i class="fal fa-envelope"></i></div>
                                    <div class="col-md-6 form-group"><input type="text" placeholder="Business Name" name="bname"
                                            class="form-control"> <i class="fa-regular fa-weight-scale"></i></div>
                                  
                                    <div class="form-group col-6"><select name="product" id="product"
                                            class="form-select nice-select">
                                            <option value="" disabled="disabled" selected="selected" hidden>Select
                                                Product</option>
                                            <option value="Corrugated Box">Corrugated Box</option>
                                             <option value="Wooden Packaging Box">Wooden Packaging Box</option>
                                             <option value="Paper Box">Paper Box</option>
                                             <option value="Carton Box">Carton Box</option>
                                             <option value="Packaging Product">Packaging Product</option>
                                             <option value="Automotive Packaging">Automotive Packaging</option>
                                             <option value="Other Product">Other Product</option>
                                        </select></div>
                                          <div class="col-md-12 form-group"><input type="text" placeholder="Your Message" name="msg"
                                            class="form-control"> <i class="fa-regular fa-location-dot"></i></div>
                                            <button class="themeholy-btn white-btn" name="enquiry-submit" type="submit">Free Quote!<span
                                            class="icon"><i
                                                class="fa-sharp fa-regular fa-paper-plane"></i></span></button>
                                </div>
                                </form>
                            </div>
                        </div>
                      
                       
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="widget widget_banner-two" data-bg-src="https://ik.imagekit.io/3veo40ctc/phugepackcorp/bg/widget_bg_2.jpg">
                        <h4 class="widget_title text-white">How we can help you?</h4>
                        <p class="text-white">And please feel free to reach out to us if you have any Questions.</p>
                        <div class="btn-group mt-30"><a href="contact.php" class="themeholy-btn white-btn">Contact Us
                                <span class="icon"><i class="fa-sharp fa-regular fa-paper-plane"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="map-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="map-form-wrapper">
                          	 <?php
                                        if(isset($_POST['enquiry-submit-one'])){
                                         
                                           $name       = @trim(stripslashes($_POST['name']));
                                           $email      =  @trim(stripslashes($_POST['email']));
                                           $phone      =  @trim(stripslashes($_POST['phone']));
                                       
                                           $message1  =  @trim(stripslashes($_POST['message']));
                                         
                                         $to = "phugepackcorp@gmail.com"; // this is your Email address
                                     //     $to = "pratikshabirdawade1996@gmail.com"; // this is your Email address
                                           $subject = "Website Enquiry";
                                        
                                           $headers = "From: Contact Phuge Packcorp <noreply@phugepackcorp.in>\r\n";
                                           $headers .= "Reply-To: noreply@phugepackcorp.in\r\n";
                                           $headers .= "MIME-Version: 1.0\r\n";
                                           $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
                                           $returnpath = '-f noreply@phugepackcorp.in';
                                        
                                           $message = 'Hello Sir <Br> You have received new Contact Enquiry From Phuge Packcorp Website ';
                                           $message .= '<h3>Follwing are the Contact details</h3>';
                                           $message .= '<table><tr><td>Date :</td><td>'.date("d-m-Y").'</td></tr><tr><td>Name :</td><td>'.$name.'</td></tr><tr><td>Phone :</td><td>'.$phone.'</td></tr><tr><td>Mail :</td><td>'.$email.'</td></tr>';
                                           $message .= '<tr><td>Message :</td><td>'.$message1.'</td></tr>';
                                           $message .= '</table><br><br>Thank You <br><b>This is auto Generated Email.Plase do not reply on this mail</b>';
                                           /*$success = @mail($email_to, $name, $body, 'From: <'.$email_from.'>');*/
                                           
                                         if (preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $message1)) {
                                        
                                        echo "<script type='text/javascript'>alert('Sorry. Try Again Letter')</script>";
                                          }
                                          else{
                                           $mail= mail($to,$subject,$message,$headers,$returnpath);
                                           if($mail == 1){
                                            echo "<script type='text/javascript'>alert('Thank You. We will contact you soon')</script>";
                                           
                                        }else{
                                            echo "<script type='text/javascript'>alert('Sorry. Try Again Letter')</script>";
                                        }
                                          }
                                         }
                                        ?>
                               
                        <form action="" method="POST" class="map-form ajax-contact">
                            <h3 class="fs-24 mb-20 mt-n1 text-white">Contact with Me</h3>
                            
                            <div class="row">
                                <div class="form-group col-12"><input type="text" class="form-control" name="name"
                                        id="name" placeholder="Your Name"> <i class="fal fa-user"></i></div>
                                <div class="form-group col-12"><input type="email" class="form-control" name="email"
                                        id="email" placeholder="Email Address"> <i class="fal fa-envelope"></i></div>
                                <div class="form-group col-12"><input type="text" class="form-control" name="phone"
                                        id="number" placeholder="Subject"> <i class="fa-light fa-file"></i></div>
                                <div class="form-group col-12"><i class="fa-regular fa-comments"></i> <textarea
                                        name="message" id="message" cols="30" rows="3" class="form-control style3"
                                        placeholder=" Message"></textarea></div>
                                <div class="btn-group justify-content-center"><button 
                                        class="themeholy-btn blue-btn2 btn-fw justify-content-center" name="enquiry-submit-one" type="submit">Submit Now<span
                                            class="icon"><i class="fa-sharp fa-regular fa-paper-plane"></i></span></button>
                                </div>
                            </div>
                            <p class="form-messages mb-0 mt-3"></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="map-sec"><iframe
                 src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3780.67311464266!2d73.86961047519439!3d18.633766982481834!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTjCsDM4JzAxLjYiTiA3M8KwNTInMTkuOSJF!5e0!3m2!1sen!2sin!4v1707127926591!5m2!1sen!2sin"
                allowfullscreen="" loading="lazy"></iframe></div>
    </div>
       
<?php include 'footer.php' ?>
    <div class="scroll-top"><svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
                style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;">
            </path>
        </svg></div>
    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/jquery-ui.min.js"></script>
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <script src="assets/js/nice-select.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>