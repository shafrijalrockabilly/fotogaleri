<?php
namespace App\Controllers;

class LoginController extends BaseController{

    private $userModel;
    private $session;

    public function __construct(){
        $this->userModel = new \App\Models\User();
        $this->session = \Config\Services::session();
    }
    public function login(){
        return view("login");
    }
    public function proses_login(){
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $this->userModel
        ->where("username",$username)
        ->first();

        if($user){
          //eksekusi login
          if(password_verify($password, $user->password)){
            //eksekusi login
            $session_data = ([
                "user_id"    => $user->user_id,
                "user_name"  => $user->nama,
            ]);
            session()->set($session_data);
            return redirect()->to((base_url('home')));
          }else{
            //kembali dan error
            $this->session->setFlashdata('pesan', "Kosong");
            return redirect()->to(base_url('login'));
          }
        }else{
            //kembali dan error
            $this->session->setFlashdata('pesan',"salah");
            return redirect()->to(base_url('login'));
        }
    }
}
?>