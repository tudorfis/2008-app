<?php

    //gestionarea erorilor
    ini_set('display_errors',0);
    error_reporting(E_ALL & ~E_NOTICE);

    //Conectarea la baza de date!
    include("config.php");

    print '<link rel="stylesheet" href="../../css/main_design.css" />';
?>

<br />
<div class="title_main">
    <center>Cupa Unirii <?= date('Y') ?> - Inscrisi</center>
</div>

    <?php
        $uid_array = array();
        $query = "select * from `participanti_cu_".date('Y')."`"; 
        if ($r = mysqli_query($dbc, $query)) {
          if (mysqli_num_rows($r) > 0) {
    ?>
                                                                                    
    
            <link rel="stylesheet" href="../../admin/css/normalize.css" type="text/css" />
            <link rel="stylesheet" href="../../admin/css/bootstrap.min.css" type="text/css" />
            <link rel="stylesheet" href="../../admin/css/bootstrap-theme.min.css" type="text/css" />
            <link rel="stylesheet" href="../../admin/css/custom.css" type="text/css" />
            <script type="text/javascript" src="../../admin/js/jquery.min.js"></script>
            <script type="text/javascript" src="../../admin/js/bootstrap.min.js"></script>
            <style>
                .table-inscrisi,
                .table-inscrisi tr, 
                .table-inscrisi td,
                .table-inscrisi th {
                    text-align: center;
                    margin: 0 auto;
                }  
                .table-inscrisi h2 {
                    margin: 0;    
                    padding: 0;
                    color: #00ff00;
                }        
                .bg-cyan-gradient {
                    background: #41a317; /* Old browsers */
                    background: -moz-linear-gradient(top, #41a317 2%, #5ffb17 100%); /* FF3.6+ */
                    background: -webkit-gradient(linear, left top, left bottom, color-stop(2%,#41a317), color-stop(100%,#5ffb17)); /* Chrome,Safari4+ */
                    background: -webkit-linear-gradient(top, #41a317 2%,#5ffb17 100%); /* Chrome10+,Safari5.1+ */
                    background: -o-linear-gradient(top, #41a317 2%,#5ffb17 100%); /* Opera 11.10+ */
                    background: -ms-linear-gradient(top, #41a317 2%,#5ffb17 100%); /* IE10+ */
                    background: linear-gradient(to bottom, #41a317 2%,#5ffb17 100%); /* W3C */
                    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#41a317', endColorstr='#5ffb17',GradientType=0 ); /* IE6-9 */
                }       
            </style>
            
    
            <div class="clearfix">&nbsp;</div> 
            <table class="table table-inscrisi bg-cyan-gradient" style="max-width: 750px;">
                <thead>
                    <tr>
                        <th colspan="4"><h2>AXA</h2></th>
                    </tr>
                    <tr>
                        <th align="center"><b>Nume Prenume</b></th>
                        <th style="border-right: 3px solid #000;"><b>Oras</b></th>
                        <th style="border-left: 3px solid #000;"><b>Nume Prenume</b></th>
                        <th align="center"><b>Oras</b></th>
                    </tr>
                    
                </thead>
                <tbody>                         
                
            <?php
                while ($row = mysqli_fetch_assoc ($r)) {
                    if (!in_array($row['uid'], $uid_array)) {
                                            
                        echo '<tr>';
                            echo '<td>'.$row['nume'].'</td>';
                            echo '<td style="border-right: 3px solid #000;">'.$row['oras'].'</td>';
                            
                                $query2 = "select * from `participanti_cu_".date('Y')."` where `uid` = '".$row['uid']."' and `nume` <> '".$row['nume']."'"; 
                                $r2 = mysqli_query($dbc, $query2);
                                $row2 = mysqli_fetch_assoc($r2);
                            
                            echo '<td style="border-left: 3px solid #000;">'.$row2['nume'].'</td>';
                            echo '<td>'.$row2['oras'].'</td>';
                        echo '</tr>';
                        $uid_array[] = $row['uid'];

                    }
                }
            echo '</tbody>';
            echo '</table>';
          } else {
              echo '<h4><center>Momentan nu sunt persoane inscrise. <br /> Pentru inscrieri <a href="/evenimente.php?p=4" target="_main">click aici</a></center></h4>';
          }     
    }
    
