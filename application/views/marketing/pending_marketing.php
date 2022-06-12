<section class="content-header">
    <h1> Data Marketing

    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i></a></li>
        <li class="active">Marketing</li>
</section>
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Marketing</h3>
            <?php if($this->fungsi->user_login()->level ==1){ ?>
            <div class="pull-right">
                <a href="<?=site_url('marketing/add') ?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-plus"></i> Create
                </a>
            </div>
            <?php }?>
        </div>
        <div class="box-body">
            <div class="box-body table-responsive">
                <table class="table table-bordered table-stiped" id="table1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Foto</th>
                            <th class="sorting_desc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="Rendering engine: activate to sort column ascending" aria-sort="descending">
                                Name</th>

                            <th>Address</th>
                            <th>JK</th>
                            <th>Tgl. Lahir</th>
                            <th>Tgl. Mendaftar</th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach($row->result() as $key => $data){?>
                        <tr>
                            <td><?=$no++?></td>
                            <td><img class="img -responsive" style="max-width: 100px;"
                                    src="<?= base_url()?>/uploads/<?=$data->foto?>" alt="Tidak ada foto"></td>
                            <td><?=$data->name?></td>

                            <td><?=$data->address?></td>
                            <td><?=$data->jk_marketing ==1 ? "Laki-laki": "Perempuan"?></td>
                            <td><?=$data->tgl_lahir?></td>

                            <td><?=$data->created?></td>

                            <td class="text-center">
                                <?php if($this->fungsi->user_login()->level ==1){ ?>
                                <!-- <a href="<?=site_url('PendMarketing/detail/'.$data->marketing_id) ?>"
                                    class="btn btn-primary btn-xs">
                                    <i class="fa fa-search"></i> Detail
                                </a> -->
                                <a href="<?=site_url('marketing/approve_marketing/'.$data->marketing_id) ?>"
                                    onclick="return confirm('Apakah anda ingin menerima sebagai marketing?')"
                                    class="btn btn-success btn-xs">
                                    <i class="fa  fa-check"></i> Terima
                                </a>
                                <a href="<?=site_url('marketing/reject_marketing/'.$data->marketing_id) ?>"
                                    onclick="return confirm('Apakah anda ingin menolak sebagai marketing?')"
                                    class="btn btn-danger btn-xs">
                                    <i class="fa fa-close"></i> Tolak
                                </a>
                                <?php }else {?>
                                <a href=""
                                    class="btn btn-primary btn-xs">
                                    <i class="fa fa-search"></i> Pending
                                </a>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</section>