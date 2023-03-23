<?php

interface ISigner
{
    public function add_user(string $username, string $password, string $confirmPassword, string $firstname, string $lastname) : void;
    public function update_password(string $username, string $newPassword, string $confirmNewPassword) : void;
    public function delete_account(string $username) : void;
}

?>