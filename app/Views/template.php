<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foto Galeri</title>
    <script type="text/javascript"> (function() { var css = document.createElement('link'); css.href = 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'; css.rel = 'stylesheet'; css.type = 'text/css'; document.getElementsByTagName('head')[0].appendChild(css); })(); </script>
    <link rel="stylesheet" href="<?= base_url("assets2/css/app.css") ?>">
    <link rel="stylesheet" href="<?= base_url("assets2/css/theme.css")?>">
    <link rel="stylesheet" href="<?= base_url("https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css")?>">
	  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="<?= base_url("https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css")?>" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
    <a class="navbar-brand font-weight-bolder mr-3" href="index.html"><img src="<?= base_url("assets2/img/logo.png") ?>"></a>
    <button class="navbar-light navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsDefault" aria-controls="navbarsDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarsDefault">
    	<ul class="navbar-nav mr-auto align-items-center">
    		<form class="bd-search hidden-sm-down">
    			<input type="text" class="form-control bg-graylight border-0 font-weight-bold" id="search-input" placeholder="Search..." autocomplete="off">
    			<div class="dropdown-menu bd-search-results" id="search-results">
    			</div>
    		</form>
    	</ul>
    	<ul class="navbar-nav ml-auto align-items-center">
    		<li class="nav-item">
    		<a class="nav-link active" href="<?= base_url('home') ?>">Home</a>
    		</li>
    		<li class="nav-item">
    		<a class="nav-link active" href="<?= base_url('tambah_foto') ?>">Post</a>
    		</li>
			<li class="nav-item">
    		<a class="nav-link active" href="<?= base_url('data_foto') ?>">Your Foto</a>
    		</li>
        <li class="nav-item">
        <a class="nav-link active" data-toggle="modal" data-target="#editModal">addd Album</a>
    		</li>
    		<li class="nav-item">
    		<a class="nav-link"  href="<?= base_url('logout') ?>"><img class="rounded-circle mr-2" src="<?= base_url("assets2/img/av.png") ?>" width="30"><span class="align-middle">Admin</span></a>
    		</li>
    		<li class="nav-item dropdown">
    		<a class="nav-link" href="#" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    		<svg style="margin-top:10px;" class="_3DJPT" version="1.1" viewbox="0 0 32 32" width="21" height="21" aria-hidden="false" data-reactid="71"><path d="M7 15.5c0 1.9-1.6 3.5-3.5 3.5s-3.5-1.6-3.5-3.5 1.6-3.5 3.5-3.5 3.5 1.6 3.5 3.5zm21.5-3.5c-1.9 0-3.5 1.6-3.5 3.5s1.6 3.5 3.5 3.5 3.5-1.6 3.5-3.5-1.6-3.5-3.5-3.5zm-12.5 0c-1.9 0-3.5 1.6-3.5 3.5s1.6 3.5 3.5 3.5 3.5-1.6 3.5-3.5-1.6-3.5-3.5-3.5z" data-reactid="22"></path></svg>
    		</a>
    		<div class="dropdown-menu dropdown-menu-right shadow-lg" aria-labelledby="dropdown02">
    			<div class="dropdown-divider">
    			</div>
    			<span class="dropdown-item"><a href="<?= base_url('logout') ?>" class="btn btn-primary d-block"><i class=""></i> Logout</a></span>
    		</div>
    		</li>
    	</ul>
    </div>
    </nav>
    
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Add Your Album</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col">
                <form method="post" action="<?= base_url("proses_tambah_album")?>" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col">
                            <div class="mb-2">	
                                <label>Nama Album</label>
                                <input type="text" name="nama_album" class="form-control" required>
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Deskripsi</label>
                                <textarea class="form-control" placeholder="Tambahkan deskripsi.." name="deskripsi" id="floatingTextarea2" style="height: 100px;"></textarea>
                            </div>		
                            <div class="mb-2 mt-3">
                                <button type="submit" class="btn btn-outline-dark">Add Album</button>
                            </div>
                        </div>
                    </div>
                </form>  
              </div>
              </div>
            </div>
            </div>
          </div>
          </div>
    <?= $this->renderSection("content") ?>
    
    <script src="<?= base_url("https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js") ?>" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="<?= base_url("assets2/js/app.js") ?>"></script>
    <script src="<?= base_url("assets2/js/theme.js") ?>"></script>
    
    <footer class="footer pt-5 pb-5 text-center">
        
    <div class="container">
        
          <div class="socials-media">
    
            <ul class="list-unstyled">
              
            </ul>
    
          </div>
        
            <!--
              All the links in the footer should remain intact.
              You may remove the links only if you donate:
              https://www.wowthemes.net/freebies-license/
            -->
          <p>©  <span class="credits font-weight-bold">        
            <a target="_blank" class="text-dark" href="https://www.wowthemes.net/pintereso-free-html-bootstrap-template/"><u>Chafidz Shafrijal</u></a>
          </span>
          </p>
    
    
        </div>
        
    </footer>    
</body>
</html>