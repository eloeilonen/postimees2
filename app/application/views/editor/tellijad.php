        <div class="col-md-7">
            <table class="table table-striped table-hover well">
                <thead>
                    <tr class="bg-primary">
                        <th>#</th>
                        <th>Tellija nimi</th>
                        <th>Tellija email</th>
                        <th>Kustuta</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < count($tellijad); $i++) { ?>
                    <tr>
                        <td><?php echo ($i+1); ?></td>
                        <td><?php echo $tellijad[$i]->tellija_NIMI; ?></td>
                        <td><?php echo $tellijad[$i]->tellija_EMAIL; ?></td>
                        <td><a href="<?php echo base_url() . "editor/delete_tellija/" . $tellijad[$i]->tellija_ID; ?>">Kustuta</a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php echo $this->session->flashdata('msg'); ?>
        </div>
    </div>

