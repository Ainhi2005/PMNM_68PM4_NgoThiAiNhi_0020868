<?php
session_start();
class auth {
    protected $user = [
            "nhi"=>"2005",
            "admin"=>"123"
    ];

    public function login() {
        if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            
            if(isset($this->user[$username]) && $this->user[$username] == $password) {
                $_SESSION['username'] = $username;
                header("Location: /PMNM_68PM4_NgoThiAiNhi_0020868/public/home/index");
                exit();
            } else {
                header('Location: /PMNM_68PM4_NgoThiAiNhi_0020868/public/home/login');
                exit();
            }
        }
    }
}
?>