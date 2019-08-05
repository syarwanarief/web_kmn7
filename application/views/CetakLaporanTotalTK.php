<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

        <ol class="breadcrumb">

        </ol>
    </section>

    <!-- Main content -->
    <section data-width="50%" class="content">
        <div>
            <div  class="box box-primary">
                <div class="box-header with-border">

                </div>
                <!-- /.box-header -->
                <!-- /.box-header -->
            </div>
            <div  class="box-body">
                <div class="panel panel-primary filterable">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                                Jumlah Total Tenaga Kerja
                        </h3>
                    </div>
                    <div class="table-responsive">

                        <table class="w3-table w3-bordered" border="2">

                            <thead>
                            <tr class="primary filters" style="font-optical-sizing: auto">
                                <th><input type="text" class="form-control" placeholder="Tenaga Kerja Kandir" disabled></th>
                                <th><input type="text" class="form-control" placeholder="Tenaga Kerja Unit 1" disabled></th>
                                <th><input type="text" class="form-control" placeholder="Tenaga Kerja Unit 2" disabled></th>
                                <th><input type="text" class="form-control" placeholder="Tenaga Kerja Unit 3" disabled></th>
                                <th><input type="text" class="form-control" placeholder="Tenaga Kerja Unit 4" disabled></th>
                                <th><input type="text" class="form-control" placeholder="Tenaga Kerja Unit 5" disabled></th>
                                <th><input type="text" class="form-control" placeholder="Tenaga Kerja Unit 6" disabled></th>
                                <th><input type="text" class="form-control" placeholder="Total" disabled></th>

                            </tr>
                            </thead>

                            <tbody>

                            <?php
                            $no = 1;

                            ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo "Contoh" ?></td>
                                <td><?php echo "test" ?></td>
                                <td><?php echo "test1" ?></td>
                                <td><?php echo "test2" ?></td>
                                <td><?php echo "test3" ?></td>
                                <td><?php echo "test1" ?></td>
                                <td><?php echo "test2" ?></td>
                            </tr>
                            </tbody>
                        </table>

                        <br>
                        <div class="pull-right">
                            <i class="glyphicon glyphicon-print"></i> <input type="button" value="Cetak Laporan" onClick="window.print()">
                        </div>

                    </div>
                </div>
            </div>
    </section>
</div>
