<div class="content">
    <div class="card-header">
        <div style="flex-grow: 20;" class="card <?= $activeSubcrip ?>">
            <button><i class="fa-solid fa-plus"></i><a href="<?= base_url('AddSubcription') ?>">ADDING SUBCRIPTION DATA</a></button>
        </div>
        <div style="flex-grow: 2;" class="card">
            <button><i class="fa-solid fa-book"></i><a href="<?= base_url('Subcription') ?>">SHOW SUBCRIPTION</a></button>
        </div>
    </div>
    <div class="main-add">
        <form action="<?= base_url('AddSubcription') ?>" method="post" enctype="multipart/form-data">
            <div class="layer-1">
                <div class="form-grup">
                    <label for="">PRICE</label>
                    <input name="price" type="number" class="inp">
                </div>
                <div class="form-grup">
                    <label for="">MONTH</label>
                    <input name="month" type="text" class="inp">
                </div>
            </div>
            <div class="layer-2">
                <div class="form-grup">
                    <label for="">TITLE</label>
                    <input name="title" type="text" class="inp">
                </div>
                <div class="form-butt">
                    <input type="submit" value="SIMPAN">
                </div>
            </div>
        </form>
    </div>
</div>