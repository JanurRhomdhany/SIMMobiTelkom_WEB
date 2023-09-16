<div class="container-fluid">

	<div class="alert alert-success" role="alert">
        <p>
            <strong>Form Tambah Data Jadwal</strong>
        </p>
	</div>
	<form method="POST" action="<?php echo base_url('admin/jadwal/input_aksi') ?>">
		<div class="form-group">
			<label class="font-weight-bold">Tanggal</label>
			<input type="date" name="tanggal" class="form-control" autofocus required>
			<?php echo form_error('tanggal', '<div class="text-danger small" ml-3>','</div>') ?>
		</div>

<!-- 		<div class="form-group">
			<label class="font-weight-bold">Batas Pinjam</label>
			<input type="time" name="batas_waktu_peminjaman" value="08:00:00" class="form-control" autofocus required>
			<?php echo form_error('batas_waktu_peminjaman', '<div class="text-danger small" ml-3>','</div>') ?>
		</div>

		<div class="form-group">
			<label class="font-weight-bold">Batas Kembali</label>
			<input type="time" name="batas_waktu_pengembalian" value="18:00:00" class="form-control" autofocus required>
			<?php echo form_error('batas_waktu_pengembalian', '<div class="text-danger small" ml-3>','</div>') ?>
		</div> -->		

		<div class="form-group">
			<label class="font-weight-bold">Mobil</label>
			<select name="id_mobil" class="form-control">
                <option>--Pilih Mobil</option>
                <?php foreach($mobil as $row) : ?>
                <option value="<?php echo $row->id_mobil?>"><?php echo $row->plat_mobil ?></option>
                <?php endforeach; ?>
            </select>
            <?php echo form_error('id_mobil', '<div class="text-danger small" ml-3>','</div>') ?>
		</div>

		<div class="form-group">
			<label class="font-weight-bold">Agency</label>
			<select name="id_agency" class="form-control">
                <option value="">--Pilih Agency</option>
                <?php foreach($agency as $row) : ?>
                <option value="<?php echo $row->id_agency?>"><?php echo $row->nama_agency ?></option>
                <?php endforeach; ?>
            </select>
            <?php echo form_error('id_agency', '<div class="text-danger small" ml-3>','</div>') ?>
		</div>

		<div class="form-group">
			<label class="font-weight-bold">Lokasi</label>
			<select name="id_lokasi" class="form-control">
                <option value="">--Pilih Lokasi</option>
                <?php foreach($lokasi as $row) : ?>
                <option value="<?php echo $row->id_lokasi?>"><?php echo $row->nama_lokasi ?></option>
                <?php endforeach; ?>
            </select>
            <?php echo form_error('id_lokasi', '<div class="text-danger small" ml-3>','</div>') ?>
		</div>

        <button type="submit" class="btn btn-primary mt-4">Simpan</button>
        <button type="reset" class="btn btn-danger mt-4">Reset</button>	


	</form>

</div>