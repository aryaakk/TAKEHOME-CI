<div class="content">
    <div class="card-header">
        <div style="flex-grow: 20;" class="card <?= $activeLibrarian ?>">
            <button><i class="fa-solid fa-book"></i><a href="<?= base_url('Librarians') ?>">SHOWING ALL LIBRARIANS DATA</a></button>
        </div>
        <div style="flex-grow: 2;" class="card">
            <button><i class="fa-solid fa-plus"></i><a href="<?= base_url('AddLibrarians') ?>">ADD LIBRARIAN</a></button>
        </div>
    </div>
    <div class="main-table">
        <table cellspacing="0">
            <thead>
                <tr>
                    <th width="10">No</th>
                    <th width="100">AVATAR</th>
                    <th>USERNAME</th>
                    <th>EMAIL</th>
                    <th>CREATED AT</th>
                    <th>UPDATED AT</th>
                    <th width="200">OPTION</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($librarian as $key => $lib) {
                    if($lib->updated_at == ""){
                        $updated = "NONE";
                    }else{
                        $updated = $lib->updated_at;
                    }
                ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td>
                            <div class="img">
                                <img width="100" src="<?= base_url("assets/imgAvatar/$lib->avatar"); ?>" alt="">
                            </div>
                        </td>
                        <td><?= $lib->username ?></td>
                        <td><?= $lib->email ?></td>
                        <td><?= $lib->created_at ?></td>
                        <td><?= $updated ?></td>
                        <td class="option">
                            <a class="edit" href="<?= base_url("Library/librarian/editLibrarian/$lib->id"); ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a onclick="return confirm('YAKIN UNTUK HAPUSS??')" class="hapus" href="<?= base_url("Library/librarian/deleteData/$lib->id"); ?>"><i class="fa-solid fa-trash-can"></i></a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>