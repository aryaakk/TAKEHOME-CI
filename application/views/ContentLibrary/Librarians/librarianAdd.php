<div class="content">
    <div class="card-header">
        <div style="flex-grow: 20;" class="card <?= $activeLibrarian ?>">
            <button><i class="fa-solid fa-plus"></i><a href="<?= base_url('AddLibrarians') ?>">ADDING LIBRARIAN DATA</a></button>
        </div>
        <div style="flex-grow: 2;" class="card">
            <button><i class="fa-solid fa-book"></i><a href="<?= base_url('Librarians') ?>">SHOW LIBRARIAN</a></button>
        </div>
    </div>
    <div class="main-add">
        <form action="<?= base_url('AddLibrarians') ?>" method="post" enctype="multipart/form-data">
            <div class="layer-1">
                <div class="form-grup">
                    <label for="">USERNAME</label>
                    <input name="username" type="text" class="inp">
                </div>
                <div class="form-grup">
                    <label for="">NAME</label>
                    <input name="name" type="text" class="inp">
                </div>
                <div class="form-grup">
                    <label for="">EMAIL</label>
                    <input name="email" type="email" class="inp">
                </div>
                <div class="form-grup">
                    <label for="">PASSWORD</label>
                    <input name="password" type="password" class="inp">
                </div>
            </div>
            <div class="layer-2">
                <div class="form-grup">
                    <label for="">AVATAR</label>
                    <input name="avatar" type="file" class="inp">
                </div>
                <div class="form-butt">
                    <input type="submit" value="SIMPAN">
                </div>
            </div>
        </form>
    </div>
</div>