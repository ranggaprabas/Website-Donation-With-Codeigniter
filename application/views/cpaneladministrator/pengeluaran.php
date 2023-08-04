        <!-- page content -->
        <div class="right_col" role="main">
          <div class="row" style="display: block;">
            <div class="col-md-12 col-sm-12 ">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Pengluaran Donasi</h2><a href="#" data-toggle="modal" data-target="#tambah" data-backdrop="static" data-keyboard="false" class="btn btn-primary float-right"><i class="fa fa-plus"></i> Tambah</a>

                  <!-- Modal -->
                          <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Pengeluaran Donasi</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form action="<?php echo base_url('cpaneladministrator/tambahpengeluaran'); ?>" method='post' enctype="multipart/form-data">
                                      
                                    <div class="form-group">
                                      <label for="nama">Tanggal</label>
                                      <input type="date" name="tanggal" value="<?php echo date('Y-m-d') ?>" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                      <label for="nama">Judul Pengeluaran</label>
                                      <input type="text" name="judul" class="form-control" required>
                                    </div>


                                    <div class="form-group">
                                      <label for="jumlah">jumlah</label>
                                      <input type="text" name="jumlah" class="form-control" onkeypress="return hanyaAngka(event)" required>
                                    </div>

                                    <script>
                                      function hanyaAngka(evt) {
                                        var charCode = (evt.which) ? evt.which : event.keyCode
                                        if (charCode > 31 && (charCode < 48 || charCode > 57))

                                          return false;
                                        return true;
                                      }
                                    </script>

                                    <div class="form-group">
                                      <label for="nama">Ket</label>
                                      <textarea name="ket" id="" class="form-control" required></textarea>
                                    </div>

                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div class="row">
                    <div class="col-sm-12">
                     <?php if($this->session->flashdata('alert')){ ?>  
                       <div class="alert alert-danger alert-dismissible " role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                        <strong>Gagal</strong> <?php echo $this->session->flashdata('alert'); ?>
                      </div>
                    <?php } ?>

                    <?php if($this->session->flashdata('sukses')){ ?>  
                     <div class="alert alert-success alert-dismissible " role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                      </button>
                      <strong>Berhasil</strong> <?php echo $this->session->flashdata('sukses'); ?>
                    </div>
                  <?php } ?>
                  <div class="card-box table-responsive">


                    <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Tanggal</th>
                      <th>judul Pengeluaran</th>
                      <th>Jumnlah</th>
                      <th>Ket</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=1; foreach($penyaluran->result() as $key) { ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo date('d F Y', strtotime($key->tanggal)); ?></td>
                      <td><?php echo $key->judul; ?></td>
                      <td><?php echo "Rp " . number_format($key->jumlah,2,',','.'); ?></td>
                      <td><?php echo $key->ket; ?></td>
                      <td><a href="" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#valid<?php echo $key->idpengeluaran  ?>" data-backdrop="static" data-keyboard="false">Edit</a> <a href="<?php echo base_url('cpaneladministrator/hapuspengeluaran?edit='.$key->idpengeluaran) ?>" onclick="return confirm('Yakin ingin hapus?')" class="btn btn-sm btn-danger">Hapus</a></td>
                          <!-- Modal -->
                          <div class="modal fade" id="valid<?php echo $key->idpengeluaran ; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalCenterTitle">Edit Pengeluaran</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form action="<?php echo base_url('cpaneladministrator/editpengeluaran') ?>" method="post">
                                    <input type="hidden" name="idpengeluaran" value="<?php echo $key->idpengeluaran  ?>">
                                    
                                    <div class="form-group">
                                      <label for="nama">Tanggal</label>
                                      <input type="date" name="tanggal" value="<?php echo date('Y-m-d',strtotime($key->tanggal)) ?>" class="form-control" required>
                                    </div>


                                     <div class="form-group">
                                      <label for="nama">Judul Pengeluaran</label>
                                      <input type="text" name="judul" class="form-control" value="<?php echo $key->judul; ?>" required>
                                    </div>


                                    <div class="form-group">
                                      <label for="jumlah">jumlah</label>
                                      <input type="text" name="jumlah" class="form-control" value="<?php echo $key->jumlah; ?>" onkeypress="return hanyaAngka(event)" required>
                                    </div>

                                    <script>
                                      function hanyaAngka(evt) {
                                        var charCode = (evt.which) ? evt.which : event.keyCode
                                        if (charCode > 31 && (charCode < 48 || charCode > 57))

                                          return false;
                                        return true;
                                      }
                                    </script>

                                    <div class="form-group">
                                      <label for="nama">Ket</label>
                                      <textarea name="ket" id="" class="form-control" required><?php echo $key->ket; ?></textarea>
                                    </div>

                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Ubah Pengeluaran</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
        <!-- /page content -->