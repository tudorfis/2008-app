<?php

    session_start();
    include 'functions.php';
    $user = new User();
    if (!$user->get_session()) header("Location: login.php");
   
    $year = $_GET['year'];
    $participanti = Participanti::getParticipanti($year);
    $uid = '';
?>


<?php include 'include/html/header.phtml' ?>
   
    <div style="padding: 0px 20px">
        <h2 class="pull-left"><i class="glyphicon glyphicon-user"></i> Participanti Cupa Unirii <?= $year ?></h2>
        <div class="pull-right"><a href="participant-modify.php?year=<?= $year ?>" class="btn btn-success pull-right"><i class="glyphicon glyphicon-plus"></i> Adaugare Participant Nou</a></div>
        <div class="clearfix">&nbsp;</div>
        <?php if (!empty($participanti)) : ?>
            <img src="images/ajax-loader.gif" id="ajax-loader" class="pull-right" style="display: none;" />
            <table class="table bg-white-gradient participanti">
                <thead style="border-bottom: 3px solid #000;">
                    <th>Id</th>
                    <th>Axa</th>
                    <th>Nume</th>
                    <th>Cnp</th>
                    <th>Oras</th>
                    <th>Mail</th>
                    <th>Telefon</th>
                    <th style="text-align: center;">Abonare Newsletter</th>
                    <th style="text-align: center;">Inscris Site</th>
                    <th style="text-align: center;">Achitat Taxa</th>
                    <th>Adresa IP</th>
                    <th>Data Inregistrarii</th>
                    <th>Hotel</th>
                    <th>Nr. Camere</th>
                    <th>Tip Camera</th>
                    <th style="text-align: center;">Editare</th>
                    <th style="text-align: center;">Stergere</th>
                </thead>
                <tbody>
                <?php foreach($participanti as $participant) : ?>
                <?php //($participant['uid'] == $uid) ? '<tr style="border-bottom: 3px solid #999;">' : '<tr style="border-top: 3px solid #999;">' ?>
                <?php echo '<tr style="background-color: #'.(!empty($participant['uid'])?$participant['uid']:'999').';">'; ?>
                        <td><?= $participant['id'] ?></td>
                        <td><?= $participant['uid'] ?></td>
                        <td><?= $participant['nume'] ?></td>
                        <td><?= $participant['cnp'] ?></td>
                        <td><?= $participant['oras'] ?></td>
                        <td><?= $participant['mail'] ?></td>
                        <td><?= $participant['telefon'] ?></td>
                        <td style="text-align: center;"><?= showDaSauNu($participant['abonare']) ?></td>
                        <td style="text-align: center;"><?= showDaSauNu($participant['inscris_site']) ?></td>
                        <td style="text-align: center;"><?= showDaSauNu($participant['achitat_taxa']) ?></td>
                        <td><?= $participant['ip_adress'] ?></td>
                        <td><?= $participant['date_entered'] ?></td>
                        <td><?= $participant['hotel'] ?></td>
                        <td><?= $participant['nr_cam'] ?></td>
                        <td><?= $participant['tip_cam'] ?></td>
                        <td style="text-align: center; background-color: #fff; border: 1px solid #ccc;"><a href="participant-modify.php?id=<?= $participant['id'] ?>&year=<?= $year ?>" class="btn"><i class="glyphicon glyphicon-edit"></i> Edit</a> </td>
                        <td style="text-align: center; background-color: #fff; border: 1px solid #ccc;">
                            <a href="delete.php?id=<?= $participant['id'] ?>&table=participanti&year=<?= $year ?>&redirect=participanti.php?year=<?= $year ?>" class="btn">  
                                <i class="glyphicon glyphicon-trash"></i> Delete</a> 
                            </td>
                    </tr>
                <?php $uid = $participant['uid']; ?>
                <?php endforeach ?>
                </tbody>
            </table>
        <?php else : ?>
            <h4>- nu sunt inscrisi</h4>
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


    