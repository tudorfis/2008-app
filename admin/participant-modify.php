<?php

    session_start();
    include 'functions.php';
    $user = new User();
    if (!$user->get_session()) header("Location: login.php");
   
    // get the type
    $participanti = new Participanti();
    $participantArray = array();
    $year = isset($_GET['year']) ? $_GET['year'] : '';
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $participantArray = $participanti->getById($_GET['id'], $year);    
        $participantArray = (!is_null($participantArray)) ? $participantArray : array();
        $type = 'edit';
    } else {
        $type = 'add';
    }
    
    // submit - add - edit 
    if (isset($_POST['submit'])) {
        $modify = $participanti->modify_participant($_POST);
        if ($modify) {
            header("Location: participanti.php?year=$year");
        } else {
            $msg_alert = 'Adaugare esuata, va rugam incercati dinou.';
        }    
    }
    
?>
<?php include 'include/html/header.phtml' ?>
    
    <style>
        .form-control {
            width: 400px;
        }
    </style>
    
    <div class="container">
        <?php if (empty($msg_success)) : ?>
            <form class="form-signin" style="max-width: 880px;" method="post" action="" name="reg">
                <h2>
                    <i class="glyphicon glyphicon-user"></i> 
                    <?= ($type == 'add') ? 'Adauga' : 'Editeaza' ?> Participant
                </h2>
                <div class="clearfix">&nbsp;</div>
                <div class="pull-left">
                    <?= HtmlBuilder::buildInput('text', 'nume',  'Nume complet', 'Adaugati numele ...', $participantArray, 'form-control', '',  'required') ?>
                    <?= HtmlBuilder::buildInput('text', 'cnp',   'CNP', 'Adaugati CNP ...', $participantArray, 'form-control', '',  '') ?>
                    <?= HtmlBuilder::buildInput('text', 'oras',  'Oras', 'Adaugati orasul ...', $participantArray, 'form-control', '',  'required') ?>
                    <?= HtmlBuilder::buildInput('email', 'mail',  'eMail', 'Adaugati adresa de email ...', $participantArray, 'form-control', '',  '') ?>
                    <?= HtmlBuilder::buildInput('number', 'telefon', 'Telefon', 'Adaugati nr de telefon ...', $participantArray, 'form-control', '', '') ?>
                </div>
                <div class="pull-right">
                    <?php 
                        $partener = ($type == 'edit') ? Participanti::getPartener($participantArray['id'], $participantArray['uid'], $year) : array('', '');
                        $uidSelectOptions = $partener + Participanti::getUidNumeArray($year); 
                    ?>
                    <?= HtmlBuilder::buildInput('select', 'uid', 'Partener', 'Selectati partener...', $participantArray, 'form-control', '',  '', array(), $uidSelectOptions) ?>
                    <?= HtmlBuilder::buildInput('textarea', 'hotel', 'Hotel', 'Adaugati hotel ...', $participantArray, 'form-control', '',  '') ?>
                    <?= HtmlBuilder::buildInput('number', 'nr_cam', 'Nr. Camere', 'Adaugati nr camere ...', $participantArray, 'form-control', '', '') ?>
                    <?= HtmlBuilder::buildInput('text', 'tip_cam', 'Tip Camera', 'Adaugati tipul de camera ...', $participantArray, 'form-control', '',  '') ?>
                    <?= HtmlBuilder::buildInput('radio', 'abonare', 'Abonare newsletter: ', '', $participantArray, 'mr10 ml20', '',  '', array('1', '0'), array()) ?>
                    <?= HtmlBuilder::buildInput('radio', 'inscris_site', 'Inscris prin site: ', '', $participantArray, 'mr10 ml20', '',  '', array('1', '0')) ?>
                    <?= HtmlBuilder::buildInput('radio', 'achitat_taxa', 'Achitat taxa: ', '', $participantArray, 'mr10 ml20', '',  '', array('1', '0')) ?>
                </div>  
                
                <div>
                    <div class="clearfix">&nbsp;</div>
                    <div class="clearfix">&nbsp;</div>
                    <img src="images/ajax-loader-big.gif" id="ajax-loader" class="pull-right" style="display: none;" />
                    <input id="submit" type="submit" name="submit" value="<?= ($type == 'add') ? 'Adauga' : 'Editeaza' ?>" class="btn btn-lg btn-success btn-block" />
                    <input type="hidden" name="year" value="<?= $_REQUEST['year'] ?>" />
                    <input type="hidden" name="ip_adress" value="<?= $_SERVER['REMOTE_ADDR'] ?>" />
                    <input type="hidden" name="date_entered" value="<?= date("F j, Y, g:i a") ?>" />
                    <input type="hidden" name="time_stamp" value="<?= strtotime(date("F j, Y, g:i a")) ?>" />
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