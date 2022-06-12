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
                    <form action="<?= site_url('catatan/edit/'.$row->catatan_id) ?>" method="post">
                        <!-- <div class="form-group ">
                            <label>Nama Marketing</label>
                            <input type="text" name="marketing_client"  class="form-control" class="help-block"   readonly     >
                            
                            <span class="help-block"><?=form_error('marketing_client') ?></span>
                        </div> -->
                        <div class="form-group <?=form_error('nama_client') ? 'has-error':null?>">
                            <label>Nama Client *</label>
                            <input type="hidden" name="catatan_id" value="<?= $row->catatan_id; ?>">
                            <input type="text" name="nama_client" class="form-control" class="help-block"  value="<?=$this->input->post('nama_client')?? $row->nama_client?>">
                            <?=form_error('nama_client') ?>
                        </div>
                       
                        <div class="form-group <?=form_error('no_client') ? 'has-error':null?>">
                            <label>No Client *</label>
                            <input type="text" name="no_client" class="form-control" class="help-block" value="<?=$this->input->post('no_client')?? $row->no_client?>">
                            <?=form_error('no_client') ?>
                        </div>
                       
                       
                        <div class="form-group <?=form_error('pekerjaan_client') ? 'has-error':null?>">
                            <label>Pekerjaan</label>
                            <input type="text" name="pekerjaan_client" class="form-control" class="help-block" value="<?=$this->input->post('pekerjaan_client')?? $row->pekerjaan_client?>">
                            <?=form_error('pekerjaan_client') ?>
                        </div>
                        <div class="form-group <?=form_error('alamatnya') ? 'has-error':null?>">
                            <label>Alamat </label>
                            <textarea type="textarea" name="alamatnya" class="form-control" class="help-block" ><?=$this->input->post('alamatnya')?? $row->alamatnya?></textarea>
                            <?=form_error('alamatnya') ?>
                        </div>
                        
                        <div class="form-group <?=form_error('jk_client') ? 'has-error':null?>">
                            <label>Jenis Kelamin *</label>
                            <select name="jk_client" class="form-control">
                            <?php $jk_client = $this->input->post('jk_client') ? $this->input->post('jk_client')  : $row->jk_client ?>
                              
                                <option value="1" >
                                    Laki-laki
                                </option>
                                <option value="2" <?= $jk_client == 2 ? 'selected' : null ?>>
                                    Perempuan
                                </option>
                            </select>
                            <?=form_error('jk_client') ?>
                        </div>
                        <div class="form-group <?=form_error('keterangan') ? 'has-error':null?>">
                            <label>Keterangan</label>
                            <input type="text" name="keterangan" class="form-control" class="help-block" value="<?=$this->input->post('keterangan')?? $row->keterangan?>">
                            <?=form_error('keterangan') ?>
                        </div>
                        <?php if($this->fungsi->user_login()->level ==1){ ?>
                        <div class="form-group <?=form_error('komentar') ? 'has-error':null?>">
                            <label>komentar Manager</label>
                            <input type="text" name="komentar" class="form-control" class="help-block" value="<?=$this->input->post('komentar')?? $row->komentar?>">
                            <?=form_error('komentar') ?>
                        </div>
                        <?php } ?>
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