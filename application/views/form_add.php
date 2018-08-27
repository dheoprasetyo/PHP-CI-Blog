<?php $this->load->view('partials/header'); ?>
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/post-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-heading">
              <h1>Tambah Artike BAru</h1>
            </div>
          </div>
        </div>
      </div>
    </header>
    <div class="container">
    	<div class="row justify-content-center">
    		<div class="col-md-8">
    <!-- konek dengan form validation dan akan mengembalikan kesalahan pada proses validasi apabila tidak lolos  -->
    <div class="alert alert-warning">
    <?php echo validation_errors(); ?>
    </div>
    <!-- klo form_open itu mngembalikan form biasa sedangkan form_open_multipart() mengembalikan tag form dengan tambahan atribut enctype adalah sarat untuk berinteraksi dengan upload file pada form -->
	<?php echo form_open_multipart(); ?>
		<div class="form-group">
			<label>Judul</label>
			<!-- paramete keduanya itu value dan set_value berisi paramter nama field yang berguna agar data yang diinput tetpi salah tidak langsung hilang-->
			<?php echo form_input('title', set_value('title'), 'class="form-control"');?>
			<!-- atau pake yang bawah -->
			<!-- <input class="form-control" type="text" name="title"> -->
		</div>

		<div class="form-group">
			<label>URL</label>
			<?php echo form_input('url', set_value('url'), 'class="form-control"');?>
			<!-- <input class="form-control" type="text" name="url"> -->
		</div>

		<div class="form-group">
			<label>Konten</label>
			<?php echo form_textarea('content', set_value('content'), 'class="form-control"');?>
			<!-- <textarea  class="form-control" name="content" cols="30" rows="10"></textarea> -->
		</div>

		<div class="form-group">
			<label>Cover</label>
			<?php echo form_upload('cover', set_value('cover'), 'class="form-control"');?>
			<!-- <textarea  class="form-control" name="cover" cols="30" rows="10"></textarea> -->
		</div>
		<button class="btn btn-primary" type="submit">Simpan Artikel</button>
	</form>
			</div>	
    	</div>
    </div>
</body>
<?php $this->load->view('partials/footer'); ?>