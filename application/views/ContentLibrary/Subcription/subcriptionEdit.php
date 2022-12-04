<div class="content">
    <div class="card-header">
        <div style="flex-grow: 20;" class="card <?= $activeSubcrip ?>">
            <button><i class="fa-solid fa-plus"></i><a href="<?= base_url("Library/subcription/editSubcription/$subs->id") ?>">EDIT SUBCRIPTION DATA</a></button>
        </div>
        <div style="flex-grow: 2;" class="card">
            <button><i class="fa-solid fa-book"></i><a href="<?= base_url('Subcription') ?>">SHOW SUBCRIPTION</a></button>
        </div>
    </div>
    <div class="main-add">
        <form action="<?= base_url("Library/subcription/editSubcription/$subs->id") ?>" method="post" enctype="multipart/form-data">
            <div class="layer-1">
                <div class="form-grup">
                    <label for="">PRICE</label>
                    <input value="<?= $subs->id ?>" name="id" type="hidden" class="inp">
                    <input value="<?= $subs->price ?>" name="price" type="number" class="inp">
                </div>
                <div class="form-grup">
                    <label for="">MONTH</label>
                    <input value="<?= $subs->month ?>" name="month" type="text" class="inp">
                </div>
                <div class="form-grup">
                    <label for="">TITLE</label>
                    <input value="<?= $subs->title ?>" name="title" type="text" class="inp">
                </div>
                <div class="form-grup">
                    <label for="">IS ACTIVED</label>
                    <select class="inp" name="is_active" id="">
                        <?php
                        if ($subs->is_active == 1) {
                            $act = "ACTIVE";
                        } else {
                            $act = "NON ACTIVE";
                        }
                        ?>
                        <option selected value="<?= $subs->is_active ?>"><?= $act?></option>
                        <optgroup>
                            <option value="1">ACTIVE</option>
                            <option value="0">NON ACTIVE</option>
                        </optgroup>
                    </select>
                </div>
            </div>
            <div class="layer-2">
                <div class="form-butt">
                    <input type="submit" value="SIMPAN">
                </div>
            </div>
        </form>
    </div>
</div>