<?php

    session_start();
    include 'functions.php';
    $user = new User();
    if (!$user->get_session()) header("Location: login.php");
   
    $userArray = $user->getById($_SESSION['id']);    
    $userArray = (!is_null($userArray)) ? $userArray : array();

    if (isset($_POST['submit'])) {
        if ($_POST['password'] != $_POST['password2']) {
            $msg_alert = 'Parolele nu coincid.';
        } else {
            $edit = $user->edit_user_pass($_SESSION['id'], $_POST['name'], strtolower($_POST['username']), strtolower($_POST['email']), $_POST['password']);
            if ($edit) {
                header("Location: index.php");
            } else {
                $msg_alert = 'Editare esuata, va rugam incercati dinou.';
            }
        }
    }
    
?>

<?php include 'include/html/header.phtml' ?>
    <div style="padding: 0px 20px;">
        <?php if (empty($msg_success)) : ?>
            <form class="form-signin" method="post" action="" name="reg">
                <h2>
                    <i class="glyphicon glyphicon-chevron-down"></i> 
                    Contul Meu
                </h2>
                <div class="clearfix">&nbsp;</div>
                <div>
                    <label>Nume complet</label>
                    <input class="form-control" type="text" name="name" placeholder="Adaugati numele ..." value="<?= isset($userArray['name']) ? $userArray['name'] : '' ?>" required />
                    <span></span>
                </div>
                <div>
                    <label>Utilizator</label>
                    <input class="form-control" type="text" name="username" placeholder="Adaugati utilizator ..." value="<?= isset($userArray['username']) ? $userArray['username'] : '' ?>" required />
                    <span></span>
                </div>
                <div>
                    <label>Parola</label>
                    <input class="form-control" type="password" placeholder="Adaugati parola ..." name="password" required />    
                </div>
                <div>
                    <label>Confirmare parola</label>
                    <input class="form-control" type="password" placeholder="Confirmati parola ..." name="password2" required />    
                </div>  
                <div>
                    <label>Email</label>
                    <input class="form-control" type="text" name="email" placeholder="Adaugati adresa de email ..." value="<?= isset($userArray['email']) ? $userArray['email'] : '' ?>" required />
                    <span></span>
                </div>
                <div>
                    <img src="images/ajax-loader-big.gif" id="ajax-loader" class="pull-right" style="display: none;" />
                    <input id="submit" type="submit" name="submit" value="Modifica" class="btn btn-lg btn-success btn-block" />
                </div>
                <div class="clearfix">&nbsp;</div>
                <?= (!empty($msg_alert)) ? '<div class="alert alert-danger">'.$msg_alert.'</div>' : '' ?>
            </form>
        <?php else : ?>
            <?= '<div class="alert alert-success">'.$msg_success.'</div>' ?>
        <?php endif ?>
    </div>

<script>
    $(document).ready(function(){
       $('.form-signin').submit(function(e){
            $('#submit').hide();
            $('#ajax-loader').show();   
        }); 
    });
</script>
    
<?php include 'include/html/footer.phtml' ?>