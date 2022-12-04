<div class="content">
    <div class="card-header">
        <div style="flex-grow: 20;" class="card <?= $activeLibrarian ?>">
            <button><i class="fa-solid fa-plus"></i><a href="<?= base_url("Library/librarian/editLibrarian/$lib->id") ?>">EDIT LIBRARIAN DATA</a></button>
        </div>
        <div style="flex-grow: 2;" class="card">
            <button><i class="fa-solid fa-book"></i><a href="<?= base_url('Librarians') ?>">SHOW LIBRARIAN</a></button>
        </div>
    </div>
    <div class="main-add">
        <form action="<?= base_url("Library/librarian/editLibrarian") ?>" method="post" enctype="multipart/form-data">
            <div class="layer-1">
                <div class="form-grup">
                    <label for="">USERNAME</label>
                    <input name="id" type="hidden" class="inp" value="<?= $lib->id ?>">
                    <input name="username" type="text" class="inp" value="<?= $lib->username ?>">
                </div>
                <div class="form-grup">
                    <label for="">NAME</label>
                    <input name="name" type="text" class="inp" value="<?= $lib->name ?>">
                </div>
                <div class="form-grup">
                    <label for="">EMAIL</label>
                    <input name="email" type="email" class="inp" value="<?= $lib->email ?>">
                </div>
                <div class="form-grup">
                    <label for="">PASSWORD</label>
                    <input name="password" type="text" class="inp" value="<?= $lib->password ?>">
                </div>
            </div>
            <div class="layer-2">
                <div class="form-grup">
                    <label for="">AVATAR</label>
                    <div class="img">
                        <img src="<?= base_url("/assets/imgAvatar/$lib->avatar") ?>" alt="">
                        <p>ALERT : ABAIKAN JIKA TIDAK INGIN DIRUBAH</p>
                    </div>
                    <input name="avatar" type="file" class="inp">
                </div>
                <div class="form-butt">
                    <input type="submit" value="SIMPAN">
                </div>
            </div>
        </form>
    </div>
</div>