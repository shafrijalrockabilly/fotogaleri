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

<div class="container">
	<div class="card-body">
  		<div class="row">
    		<div class="col text-white">
				<form method="post" action="<?= base_url("proses_tambah_foto")?>" enctype="multipart/form-data">
					<label type="file" for="lokasi_file" class="drop-container" id="dropcontainer">
					<span class="drop-title">Drop files here</span>
					or
					<input type="file" name="lokasi_file" id="lokasi_file" accept="image/*" required>
					</label>
   			 </div>
    		<div class="col">
				<div class="mb-2 text-dark">	
				<label>Judul Foto</label>
				<input type="text" name="judul_foto" class="form-control" required>
			</div>
			<div class="mb-2 text-dark">
				<label class="form-label">Deskripsi</label>
				<textarea class="form-control" placeholder="Tambahkan deskripsi.." name="deskripsi_foto" id="floatingTextarea2" style="height: 100px"></textarea>
			</div>			
      <div class="mb-2">
         <label>Album</label>
         <select name="album_id" class="form-select">
          <option value="">Not selected</option>
          <?php
            foreach($rows1 as $row1){
          ?>
          <option value="<?= $row1->album_id?>">
             <?= $row1->nama_album ?>
            </option>
            <?php
            }
            ?>
         </select>
      </div>
			<div class="mb-2 mt-3 text-white">
				<button type="submit" class="btn btn-dark">Upload</button>
			</div>
			</form>
   			</div>
  		</div>
	</div>
</div>

<?= $this->endSection() ?>