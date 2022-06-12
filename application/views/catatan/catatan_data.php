<section class="content-header">
      <h1> Data Catatn Marketing
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i></a></li>
    <li class="active">Catatan </li>
</section>
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Catatan Progres</h3>
            <div class="pull-right">
            <?php if($this->fungsi->user_login()->level ==2){ ?>
                <a href="<?=site_url('catatan/add') ?>" class="btn btn-primary btn-flat">
                   <i class="fa fa-plus" ></i> Create
                </a>
                <?php }?>
            </div>
        </div>
        <div class="box-body">
            <form action="<?= site_url('catatan/catatan_user'); ?>" method="post">
                <div class="row">
                    <div class="col-xs-2">
                        <div class="form-group">
                            <input type="date" name="tanggal1" class="form-control">
                        </div>
                    </div>
                    <div class="col-xs-2">
                        <div class="form-group">
                            <input type="date" name="tanggal2" class="form-control">
                        </div>
                    </div>
                    <div class="col-xs-8">
                        <button type="submit" class="btn btn-success btn-flat">
                        <i class="fa fa-print" ></i> Print
                        </button>
                    </div>
                </div>
            </form>
            <div class="box-body table-responsive">
                <table class="table table-bordered table-stiped" id="table1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th class="sorting_desc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending" aria-sort="descending">Marketing</th>
                            <th>Nama Client</th>
                            <th>No. Telp.</th>
                            <th>Pekerjaan </th>
                            <th>Jenis Kelamin </th>
                            <th>Alamat </th>
                            <th>Waktu Pencatatan</th>
                            <th>Keterangan</th>
                            <th>Komentar Manager</th>
                            
                            <th>Aksi</th>
                          
                        </tr>
                    </thead>
                    <tbody>     
                        <?php $no=1; foreach($row->result() as $key => $data){?>
                        <tr>
                                <td><?=$no++?></td>
                            <td><?=$data->marketing_client?></td>
                            <td><?=$data->nama_client?></td>
                            <td><?=$data->no_client?></td>
                            <td><?=$data->pekerjaan_client?></td>
                            <td><?=$data->jk_client  ==1 ? "Laki-laki": "Perempuan"?></td>                            
                            <td><?=$data->alamatnya?></td>                            
                            <td><?=$data->created?></td>                            
                            <td><?=$data->keterangan?></td>                            
                            <td><?=$data->komentar?></td>                            
                            
                            
                            <td class="text-center">
                              
                            <form action="<?=site_url('catatan/del') ?>" method="post">
                           
                                <a href="<?=site_url('catatan/edit/'.$data->catatan_id) ?>" class="btn btn-success btn-xs">
                                    <i class="fa fa-edit" ></i> Edit
                                </a>
                            
                                <input type="hidden" name="catatan_id" value="<?= $data->catatan_id?>">
                                <button onclick="return confirm('Apakah anda yakin menghapus user?')" class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash" ></i> Delete
                                </button>
                            </form>
                            
                            </td>
                              
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</section>