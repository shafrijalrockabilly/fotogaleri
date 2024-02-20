<?php
namespace App\Controllers;

class RegisterController extends BaseController{

    private $userModel;
    private $session;

    public function __construct(){
        $this->userModel = new \App\Models\User();
        $this->session = \Config\Services::session();
    }
    public function register(){
        return view("register");
    }
    public function proses_register(){
        $username = $this->request->getPost("username");
        $password = $this->request->getPost("password");
        $nama = $this->request->getPost("nama");
        $email = $this->request->getPost("email");
        $alamat = $this->request->getPost("alamat");

        $usernameExist = $this->userModel
         ->where("username", $username)->first();

         if($usernameExist){
            $this->session->setFlashdata("pesan", "Username sudah digunakan");
            return redirect()->to(base_url('register'));
         }

         if(strlen($password) < 2){
            $this->session->setFlashdata("pesan", "Password minimum 2 karakter");
            return redirect()->to(base_url('register'));
         }

        $this->userModel->insert([
            "username"  => $username,
            "password"  => password_hash($password, PASSWORD_BCRYPT),
            "nama"      => $nama,
            "email"      => $email,
        ]);

        return redirect()->to(base_url('login'));
    }
}
?>