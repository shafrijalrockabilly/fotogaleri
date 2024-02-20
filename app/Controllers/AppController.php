<?php
namespace App\Controllers;

class AppController extends BaseController{

    private $fotoModel;
    private $userModel;
    private $albumModel;
    private $likeModel;
    private $komentarModel;
    private $session;

    public function __construct(){
        $this->fotoModel = new \App\Models\foto();
        $this->userModel = new \App\Models\user();
        $this->albumModel = new \App\Models\album();
        $this->likeModel = new \App\Models\like();
        $this->komentarModel = new \App\Models\komentar();     
        $this->session = \Config\Services::session();

        

        if($this->session->user_id == null){
            $this->session->setFlashdata('pesan',"Login Terlebih Dahulu");
            header("location:".base_url('login'));
            exit();
        }
    }   
    public function hello(){
        $data = ([
            "nama" => "ilham",
        ]);
        return view("hello",$data);
    }
    public function info(){
        return view("info");
    }
    public function template(){
        return view("template");

    }
    public function home(){
        $judul_foto = $this->request->getVar("judul_foto");
        if ($judul_foto == null) {
            $rows = $this->fotoModel
                ->orderBy("judul_foto", "asc")
                ->FindAll();
        } else {
            $rows = $this->fotoModel
                ->orderBy("judul_foto", "asc")
                ->like("judul_foto", $judul_foto)
                ->findall();
        }
        $rows1 = $this->albumModel
                ->orderBy("album_id", "asc")
                ->FindAll();

        $data = ([
            "rows" => $rows,
            "rows1" => $rows1,
        ]);
        return view("home", $data);
    }
    public function home2($id)
    {
        $rows = $this->fotoModel
                ->orderBy("judul_foto", "asc")
                ->where("album_id",$id)
                ->FindAll();
    
        $rows1 = $this->albumModel
                ->orderBy("album_id", "asc")
                ->FindAll();

        $data = ([
            "rows" => $rows,
            "rows1" => $rows1,
        ]);
        return view("home", $data);
    }
    public function profil(){
        return view("profil");
    }    
    public function tambah_foto(){
        $rows1 = $this->albumModel
                ->orderBy("album_id","asc")
                ->FindAll();
        $rows2 = $this->userModel
                ->orderBy("user_id","asc")
                ->FindAll();                

        $data = ([
            "rows1" => $rows1,
            "rows2" => $rows2,
        ]);
        return view("tambah_foto",$data);
    }

    public function tambah_album(){
        $rows1 = $this->userModel
                ->orderBy("user_id","asc")
                ->FindAll();                

        $data = ([
            "rows1" => $rows1,
        ]);
        return view("tambah_foto",$data);
    }

    public function proses_tambah_album(){
        $nama_album        = $this->request->getpost("nama_album");
        $deskripsi         = $this->request->getpost("deskripsi");
        $tanggal_dibuat     = date('Y-m-d');
        $user_id           = $this->session->user_id;

        $album_id = $this->request->getpost("album_id");
        if (empty($album_id)) {
            $album_id = null;
        }

        $this->albumModel->insert([
            "nama_album"      => $nama_album,
            "deskripsi"       => $deskripsi,
            "tanggal_dibuat"  => $tanggal_dibuat,
            "user_id"         => $user_id,
            "album_id"        => $album_id,
          ]);

        return redirect()->to(base_url("home"));
    }

    public function proses_tambah_foto(){
        $this->session->setFlashdata('alert', 'Data berhasil ditambah');
        $judul_foto         = $this->request->getpost("judul_foto");
        $deskripsi_foto     = $this->request->getpost("deskripsi_foto");
        $tanggal_unggah     = date('Y-m-d');
        $album_id           = $this->request->getpost("album_id");
        $user_id = $_SESSION['user_id'];
        $lokasi_file        = $this->request->getFile("lokasi_file");
        $namafoto           = $user_id."_".$lokasi_file->getRandomName();

        $lokasi_file->move("assets/foto",$namafoto);

        $this->fotoModel->insert([
            "judul_foto"        => $judul_foto,
            "deskripsi_foto"    => $deskripsi_foto,
            "tanggal_unggah"    => $tanggal_unggah,
            "album_id"          => $album_id,
            "user_id"           => $user_id,
            "lokasi_file"       => $namafoto
        ]);

        return redirect()->to(base_url("data_foto"));
    }
    public function data_foto(){
        $rows = $this->fotoModel
                ->join("album","album.album_id=foto.album_id","left")
                ->join("user","user.user_id=foto.user_id","left")                            
                ->orderBy("foto_id","asc")
                ->FindAll();

        $data = ([
            "rows" => $rows,

        ]);
        return view("data_foto",$data);
    }
    public function preview($foto_id){
        $userId = session()->user_id;
        $rows = $this->fotoModel
                ->join("user","user.user_id=foto.user_id","left")                            
                ->where("foto_id",$foto_id)
                ->first();
                
        $komentar = $this->komentarModel
                    ->join('user', 'user.user_id = komentar_foto.user_id')
                    ->select('komentar_foto.*, user.username')
                    ->where("foto_id",$foto_id)
                    ->findall();


        $like = $this->likeModel->where("foto_id", $foto_id)->countAllResults();

        $isLiked = $this->likeModel->where("user_id", $userId)->where("foto_id", $foto_id)->countAllResults() > 0;

        $data = ([
            "foto" => $rows,
            "komentar" => $komentar,
            "like" => $like,
            "isLiked" => $isLiked,
        ]);
        return view("preview",$data);
    }
    public function data_album(){
        $rows1 = $this->albumModel
                ->orderBy("album_id","asc")
                ->FindAll();

        $data = ([
            "rows1" => $rows1,
        ]);

        return view("data_foto",$data);
    }
    public function data_user(){
        $rows2 = $this->userModel
                ->orderBy("user_id","asc")
                ->FindAll();
         $foto = $this->fotoModel
                       ->where("foto_id",$foto_id)
                       ->first();

        $data = ([
            "rows2" => $rows2,
        ]);

        return view("data_foto",$data);
    }    
    public function hapus_foto($foto_id){
        $this->fotoModel
        ->where("foto_id",$foto_id)->delete();
        return redirect()->to(base_url("data_foto"));
    }
    public function edit_foto($foto_id){
        $foto = $this->fotoModel
                       ->where("foto_id",$foto_id)
                       ->first();
        $rows1 = $this->albumModel
                       ->orderBy("album_id","asc")
                       ->FindAll();
        $rows2 = $this->userModel
                       ->orderBy("user_id","asc")
                       ->FindAll();                       

        $data = ([
            "foto"      => $foto,
            "rows1"     => $rows1,
            "rows2"     => $rows2,

        ]);

        return view("edit_foto",$data);
    }
    public function proses_edit_foto(){
        $foto_id            = $this->request->getpost("foto_id");        
        $judul_foto         = $this->request->getpost("judul_foto");
        $deskripsi_foto     = $this->request->getpost("deskripsi_foto");
        $tanggal_unggah     = $this->request->getpost("tanggal_unggah");
        $album_id           = $this->request->getpost("album_id");
        $user_id = $_SESSION['user_id'];

        if($this->request->getFile("lokasi_file")->getName() != NULL){
            $lokasi_file = $this->request->getFile("lokasi_file");
            $namafoto = $foto_id."_".$lokasi_file->getRandomName();

            $lokasi_file->move("assets/foto",$namafoto);        
            $this->fotoModel
            ->where("foto_id",$foto_id)
            ->set([
                "judul_foto"        => $judul_foto,
                "deskripsi_foto"    => $deskripsi_foto,
                "tanggal_unggah"    => $tanggal_unggah,
                "album_id"          => $album_id,
                "user_id"           => $user_id,
                "lokasi_file"       => $namafoto

            ])->update();
        }else{
            $this->fotoModel
            ->where("foto_id",$foto_id)
            ->set([
                "foto_id"           => $foto_id,                
                "judul_foto"        => $judul_foto,
                "deskripsi_foto"    => $deskripsi_foto,
                "tanggal_unggah"    => $tanggal_unggah,
                "album_id"          => $album_id,
                "user_id"           => $user_id,

            ])->update();

        }

        return redirect()->to(base_url('data_foto'));
        return redirect()->to(base_url('foto/'.$foto_id.'/edit'));
    }
    public function proses_tambah_komentar(){
        $foto_id                   = $this->request->getPost("id");
        $isi_komentar         = $this->request->getpost("isi_komentar");
        $tanggal_komentar     = date("Y-m-d");

        $user_id = session()->get("user_id");

        $this->komentarModel->insert([
            "foto_id"           => $foto_id,
            "user_id"           => $user_id,
            "isi_komentar"      => $isi_komentar,
            "tanggal_komentar"    => $tanggal_komentar,
        ]);

        return redirect()->to(base_url("preview/".$foto_id));
    }
    public function like($id){
        $userId = session()->user_id;

        if ($userId) {
            $like = $this->likeModel->where('foto_id', $id)->
                where('user_id', $userId)->first();

            if ($like) {
                $this->likeModel->where("foto_id", $id)
                 ->where("user_id", $userId)->delete();
            } else {
                $this->likeModel->insert(['foto_id' => $id, 'user_id' => $userId]);
            }
            return redirect()->to(base_url("preview/".$id));
            }
        }
    
    public function logout(){
        session()->destroy();
        return redirect()->to(base_url('login'));
    }
}