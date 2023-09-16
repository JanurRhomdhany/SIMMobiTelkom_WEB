<div class="container-fluid">

	<div class="alert alert-success" role="alert">
        <p>
            <strong>Form Tambah Data Lokasi</strong>
        </p>
	</div>
	<form method="POST" action="<?php echo base_url('admin/lokasi/input_aksi') ?>">
		<div class="form-group">
			<label class="font-weight-bold">ID Lokasi</label>
			<input type="text" name="id_lokasi" placeholder="Masukkan ID Lokasi" class="form-control" value="<?php echo $kode ?>" autofocus required readonly >
			<?php echo form_error('id_lokasi', '<div class="text-danger small" ml-3>','</div>') ?>
		</div>

		<div class="form-group">
			<label class="font-weight-bold">Nama Lokasi</label>
			<input value="<?php set_value('nama_lokasi') ?>" type="text" name="nama_lokasi" placeholder="Masukkan Nama Lokasi" class="form-control" autofocus required>
			<?php echo form_error('nama_lokasi', '<div class="text-danger small" ml-3>','</div>') ?>
		</div>

        <button type="submit" class="btn btn-primary mt-4">Simpan</button>
        <button type="reset" class="btn btn-danger mt-4">Reset</button>	


	</form>

</div>