<section class="content-header">
    <h1> Data Marketing

    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i></a></li>
        <li class="active">Marketing</li>
</section>
<section class="content">

    <!-- SELECT2 EXAMPLE -->
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Select2</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                        class="fa fa-minus"></i></button>

            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <?php if($this->session->flashdata('sukses')) { ?>
                <div class="alert alert-success">
                    <?= $this->session->flashdata('sukses'); ?>
                </div>
            <?php }elseif($this->session->flashdata('error')) { ?>
                <div class="alert alert-danger">
                    <?= $this->session->flashdata('error'); ?>
                </div>
            <?php } ?>
            <?= form_open_multipart('profil_marketing/update/'.$row[0]['marketing_id']); ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">

                            <div class="box-body box-profile">
                                <img class="profile-user-img img-responsive img-circle"
                                    src="<?= base_url()."/uploads/".$row[0]['foto']?>" alt="User profile picture">
                                <br>
                            </div>
                            <div class="form-group <?=form_error('foto') ? 'has-error':null?>">
                                <label>Foto *</label>
                                <input type="file" name="foto" class="form-control" class="help-block"
                                    value="<?=set_value('foto')?>">
                                <span class="help-block"><?=form_error('foto') ?></span>
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="fullname" value="<?= $row[0]['name']?>" class="form-control"
                                    class="help-block">
                                <span class="help-block"></span>
                            </div>
                            <div class="form-group">
                                <label>No. Telp</label>
                                <input type="text" name="phone" value="<?= $row[0]['phone']?>" class="form-control"
                                    class="help-block">
                                <span class="help-block"></span>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <textarea type="textarea" name="address" class="form-control"
                                    class="help-block"><?= $row[0]['address']?></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>

                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                        <div class="form-group">

                            <div class="form-group">
                                <label>Tgl. Lahir</label>
                                <input type="date" name="tgl_lahir" value="<?= $row[0]['tgl_lahir']?>" class="form-control"
                                    class="help-block">
                                <span class="help-block"></span>
                            </div>
                            <div class="form-group <?=form_error('jk_marketing') ? 'has-error':null?>">
                                <label>Jenis Kelamin *</label>
                                <select name="jk_marketing" class="form-control">
                                    <option value="">
                                        - Pilih -
                                    </option>
                                    <option value="1" <?= $row[0]['jk_marketing'] == 1? "selected" : null ?>>
                                        Laki-laki
                                    </option>
                                    <option value="2" <?= $row[0]['jk_marketing'] == 2? "selected" : null ?>>
                                        Perempuan
                                    </option>
                                </select>
                                <?=form_error('jk_marketing') ?>
                            </div>


                            <div class="form-group <?=form_error('agama') ? 'has-error':null?>">
                                <label>Agama *</label>
                                <select name="agama" class="form-control">
                                    
                                    <option value="1" <?= $row[0]['agama'] == 1? "selected" : null ?>>
                                        Islam
                                    </option>
                                    <option value="2" <?= $row[0]['agama'] == 2? "selected" : null ?>>
                                        Kristen
                                    </option>
                                    <option value="3" <?= $row[0]['agama'] == 3? "selected" : null ?>>
                                        Hindu
                                    </option>
                                    <option value="4" <?= $row[0]['agama'] == 4? "selected" : null ?>>
                                        Budha
                                    </option>
                                </select>
                                <?=form_error('agama') ?>
                            </div>
                            <!-- <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" value="<?= $user['username']; ?>" class="form-control"
                                    class="help-block">
                                <span class="help-block"></span>
                            </div> -->
                            <div class="form-group">
                                <label>Password</label>
                                <input type="hidden" name="username" value="<?= $user['username']; ?>">
                                <input type="text" name="password" value="" class="form-control"
                                    class="help-block">
                                <span class="help-block"></span>
                            </div>
                            <div class="form-group">
                                <label>Konfirmasi Password</label>
                                <input type="text" name="password2" value="" class="form-control"
                                    class="help-block">
                                <span class="help-block"></span>
                            </div>
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-edit"></i> Update
                            </button>
                        </div>
                        <!-- /.form-group -->

                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                </div>
            <?= form_close(); ?>
            <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and information about
            the plugin.
        </div>
    </div>
    <!-- /.box -->


    <!-- /.row -->

</section>