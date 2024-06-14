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
                <h1 class="breadcumb-title">Contact Us</h1>
                <div class="breadcumb-menu-wrapper">
                    <ul class="breadcumb-menu">
                        <li><a href="index.php">Home</a></li>
                        <li>Contact Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="space" id="contact-sec">
        <div class="container">
            <div class="row gy-40 flex-row-reverse">
                <div class="col-xl-8">
                    <div class="contact-form-wrapper">
                        	<!-- Contact Form -->
							 <?php
                                        if(isset($_POST['enquiry-submit'])){
                                         
                                           $name       = @trim(stripslashes($_POST['name']));
                                           $email      =  @trim(stripslashes($_POST['email']));
                                           $phone      =  @trim(stripslashes($_POST['phone']));
                                           $message1  =  @trim(stripslashes($_POST['message']));
                                         
                                          $to = "phugepackcorp@gmail.com"; // this is your Email address
                                      //   $to = "tirupackindustries@gmail.com"; // this is your Email address
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
                        
                        <form action="" method="POST" class="contact-form ajax-contact">
                            <h2 class="form-title">Send A Massage <span class="shape"></span></h2>
                            <div class="row">
                                <div class="form-group col-md-6"><input type="text" class="form-control" name="name"
                                        id="name" placeholder="Your Name"> <i class="fal fa-user"></i></div>
                                        
                                <div class="form-group col-md-6"><input type="email" class="form-control" name="email"
                                        id="email" placeholder="Email Address"> <i class="fal fa-envelope"></i></div>
                                        
                                <div class="form-group col-md-6"><input type="tel" class="form-control" name="phone"
                                        id="number" placeholder="Phone Number"> <i class="fa-regular fa-phone-flip"></i>
                                </div>
                                
                                <div class="form-group col-md-6"><input type="text" class="form-control" name="subject"
                                        id="number4" placeholder="Subject"> <i class="fa-light fa-tag"></i></div>
                                <div class="form-group col-12"><textarea name="message" id="message" cols="30" rows="3"
                                        class="form-control" placeholder="Message"></textarea> <i
                                        class="fal fa-comment"></i></div>
                                        
                                <div class="btn-group style2">
                                    <button type="submit" name="enquiry-submit" class="themeholy-btn" data-loading-text="Please wait..."><span class="btn-title">Send message</span><span
                                            class="icon"><i class="fa-sharp fa-regular fa-paper-plane"></i></span></button>
                                 
                                </div>
                            </div>
                            <p class="form-messages mb-0 mt-3"></p>
                        </form>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="contact-info-wrap">
                        <div class="title-area"><span class="sub-title"><img src="https://ik.imagekit.io/3veo40ctc/phugepackcorp/shape/title_left.svg"
                                    alt="shape">Contact Us</span>
                            <h2 class="sec-title mb-0">Get In Touch</h2>
                        </div>
                        <div class="contact-info">
                            <div class="contact-info_icon"><i class=""><img src="https://ik.imagekit.io/3veo40ctc/phugepackcorp/icon/location_5.svg"
                                        alt=""></i></div>
                            <div class="media-body">
                                <h4 class="contact-info_title">Office Address</h4><span class="contact-info_text">PHUGE PACKCORP 
S no. 152/1/4 Behind Pragati Hotel, Near Deep Lawns,Magazine chowk, Alandi Road Bhosari 412105</span>
                            </div>
                        </div>
                        <div class="contact-info">
                            <div class="contact-info_icon"><i class=""><img src="https://ik.imagekit.io/3veo40ctc/phugepackcorp/icon/phone.svg" alt=""></i>
                            </div>
                            <div class="media-body">
                                <h4 class="contact-info_title">Phone Number</h4><span class="contact-info_text"><a
                                        href="tel:+919028161781">+91 9028161781 / +91 9561910874</a></span>
                            </div>
                        </div>
                        <div class="contact-info">
                            <div class="contact-info_icon"><i class=""><img src="https://ik.imagekit.io/3veo40ctc/phugepackcorp/icon/email.svg" alt=""></i>
                            </div>
                            <div class="media-body">
                                <h4 class="contact-info_title">Email Address</h4><span class="contact-info_text"><a
                                        href="mailto:phugepackcorp@gmail.com">phugepackcorp@gmail.com</a></span>
                            </div>
                        </div>
                        <div class="themeholy-social author-social">
                            <h4 class="info-title">Follow Us</h4><a href="https://www.facebook.com/sanket.phuge"><i
                                    class="fab fa-facebook-f"></i></a> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="map-sec"><iframe
            src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3780.67311464266!2d73.86961047519439!3d18.633766982481834!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTjCsDM4JzAxLjYiTiA3M8KwNTInMTkuOSJF!5e0!3m2!1sen!2sin!4v1707127926591!5m2!1sen!2sin"
            allowfullscreen="" loading="lazy"></iframe></div>
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