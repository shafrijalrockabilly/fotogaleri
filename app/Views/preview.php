<?= $this->extend("template") ?>

<?= $this->section("title") ?>

<?= $this->endSection() ?>

<?= $this->section("content") ?>

<style>
	.drop-container {
    position: relative;
    display: flex;
    gap: 10px;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 300px;
    padding: 20px;
    border-radius: 10px;
    border: 2px dashed #555;
    color: #444;
    cursor: pointer;
    transition: background .2s ease-in-out, border .2s ease-in-out;
  }
  
  .drop-container:hover {
    background: #eee;
    border-color: #111;
  }
  
  .drop-container:hover .drop-title {
    color: #222;
  }
  
  .drop-title {
    color: #444;
    font-size: 20px;
    font-weight: bold;
    text-align: center;
    transition: color .2s ease-in-out;
  }
  .drop-container.drag-active {
    background: #eee;
    border-color: #111;
  }
  
  .drop-container.drag-active .drop-title {
    color: #222;
  }
</style>

<body>

<div class="container text-center mt-6">
  <div class="row justify-content-center">
    <div class="col-5">
      <img class="card-img" src="<?= base_url('assets/foto/' . $foto->lokasi_file) ?>" alt=""
        style="border-radius: 23px;">
    </div>
    <div class="col-4">
      <div class="card">
        <div class="card-body">
          <!-- Like button -->

          <!-- Comments section -->
          <div class="d-flex justify-content-start mb-4">
            <?= $foto->username ?> /
            <?= date("d-M-Y" , strtotime($foto->tanggal_unggah)) ?>
          </div>
          <div class="d-flex justify-content-start">
            <i><?= $foto->deskripsi_foto ?></i>
          </div>
          <?php if ($foto->user_id == session()->user_id): ?>
          <div class="d-flex justify-content-end gap-2">
          <button type="button" class="btn btn-sm" data-toggle="modal" data-target="#modalCreate"><i class="fa fa-pencil"></i> </button>
            <a href="<?= base_url('foto/'.$foto->foto_id.'/hapus') ?>" class="btn btn-sm"
                onclick="return confirm('Yakin hapus <?= $foto->foto_id ?> ?')">
                <i class="fa fa-trash-o fa-lg" aria-hidden="true"></i>
              </a>
          </div>
          <?php endif; ?>
          <div div class="comments mt-3 mb-4">
          <?php 
            foreach ($komentar as $komentars): 
          ?>
            <ul class="list-group">
            <!-- Komentar pertama -->
              <li class="list-group-item">
                <?= $komentars->username ?>:
                <?= $komentars->isi_komentar ?>
              </li>
              <!-- Dan seterusnya -->
            </ul>
          <?php 
            endforeach; 
          ?>
          </div>

          <div class="d-flex justify-content-end gap-2">
            <div>
              <form action="<?= base_url('like/' . $foto->foto_id) ?>" method="post">
                <?php
                if ($like) {
                ?>
                  <?= $like ?>
                <?php
                }
                ?>
                <button style="border: none; background: white;" type="submit">
                  <?php
                  if ($isLiked) {
                  ?>
                    <i class="fa-solid fa-heart-o fa-lg text-danger" aria-hidden="true"></i>
                  <?php
                  } else {
                  ?>
                    <i class="fa-regular fa-heart-o fa-lg" aria-hidden="true"></i>
                  <?php
                  }
                  ?>
                </button>
              </form>
            </div>
          </div>
          <!-- Form untuk menambahkan komentar baru -->
          <form method="post" action="<?= base_url("proses_tambah_komentar")?>" enctype="multipart/form-data" class="mt-3">
            <div class="form-group">
            <input type="hidden" name="id" class="form-control" value="<?= $foto->foto_id ?>" placeholder="Add a comment">
              <input type="text" name="isi_komentar" class="form-control" placeholder="Add a comment">
            </div>
            <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn">
            <i class="fa fa-paper-plane" aria-hidden="true"></i>
            </button>
            </div>
          </form>

          <div class="modal fade" id="modalCreate">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="container">
	<div class="card-body">
  		<div class="row">
    		<div class="col text-white">
				<form method="post" action="<?= base_url("proses_edit_foto")?>" enctype="multipart/form-data">
        <input type="hidden" name="foto_id" id="foto_id" value="<?= $foto->foto_id ?>">
					<label type="file" for="lokasi_file" class="drop-container" id="dropcontainer">
					<span class="drop-title">Drop files here</span>
					or
					<input type="file" name="lokasi_file" id="lokasi_file" accept="image/*">
					</label>
   			 </div>
    		<div class="col">
				<div class="mb-2 text-dark">	
				<label class="d-flex justify-content-start">Judul Foto</label>
				<input type="text" name="judul_foto" class="form-control" value="<?= $foto->judul_foto ?>" required>
			</div>
			<div class="mb-2 text-dark">
				<label class="form-label d-flex justify-content-start">Deskripsi</label>
				<input class="form-control" value="<?= $foto->deskripsi_foto ?>" name="deskripsi_foto" id="floatingTextarea2" style="height: 100px">
			</div>			
			<div class="mb-2 mt-3 text-white">
				<button type="submit" class="btn btn-dark">Upload</button>
			</div>
			</form>
   			</div>
  		</div>
	</div>
</div>
        </div>
    </div>
</div>


        </div>
      </div>
    </div>
  </div>
</div>



<?= $this->endSection() ?>