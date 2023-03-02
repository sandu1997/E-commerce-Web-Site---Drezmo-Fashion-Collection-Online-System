<!DOCTYPE html>
<html lang="zxx">

    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Fashi Template">
        <meta name="keywords" content="Fashi, unica, creative, html">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

        <!-- Css Styles -->
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="css/themify-icons.css" type="text/css">
        <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
        <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
        <link rel="stylesheet" href="css/nice-select.css" type="text/css">
        <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
        <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
        <link rel="stylesheet" href="css/style.css" type="text/css"> 
    </head>

    <body>

        <!-- Breadcrumb Section start -->
        <div class="breacrumb-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-text">
                            <a href="#"><i class="fa fa-home"></i> Home</a>
                            <span>Register</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Section end -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>



        <!-------------------------------------- Register form start -------------------------------------->
        <div class="register-login-section spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="register-form">
                            <h2>Register</h2>
                            <form method="POST" onsubmit="return validate()" name="myForm" action="index.php?login">
                                <div class="group-input">
                                    <label for="fname">First Name *</label>
                                    <input type="text" id="fname" name="fname" required>
                                </div>
                                <div class="group-input">
                                    <label for="lname">Last Name *</label>
                                    <input type="text" id="lname" name="lname" required>
                                </div>
                                <div class="group-input">
                                    <label for="username">User Name *</label>
                                    <input type="text" id="username" name="username" required>
                                </div>
                                <div class="group-input">
                                    <label for="password">Password *</label>
                                    <input type="password" id="password" name="password" required>
                                </div>
                                <div class="group-input">
                                    <label for="password">Confirm Password *</label>
                                    <input type="password" id="password2" name="password2" required>
                                </div>
                                <div class="group-input">
                                    <label for="nic">NIC *</label>
                                    <input type="text" id="nic" name="nic" required maxlength="12" minlength="10">
                                </div>
                                <div class="group-input">
                                    <label for="username">Address no. *</label>
                                    <input type="text" id="adno" name="adno"  required>
                                </div>
                                <div class="group-input">
                                    <label for="username">Street *</label>
                                    <input type="text" id="adstreet" name="adstreet"  required>
                                </div>
                                <div class="group-input">
                                    <label for="username">Town *</label>
                                    <input type="text" id="adtown" name="adtown"  required>
                                </div>
                                <div class="group-input">
                                    <label for="country">Country *</label>
                                    <input type="text" id="country" name="country"  required>
                                </div>
                                <div class="group-input">
                                    <label for="username">Telephone *</label>
                                    <input type="text" id="telephone" name="telephone" placeholder="07xxxxxxxx" maxlength="10" minlength="10" required>
                                </div>
                                <div class="group-input">
                                    <label for="username">Email *</label>
                                    <input type="email" id="email" name="email"  required>
                                </div>
                                <input type="submit" value="register" class="site-btn register-btn" id="register">
                            </form>
                            <div class="switch-login">
                                <a href="index.php?login"  class="or-login">Or Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-------------------------------------- Register form End -------------------------------------->


        <!-------------------------------------- message start -------------------------------------->
        <div id="message"></div>
        <!-------------------------------------- message End -------------------------------------->


    </body>
</html>


<script >

///////////////////////// validation start ////////////////////////
    function validate() {
        var fname = document.forms["myForm"]["fname"].value;
        var lname = document.forms["myForm"]["lname"].value;
        var username = document.forms["myForm"]["username"].value;
        var password = document.forms["myForm"]["password"].value;
        var password2 = document.forms["myForm"]["password2"].value;
        var nic = document.forms["myForm"]["nic"].value;
        var adno = document.forms["myForm"]["adno"].value;
        var adstreet = document.forms["myForm"]["adstreet"].value;
        var adtown = document.forms["myForm"]["adtown"].value;
        var country = document.forms["myForm"]["country"].value;
        var telephone = document.forms["myForm"]["telephone"].value;
        var email = document.forms["myForm"]["email"].value;

        var letter = /^[A-Za-z]+$/;
        if(!fname.match(letter)) {
            alert("Enter characters only for name");
            return false;
        }else if(!lname.match(letter)) {
            alert("Enter characters only for name");
            return false;
        }else if(password != password2){
            alert("Password not match");
            return false;
        }else if(isNaN(telephone)){
            alert("Enter numbers only for TP no.");
            return false;
        }else{
            $(document).ready(register);
        }
    } 
////////////////////////////// validation end ////////////////////////////
    


/////////////////////////// user register start /////////////////////////////
    function register(){
        var fname= $("#fname").val();
        var lname= $("#lname").val();
        var username= $("#username").val();
        var password= $("#password").val();
        var adno= $("#adno").val();
        var adstreet= $("#adstreet").val();
        var adtown= $("#adtown").val();
        var telephone= $("#telephone").val();
        var email= $("#email").val();
        var nic= $("#nic").val();
        var country= $("#country").val();
        var type= "customer";
        console.log(fname); 
        $.ajax({
            url: "DAO/registerDAO.php",
            data: {
                fname: fname,
                lname: lname,
                username: username,
                password: password,
                adno: adno,
                adstreet: adstreet,
                adtown: adtown,
                telephone: telephone,
                email: email,
                nic: nic,
                country: country,
                type: type
            },
            
            success:function(data){
                $('#message').html(data);
                window.location.replace("pages/login.php");
            }
        })
        return false;
    }
////////////////////////////////// user register end ////////////////////////////

</script>




<!-- Js Plugins -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/jquery.countdown.min.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<script src="js/jquery.zoom.min.js"></script>
<script src="js/jquery.dd.min.js"></script>
<script src="js/jquery.slicknav.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/main.js"></script>



