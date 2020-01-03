<link href="<?php echo base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<script src="<?php echo base_url('assets/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script>
$(document).ready(function(e) {
    $('#datakategori').DataTable();
});
</script>
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    Menggunakan Data Tables Clien Side
                </h6>
            </div>
            <div class="card-body">
                <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds.
                    <table class="table table-bordered table-sm" id="datakategori" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $nomor = 0;
                            foreach ($tampildata->result_array() as $r) {
                                $nomor++;
                            ?>
                            <tr>
                                <td><?= $nomor; ?></td>
                                <td><?= $r['katnama']; ?></td>
                                <td></td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>