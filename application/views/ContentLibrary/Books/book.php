<div class="content">
    <div class="card-header">
        <div style="flex-grow: 20;" class="card <?= $activeBook ?>">
            <button><i class="fa-solid fa-book"></i><a href="<?= base_url('Book') ?>">SHOWING ALL BOOK DATA</a></button>
        </div>
        <div style="flex-grow: 2;" class="card">
            <button><i class="fa-solid fa-plus"></i><a href="<?= base_url('AddBook') ?>">ADD BOOK</a></button>
        </div>
    </div>
    <div class="main-table">
        <table cellspacing="0">
            <thead>
                <tr>
                    <th width="10">No</th>
                    <th width="100">Cover</th>
                    <th width="150">ISBN</th>
                    <th width="200">Title</th>
                    <th cellpadding="2" width="150">Author</th>
                    <th width="100">Category</th>
                    <th width="100">Languange</th>
                    <th width="150">OPTION</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($ShowBook as $key => $book) {
                ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td>
                            <div class="img">
                                <img width="100" src="<?= base_url("assets/imgCover/$book->cover_book") ?>" alt="">
                            </div>
                        </td>
                        <td><?= $book->isbn ?></td>
                        <td><?= $book->title ?></td>
                        <td><?= $book->author ?></td>
                        <td><?= $book->category ?></td>
                        <td><?= $book->language ?></td>
                        <td class="option">
                            <a class="edit" href="<?= base_url("Library/book/editDirect/$book->id");?>"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a onclick="return confirm('YAKIN UNTUK HAPUSS??')" class="hapus" href="<?= base_url("Library/book/deleteData/$book->id");?>"><i class="fa-solid fa-trash-can"></i></a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>