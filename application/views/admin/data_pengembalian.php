<div class="container-fluid">
  <!-- DataTales Example -->

  <h1 class="h3 mb-4 text-gray-800">Data Request Pengembalian</h1>
  <div class="card shadow mb-4">
    <div class="card-header py-3">

      <?php echo $this->session->flashdata('pesan')?>
        
<!--         <?php echo anchor('admin/peminjaman/input','<button class="btn btn-sm btn-primary" type=""><i class="fas fa-plus fa-sm"></i>Tambah Data</button></a>') ?> -->

    <div class="card-body">
      <div class="table-responsive">
        <table style="white-space:nowrap;width:100%;" class="table table-bordered table-striped table-hover" id="pengembalianTable" cellspacing="0">
          <thead font-weight="bold">
            <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>ID Peminjaman</th>
                            <th>Nama Sales</th>
                            <th>Agency</th>
                            <th>Mobil</th>
                            <th>Lokasi</th>
                            <th>Bukti Kondisi Mobil</th>
                            <th>Ket Kegiatan</th>
                            <th>Jam Kembali</th>
                            <th>Status Pengembalian</th>
                            <th>Ket</th>
                            <th>Aksi</th>
                            <th>Hapus</th>
            </tr>
          </thead>

          <tbody>
            <?php $no = 1; if (!empty($pengembalian)) : ?>
             <?php foreach ($pengembalian as $row) : 
              ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $row->tanggal ?></td>
              <td><?php echo $row->id_peminjaman ?></td>
              <td><?php echo $row->nama_sales ?></td>
              <td><?php echo $row->nama_agency ?></td>
              <td><?php echo $row->plat_mobil ?></td>
              <td><?php echo $row->nama_lokasi ?></td>

              <td data-imgurls="<?php echo implode(',', array_map(function($gambar) { return base_url('uploads/'.$gambar); }, explode(',', $row->bukti_kondisi_mobil))); ?>" style="text-decoration: underline; color: blue; cursor: pointer;">Lihat Gambar</td>

              

              
              


              <td><?php echo $row->ket_kegiatan ?></td>
              <td><?php echo $row->jam_pengembalian ?></td>
              
              <?php 
              		if ($row->status_pengembalian == "Berhasil") { ?>
              			<td><span class="badge badge-success"><?php echo $row->status_pengembalian ?></span></td>
              	<?php }else if ($row->status_pengembalian == "Gagal"){ ?>
			  			<td><span class="badge badge-danger"><?php echo $row->status_pengembalian ?></span></td>
				<?php }else{ ?>
			  			<td><span class="badge badge-warning"><?php echo $row->status_pengembalian ?></span></td>
				<?php } ?>
                          	
              
              <td><?php echo $row->ket_status ?></td>
              <td>
                <?php echo anchor('admin/pengembalian/accept/'.$row->id_pengembalian,'<div class="btn btn-sm btn-success"><i class="fas fa-check"></i></div>'); ?>
                <?php echo anchor('admin/pengembalian/reject/'.$row->id_pengembalian,'<div class="btn btn-sm btn-danger"><i class="fas fa-times"></i></div>'); ?>
          		<?php echo anchor('admin/pengembalian/pending/'.$row->id_pengembalian,'<div class="btn btn-sm btn-warning"><i class="fas fa-clock"></i></div>'); ?>
              </td>
              <td>
                <?php echo anchor('admin/pengembalian/delete/'.$row->id_pengembalian,'<div class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></div>'); ?>
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

<!-- Add this modal at the end of the HTML body -->
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Bukti Kondisi Mobil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <!-- Carousel items will be dynamically added here -->
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


