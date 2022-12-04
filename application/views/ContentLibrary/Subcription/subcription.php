<div class="content">
    <div class="card-header">
        <div style="flex-grow: 20;" class="card <?= $activeSubcrip ?>">
            <button><i class="fa-solid fa-book"></i><a href="<?= base_url('Subcription') ?>">SHOWING ALL SUCRIPTION DATA</a></button>
        </div>
        <div style="flex-grow: 2;" class="card">
            <button><i class="fa-solid fa-plus"></i><a href="<?= base_url('AddSubcription') ?>">ADD SUBCRIPTION</a></button>
        </div>
    </div>
    <div class="main-table">
        <table cellspacing="0">
            <thead>
                <tr>
                    <th width="10">No</th>
                    <th>TITLE</th>
                    <th width="30">MONTH</th>
                    <th>PRICE</th>
                    <th width="50">ACTIVE</th>
                    <th width="170">CREATED AT</th>
                    <th width="170">UPDATED AT</th>
                    <th width="200">OPTION</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($subcription as $key => $subs) {
                    if ($subs->is_active == 1) {
                        $act = "TRUE";
                    } else {
                        $act = "FALSE";
                    }
                    if ($subs->updated_at == "") {
                        $updated = "NONE";
                    } else {
                        $updated = $subs->updated_at;
                    }
                    $price = number_format($subs->price, 0, ',', '.');
                ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $subs->title ?></td>
                        <td><?= $subs->month ?></td>
                        <td><?= $price ?></td>
                        <td><?= $act ?></td>
                        <td><?= $subs->created_at ?></td>
                        <td><?= $updated ?></td>
                        <td class="option">
                            <a class="edit" href="<?= base_url("Library/subcription/editSubcription/$subs->id") ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a onclick="return confirm('YAKIN UNTUK HAPUSS??')" class="hapus" href="<?= base_url("Library/subcription/deleteData/$subs->id") ?>"><i class="fa-solid fa-trash-can"></i></a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>