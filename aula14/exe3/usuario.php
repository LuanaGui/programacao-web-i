<?php
class Usuario {
    public string $userName;
    public string $userLogin;
    public string $userPass;

    public function __construct(string $userName, string $userLogin, string $userPass) {
        $this->userName = $userName;
        $this->userLogin = $userLogin;
        $this->userPass = $userPass;
    }
}
?>
