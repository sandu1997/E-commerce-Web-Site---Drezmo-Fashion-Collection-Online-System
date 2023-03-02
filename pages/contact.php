
<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="#"><i class="fa fa-home"></i> Home</a>
                    <span>Contact</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->



<!-- Contact Section Begin -->
<section class="contact-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="contact-title">
                    <h4>Contacts Us</h4>
                    <!-- <p>Contact us</p> -->
                </div>
                <div class="contact-widget">
                    <div class="cw-item">
                        <div class="ci-icon">
                            <i class="ti-location-pin"></i>
                        </div>
                        <div class="ci-text">
                            <span>Address:</span>
                            <p>Thalangama, koswaththa, Colombo, Sri Lanka</p>
                        </div>
                    </div>
                    <div class="cw-item">
                        <div class="ci-icon">
                            <i class="ti-mobile"></i>
                        </div>
                        <div class="ci-text">
                            <span>Phone:</span>
                            <p>+94 779 034 678</p>
                        </div>
                    </div>
                    <div class="cw-item">
                        <div class="ci-icon">
                            <i class="ti-email"></i>
                        </div>
                        <div class="ci-text">
                            <span>Email:</span>
                            <p>teamdrezmo@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 offset-lg-1">
                <div class="contact-form">
                    <div class="leave-comment">
                        <h4>Leave A Comment</h4>
                        <p>Our staff will call back later and answer your questions.</p>
                        <form action="#" class="comment-form" method="POST">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Your name" name="name">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Your email" name="email">
                                </div>
                                <div class="col-lg-12">
                                    <textarea placeholder="Your message" name="message"></textarea>
                                    <button type="submit" class="site-btn" name="send">Send message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->


<?php
    if(isset($_POST['send'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $subject = "Message From Website";


        $to= 'lakshanj1ace@gmail.com';
        $mail_subject= 'Message From Drezmo Customer';
        $email_body= "Message From Drezmo Contact: <br>";
        $email_body .= "<b>From: </b> {$name} <br>";
        $email_body .= "<b>Subject: </b> {$subject} <br>";
        $email_body .= "<b>Message: </b><br>". nl2br(strip_tags($message));

        $header="From: {$email}\r\nContent-Type: text/html;";

        $send_mail_result= mail($to, $mail_subject,  $email_body, $header);

        if($send_mail_result){
            echo "message sent";
        }else{
            echo "message not sent";
        }

    }




?>