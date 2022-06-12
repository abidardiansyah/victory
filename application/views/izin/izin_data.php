<section class="content-header">
      <h1> Data Izin Marketing
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i></a></li>
    <li class="active">Izin</li>
</section>
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Izin</h3>
            <div class="pull-right">
            
                <a href="<?=site_url('izin/add') ?>" class="btn btn-primary btn-flat">
                   <i class="fa fa-plus" ></i> Create
                </a>
              
            </div>
        </div>
        <div class="box-body">
            <div class="box-body table-responsive">
                <table class="table table-bordered table-stiped" id="table1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th class="sorting_desc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending" aria-sort="descending">Nama Lengkap</th>
                            <th>Username</th>
                            <th>Keterangan</th>
                            <th>Alasan</th>
                            <th>Izin untuk tgl.</th>
                            <th>Waktu Izin</th>
                            <?php if($this->fungsi->user_login()->level ==1){ ?>
                            <th>Aksi</th>
                            <?php }?> 
                        </tr>
                    </thead>
                    <tbody>     
                        <?php $no=1; foreach($row->result() as $key => $data){?>
                        <tr>
                            <td><?=$no++?></td>
                            <td><?=$data->nama_izin?></td>
                            <td><?=$data->username_izin?></td>
                            <td><?=$data->alasan?></td>
                            <td><?=$data->keterangan?></td>
                            <td><?=$data->tgl_izin?></td>
                            <td><?=$data->created?></td>                            
                            
                            <?php if($this->fungsi->user_login()->level ==1){ ?>
                            <td class="text-center">
                              
                                <form action="<?=site_url('izin/del') ?>" method="post">
                                <input type="hidden" name="izin_id" value="<?= $data->izin_id?>">
                                <button onclick="return confirm('Apakah anda yakin menghapus user?')" class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash" ></i> Delete
                                </button>
                                </form>
                            
                            </td>
                            <?php }?>        
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</section>