<?= $this->extend("template") ?>
<?= $this->section("title") ?>

<?= $this->endSection() ?>
<?= $this->section("content") ?>
<div class="col-md-12 mt-5">
	<div class="card">
		<div class="card-header bg-danger">
			<h5 class="card-title text-white">Data Tabel Galeri Foto</h5>
		</div>
		<div class="card-body">
		<?php 
		        if (session()->getFlashdata("alert")) {
		    ?>
		    <div class="alert alert-success">
		        <?= session()->getFlashdata('alert') ?>
		    </div>
		    <?php
		        }
		    ?>
			<table class="table table-bordered table-striped table-hover" id="example">
			<thead class="">
				<tr class="text-center">
					<th>No</th>
					<th>Album</th>
					<th>Nama User</th>
					<th>Judul Foto</th>
					<th>Deskripsi</th>
					<th>Foto</th>
					<th>Tanggal Unggah</th>
					<th>Opsi</th>
				</tr>
			</thead>
			<tbody>

				<?php
				$no = 0;
				foreach($rows as $row){
					$no++;
				?>
				<tr>
					<td class="text-center"><?= $no ?></td>
					<td class='text-center'><?= $row->nama_album ?></td>
					<td><?= $row->username ?></td>
					<td><?= $row->judul_foto ?></td>
					<td class=""><?= nl2br($row->deskripsi_foto)?></td>
					<td class="text-center">
						<img src="<?= base_url('assets/foto/'.$row->lokasi_file)?>" width="60px">
					</td>
					<td><?= date("d-m-Y", strtotime($row->tanggal_unggah)) ?></td>
					<td class="text-center ">	
						<a href="<?= base_url('foto/'.$row->foto_id.'/edit') ?>" class="btn btn-success btn-sm">
						<i class="fa-solid fa-pen" style="color: #fffff;"></i>
						</a>
						<a href="<?= base_url('foto/'.$row->foto_id.'/hapus') ?>" class="btn btn-danger btn-sm"
							onclick="return confirm('Yakin hapus <?= $row->judul_foto ?>.?')">
						<i class="fa-solid fa-trash" style="color: #ffffff;"></i>
						</a>
					</td>
				</tr>
				<?php	
				}
				?>			
			</tbody>
		</table>
		</div>
	</div>
</div>

<script>
	const dropContainer = document.getElementById("dropcontainer")
  const fileInput = document.getElementById("images")

  dropContainer.addEventListener("dragover", (e) => {
    // prevent default to allow drop
    e.preventDefault()
  }, false)

  dropContainer.addEventListener("dragenter", () => {
    dropContainer.classList.add("drag-active")
  })

  dropContainer.addEventListener("dragleave", () => {
    dropContainer.classList.remove("drag-active")
  })

  dropContainer.addEventListener("drop", (e) => {
    e.preventDefault()
    dropContainer.classList.remove("drag-active")
    fileInput.files = e.dataTransfer.files
  })
</script>

<?= $this->endSection() ?>