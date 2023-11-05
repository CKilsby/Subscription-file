<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscription Form</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head> 
<body>
    <input type="checkbox" id="toggle">
    <label for="toggle" class="show-btn">Show Model</label>
    <div class="wrapper">
        <label for="toggle" class="cancel-btn"><i class="fas fa-times"></i></label>
        <div class="icon"><i class=""far fa-envelope></i></div>
        <div class="content">
            <header>Become A Subscriber</header>
            <p>Subscribe to our blog and get the latest updates straight to your inbox.</p>
        </div>
        <form action="index.php" method="POST">
            <?php
            $userEmail = ""; 
            if(isset($_POST['subscribe'])){ //if subscribe button is clicked
                $userEmail = $_POST['email']; //getting user email
                if(filter_var($userEmail, FILTER_VALIDATE_EMAIL)){ //validating user entered email
                    $subject = "Thanks for subscribing to us";
                    $message = "Thanks for subscribing to our blog. You will always receive the latest updates from us. And we won't share or sell your personal information.";
                    $sender = "From: Connisum73@gmail.com" //This email is the email which i've put while configuring the XAMPP folder
                    if(mail($userEmail, $subject, $message, $sender)){
                        ?>
                        <div class="alert success"><?php echo $userEmail ?>Thanks for subscribing</div>
                        <?php
                        $userEmail = "";
                    }else{
                        ?>
                        <div class="alert error"><?php echo $userEmail ?>Failed while sending your email</div>
                        <?php
                    }
                }else{
                    ?>
                    <div class="alert error"><?php echo $userEmail ?> is not a valid email</div>
                    <?php
                }
            }
            ?>
            <div class="field">
                <input type="text" placeholder="Email Address" required value="<?php echo $userEmail ?>">
            </div>
            <div class="field">
                <input type="submit" value="Subscribe">
            </div>
        </form>
        <div class="text">We do not share your information.</div>
    </div>

</body>
</html>