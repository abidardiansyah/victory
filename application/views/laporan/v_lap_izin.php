<section class="content-header">
      <h1> Laporan Data Marketing
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i></a></li>
    <li class="active">Data Marketing</li>
</section>
<section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
            <form action="<?= site_url('laporan/izin_print'); ?>" method="post" class="pull-right">
                <div class="row">
                    <div class="col-xs-4">
                        <div class="form-group">
                            <input type="date" name="tanggal1" class="form-control">
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <div class="form-group">
                            <input type="date" name="tanggal2" class="form-control">
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-success btn-flat">
                        <i class="fa fa-print" ></i> Print
                        </button>
                    </div>
                </div>
              </form>
            
            
          <h2 class="page-header">
            <i class="fa fa-globe"></i> VICTORY INTERNATIONAL FUTURES
            
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
        <h4><b>LAPORAN DATA MARKETING</b></h4>
        <h5>S.Parman Office Park, Jl. S.Parman 3A RT 9, RW.4, Petompon, Kec. Gajahmungkur, Kota Semarang, Jawa Tengah 50253</h5>
        <br>  
        </div>
        <!-- /.col -->
        
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="box-body">
            <div class="box-body table-responsive">
                <table class="table table-bordered table-stiped" id="table1">
                    <thead>
                        <tr>
                        <th>No.</th>
                        <th>Nama Marketing</th>
                        <th>Username</th>
                        <th>Alasan</th>
                        <th>Keterangan</th>
                        <th>Tgl. Izin</th>
                        <th>Created</th>
                        
                       
                        </tr>
                    </thead>
                    <tbody>     
                    <?php $no =1; foreach($izin as $a){ ?>
                    <tr>
                      <td><?= $no; ?></td>
                      <td><?= $a['nama_izin']; ?></td>
                      <td><?= $a['username_izin']; ?></td>
                      <td><?= $a['alasan']; ?></td>
                      <td><?= $a['keterangan']; ?></td>
                      <td><?= $a['tgl_izin']; ?></td>
                      <td><?= $a['created']; ?></td>
                     
                    </tr>
                    <?php $no++; } ?>
                   </thead>
                    </tbody>
                </table>
            </div>
        </div>


      <!-- <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
                <th>No.</th>
                <th>Nama Marketing</th>
            </tr>
            <?php $no =1; foreach($izin as $a){ ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $a['nama_izin']; ?></td>
            </tr>
            <?php $no++; } ?>
            </thead>
            
          </table>
        </div>
        <!-- /.col -->
      </div> -->
      <!-- /.row -->
      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <p></p>
         

          <p class="" style="margin-top: 10px;">
            
          </p>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
        
<br>

          <div class="table-responsive" >
            <table class="table-border-0" >
              <tr>
                <th style="width:72%"></th>
                <td ><p >Semarang, <?= date('d-m-Y'); ?>
                <br>
                    Manager,
                    <br><br><br><br></td>
                    
              </tr>
              <tr>
                <th></th>
                <td><b>_______________________</b></td>
              </tr>
             
              
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <br><br>
      <div class="row no-print">
          
        <div class="col-xs-12">
            
          <!-- <a href="<?=site_url('laporan/print')?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a> -->
          
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>
        </div>
      </div>
    </section>
<!DOCTYPE html>
