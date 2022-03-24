<?php

class Participanti extends AbstractClass
{
    public function __construct() {
        parent::__construct();
    }
 
    public static function getParticipanti($year = '')
    {
        if (empty($year)) $year = date('Y');
        $participantiArray = array();
        $result = self::$_db->query("select * from `participanti_cu_$year` order by `uid` desc");
        while ($row = $result->fetch_array(MYSQLI_ASSOC))  {
            $participantiArray[] = $row;
        }
        return $participantiArray;
    }
    
    public function modify_participant($arg)
    {
        $year = (isset($arg['year']) && !empty($arg['year'])) ? $arg['year'] : date('Y');
        $isAdd = true;
        if (isset($arg['id'])) {
            $result = self::$_db->query("select `id` from `participanti_cu_$year` WHERE `id` = '".$arg['id']."'");
            $no_rows = $result->num_rows;
            if ($no_rows == 1) $isAdd = false;
        }
        
        if (empty($arg['uid'])) {
            $arg['uid'] = mt_rand(100000, 999999);
        }
        
        $query = (($isAdd) ? 'insert into' : 'update') ." `participanti_cu_$year` set 
                    `nume` = '".(isset($arg['nume'])?$arg['nume']:'')."',
                    `cnp` = '".(isset($arg['cnp'])?$arg['cnp']:'')."',
                    `oras` = '".(isset($arg['oras'])?$arg['oras']:'')."',
                    `mail` = '".(isset($arg['mail'])?$arg['mail']:'')."',
                    `telefon` = '".(isset($arg['telefon'])?$arg['telefon']:'')."',
                    `abonare` = '".(isset($arg['abonare'])?$arg['abonare']:'')."',
                    `inscris_site` = '".(isset($arg['inscris_site'])?$arg['inscris_site']:'')."',
                    `uid` = '".(isset($arg['uid'])?$arg['uid']:'')."',
                    `ip_adress` = '".(isset($arg['ip_adress'])?$arg['ip_adress']:'')."',
                    `date_entered` = '".(isset($arg['date_entered'])?$arg['date_entered']:'')."',
                    `time_stamp` = '".(isset($arg['time_stamp'])?$arg['time_stamp']:'')."',
                    `hotel` = '".(isset($arg['hotel'])?$arg['hotel']:'')."',
                    `nr_cam` = '".(isset($arg['nr_cam'])?$arg['nr_cam']:'')."',
                    `tip_cam` = '".(isset($arg['tip_cam'])?$arg['tip_cam']:'')."',
                    `achitat_taxa` = '".(isset($arg['achitat_taxa'])?$arg['achitat_taxa']:'')."'"
             . ((!$isAdd) ? 'where `id` = "'. $arg['id'] .'"' : '');

        $result = self::$_db->query($query);
        return $result;
    }
    
    public function getById($id, $year = '')
    {
        if (empty($year)) $year = date('Y');
        $result = self::$_db->query("select * from `participanti_cu_$year` where `id`='$id'"); 
        return $result->fetch_array(MYSQLI_ASSOC);
    }
    
    public function deleteById($id, $year)
    {
       $result = self::$_db->query("delete from `participanti_cu_$year` where `id`='".$id."'");
       return $result; 
    }
    
    public static function getUidNumeArray($year = '')
    {
        if (empty($year)) $year = date('Y');
        $uidNumeArray = array();
        $result = self::$_db->query("select uid, nume from participanti_cu_$year");
        while ($row = $result->fetch_array(MYSQLI_ASSOC))  {
            $uidNumeArray[$row['uid']] = $row['nume'];
        }
        return $uidNumeArray; 
    }
    
    public static function getPartener($id, $uid, $year) {
        if (empty($year)) $year = date('Y');
        $partener = array();
        $result = self::$_db->query("select uid, nume from participanti_cu_$year where id <> '$id' and uid = '$uid';");
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $partener[$row['uid']] = $row['nume'];
        return $partener; 
    }
    
}