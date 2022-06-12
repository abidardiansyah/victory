<section class="content-header">
      <h1> Data Rejected User
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i></a></li>
    <li class="active">Users</li>
</section>
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Rejected User</h3>
        </div>
        <div class="box-body">
            <div class="box-body table-responsive">
                <table class="table table-bordered table-stiped" id="table1">
                    <thead>
                        <tr>
                        <th>#</th>
                            <th class="sorting_desc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending" aria-sort="descending">Name</th>
                            <th>Username</th>
                            <th>Kode Marketing</th>
                            <th>Password</th>
                            <th>Alamat</th>
                            <th>Level</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>     
                        <?php $no=1; foreach($row->result() as $key => $data){?>
                        <tr>
                            <td><?=$no++?></td>
                            <td><?=$data->name?></td>
                            <td><?=$data->username?></td>
                            <td><?=$data->kode?></td>
                            <td><?=$data->password?></td>
                            <td><?=$data->address?></td>
                            <td><?=$data->level ==1 ? "Admin": "User"?></td>                            
                            
                            <td class="text-center">
                                <a href="<?=site_url('user/reject_user/'.$data->user_id)?>"class="btn btn-danger btn-xs">
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