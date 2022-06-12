<section class="content-header">
      <h1> Catatan Marketing
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i></a></li>
    <li class="active">Catatan</li>
</section>
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tambah Catatan</h3>
            <div class="pull-right">
                <a href="<?=site_url('user') ?>" class="btn btn-warning btn-flat">
                   <i class="fa fa-undo" ></i> Back
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <?php // echo validation_errors(); ?>
                    <form action="" method="post">
                        <!-- <div class="form-group <?=form_error('marketing_client') ? 'has-error':null?>">
                            <label>Nama Marketing</label>
                            <input type="text" name="marketing_client"  class="form-control" class="help-block"   value="<?php echo ucfirst($this->fungsi->user_login()->username)?>" readonly     >
                            
                            <span class="help-block"><?=form_error('marketing_client') ?></span>
                        </div> -->
                        <div class="form-group <?=form_error('nama_client') ? 'has-error':null?>">
                            <label>Nama Client *</label>
                            <input type="text" name="nama_client" class="form-control" class="help-block" value="<?=set_value('nama_client')?>">
                            <?=form_error('nama_client') ?>
                        </div>
                       
                        <div class="form-group <?=form_error('no_client') ? 'has-error':null?>">
                            <label>No Client *</label>
                            <input type="text" name="no_client" class="form-control" class="help-block" value="<?=set_value('no_client')?>">
                            <?=form_error('no_client') ?>
                        </div>
                       
                       
                        <div class="form-group <?=form_error('pekerjaan_client') ? 'has-error':null?>">
                            <label>Pekerjaan</label>
                            <input type="text" name="pekerjaan_client" class="form-control" class="help-block" value="<?=set_value('pekerjaan_client')?>">
                            <?=form_error('pekerjaan_client') ?>
                        </div>
                        <div class="form-group <?=form_error('alamatnya') ? 'has-error':null?>">
                            <label>Alamat </label>
                            <textarea type="textarea" name="alamatnya" class="form-control" class="help-block" value="<?=set_value('alamatnya')?>"></textarea>
                            <?=form_error('alamatnya') ?>
                        </div>
                        
                        <div class="form-group <?=form_error('jk_client') ? 'has-error':null?>">
                            <label>Jenis Kelamin *</label>
                            <select name="jk_client" class="form-control">
                                <option value="">
                                    - Pilih -
                                </option>
                                <option value="1" <?= set_value('jk_client') == 1? "selected" : null ?>>
                                    Laki-laki
                                </option>
                                <option value="2" <?= set_value('jk_client') == 2? "selected" : null ?>>
                                    Perempuan
                                </option>
                            </select>
                            <?=form_error('jk_client') ?>
                        </div>
                        
                        <div class="form-group <?=form_error('keterangan') ? 'has-error':null?>">
                            <label>Keterangan</label>
                            <input type="text" name="keterangan" class="form-control" class="help-block" value="<?=set_value('keterangan')?>">
                            <?=form_error('pekerjaan_client') ?>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-paper-plane"></i> Simpan</button>
                            <button type="Reset" class="btn btn-danger btn-flat"><i class="fa fa-recycle"></i> Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>