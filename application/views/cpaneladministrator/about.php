        <!-- page content -->
        <div class="right_col" role="main">
          <div class="row" style="display: block;">
            <div class="col-md-12 col-sm-12 ">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Tentang Kami</h2>
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
                  <form id="demo-form" action="<?php echo base_url('cpaneladministrator/tentang/prosessimpan'); ?>" method="post" data-parsley-validate>
                    <div class="form-group">
                      <label for="nama">Isi* :</label>
                      <textarea class="form-control" name="isi" required><?php if(!empty($data->isi)){ echo $data->isi;} ?></textarea>
                    </div>

                    <div class="form-group">
                      <button type="submit" name="submit" id="btnSubmit" class="btn btn-primary float-right"><i class="fa fa-save"></i> Simpan Data</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
        <!-- /page content -->