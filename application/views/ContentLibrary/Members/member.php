<div class="content">
    <div class="card-header">
        <div style="flex-grow: 20;" class="card <?= $activeMembers ?>">
            <button><i class="fa-solid fa-book"></i><a href="<?= base_url('Members') ?>">SHOWING ALL MEMBER DATA</a></button>
        </div>
        <div style="flex-grow: 2;" class="card">
            <button><i class="fa-solid fa-plus"></i><a href="<?= base_url('AddMembers') ?>">ADD MEMBER</a></button>
        </div>
    </div>
    <div class="main-table">
        <!-- <table cellspacing="0">
            <thead>
                <tr>
                    <th width="10">No</th>
                    <th width="50">Active</th>
                    <th width="200">NIK</th>
                    <th width="400">Full Name</th>
                    <th width="150">Phone</th>
                    <th width="300">Address</th>
                    <th width="100">BornPlace</th>
                    <th width="150">BornDate</th>
                    <th width="150">Gender</th>
                    <th width="150">Country</th>
                    <th width="150">Nationality</th>
                    <th width="150">Created AT</th>
                    <th width="150">Updated AT</th>
                    <th width="200">OPTION</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table> -->
        <table class="table" cellspacing="0">
            <thead>
                <tr>
                    <th width="10">No</th>
                    <th width="50">Active</th>
                    <th width="200">NIK</th>
                    <th width="400">Full Name</th>
                    <th width="150">Phone</th>
                    <th width="300">Address</th>
                    <th width="150">BornPlace</th>
                    <th width="150">BornDate</th>
                    <th width="100">Gender</th>
                    <th width="150">Country</th>
                    <th width="150">Nationality</th>
                    <th width="150">Created AT</th>
                    <th width="150">Updated AT</th>
                    <th width="200">OPTION</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($member as $key => $mem) {
                    if ($mem->is_active == 1) {
                        $act = "TRUE";
                    } else {
                        $act = "NON";
                    }if ($mem->gender == "L") {
                        $gender = "LAKI-LAKI";
                    } else if ($mem->gender == "P") {
                        $gender = "PEREMPUAN";
                    } else {
                        $gender = "OTHER";
                    }if($mem->updated_at == ""){
                        $updated = "NONE";
                    }else{
                        $updated = $mem->updated_at;
                    }
                ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $act ?></td>
                        <td><?= $mem->nik ?></td>
                        <td><?= $mem->full_name ?></td>
                        <td><?= $mem->phone ?></td>
                        <td><?= $mem->address ?></td>
                        <td><?= $mem->born_place ?></td>
                        <td><?= $mem->born_date ?></td>
                        <td><?= $gender ?></td>
                        <td><?= $mem->country ?></td>
                        <td><?= $mem->nationality ?></td>
                        <td><?= $mem->created_at ?></td>
                        <td><?= $updated ?></td>
                        <td class="option">
                            <a class="edit" href="<?= base_url("Library/member/editMember/$mem->id"); ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a onclick="return confirm('YAKIN UNTUK HAPUSS??')" class="hapus" href="<?= base_url("Library/member/deleteData/$mem->id"); ?>"><i class="fa-solid fa-trash-can"></i></a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>