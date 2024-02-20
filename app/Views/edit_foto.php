<?= $this->extend("template") ?>
<?= $this->section("title") ?>

<?= $this->endSection() ?>
<?= $this->section("content") ?>
<div class="col-lg-12 col-md-8 mx-auto">
	<div class="card">
		<div class="card-header bg-dark">
			<h5 class="card-title text-white">Edit Foto</h5>
		</div>
		<div class="card-body">
		<form method="post" action="<?= base_url("proses_edit_foto")?>" enctype="multipart/form-data">
			<input type="hidden" name="foto_id" id="foto_id" value="<?= $foto->foto_id ?>">
			<div class="mb-2 text-center">
				<img src="<?= base_url('assets/foto/'.$foto->lokasi_file)?>" width="150px">
			</div>
			<div class="mb-2">
				<label class="form-label" required readonly>Nama User</label>
				    <select name="user" class="form-select" style="border: 3px solid #000000;">
		                <?php
		                    foreach($rows2 as $row2){
		                        if($row2->user_id == $foto->user_id){
		                           $sej = "selected";
		                        }else{
		                            $sej = "";
		                        }
		                ?>
		                    <option value="<?= $row2->user_id?>" <?= $sej ?>>
		                        <?= $row2->username ?>
		                    </option>
		                <?php
		                }
		                ?>
		        	</select>
			</div>
			<div class="mb-2">
				<label class="form-label">Lokasi File</label>
				<input type="file" name="lokasi_file" class="form-control" style="border: 3px solid #000000;" >
			</div>
			<div class="mb-2">
				<label class="form-label">judul foto</label>
				<input type="text" name="judul_foto" class="form-control" style="border: 3px solid #000000;" value="<?= $foto->judul_foto ?>" required>
			</div>
			<div class="mb-2">
				<label class="form-label">Deskripsi</label>
				<input type="text" name="deskripsi_foto" class="form-control" style="border: 3px solid #000000;" value="<?= $foto->deskripsi_foto ?>" required>
			</div>
			<div class="mb-2">
				<label class="form-label">Tanggal Unggah</label>
				<input type="date" name="tanggal_unggah" class="form-control" style="border: 3px solid #000000;" value="<?= $foto->tanggal_unggah ?>" required>
			</div>
			<div class="mb-2">
				<label class="form-label">Album</label>
				    <select name="album" class="form-select" style="border: 3px solid #000000;">
		                <?php
		                    foreach($rows1 as $row1){
		                        if($row1->album_id == $foto->album_id){
		                           $sej = "selected";
		                        }else{
		                            $sej = "";
		                        }
		                ?>
		                    <option value="<?= $row1->album_id?>" <?= $sej ?>>
		                        <?= $row1->nama_album ?>
		                    </option>
		                <?php
		                }
		                ?>
		        	</select>
			</div>
			<div class="mb-2 mt-3">
				<button type="submit" class="btn btn-outline-dark">Simpan foto</button>
			</div>
		</form>
		</div>
	</div>
</div>
<?= $this->endSection() ?>