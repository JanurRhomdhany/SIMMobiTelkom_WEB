<div class="container-fluid">
	
		<div class="alert alert-success" role="alert">
        <p>
            <strong>Form Update Data Jadwal</strong>
        </p>
	</div>

	<?php foreach ($jadwal as $row) : ?>

		<form method="POST" action="<?php echo base_url('admin/jadwal/update_aksi') ?>">
			
			<div class="form-group">
				<label class="font-weight-bold">Tanggal</label>
				<input type="hidden" name="id_jadwal" value="<?php echo $row->id_jadwal ?>" class="form-control">
				<input type="date" name="tanggal" class="form-control" value="<?php echo $row->tanggal ?>">
			</div>

			<div class="form-group">
				<label class="font-weight-bold">Batas Pinjam</label>
				<input type="time" name="batas_waktu_peminjaman" value="<?php echo $row->batas_waktu_peminjaman ?>" class="form-control">
			</div>

			<div class="form-group">
				<label class="font-weight-bold">Batas Kembali</label>
				<input type="time" name="batas_waktu_pengembalian" value="<?php echo $row->batas_waktu_pengembalian ?>" class="form-control">
			</div>

			<div class="form-group">
				<label class="font-weight-bold">Mobil</label>
				<select name="id_mobil" class="form-control">
	                <option value="<?php echo $row->id_mobil?>"><?php echo $row->id_mobil?></option>
	                <?php foreach($mobil as $mbl) : ?>
	                <option value="<?php echo $mbl->id_mobil?>"><?php echo $mbl->plat_mobil ?></option>
	                <?php endforeach; ?>
            	</select>
            </div>

			<div class="form-group">
				<label class="font-weight-bold">Agency</label>
				<select name="id_agency" class="form-control">
	                <option value="<?php echo $row->id_agency?>"><?php echo $row->id_agency?></option>
	                <?php foreach($agency as $ag) : ?>
	                <option value="<?php echo $ag->id_agency?>"><?php echo $ag->nama_agency ?></option>
	                <?php endforeach; ?>
            	</select>
            </div>

			<div class="form-group">
				<label class="font-weight-bold">Lokasi</label>
				<select name="id_lokasi" class="form-control">
	                <option value="<?php echo $row->id_lokasi?>"><?php echo $row->id_lokasi?></option>
	                <?php foreach($lokasi as $lk) : ?>
	                <option value="<?php echo $lk->id_lokasi?>"><?php echo $lk->nama_lokasi ?></option>
	                <?php endforeach; ?>
            	</select>
            </div>

			<button type="submit" class="btn btn-primary mt-4">Update</button>							
		</form>


	<?php endforeach; ?>


</div>