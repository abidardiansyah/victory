<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Registration Page</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition register-page" style="background-image: url(assets/bower_components/bootstrap/dist/css/ff.jpg);">
    <div class="register-box">
        <div class="register-logo">
            <a href=""><b style="color: black;">VICTORY</b> <a style="color: black;">| Register</a></a>
        </div>

        <div class="register-box-body ">
            <p class="login-box-msg">Register a new user</p>

            <?php echo form_open_multipart('');?>
            <div class="form-group <?=form_error('fullname') ? 'has-error':null?>">
                <label>Nama Lengkap *</label>
                <input type="text" name="fullname" class="form-control" class="help-block"
                    value="<?=set_value('fullname')?>">
                <span class="help-block"><?=form_error('fullname') ?></span>
            </div>
            <div class="form-group <?=form_error('username') ? 'has-error':null?>">
                <label>Username *</label>
                <input type="text" name="username" class="form-control" class="help-block"
                    value="<?=set_value('username')?>">
                <?=form_error('username') ?>
            </div>

            <div class="form-group <?=form_error('password') ? 'has-error':null?>">
                <label>Password *</label>
                <input type="password" name="password" class="form-control" class="help-block"
                    value="<?=set_value('password')?>">
                <?=form_error('password') ?>
            </div>
            <div class="form-group <?=form_error('passconf') ? 'has-error':null?>">
                <label>Password Konfirmasi *</label>
                <input type="password" name="passconf" class="form-control" class="help-block"
                    value="<?=set_value('passconf')?>">
                <?=form_error('passconf') ?>
            </div>
            <div class="form-group <?=form_error('address') ? 'has-error':null?>">
                <label>Address *</label>
                <textarea name="address" class="form-control" class="help-block"
                    value="<?=set_value('address')?>"></textarea>
                <?=form_error('address') ?>
            </div>
            <!-- <div class="form-group ">
                            <label>Level *</label>
                            <input name="level" class="form-control" class="help-block" value="2" disabled ></input>
                        </div> -->
            <div class="form-group <?=form_error('foto') ? 'has-error':null?>">
                <label>Foto *</label>
                <input type="file" name="foto" class="form-control" class="help-block" value="<?=set_value('foto')?>">
                <span class="help-block"><?=form_error('foto') ?></span>
            </div>

            <div class="form-group <?=form_error('phone') ? 'has-error':null?>">
                <label>No. Telepon</label>
                <input type="text" name="phone" class="form-control" class="help-block" value="<?=set_value('phone')?>">
                <?=form_error('phone') ?>
            </div>

            <div class="form-group <?=form_error('tgl_lahir') ? 'has-error':null?>">
                <label>Tgl. Lahir *</label>
                <input type="date" name="tgl_lahir" class="form-control" class="help-block"
                    value="<?=set_value('tgl_lahir')?>">
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
        <!-- /.form-box -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery 3 -->
    <script src="../../bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="../../plugins/iCheck/icheck.min.js"></script>
    <script>
    $(function() {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });
    </script>
</body>

</html>