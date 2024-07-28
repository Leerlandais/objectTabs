<?php


namespace model\Manager;

use model\Mapping\UserMapping;
use model\MyPDO;

use PDO;
use PDOException;
use model\Trait\TraitLaundryRoom;

class UserManager {
    use TraitLaundryRoom;
    private MyPDO $db;

    public function __construct(MyPDO $db) {
        $this->db = $db;
    }


// ATTEMPT USER LOGIN
    public function login(string $login, string $password) : bool  {
        $login = $this->standardClean($login);
        // $password = password_hash($password, PASSWORD_DEFAULT); // I ALWAYS FORGET THAT IT IS NOT NECESSARY TO PRE-HASH THE PASSWORD
        $stmt = $this->db->prepare("SELECT * FROM `eco_object_users` WHERE `object_user_login` = :login");
        $stmt->execute([':login' => $login]);
        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            // the password is hashed for testing as part of password_verify()
            if (password_verify($password, $user['object_user_pass'])) {
                $_SESSION = $user;
                unset($_SESSION['object_user_pass']);
                $_SESSION["id"] = session_id();
                return true;
            }
        }
        $_SESSION["errorMessage"] = "error while logging in";
        return false;
    }


// CAN'T HAVE A LOGIN WITHOUT A LOGOUT
    public function logout() : bool {
        // Mika's logout function is so good, it doesn't even need changing for OO-PHP usage ;)
        $_SESSION = [];
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        session_destroy();

        header("Location: ./");
        exit();
    }


} // end class
