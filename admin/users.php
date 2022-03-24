<?php

    session_start();
    include 'functions.php';
    $user = new User();
    if (!$user->get_session()) header("Location: login.php");
   
    $users = User::getUsers();
?>

<?php include 'include/html/header.phtml' ?>
    
    <div style="padding: 0px 20px;">
        <h2 class="pull-left"><i class="glyphicon glyphicon-align-center"></i> Utilizatori</h2>
        <div class="pull-right"><a href="user-modify.php" class="btn btn-success pull-right"><i class="glyphicon glyphicon-plus"></i> Adaugare Utilizator Nou</a></div>
        <div class="clearfix">&nbsp;</div>
        <?php if (!empty($users)) : ?>
            <img src="images/ajax-loader.gif" id="ajax-loader" class="pull-right" style="display: none;" />
            <table class="table">
                <thead>
                    <th>Utilizator</th>
                    <th>Nume</th>
                    <th>Email</th>
                    <th>Data Crearii</th>
                    <th style="text-align: center;">Status</th>
                    <th style="text-align: center;">Editare</th>
                    <th style="text-align: center;">Stergere</th>
                </thead>
                <tbody>
                <?php foreach($users as $user) : ?>
                    <tr>                                                                                                                                               
                        <td><?= $user['username'] ?></td>
                        <td><?= $user['name'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td><?= $user['date_created'] ?></td>
                        <td style="text-align: center;"><a href="status.php?id=<?= $user['id'] ?>&table=user&redirect=users.php" class="btn"><i class="glyphicon glyphicon-adjust"></i> <?= $user['status'] ?></a></td>
                        <td style="text-align: center;"><a href="user-modify.php?id=<?= $user['id'] ?>" class="btn"><i class="glyphicon glyphicon-edit"></i> Edit</a> </td>
                        <td style="text-align: center;"><a href="delete.php?id=<?= $user['id'] ?>&table=user&redirect=users.php" class="btn"><i class="glyphicon glyphicon-trash"></i> Delete</a> </td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        <?php else : ?>
            <h4>- nu sunt utilizatori</h4>
        <?php endif ?>
    </div>

    <script>
        $(document).ready(function(){
            $('.container .btn').bind('click', function(){
                $(this).parent().html('<img src="images/ajax-loader.gif" id="ajax-loader" />');
            });
        });
    </script>
    
<?php include 'include/html/footer.phtml' ?>
