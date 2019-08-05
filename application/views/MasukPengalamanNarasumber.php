

                        <div class="table-responsive mailbox-messages">
                            <table id="example1" class="table table-hover table-striped">
                                <thead>
                                <tr>
                                    <th style="display:none;">ID</th>
                                    <th>NOPEK</th>
                                    <th>JUDUL</th>
                                    <th>KATA KUNCI</th>
                                    <th>T. INPUT</th>
                                    <th>STATUS</th>
                                    <th>OPSI</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $no = 1;
                                foreach($pn as $data4):
                                    ?>
                                    <tr>
                                        <td style="display:none;"><?php echo $data4->id ?></td>
                                        <td class="mailbox-subject"><?php echo $data4->nopek ?></td>
                                        <td class="mailbox-subject"><?php echo $data4->judul ?></td>
                                        <td class="mailbox-attachment"><?php echo $data4->kata_kunci ?></td>
                                        <td class="mailbox-attachment"><?php echo $data4->waktu_input ?></td>
                                        <td class="mailbox-date"><?php echo $data4->status ?></td>
                                        <td> <a href="<?php echo base_url('LaporanDataKM/PengalamanNarasumber/').base64_encode($data4->id."-".base64_encode("PTPN7J@Y@")) ?>" class="btn btn-xs btn-primary">
                                                Lihat
                                            </a></td>
                                    </tr>
                                <?php endforeach;?>
                                </tbody>
                            </table>
                            <!-- /.table -->
                        </div>
                        <!-- /.mail-box-messages -->
