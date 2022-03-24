<?php

    session_start();
    include 'functions.php';
    $user = new User();
    
    if ($user->get_session()) {
        header("Location: home.php");
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") { 
        $login = $user->check_login(strtolower($_POST['username']), $_POST['password']);
        if ($login) {
            header("Location: index.php");
        } else {
            $msg = 'Date de logare gresite sau user inactiv !';
        }
    }
?>
<?php include 'include/html/header.phtml' ?>

    <form class="form-signin" method="post" name="login">
        <input type="text" class="form-control" placeholder="Utilizator .." name="username" required autofocus>
        <input type="password" class="form-control" placeholder="Parola .." name="password" required>
        <button class="btn btn-lg btn-success btn-block" type="submit">Logare</button>
        <br />
        <?= (!empty($msg)) ? '<div class="alert alert-danger">'.$msg.'</div>' : '' ?>
    </form>
              
<?php include 'include/html/footer.phtml' ?>