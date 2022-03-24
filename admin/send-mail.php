<?php

    session_start();
    include 'functions.php';
    $user = new User();
    if (!$user->get_session()) header("Location: login.php");

    $year = $_GET['year'];
    $participanti = Participanti::getParticipanti($year);
    $msg = '';
    
    // if isset post
    if (isset($_POST["submit"])) {

        // error handling
        if (empty($_POST['participanti'])) {
            $msg = "Va rugam selectati participantii";

        // Do Processing
        } else {
            
            // Send email la fiecare participant
            foreach($_POST['participanti'] as $email_participant) {
                @mail(trim($email_participant), $_POST['subject'].' - bridge-apullum.ro', $_POST['content'], 'From: '.$_POST['from']."\r\n". 'Content-type: text/html');    
            }
            
            $msg_success = 'Emailuri trimise cu success';

        } 
    }
?>
<?php include 'include/html/header.phtml' ?>

<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

    <div style="padding: 15px 30px;">
        <h2 class="pull-left"><i class="glyphicon glyphicon-list-alt"></i> Trimite Mail Participanti <?= $year ?></h2>
        <form action="" method="post" class="form" enctype="multipart/form-data">
            <table class="table pull-left">
                <?php if (!empty($msg)) : ?>
                     <tr><td>
                        <div class="alert alert-danger"><?= $msg ?></div>
                     </td></tr>
                 <?php endif ?>
                 <?php if (!empty($msg_success)) : ?>
                     <tr><td>
                        <div class="alert alert-success"><?= $msg_success ?></div>
                     </td></tr>
                 <?php endif ?>
                 
                <tr>
                    <td>
                        <div>
                            <label>Subiect</label>
                            <input type="text" name="subject" id="subject" class="form-control mb10" placeholder="Introduceti subiectul ..." value="<?= (isset($_POST['subject'])?$_POST['subject']:'') ?>" required />
                            <span></span>
                        </div>
                        <div>
                            <label>De la</label>
                            <select id="from" name="from" class="form-control mb10" required>
                                <option value="">- Selectati adresa -</option>
                                <option value="office@bridge-apullum.ro">office@bridge-apullum.ro</option>
                                <option value="presedinte@bridge-apullum.ro">presedinte@bridge-apullum.ro</option>
                                <option value="secretar@bridge-apullum.ro">secretar@bridge-apullum.ro</option>
                                <option value="concurs@bridge-apullum.ro">concurs@bridge-apullum.ro</option>
                                <option value="admin@bridge-apullum.ro">admin@bridge-apullum.ro</option>
                            </select>
                            <span></span>
                        </div>
                        <div>
                            <label>Continut</label>
                            <textarea id="content" name="content" class="form-control mb10" placeholder="Adaugati continutul ... " 
                                    style="min-height: 300px ; width: 100%;"><?= (isset($_POST['content'])?$_POST['content']:'') ?></textarea>
                            <span></span>                                                                                                               
                        </div>
                        <div>
                            <img src="images/ajax-loader-big.gif" id="ajax-loader" class="pull-right" style="display: none;" />
                            <input id="submit" type="submit" name="submit" value="Trimite Email" class="btn btn-lg btn-success btn-block" />
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php if (!empty($participanti)) : ?>
                            <input type="text" class="search form-control mb10" placeholder="Cautati aici ..." style="border: 1px solid #666;" />
                            <a class="btn btn-success check-all">Selecteaza tot</a>
                            <a class="btn btn-success uncheck-all">Deselecteaza tot</a>
                            <div class="clearfix">&nbsp;</div>
                            <table class="table participanti">
                                <thead style="border-bottom: 3px solid #000; background-color: #ccc;">
                                    <th>#Select</th>
                                    <th>Axa</th>
                                    <th>Email</th>
                                    <th>Nume</th>
                                    <th>Oras</th>
                                    <th>Telefon</th>
                                </thead>
                                <tbody>
                                    <?php foreach($participanti as $participant) : ?>
                                    <?php echo '<tr style="background-color: #'.(!empty($participant['uid'])?$participant['uid']:'999').';">'; ?>
                                            <td style="text-align: center;"><label style="width: 100%; cursor: pointer;"><input type="checkbox" name="participanti[]" value="<?= $participant['mail'] ?>" /></label></td>
                                            <td><?= $participant['uid'] ?></td>
                                            <td><?= $participant['mail'] ?></td>
                                            <td class="name_filter"><?= $participant['nume'] ?></td>
                                            <td><?= $participant['oras'] ?></td>
                                            <td><?= $participant['telefon'] ?></td>
                                       </tr>
                                    <?php endforeach ?>
                               </tbody>
                            </table>
                        <?php else : ?>
                            <h4>- nu sunt inscrisi</h4>
                        <?php endif ?>
                    </td>
                </tr>
            </table>
        </form>
    </div>        
    <script>
        $(document).ready(function(){
            $('.check-all').bind('click', function(e){
                e.preventDefault();
                $('table.participanti tr').each(function(){
                        if ($(this).is(':visible')) {
                            var e_checkbox = $(this).find('input[type="checkbox"]');
                            e_checkbox.hide();
                            e_checkbox.prop("checked", true);
                            e_checkbox.parent().parent().addClass('checked');
                            e_checkbox.show('fast');
                        }     
                });
            }); 
            
            $('.uncheck-all').bind('click', function(e){
                e.preventDefault();
                $('table.participanti tr').each(function(){
                        if ($(this).is(':visible')) {
                            var e_checkbox = $(this).find('input[type="checkbox"]');
                            e_checkbox.hide()
                            e_checkbox.prop("checked", false);
                            e_checkbox.parent().parent().removeClass('checked');
                            e_checkbox.show('fast');
                        }     
                });
            });
            
            $('.search').keyup(function(e){
                e.preventDefault();                
                filter = $(this).val();
                regex = new RegExp(filter, "i")
                $('table.participanti tbody tr').each(function(){
                    name_filter = $(this).find('.name_filter').html();
                    if (name_filter.search(regex) < 0) {
                        $(this).hide('fast');
                    } else {
                        $(this).show('fast');
                    }
                });
            });
            
            $('.form').submit(function(e){
                $('#submit').hide();
                $('#ajax-loader').show();   
            });
        })
    </script>

<?php include 'include/html/footer.phtml' ?>