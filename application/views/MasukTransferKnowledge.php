

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
                                foreach($tk as $data2):
                                    ?>
                                    <tr>
                                        <td style="display:none;"><?php echo $data2->id ?></td>
                                        <td class="mailbox-subject"><?php echo $data2->nopek ?></td>
                                        <td class="mailbox-subject"><?php echo $data2->judul ?></td>
                                        <td class="mailbox-attachment"><?php echo $data2->kata_kunci ?></td>
                                        <td class="mailbox-attachment"><?php echo $data2->waktu_input ?></td>
                                        <td class="mailbox-date"><?php echo $data2->status ?></td>
                                        <td> <a href="<?php echo base_url('LaporanDataKM/TransferKnowledge/').base64_encode($data2->id."-".base64_encode("PTPN7J@Y@")) ?>" class="btn btn-xs btn-primary">
                                                Lihat
                                            </a></td>
                                    </tr>
                                <?php endforeach;?>

                                </tbody>
                            </table>
                            <!-- /.table -->
                        </div>
                        <!-- /.mail-box-messages -->