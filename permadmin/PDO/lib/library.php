<?php

class shuttLib
{

    /*
     * Register New User
     *
     * @param $name, $email, $ulogin, $upassword
     * @return ID
     * */
    public function Register($uname, $uemail, $ulogin, $upassword, $userreg)
    {
        try {
            $db = DB();
            $query = $db->prepare("INSERT INTO shutt_users(uname, email, ulogin, upassword, reg_date) VALUES (:user_name,:user_email,:user_login,:user_pw,:user_reg)");
            $query->bindParam("uname", $name, PDO::PARAM_STR);
            $query->bindParam("uemail", $uemail, PDO::PARAM_STR);
            $query->bindParam("ulogin", $ulogin, PDO::PARAM_STR);
            $query->bindParam("reg_date", $userreg, PDO::PARAM_STR);
            $enc_upassword = hash('sha256', $upassword);
            $query->bindParam("upassword", $enc_upassword, PDO::PARAM_STR);
            $query->execute();
            return $db->lastInsertId();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    /*
     * Check ulogin
     *
     * @param $ulogin
     * @return boolean
     * */
    public function isulogin($ulogin)
    {
        try {
            $db = DB();
            $query = $db->prepare("SELECT user_ID FROM shutt_users WHERE ulogin=:user_login");
            $query->bindParam("ulogin", $ulogin, PDO::PARAM_STR);
            $query->execute();
            if ($query->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    /*
     * Check Email
     *
     * @param $email
     * @return boolean
     * */
    public function isEmail($uemail)
    {
        try {
            $db = DB();
            $query = $db->prepare("SELECT user_ID FROM shutt_users WHERE uemail=:user_email");
            $query->bindParam("uemail", $uemail, PDO::PARAM_STR);
            $query->execute();
            if ($query->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    /*
     * Login
     *
     * @param $ulogin, $upassword
     * @return $mixed
     * */
    public function Login($ulogin, $upassword)
    {
        try {
            $db = DB();
            $query = $db->prepare("SELECT user_ID FROM shutt_users WHERE (ulogin=:user_login OR uemail=:user_email) AND upassword=:user_pw");
            $query->bindParam("ulogin", $ulogin, PDO::PARAM_STR);
            $enc_upassword = hash('sha256', $upassword);
            $query->bindParam("upassword", $enc_upassword, PDO::PARAM_STR);
            $query->execute();
            if ($query->rowCount() > 0) {
                $result = $query->fetch(PDO::FETCH_OBJ);
                return $result->user_id;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    /*
     * get User Details
     *
     * @param $user_id
     * @return $mixed
     * */
    public function UserDetails($user_id)
    {
        try {
            $db = DB();
            $query = $db->prepare("SELECT user_id, uname, ulogin, uemail,  FROM shutt_users WHERE user_id=:user_ID");
            $query->bindParam("user_id", $user_id, PDO::PARAM_STR);
            $query->execute();
            if ($query->rowCount() > 0) {
                return $query->fetch(PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
}