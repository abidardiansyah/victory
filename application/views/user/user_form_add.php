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
                        <div class="form-group <?=form_error('fullname') ? 'has-error':null?>">
                            <label>Name *</label>
                            <input type="text" name="fullname"  class="form-control" class="help-block" value="<?=set_value('fullname')?>">
                            <span class="help-block"><?=form_error('fullname') ?></span>
                        </div>
                        <div class="form-group <?=form_error('username') ? 'has-error':null?>">
                            <label>Username *</label>
                            <input type="text" name="username" class="form-control" class="help-block" value="<?=set_value('username')?>">
                            <?=form_error('username') ?>
                        </div>
                        <div class="form-group <?=form_error('kode') ? 'has-error':null?>">
                            <label>Kode Marketing</label>
                            <input type="text" name="kode" class="form-control" class="help-block" value="<?=set_value('kode')?>">
                            <?=form_error('kode') ?>
                        </div>
                        <div class="form-group <?=form_error('password') ? 'has-error':null?>">
                            <label>Password *</label>
                            <input type="password" name="password" class="form-control" class="help-block" value="<?=set_value('password')?>">
                            <?=form_error('password') ?>
                        </div>
                        <div class="form-group <?=form_error('passconf') ? 'has-error':null?>">
                            <label>Password Konfirmasi *</label>
                            <input type="password" name="passconf" class="form-control" class="help-block" value="<?=set_value('passconf')?>">
                            <?=form_error('passconf') ?>
                        </div>
                        <div class="form-group <?=form_error('address') ? 'has-error':null?>">
                            <label>Address *</label>
                            <textarea name="address" class="form-control" class="help-block" value="<?=set_value('address')?>"></textarea>
                            <?=form_error('address') ?>
                        </div>
                        <div class="form-group <?=form_error('level') ? 'has-error':null?>">
                            <label>Level *</label>
                            <select name="level" class="form-control">
                                <option value="">
                                    - Pilih -
                                </option>
                                <option value="1" <?= set_value('level') == 1? "selected" : null ?>>
                                    Admin
                                </option>
                                <option value="2" <?= set_value('level') == 2? "selected" : null ?>>
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