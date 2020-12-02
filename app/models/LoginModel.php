<?php


class LoginModel extends Model
{
    public function checkUser($name, $password)
    {
        $sql = "SELECT * FROM users WHERE name = :name AND password = :password";
        $query = $this->db->prepare($sql);
        $query->bindValue(":name", $name, PDO::PARAM_STR);
        $query->bindValue(":password", $password, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            $_SESSION['user'] = $name;
            header('Location: /');
        } else {
            return false;
        }
    }

}