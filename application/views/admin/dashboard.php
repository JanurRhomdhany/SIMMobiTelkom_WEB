<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <p>
            Selamat Datang <strong><?php echo $username ?> (<?php echo $akses ?>)</strong> di Sistem Informasi Manajemen Operasional Mobil <i> Telkom NTB</i>
        </p>
    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Request Peminjaman</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $peminjaman ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dolly-flatbed fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Request Pengembalian</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php echo $pengembalian ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dolly-flatbed fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

       
                        </div>

                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
<!--             <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer> -->
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?php echo base_url('admin/auth/logout') ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    