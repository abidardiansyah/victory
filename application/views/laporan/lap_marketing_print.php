<section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
        
            
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
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
                <th>No.</th>
                <th>Nama Marketing</th>
            </tr>
            <?php $no =1; foreach($marketing as $r){ ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $r['name']; ?></td>
            </tr>
            <?php $no++; } ?>
            </thead>
            
          </table>
        </div>
        <!-- /.col -->
      </div>
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
          
       
      </div>
    </section>