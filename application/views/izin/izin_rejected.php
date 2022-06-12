<section class="content-header">
      <h1> Data Rejected Izin
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i></a></li>
    <li class="active">Izin</li>
</section>
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Rejected Izin</h3>
        </div>
        <div class="box-body">
            <div class="box-body table-responsive">
                <table class="table table-bordered table-stiped" id="table1">
                    <thead>
                        <tr>
                        <th>#</th>
                            <th class="sorting_desc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending" aria-sort="descending">Name</th>
                            <th>Alasan</th>
                            <th>Keterangan</th>
                            <th>Tgl. Izin</th>
                            <th>Tgl pembuatan izin</th>
                         
                            <th>Aksi</th>
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
                                                      
                            
                            <td class="text-center">
                                <a href="<?=site_url('izin/reject_izin/'.$data->username_izin)?>"class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash" ></i> Delete
                                </a>
                            </td>        
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</section>