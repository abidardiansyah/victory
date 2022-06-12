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
            <h3 class="box-title">Edit Users</h3>
            <div class="pull-right">
                <a href="<?=site_url('user') ?>" class="btn btn-warning btn-flat">
                   <i class="fa fa-undo" ></i> Back
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="" method="post">
                        <div class="form-group <?=form_error('fullname') ? 'has-error':null?>">
                            <label>Name *</label>
                            <input type="hidden" name="user_id" value="<?=$row->user_id?>">
                            <input type="text" name="fullname"  class="form-control"  value="<?=$this->input->post('fullname')?? $row->name?>">
                            <span class="help-block"><?=form_error('fullname') ?></span>
                        </div>
                        <div class="form-group <?=form_error('username') ? 'has-error':null?>">
                            <label>Username *</label>
                            <input type="text" name="username" class="form-control"  value="<?=$this->input->post('username')?? $row->username?>">
                            <?=form_error('username') ?>
                        </div>
                        <div class="form-group <?=form_error('kode') ? 'has-error':null?>">
                            <label>Kode Marketing</label>
                            <input type="text" name="kode" class="form-control"  value="<?=$this->input->post('kode')?? $row->kode?>">
                            <?=form_error('kode') ?>
                        </div>
                        <div class="form-group <?=form_error('password') ? 'has-error':null?>">
                            <label>Password</label> <small> *biarkan kosong apabila tidak ingin diganti</small>
                            <input type="password" name="password" class="form-control"  value="<?=$this->input->post('password')?>">
                            <?=form_error('password') ?>
                        </div>
                        <div class="form-group <?=form_error('passconf') ? 'has-error':null?>">
                            <label>Password Konfirmasi</label>
                            <input type="password" name="passconf" class="form-control"  value="<?=$this->input->post('passconf')?>">
                            <?=form_error('passconf') ?>
                        </div>
                        <div class="form-group <?=form_error('address') ? 'has-error':null?>">
                            <label>Address *</label>
                            <textarea name="address" class="form-control" ><?=$this->input->post('address')?? $row->address?></textarea>
                            <?=form_error('address') ?>
                        </div>
                        <div class="form-group <?=form_error('level') ? 'has-error':null?>">
                            <label>Level</label>
                            <select name="level" class="form-control">
                                <?php $level = $this->input->post('level') ? $this->input->post('level')  : $row->level ?>
                                <option value="1" >
                                    Admin
                                </option>
                                <option value="2" <?= $level == 2 ? 'selected' : null ?>>
                                    User
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