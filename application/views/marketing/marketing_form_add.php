<section class="content-header">
      <h1> User Data
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i></a></li>
    <li class="active">Users</li>
</section>
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Add Users</h3>
            <div class="pull-right">
                <a href="<?=site_url('marketing') ?>" class="btn btn-warning btn-flat">
                   <i class="fa fa-undo" ></i> Back
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <?php // echo validation_errors(); ?>
                    <?php echo form_open_multipart('');?>
                        <div class="form-group <?=form_error('foto') ? 'has-error':null?>">
                            <label>Foto *</label>
                            <input type="file" name="foto"  class="form-control" class="help-block" value="<?=set_value('foto')?>">
                            <span class="help-block"><?=form_error('foto') ?></span>
                        </div>
                        <div class="form-group <?=form_error('name') ? 'has-error':null?>">
                            <label>Nama Lengkap *</label>
                            <input type="text" name="name" class="form-control" class="help-block" value="<?=set_value('name')?>">
                            <?=form_error('name') ?>
                        </div>
                        <div class="form-group <?=form_error('phone') ? 'has-error':null?>">
                            <label>No. Telepon</label>
                            <input type="text" name="phone" class="form-control" class="help-block" value="<?=set_value('phone')?>">
                            <?=form_error('phone') ?>
                        </div>
                        <div class="form-group <?=form_error('address') ? 'has-error':null?>">
                            <label>Alamat *</label>
                            <input type="text" name="address" class="form-control" class="help-block" value="<?=set_value('address')?>">
                            <?=form_error('address') ?>
                        </div>
                        <div class="form-group <?=form_error('tgl_lahir') ? 'has-error':null?>">
                            <label>Tgl. Lahir *</label>
                            <input type="date" name="tgl_lahir" class="form-control" class="help-block" value="<?=set_value('tgl_lahir')?>">
                            <?=form_error('tgl_lahir') ?>
                        </div>
                      
                        <div class="form-group <?=form_error('jk_marketing') ? 'has-error':null?>">
                            <label>Jenis Kelamin *</label>
                            <select name="jk_marketing" class="form-control">
                                <option value="">
                                    - Pilih -
                                </option>
                                <option value="1" <?= set_value('jk_marketing') == 1? "selected" : null ?>>
                                    Laki-laki
                                </option>
                                <option value="2" <?= set_value('jk_marketing') == 2? "selected" : null ?>>
                                    Perempuan
                                </option>
                            </select>
                            <?=form_error('jk_marketing') ?>
                        </div>
            
                                     
                        <div class="form-group <?=form_error('agama') ? 'has-error':null?>">
                            <label>Agama *</label>
                            <select name="agama" class="form-control">
                                <option value="">
                                    - Pilih -
                                </option>
                                <option value="Islam" <?= set_value('agama') == 1? "selected" : null ?>>
                                    Islam
                                </option>
                                <option value="Kristen" <?= set_value('agama') == 2? "selected" : null ?>>
                                    Kristen
                                </option>
                                <option value="Hindu" <?= set_value('agama') == 3? "selected" : null ?>>
                                    Hindu
                                </option>
                                <option value="Budha" <?= set_value('agama') == 4? "selected" : null ?>>
                                    Budha
                                </option>
                            </select>
                            <?=form_error('agama') ?>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-paper-plane"></i> Simpan</button>
                            <button type="Reset" class="btn btn-danger btn-flat"><i class="fa fa-recycle"></i> Reset</button>
                        </div>
                </div>
            </div>
        </div>
    </div>
</section>