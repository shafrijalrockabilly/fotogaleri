<?= $this->extend("template") ?>

<?= $this->section("title") ?>
Home 
<?= $this->endSection() ?>

<?= $this->section("content") ?>

<main role="main">
        
    
    <section class="mt-4 mb-5">
    <div class="container mb-4">
    	<h1 class="font-weight-bold title">Triplef</h1>
    	<div class="row">
    		<nav class="navbar navbar-expand-lg navbar-light bg-white pl-2 pr-2">
    		<button class="navbar-light navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExplore" aria-controls="navbarsDefault" aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
    		</button>
    		<div class="collapse navbar-collapse" id="navbarsExplore">
    			<ul class="navbar-nav">
    				<li class="nav-item">
    				<a class="nav-link" href="#">Lifestyle</a>
    				</li>
    				<li class="nav-item">
    				<a class="nav-link" href="#">Food</a>
    				</li>
    				<li class="nav-item">
    				<a class="nav-link" href="#">Home</a>
    				</li>
    				<li class="nav-item">
    				<a class="nav-link" href="#">Travel</a>
    				</li>
    				<li class="nav-item dropdown">
    				<a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">More</a>
    				<div class="dropdown-menu shadow-lg" aria-labelledby="dropdown01" name="album_id" class="form-select">
					<?php
                  foreach($rows1 as $row1){
                  ?>
                  <a class="dropdown-item" href="<?= base_url($row1->album_id)?>" value="<?= $row1->album_id?>"><?= $row1->nama_album ?></a>
                  <?php
                  }
                  ?>
    				</div>
    				</li>
    			</ul>
    		</div>
    		</nav>
    	</div>
    </div>
    <div class="container-fluid">
    	<div class="row">
    		<div class="card-columns">
				<?php
                    foreach($rows as $row) :
                    ?>
                   
    			<div class="card card-pin">
				<img class="card-img" src="<?= base_url("assets/foto/".$row->lokasi_file)?>" alt="Card Image">.
    				<div class="overlay">
    					<h2 class="card-title title"><?= $row->judul_foto ?></h2>
    					<div class="more">
    						<a href="<?= base_url('preview/'.$row->foto_id) ?>">
    						<i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> More </a>
    					</div>
    				</div>
    			</div>
				<?php 
                    endforeach
                    ?>
    		</div>
    	</div>
    </div>
    </section>
        
    </main>


    
<?= $this->endSection() ?>