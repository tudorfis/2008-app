<?php

class User extends AbstractClass
{
    public function __construct() {
        parent::__construct();
    }
    
    //Registration process 
    public function register_user($name, $username, $password, $email, $status) 
    {
        $password = md5($password);
        $result = self::$_db->query("SELECT id from users WHERE username = '$username' or email = '$email' and status = 'active'");
        $no_rows = $result->num_rows;
        if ($no_rows == 0) 
        {
            $result = self::$_db->query("INSERT INTO users(username, password, name, email, status, date_created) values ('$username', '$password','$name','$email', '$status', NOW())") or die(self::$_db->error());
            return $result;
        }
        else
        {
            return FALSE;
        }
    }
    
    public function edit_user($id, $name, $username, $email) 
    {
        $result = self::$_db->query("SELECT id from users WHERE `id` = '$id'");
        $no_rows = $result->num_rows;
        if ($no_rows == 1) 
        {
            $result = self::$_db->query("update users set name = '$name', username = '$username', email = '$email' where `id` = '$id'");
            return $result;
        }
        else
        {
            return FALSE;
        }     
    }
    
    public function edit_user_pass($id, $name, $username, $email, $password) 
    {
        $password = md5($password);
        $result = self::$_db->query("SELECT id from users WHERE `id` = '$id'");
        $no_rows = $result->num_rows;
        if ($no_rows == 1) 
        {
            $result = self::$_db->query("update users set name = '$name', username = '$username', email = '$email', password = '$password' where `id` = '$id'");
            return $result;
        }
        else
        {
            return FALSE;
        }     
    }
    
    
    
    // Login process
    public function check_login($emailusername, $password) 
    {
        $password = md5($password);
        $result = self::$_db->query("SELECT id from users WHERE email = '$emailusername' or username='$emailusername' and password = '$password' and status = 'active'");
        $user_data = $result->fetch_array(MYSQLI_ASSOC);
        $no_rows = $result->num_rows;
        if ($no_rows == 1) 
        {
            $_SESSION['login'] = true;
            $_SESSION['id'] = $user_data['id'];
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    // Getting session 
    public function get_session() 
    {
        return (isset($_SESSION['login']) && ($_SESSION['login'] == true)) ? TRUE : FALSE;
    }
    // Logout 
    public function user_logout() 
    {
        $_SESSION['login'] = FALSE;
        session_destroy();
    }
    
    public function getName() 
    {
        $result = self::$_db->query("SELECT name FROM users WHERE id = '".$_SESSION['id']."'");
        $user_data = $result->fetch_array(MYSQLI_ASSOC);
        return $user_data['name'];
    }
    
    public function getUsername() 
    {
        $result = self::$_db->query("SELECT username FROM users WHERE id = '".$_SESSION['id']."'");
        $user_data = $result->fetch_array(MYSQLI_ASSOC);
        return $user_data['username'];
    }
    
    public function deleteById($id)
    {
       $result = self::$_db->query("update `users` set status = 'deleted' where `id`='".$id."'");
       return $result; 
    }
    
    public function changeStatusById($id)
    {
       $result = self::$_db->query("select status from `users` where `id`='$id'"); 
       $row = $result->fetch_array(MYSQLI_ASSOC);
       $new_status = ($row['status'] == 'active') ? 'inactive' : 'active';
       
       $result2 = self::$_db->query("update `users` set status = '$new_status' where `id`='$id'");
       return $result2; 
       
    }
    
    public function getById($id)
    {
        $result = self::$_db->query("select * from `users` where `id`='$id'"); 
        return $result->fetch_array(MYSQLI_ASSOC);
    }
    
    public static function getUsers()
    {
        $usersArray = array();
        $result = self::$_db->query("select * from users where status <> 'deleted'");
        while ($row = $result->fetch_array(MYSQLI_ASSOC))  {
            $usersArray[] = $row;
        }
        return $usersArray;
    }

}