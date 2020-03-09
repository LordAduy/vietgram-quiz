<?php
    require_once 'koneksi.php';

    function registrasi() {
        global $connect;
        $username = strtolower(stripslashes($_POST["username"]));
        $pass = mysqli_real_escape_string($connect, $_POST['password']);
        $result = mysqli_query($connect, "SELECT username WHERE username = '$username' ");
        if (mysqli_fetch_assoc($result)) {
            echo "<script>username already exist! </script>";
            return false;
        }

        if (!empty(trim($username)) && !empty(trim($pass))) {
            mysqli_query($connect, "INSERT INTO login VALUES('','$username','$pass')");
        }
        return mysqli_affected_rows($connect);
    }

    if (isset($_POST["login"])) {
        if (registrasi() > 0) {
            echo "<script>alert('Succes!');</script>";
            header('Location: index.php');
        } else {
            echo mysqli_error($connect);
        }
    }
?>

<!DOCTYPE html>
<html>

<head>
    <title>Sign up • Vietgram</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Vietgram, like Instagram but with Pho" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <main id="login">
        <div class="login__column">
            <img src="images/phoneImage.png" class="login__phone" />
        </div>
        <div class="login__column">
            <div class="login__box">
                <img src="images/loginLogo.png" class="login__logo" />
                <div class="desc">
                    <span>Sign up to see photos and videos from your friends.</span>
                </div>
                <form action="" method="POST" class="login__form">
                    <input type="text" name="username" placeholder="Username" required />
                    <input type="password" name="password" placeholder="Password" required />
                    <input type="submit" name="login" value="Register" />
                    <span class="login__divider">or</span>
                    <button class="fb_btn"><i class="fa fa-facebook-square fa-lg"></i>  Log in with Facebook</button>
                </form>
                <p class="policy_div">
                By signing up, you agree to our 
                <a class="policy" target="_blank" href="#">Terms</a>
                 ,  
                <a class="policy" target="_blank" href="#">Data Policy</a>
                 and 
                <a class="policy" target="_blank" href="#">Cookies Policy</a>
                 .
                </p>
            </div>
            <div class="login__box">
                <span>Have an account?</span> <a href="index.php">Log In</a>
            </div>
            <div class="login__box--transparent">
                <span>Get the app.</span>
                <div class="login__appstores">
                    <img src="images/ios.png" class="login__appstore" alt="Apple appstore logo" title="Apple appstore logo" />
                    <img src="images/android.png" class="login__appstore" alt="Android appstore logo" title="Android appstore logo" />
                </div>
            </div>
        </div>
    </main>
    <footer class="footer">
        <div class="footer__column">
            <nav class="footer__nav">
                <ul class="footer__list">
                    <li class="footer__list-item"><a href="#" class="footer__link">About Us</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Support</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Blog</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Press</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Api</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Jobs</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Privacy</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Terms</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Directory</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Language</a></li>
                </ul>
            </nav>
        </div>
        <div class="footer__column">
            <span class="footer__copyright">© 2020 Vietgram With Ardityo</span>
        </div>
    </footer>
</body>

</html>