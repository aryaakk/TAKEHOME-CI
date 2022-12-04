<div class="content">
    <div class="card-header">
        <div style="flex-grow: 20;" class="card <?= $activeBorBook ?>">
            <button><i class="fa-solid fa-book"></i><a href="<?= base_url('Borrowing') ?>">SHOWING ALL BOOK TRXS</a></button>
        </div>
        <div style="flex-grow: 2;" class="card">
            <button><i class="fa-solid fa-plus"></i><a href="<?= base_url('AddTrxs') ?>">ADD TRXS</a></button>
        </div>
    </div>
    <div class="trx-card">
        <div class="card">
            <a href="#">
                <span>BORROW BOOK</span>
                <i class="fa-solid fa-money-bill-transfer"></i>
            </a>
        </div>
        <div class="card">
            <a href="#">
                <span>BORROW BOOK DETAIL</span>
                <i class="fa-solid fa-money-bill-transfer"></i>
            </a>
        </div>
    </div>
    <div class="main-table">
        <table cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Trx DATE</th>
                    <th>NAME</th>
                    <th>Title Book</th>
                    <th>Type</th>
                    <th>Price</th>
                    <th>DeadlineAt</th>
                    <th width="150">OPTION</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($book_trx as $key => $book) {
                ?>
                <tr>
                    <td><?=?></td>
                    <td><?=$book->?></td>
                    <td><?=$book?></td>
                    <td><?=$book?></td>
                    <td><?=$book?></td>
                    <td><?=$book?></td>
                    <td><?=?></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>