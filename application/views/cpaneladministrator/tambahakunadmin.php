        <!-- page content -->
        <div class="right_col" role="main">
          <div class="row" style="display: block;">
            <div class="col-md-12 col-sm-12 ">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Tambah Akun Admin</h2> <a href="<?php echo base_url()?>cpaneladministrator/akunadmin" class="btn btn-primary float-right"><i class="fa fa-table"></i> Data Admin</a>
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
                  <form id="demo-form" action="<?php echo base_url('cpaneladministrator/simpanakunadmin'); ?>" method="post" data-parsley-validate>
                    <div class="form-group">
                      <label for="nama">Nama* :</label>
                      <input type="text" id="nama" class="form-control" name="nama" required />
                    </div>

                    <div class="form-group">
                      <label for="nama">Nama Pengguna* :</label>
                      <input type="text" id="namaPengguna" class="form-control" name="namaPengguna" required />
                    </div>

                    <div class="form-group">
                      <label for="email">E-Mail* :</label>
                      <input type="email" id="email" class="form-control" name="email" data-parsley-trigger="change" required />
                    </div>

                    <div class="form-group">
                      <label for="txtPassword">Kata Sandi* :</label>
                      <input type="password"  id="txtPassword" class="form-control" name="katasandi" required />
                    </div>

                    <div class="form-group">
                      <label for="txtConfirmPassword">Ulangi Kata Sandi* :</label>
                      <input type="password" id="txtConfirmPassword" class="form-control" name="upassword" required />
                    </div>

                    <div class="form-group">
                      <button type="submit" name="submit"  id="btnSubmit" class="btn btn-primary float-right"><i class="fa fa-save"></i> Simpan Data</button>
                    </div>
                  </form>
                  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
                  <script type="text/javascript">
                      $(function () {
                          $("#btnSubmit").click(function () {
                              var password = $("#txtPassword").val();
                              var confirmPassword = $("#txtConfirmPassword").val();
                              if (password != confirmPassword) {
                                  alert("Password tidak sama.");
                                  return false;
                              }
                              return true;
                          });
                      });
                  </script>


                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
        <!-- /page content -->