<section class="content-header">
      <h1> Data Marketing
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i></a></li>
    <li class="active">Data Marketing</li>
</section>
<section class="content">
   <div class="">
       
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#biodata_pasien" data-toggle="tab">Biodata Marketing</a></li>
              <li><a href="#riwayat_berobat" data-toggle="tab">Catatan Progres</a></li>            
             
            </ul>
            <div class="tab-content">
                <div class="active tab-pane" id="biodata_pasien">         
                    <div class="box-body box-profile">
                        <!-- <div class="col-md-6">
                            <div class="box-body" style="font-size: 17px;">
                                <strong><i class=""></i> Nama Marketing</strong>
                                <p class="text-muted">      
                                <input type="hidden" name="marketing_id" value="<?=$row->marketing_id?>">
                                <input type="text" name="name"  class="form-control"  value="<?=$this->input->post('name')?? $row->name?>" readonly>
                                </p>
                            

                            
                                <strong><i class=""></i> No. Telp </strong>
                                <p class="text-muted">      
                            
                                <input type="text" name="phone"  class="form-control"  value="<?=$this->input->post('phone')?? $row->phone?>" readonly>
                                </p>
                                <strong><i class=""></i> Alamat </strong>
                                <p class="text-muted" >      
                            
                                <textarea type="textarea" name="address"  class="form-control"  readonly ><?=$this->input->post('address')?? $row->address?></textarea>
                                </p>
                                <strong><i class=""></i> No. Telp </strong>
                                <p class="text-muted">      
                            
                                <input type="date" name="tgl_lahir"  class="form-control"  value="<?=$this->input->post('tgl_lahir')?? $row->tgl_lahir?>" readonly>
                                </p>
                                
                                <hr>
                            </div> -->
                       
                            <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">

                        <!-- <div class="box-body box-profile">
                            <img class="profile-user-img img-responsive img-circle"
                            src="" alt="User profile picture">
                            <br>
                        </div> -->
                           <strong><i class=""></i> Nama Marketing</strong>
                            <p class="text-muted">      
                                <input type="hidden" name="marketing_id" value="<?=$row->marketing_id?>">
                                <input type="text" name="name"  class="form-control"  value="<?=$this->input->post('name')?? $row->name?>" readonly>
                            </p>
                            <strong><i class=""></i> No. Telp </strong>
                                <p class="text-muted">      
                            
                                <input type="text" name="phone"  class="form-control"  value="<?=$this->input->post('phone')?? $row->phone?>" readonly>
                            </p>
                            <strong><i class=""></i> Alamat </strong>
                                <p class="text-muted" >      
                            
                                <textarea type="textarea" name="address"  class="form-control"  readonly ><?=$this->input->post('address')?? $row->address?></textarea>
                            </p>
                            <strong><i class=""></i> Tgl. Lahir </strong>
                                <p class="text-muted">      
                            
                                <input type="date" name="tgl_lahir"  class="form-control"  value="<?=$this->input->post('tgl_lahir')?? $row->tgl_lahir?>" readonly>
                                </p>
                                
                                <hr>
                        
                        
                    </div>

                </div>
                <!-- /.col -->
                <div class="col-md-6">
                    <div class="form-group">

                    <strong><i class=""></i> Jenis Kelamin</strong>
                   
                    <p class="text-muted">      
                            
                    <input type="text" name="tgl_lahir"  class="form-control"  value="<?=$this->input->post('jk_marketing')?? $row->jk_marketing  ==1 ? "Laki-laki": "Perempuan"    ?>" readonly>
                    </p>
                            
                           
                    <strong><i class=""></i> Agama</strong>
                   
                   <p class="text-muted">      
                           
                   <input type="text" name="agama"  class="form-control"  value="<?=$this->input->post('agama')?? $row->agama?>" readonly>  </p>
                           
                           <hr>

                           <a href="<?=site_url('laporan/detail_data_marketing/'.$row->marketing_id) ?>" class="btn btn-success btn-flat">
                   <i class="fa fa-print" ></i> Print
                </a>
                    
                    </div>
                    <!-- /.form-group -->

                    <!-- /.form-group -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>



                        
                </div>
            <!-- /.box-body -->
            


                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="riwayat_berobat">
                <form action="<?= site_url('laporan/detail_data_marketing_catatan'); ?>" method="post">
                <!-- <div>
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
                </div> -->
                </form>
                <table class="table table-bordered table-stiped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th class="sorting_desc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending" aria-sort="descending">Marketing</th>                   
                            <th>Nama Client</th>
                            <th>No. Telp</th>
                            <th>Pekerjaan</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Waktu Pencatatan</th>
                            <th>Keterangan</th>
                            <th>Komentar Manager</th>
                            <th></th>
                            
                        </tr>
                    </thead>
                    <tbody>     
                        <?php $no=1; foreach($catatan as $row) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row['marketing_client']; ?></td>
                                <td><?= $row['nama_client']; ?></td>
                                <td><?= $row['no_client']; ?></td>
                                <td><?= $row['pekerjaan_client']; ?></td>
                                <td><?= $row['jk_client'] ==1 ? "Laki-laki": "Perempuan"?></td>
                                <td><?= $row['alamatnya']; ?></td>
                                <td><?= $row['created']; ?></td>
                                <td><?= $row['keterangan']; ?></td>
                                <td><?= $row['komentar']; ?></td>
                                <td>
                                <form action="<?=site_url('catatan/del') ?>" method="post">
                           
                                <a href="<?=site_url('catatan/edit/'.$row['catatan_id']) ?>" class="btn btn-success btn-xs">
                                    <i class="fa fa-edit" ></i> Edit
                                </a>
                            
                                <input type="hidden" name="catatan_id" value="<?= $row['catatan_id']?>">
                                <button onclick="return confirm('Apakah anda yakin menghapus user?')" class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash" ></i> Delete
                                </button>
                            </form></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                </div>
                <!-- /.tab-pane -->

                </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>

</section>
























