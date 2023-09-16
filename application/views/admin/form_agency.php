<div class="container-fluid">

	<div class="alert alert-success" role="alert">
        <p>
            <strong>Form Tambah Data Agency</strong>
        </p>
	</div>
	<form method="POST" action="<?php echo base_url('admin/agency/input_aksi') ?>">
		<div class="form-group">
			<label class="font-weight-bold">ID Agency</label>
			<input type="text" name="id_agency" placeholder="Masukkan ID Agency" class="form-control" autofocus required>
			<?php echo form_error('id_agency', '<div class="text-danger small" ml-3>','</div>') ?>
		</div>

		<div class="form-group">
			<label class="font-weight-bold">Nama Agency</label>
			<input value="<?php set_value('nama_agency') ?>" type="text" name="nama_agency" placeholder="Masukkan Nama Agency" class="form-control" autofocus required>
			<?php echo form_error('nama_agency', '<div class="text-danger small" ml-3>','</div>') ?>
		</div>

        <button type="submit" class="btn btn-primary mt-4">Simpan</button>
        <button type="reset" class="btn btn-danger mt-4">Reset</button>	


	</form>

</div>