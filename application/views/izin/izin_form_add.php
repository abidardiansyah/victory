<section class="content-header">
      <h1> Izin Data
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i></a></li>
    <li class="active">Izin</li>
</section>
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tambah Izin</h3>
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
                        <div class="form-group <?=form_error('nama_izin') ? 'has-error':null?>">
                            <label>Nama Lengkap *</label>
                            <input type="text" name="nama_izin"  class="form-control" class="help-block" value="<?=set_value('nama_izin')?>">
                            <span class="help-block"><?=form_error('nama_izin') ?></span>
                        </div>
                        <!-- <div class="form-group <?=form_error('username_izin') ? 'has-error':null?>">
                            <label>Username *</label>
                            <input type="text" name="username_izin" class="form-control" class="help-block" value="<?=set_value('username_izin')?>">
                            <?=form_error('username_izin') ?>
                        </div> -->
                        <div class="form-group <?=form_error('alasan') ? 'has-error':null?>">
                            <label>Alasan</label>
                            <textarea type="textarea" name="alasan" class="form-control" class="help-block" value="<?=set_value('alasan')?>"></textarea>
                            <?=form_error('alasan') ?>
                        </div>
                       
                        <div class="form-group <?=form_error('tgl_izin') ? 'has-error':null?>">
                            <label>Tgl. Izin *</label>
                            <input type="date" name="tgl_izin" class="form-control" class="help-block" value="<?=set_value('tgl_izin')?>">
                            <?=form_error('tgl_izin') ?>
                        </div>
                        <div class="form-group <?=form_error('keterangan') ? 'has-error':null?>">
                            <label>Keterangan *</label>
                            <select name="keterangan" class="form-control">
                                <option value="">
                                    - Pilih -
                                </option>
                                <option value="Izin">
                                    Izin
                                </option>
                                <option value="Terlambat">
                                    Terlambat
                                </option>
                                <option value="Sakit">
                                    Sakit
                                </option>
                               
                            </select>
                            <?=form_error('level') ?>
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