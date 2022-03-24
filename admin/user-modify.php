<?php

    session_start();
    include 'functions.php';
    $user = new User();
    if (!$user->get_session()) header("Location: login.php");
   
    // get the type
    $userArray = array();
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $userArray = $user->getById($_GET['id']);    
        $userArray = (!is_null($userArray)) ? $userArray : array();
        $type = 'edit';
    } else {
        $type = 'add';
    }
    
    // submit - add
    if (isset($_POST['add'])) {
        $add = $user->register_user($_POST['name'], strtolower($_POST['username']), $_POST['password'], strtolower($_POST['email']), 'active');
        if ($add) {
            header("Location: users.php");
        } else {
            $msg_alert = 'Adaugare esuata, va rugam incercati dinou.';
        }    
    }
    // submit - edit
    if (isset($_POST['edit'])) {
        $edit = $user->edit_user($_POST['id'], $_POST['name'], strtolower($_POST['username']), strtolower($_POST['email']));
        if ($edit) {
            header("Location: users.php");
        } else {
            $msg_alert = 'Editare esuata, va rugam incercati dinou.';
        }
    }
    
?>

<?php include 'include/html/header.phtml' ?>
    <div class="container">
        <?php if (empty($msg_success)) : ?>
            <form class="form-signin" method="post" action="" name="reg">
                <h2>
                    <i class="glyphicon glyphicon-align-center"></i> 
                    <?= ($type == 'add') ? 'Adauga' : 'Editeaza' ?> Utilizator
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
                <?php if ($type == 'add') : ?>
                    <div>
                        <label>Parola</label>
                        <input class="form-control" type="password" placeholder="Adaugati parola ..." name="password" required />    
                    </div> 
                <?php endif ?>
                <div>
                    <label>Email</label>
                    <input class="form-control" type="text" name="email" placeholder="Adaugati adresa de email ..." value="<?= isset($userArray['email']) ? $userArray['email'] : '' ?>" required />
                    <span></span>
                </div>
                <div>
                    <img src="images/ajax-loader-big.gif" id="ajax-loader" class="pull-right" style="display: none;" />
                    <input id="submit" type="submit" name="<?= $type ?>" value="<?= ($type == 'add') ? 'Adauga' : 'Editeaza' ?>" class="btn btn-lg btn-success btn-block" />
                    <?php if ($type == 'edit') : ?>
                        <input type="hidden" name="id" value="<?= $_REQUEST['id'] ?>" />
                    <?php endif ?>
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