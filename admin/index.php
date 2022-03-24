<?php

    session_start();
    include 'functions.php';
    $user = new User();
    if (!$user->get_session()) header("Location: login.php");

?>
<?php include 'include/html/header.phtml' ?>

    <div class="panel panel-success">
       <div class="panel-heading">Administrator</div>
       <div class="panel-body">
         <h3>Bine ati venit, "<i><?= $user->getName()  ?></i>"</h3>
       </div>
    </div>

<?php include 'include/html/footer.phtml' ?>