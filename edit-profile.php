<?php
    session_start();
    require_once 'koneksi.php';

    function query($query) {
        global $connect;
        $result = mysqli_query($connect, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] =  $row;
        }
        return $rows;
    }

    function edit(){
        global $connect;
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $uname = $_POST['username'];
        $web = $_POST['web'];
        $bio = $_POST['bio'];
        $email = $_POST['email'];
        $no_hp = $_POST['no_hp'];
        $gender = $_POST['gender'];
        $query = "UPDATE profiles SET nama='$nama', username='$uname', web='$web', bio='$bio', email='$email', no_hp='$no_hp', gender='$gender' WHERE id='$id' ";
        mysqli_query($connect, $query);
        return mysqli_affected_rows($connect);
    }

    $profile = query("select * from profiles where id='1'")[0];

    if (isset($_POST["submit"])) {
       if (edit() > 0){
        header("Location: edit-profile.php");
       }else{
        header("Location: profile.php");
       }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Profile | Vietgram</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <nav class="navigation">
        <div class="navigation__column">
            <a href="feed.php">
                <img src="images/logo.png" />
            </a>
        </div>
        <div class="navigation__column">
            <i class="fa fa-search"></i>
            <input type="text" placeholder="Search">
        </div>
        <div class="navigation__column">
            <ul class="navigations__links">
                <li class="navigation__list-item">
                    <a href="upload.php" class="navigation__link">
                        <i class="fa fa-cloud-upload"></i>
                    </a>
                </li>
                <li class="navigation__list-item">
                    <a href="explore.php" class="navigation__link">
                        <i class="fa fa-compass fa-lg"></i>
                    </a>
                </li>
                <li class="navigation__list-item">
                    <a href="#" class="navigation__link">
                        <i class="fa fa-heart-o fa-lg"></i>
                    </a>
                </li>
                <li class="navigation__list-item">
                    <a href="profile.php" class="navigation__link">
                        <i class="fa fa-user-o fa-lg"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <main id="edit-profile">
        <div class="edit-profile__container">
            <header class="edit-profile__header">
                <div class="edit-profile__avatar-container">
                    <img src="images/avatar.jpg" class="edit-profile__avatar" />
                </div>
                <h4 class="edit-profile__username"><?=$profile['username']; ?></h4>
            </header>
            <form action="" method="POST" class="edit-profile__form" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $profile['id']; ?>">
                <div class="form__row">
                    <label for="nama" class="form__label">Name:</label>
                    <input id="nama" type="text" name="nama" value="<?= $profile['nama']; ?>" class="form__input" />
                </div>
                <div class="form__row">
                    <label for="username" class="form__label">Username:</label>
                    <input id="username" type="text" name="username" value="<?= $profile['username']; ?>" class="form__input" />
                </div>
                <div class="form__row">
                    <label for="web" class="form__label">Website:</label>
                    <input id="web" type="url" name="web" value="<?= $profile['web']; ?>" class="form__input" />
                </div>
                <div class="form__row">
                    <label for="bio" class="form__label">Bio:</label>
                    <textarea id="bio" name="bio"><?= $profile['bio']; ?></textarea>
                </div>
                <div class="form__row">
                    <label for="email" class="form__label">Email:</label>
                    <input id="email" type="email" name="email" value="<?= $profile['email']; ?>" class="form__input" />
                </div>
                <div class="form__row">
                    <label for="no_hp" class="form__label">Phone Number:</label>
                    <input id="no_hp" type="tel" name="no_hp" value="<?= $profile['no_hp']; ?>" class="form__input" />
                </div>
                <div class="form__row">
                    <label for="gender" class="form__label">Gender:</label>
                    <select id="gender" name="gender">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="cant">Can't remember</option>
                    </select>
                </div>
                <input type="submit" name="submit" value="Submit">
            </form>
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
            <span class="footer__copyright">© 2017 Vietgram</span>
        </div>
    </footer>
</body>

</html>