<?php

class UserModel {

    public function login($username, $password) {
        // simple Logic to check the user
        if ($username === 'admin' && $password === 'admin') {
            return true;
        } else {
            return false;
        }
    }
}
?>