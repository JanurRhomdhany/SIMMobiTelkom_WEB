<div class="container-fluid">
  <!-- DataTales Example -->

  <h1 class="h3 mb-4 text-gray-800">Data Request Peminjaman</h1>
  <div class="card shadow mb-4">
    <div class="card-header py-3">

      <?php echo $this->session->flashdata('pesan')?>
        
<!--         <?php echo anchor('admin/peminjaman/input','<button class="btn btn-sm btn-primary" type=""><i class="fas fa-plus fa-sm"></i>Tambah Data</button></a>') ?> -->

    <div class="card-body">
      <div class="table-responsive">
        <table style="white-space:nowrap;width:100%;" class="table table-bordered table-striped table-hover" id="dataTable" cellspacing="0">
          <thead font-weight="bold">
            <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>ID Peminjaman</th>
                            <th>Nama Sales</th>
                            <th>Agency</th>
                            <th>Mobil</th>
                            <th>Lokasi</th>
                            <th>Jam Pinjam</th>
                            <th>Status Pinjam</th>
                            <th>Ket</th>
                            <th>Aksi</th>
                            <th>Hapus</th>
            </tr>
          </thead>

          <tbody>
            <?php $no = 1; if (!empty($peminjaman)) : ?>
             <?php foreach ($peminjaman as $row) : 
              ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $row->tanggal ?></td>
              <td><?php echo $row->id_peminjaman ?></td>
              <td><?php echo $row->nama_sales ?></td>
              <td><?php echo $row->nama_agency ?></td>
              <td><?php echo $row->plat_mobil ?></td>
              <td><?php echo $row->nama_lokasi ?></td>
              <td><?php echo $row->jam_peminjaman ?></td>
              
              <?php 
              		if ($row->status_peminjaman == "Diterima") { ?>
              			<td><span class="badge badge-success"><?php echo $row->status_peminjaman ?></span></td>
              	<?php }else if ($row->status_peminjaman == "Ditolak"){ ?>
			  			<td><span class="badge badge-danger"><?php echo $row->status_peminjaman ?></span></td>
				<?php }else{ ?>
			  			<td><span class="badge badge-warning"><?php echo $row->status_peminjaman ?></span></td>
				<?php } ?>
                          	
              
              <td><?php echo $row->ket ?></td>
              <td>
                <?php echo anchor('admin/peminjaman/accept/'.$row->id_peminjaman,'<div class="btn btn-sm btn-success"><i class="fas fa-check"></i></div>'); ?>
                <?php echo anchor('admin/peminjaman/reject/'.$row->id_peminjaman,'<div class="btn btn-sm btn-danger"><i class="fas fa-times"></i></div>'); ?>
          		<?php echo anchor('admin/peminjaman/pending/'.$row->id_peminjaman,'<div class="btn btn-sm btn-warning"><i class="fas fa-clock"></i></div>'); ?>
              </td>
              <td>
                <?php echo anchor('admin/peminjaman/delete/'.$row->id_peminjaman,'<div class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></div>'); ?>
              </td>
            </tr>
            <?php endforeach ?>
            <?php else: ?>
            <tr>
              <td colspan="9" align="center">Tidak Ada Data</td>
            </tr>
            <?php endif ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

 </div>