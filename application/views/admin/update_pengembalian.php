<div class="container-fluid">
	
		<div class="alert alert-success" role="alert">
        <p>
            <strong>Form Update Data Pengembalian</strong>
        </p>
	</div>

	<?php foreach ($pengembalian as $row) : ?>

		<form method="POST" action="<?php echo base_url('admin/pengembalian/update_aksi') ?>">
			
			<div class="form-group">
				<label class="font-weight-bold">Tanggal</label>
				<input type="hidden" name="id_pengembalian" value="<?php echo $row->id_pengembalian ?>" class="form-control">
				<input type="date" name="tanggal" class="form-control" value="<?php echo $row->tanggal ?>" readonly>
			</div>

			<div class="form-group">
				<label class="font-weight-bold">Nama Sales</label>
				<input type="text" name="id_sales" value="<?php echo $row->id_sales ?>" class="form-control" readonly> 
			</div>

<!-- 			<div class="form-group">
				<label class="font-weight-bold">Agency</label>
				<select name="id_agency" class="form-control" readonly>
	                <option value="<?php echo $row->id_agency?>"><?php echo $row->id_agency?></option>
	                <?php foreach($agency as $ag) : ?>
	                <option value="<?php echo $ag->id_agency?>"><?php echo $ag->nama_agency ?></option>
	                <?php endforeach; ?>
            	</select>
            </div> -->			

			<div class="form-group">
				<label class="font-weight-bold">Mobil</label>
				<select name="id_mobil" class="form-control" readonly>
	                <option value="<?php echo $row->id_mobil?>"><?php echo $row->id_mobil?></option>
	                <?php foreach($mobil as $mbl) : ?>
	                <option value="<?php echo $mbl->id_mobil?>"><?php echo $mbl->plat_mobil ?></option>
	                <?php endforeach; ?>
            	</select>
            </div>

			<div class="form-group">
				<label class="font-weight-bold">Lokasi</label>
				<select name="id_lokasi" class="form-control" readonly>
	                <option value="<?php echo $row->id_lokasi?>"><?php echo $row->id_lokasi?></option>
	                <?php foreach($lokasi as $lk) : ?>
	                <option value="<?php echo $lk->id_lokasi?>"><?php echo $lk->nama_lokasi ?></option>
	                <?php endforeach; ?>
            	</select>
            </div>

			<div class="form-group">
				<label class="font-weight-bold">Bukti Kondisi Mobil</label>
				<input type="text" name="bukti_kondisi_mobil" value="<?php echo $row->bukti_kondisi_mobil ?>" class="form-control" readonly> 
			</div>

			<div class="form-group">
				<label class="font-weight-bold">Ket Kegiatan</label>
				<input type="text" name="ket_kegiatan" value="<?php echo $row->ket_kegiatan ?>" class="form-control" > 
			</div>			

			<div class="form-group">
				<label class="font-weight-bold">Jam Kembali</label>
				<input type="time" name="jam_pengembalian" value="<?php echo $row->jam_pengembalian ?>" class="form-control" readonly> 
			</div>

			<div class="form-group">
				<label class="font-weight-bold">Status Kembali</label>
				<input type="text" name="status_pengembalian" value="<?php echo $row->status_pengembalian ?>" class="form-control" readonly> 
			</div>            

			<div class="form-group">
				<label class="font-weight-bold">Ket</label>
				<input type="text" name="ket_status" value="<?php echo $row->ket_status ?>" class="form-control" > 
			</div> 
			<button type="submit" class="btn btn-primary mt-4">Update</button>							
		</form>


	<?php endforeach; ?>


</div>