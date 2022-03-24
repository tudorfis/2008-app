<?php
  
  session_start();
  include 'functions.php';
  $user = new User();
  
  if ($user->get_session()) {
      header("Location: index.php");
  }

  $msg_success = '';
  $msg_alert = '';
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      
      if ($_POST['password'] != $_POST['password2']) {
          $msg_alert = 'Parolele nu coincid.';
      } else {
          $register = $user->register_user($_POST['name'], strtolower($_POST['username']), $_POST['password'], strtolower($_POST['email']), 'inactive');
          if ($register) {
              $msg_success = 'Inregistrare realizata cu succes. Dupa aprobarea unui administratori, <a href="login.php">Click aici</a> pentru logare.';
          } else {
              $msg_alert = 'Inregistrare esuata, va rugam incercati dinou.';
          }    
      }
      
  }
?>
<?php include 'include/html/header.phtml' ?>
    <div class="container">
        <?php if (empty($msg_success)) : ?>
            <form class="form-signin" method="post" action="" name="reg">
                <h2><i class="glyphicon glyphicon-hand-right"></i> Inregistrare </h2>
                <div class="clearfix">&nbsp;</div>
                <div>
                    <label>Nume complet</label>
                    <input class="form-control" type="text" name="name" placeholder="Adaugati numele ..." value="<?= isset($_POST['name']) ? $_POST['name'] : '' ?>" required />
                    <span></span>
                </div>
                <div>
                    <label>Utilizator</label>
                    <input class="form-control" type="text" name="username" placeholder="Adaugati utilizator ..." value="<?= isset($_POST['username']) ? $_POST['username'] : '' ?>" required />
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
                    <input class="form-control" type="text" name="email" placeholder="Adaugati adresa de email ..." value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>" required />
                    <span></span>
                </div>
                <div>
                    <input type="submit" value="Inregistrare" class="btn btn-lg btn-success btn-block" />
                </div>
                <div class="clearfix">&nbsp;</div>
                <?= (!empty($msg_alert)) ? '<div class="alert alert-danger">'.$msg_alert.'</div>' : '' ?>
            </form>
        <?php else : ?>
            <?= '<div class="alert alert-success">'.$msg_success.'</div>' ?>
        <?php endif ?>
    </div>
    
<?php include 'include/html/footer.phtml' ?>