<?php $this->load->view('head')?>
<?php $this->load->view('jadwal/nav_list')?>

<!-- Main Container -->
<main id="main-container">

<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item"><?=$actor;?></li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="link-fx" href=""><?=$title;?></a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="content">
    <!-- Dynamic Table Full -->
    <div class="block">
        <div class="block-header">
            <a href="<?=base_url('jadwal/tambah');?>">
                <button type="button" class="btn btn-success mr-1 mb-3">
                    <i class="fa fa-fw fa-plus mr-1"></i> Tambah Data
                </button>
            </a>
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                                <thead>
                                    <tr>
                                        <th>Hari</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Kelas</th>
                                        <th>Tutor</th>
                                        <th>Waktu</th>
                                        <th style="width: 15%;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($jadwals as $jadwal):?>
                                        <tr>
                                            <td><?=$jadwal->jadwal_hari;?>
                                            <td><?=$jadwal->matpel_nama;?>
                                            <td><?=$jadwal->kelas_nama;?>
                                            <td><?=$jadwal->tutor_nama;?>
                                            <td><?=$jadwal->jadwal_jam_mulai;?> - <?=$jadwal->jadwal_jam_berakhir;?></td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="<?=base_url('jadwal/ubah/').$jadwal->jadwal_id;?>">
                                                        <button type="button" class="btn btn-sm btn-light js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Ubah">
                                                            <i class="fa fa-fw fa-pencil-alt"></i>
                                                        </button>
                                                    </a>
                                                    <a href="<?=base_url('jadwal/hapus/').$jadwal->jadwal_id;?>">
                                                        <button type="button" class="btn btn-sm btn-light js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Hapus">
                                                            <i class="fa fa-fw fa-times"></i>
                                                        </button>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
        </div>
    </div>
    <!-- END Dynamic Table Full -->

</div>
<!-- END Page Content -->

</main>
<!-- END Main Container -->
<?php $this->load->view('foot')?>