        <!-- page content -->
        <div class="right_col" role="main">
          <div class="row" style="display: block;">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Bank </h2> <a href="<?php echo base_url()?>cpaneladministrator/bank/tambah" class="btn btn-primary float-right"><i class="fa fa-plus"></i> Tambah</a>
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
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Nama Bank</th>
                          <th>Atas Nama</th>
                          <th>Nomor Rekening</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no=1; foreach($data->result() as $key) : ?>
                        <tr>
                          <td><?php echo $no++; ?></td>
                          <td><?php echo $key->bank; ?></td>
                          <td><?php echo $key->nama; ?></td>
                          <td><?php echo $key->norek; ?></td>
                          <td><a href="<?php echo base_url('cpaneladministrator/bank/hapus?bank='.$key->idBank); ?>" onclick="return confirm('Yakin Hapus?')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a><a href="" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#bank<?php echo $key->idBank; ?>" data-backdrop="static" data-keyboard="false">Edit</a></td>

                          <!-- Modal -->
                          <div class="modal fade" id="bank<?php echo $key->idBank; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalCenterTitle">Ubah Akun guru</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form action="<?php echo base_url('cpaneladministrator/bank/edit') ?>" method="post">
                                    <input type="hidden" name="idBank" class="form-control" value="<?php echo $key->idBank; ?>" required>
                                    <div class="form-group">
                                      <label>Bank</label>
                                      <input type="text" name="bank" class="form-control" value="<?php echo $key->bank; ?>" required>
                                    </div>

                                    <div class="form-group">
                                      <label>A.N</label>
                                      <input type="text" name="nama" class="form-control" value="<?php echo $key->nama; ?>" required>
                                    </div>

                                    <div class="form-group">
                                      <label>Nomor Rekening</label>
                                      <input type="text" name="norek" class="form-control" value="<?php echo $key->norek; ?>" required>
                                    </div>
                                    
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Ubah Bank</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </tr>
                         <?php endforeach; ?>
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