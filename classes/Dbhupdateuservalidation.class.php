<?php

class Dbhupdateuservalidation extends Dbhcontroller
{
    private $firstname;
    private $middlename;
    private $lastname;
    private $usernameOriginal;
    private $username;
    private $password;
    private $passwordRepeat;
    private $email;
    private $access;


    public function __construct($firstname, $middlename, $lastname, $usernameOriginal, $username, $password, $passwordRepeat, $email, $access, $id)
    {
        $this->firstname = $firstname;
        $this->middlename = $middlename;
        $this->lastname = $lastname;
        $this->username = $username;
        $this->usernameOriginal = $usernameOriginal;
        $this->password = $password;
        $this->passwordRepeat = $passwordRepeat;
        $this->email = $email;
        $this->access = $access;
        $this->id = $id;
    }

    public function updateUserValidation()
    {
        if ($this->emptyInput() == false) {
            echo    "<script>
                        alert('Invalid Input!');
                    </script>";
            header('refresh: 0');
            exit();
        }

        if ($this->invalidUid() == false) {
            echo    "<script>
                        alert('Invalid Username!');
                    </script>";
            header('refresh: 0');
            exit();
        }

        if ($this->invalidEmail() == false) {
            echo    "<script>
                        alert('Invalid Email!');
                    </script>";
            header('refresh: 0');
            exit();
        }

        if ($this->pwdMatch() == false) {
            echo    "<script>
                        alert('Password not match!');
                    </script>";
            header('refresh: 0');
            exit();
        }

        if ($this->userNameTaken() == false) {
            echo    "<script>
                        alert('Username already exist!');
                    </script>";
            header('refresh: 0');
            exit();
        }

        $this->updateUserData($this->firstname, $this->middlename, $this->lastname, $this->username, $this->password, $this->email, $this->access, $this->id);
    }

    private function emptyInput()
    {
        $result = '';

        if (empty($this->firstname) || empty($this->middlename) || empty($this->lastname) || empty($this->username) || empty($this->password) || empty($this->passwordRepeat) || empty($this->email) || empty($this->access)) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

    private function invalidUid()
    {
        $result = '';
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->username)) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

    private function invalidEmail()
    {
        $result = '';
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

    private function pwdMatch()
    {
        $result = "";

        if ($this->password !== $this->passwordRepeat) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

    private function userNameTaken()
    {
        $result = '';
        // if ($this->checkUser($this->username, $this->email) > 0) {
        //     $result = false;
        // } else {
        //     $result = true;
        // }


        if ($this->usernameOriginal !== $this->username) {
            if ($this->checkUser($this->username, $this->email) > 0) {
                $result = false;
            } else {
                $result = true;
            }
        } else {
            $result = true;
        }

        return $result;
    }
}
