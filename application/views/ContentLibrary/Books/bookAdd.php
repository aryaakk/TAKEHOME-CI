<div class="content">
    <div class="card-header">
        <div style="flex-grow: 20;" class="card <?= $activeBook ?>">
            <button><i class="fa-solid fa-plus"></i><a href="<?= base_url('AddBook') ?>">ADDING BOOK DATA</a></button>
        </div>
        <div style="flex-grow: 2;" class="card">
            <button><i class="fa-solid fa-book"></i><a href="<?= base_url('Book') ?>">SHOW BOOK DATA</a></button>
        </div>
    </div>
    <div class="main-add">
        <form action="<?= base_url('AddBook') ?>" method="post" enctype="multipart/form-data">
            <div class="layer-1">
                <div class="form-grup">
                    <label for="">ISBN BOOK</label>
                    <input maxlength="20" class="inp" type="text" name="isbn" id="">
                </div>
                <div class="form-grup">
                    <label for="">TITLE BOOK</label>
                    <input class="inp" type="text" name="title" id="">
                </div>
                <div class="form-grup">
                    <label for="">AUTHOR BOOK</label>
                    <input class="inp" type="text" name="author" id="">
                </div>
                <div class="form-grup">
                    <label for="">PUBLISHER BOOK</label>
                    <input class="inp" type="text" name="publisher" id="">
                </div>
                <div class="form-grup">
                    <label for="">CATEGORY BOOK</label>
                    <input class="inp" type="text" name="category" id="">
                </div>
                <div class="form-grup">
                    <label for="">LANGUAGE BOOK</label>
                    <select style="text-align: center;" name="language" class="inp" id="">
                        <option>--SELECT LANGUAGE--</option>
                        <optgroup>
                            <option value="INDONESIAN">INDONESIAN</option>
                            <option value="ENGLISH">ENGLISH</option>
                            <option value="SPANISH">SPANISH</option>
                            <option value="MALAYSIAN">MALAYSIAN </option>
                        </optgroup>
                    </select>
                </div>
            </div>
            <div class="layer-2">
                <div class="form-grup">
                    <label for="">SYNOPSIS BOOK</label>
                    <textarea style="height: auto;" class="inp" name="synopsis" id="" cols="30" rows="10"></textarea>
                </div>
                <div class="form-grup">
                    <label for="">COVER BOOK</label>
                    <input class="inp" type="file" name="cover_book" id="">
                </div>
                <div class="form-butt">
                    <input type="submit" value="SIMPAN">
                </div>
            </div>
        </form>
    </div>
</div>