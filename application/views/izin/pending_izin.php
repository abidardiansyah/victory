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
                <!-- <?php if($this->fungsi->user_login()->level ==1){ ?>
                    <a href="<?=site_url('marketing/add') ?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-plus" ></i> Create
                    </a>
                <?php }?>
                <?php if($this->fungsi->user_login()->level ==2){ ?>
                    <a href="<?=site_url('izin/add') ?>" class="btn btn-success btn-flat">
                    <i class="fa fa-plus" ></i> Formulir Izin
                    </a>
                <?php }?> -->
            </div>
        </div>
        <div class="box-body">
            <div class="box-body table-responsive">
                <table class="table table-bordered table-stiped" id="table1">
                <thead>
                        <tr>
                            <th>#</th>
                            <th class="sorting_desc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending" aria-sort="descending">Username</th>
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
                            <td><?=$data->username_izin?></td>
                            <td><?=$data->alasan?></td>
                            <td><?=$data->keterangan?></td>
                            <td><?=$data->tgl_izin?></td>
                            <td><?=$data->created?></td>                            
                            
                            <?php if($this->fungsi->user_login()->level ==1){ ?>
                            <td class="text-center">
                                <a href="<?=site_url('izin/approve_izin/'.$data->username_izin)?>"class="btn btn-success btn-xs">
                                    <i class="fa fa-hourglass-1" ></i> Terima
                                </a>
                                <a href="<?=site_url('izin/reject_izin/'.$data->username_izin)?>"class="btn btn-danger btn-xs">
                                    <i class="fa fa-hourglass-1" ></i> Tolak
                                </a>
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