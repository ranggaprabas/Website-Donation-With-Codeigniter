        <!-- page content -->
        <div class="right_col" role="main">
          <div class="row" style="display: block;">
            <div class="col-md-12 col-sm-12 ">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Akun Admin Web</h2> <a href="<?php echo base_url()?>cpaneladministrator/akunadmin/tambah" class="btn btn-primary float-right"><i class="fa fa-plus"></i> Tambah</a>
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
                          <th>Nama</th>
                          <th>Nama Pengguna</th>
                          <th>E-Mail</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no=1; foreach($data->result() as $key) : ?>
                        <tr>
                          <td><?php echo $no++; ?></td>
                          <td><?php echo $key->nama; ?></td>
                          <td><?php echo $key->namaPengguna; ?></td>
                          <td><?php echo $key->email; ?></td>
                          <td><a href="<?php echo base_url()?>cpaneladministrator/akunadmin/hapus?admin=<?php echo $key->idAdmin; ?>" onclick="return confirm('Yakin Hapus?')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>
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