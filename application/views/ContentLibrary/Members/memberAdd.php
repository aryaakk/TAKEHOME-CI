<div class="content">
    <div class="card-header">
        <div style="flex-grow: 20;" class="card <?= $activeMembers ?>">
            <button><i class="fa-solid fa-plus"></i><a href="<?= base_url('AddMembers') ?>">ADDING MEMBERS DATA</a></button>
        </div>
        <div style="flex-grow: 2;" class="card">
            <button><i class="fa-solid fa-book"></i><a href="<?= base_url('Members') ?>">SHOW MEMBERS</a></button>
        </div>
    </div>
    <div class="main-add">
        <form action="<?= base_url('AddMembers') ?>" method="post" enctype="multipart/form-data">
            <div class="layer-1">
                <div class="form-grup">
                    <label for="">NIK</label>
                    <input maxlength="15" class="inp" type="number" name="nik" id="">
                </div>
                <div class="form-grup">
                    <label for="">FULL NAME</label>
                    <input class="inp" type="text" name="full_name" id="">
                </div>
                <div class="form-grup">
                    <label for="">PHONE</label>
                    <input class="inp" type="number" name="phone" id="">
                </div>
                <div class="form-grup">
                    <label for="">BORN PLACE</label>
                    <input class="inp" type="text" name="born_place" id="">
                </div>
                <div class="form-grup">
                    <label for="">BORN DATE</label>
                    <input class="inp" type="date" name="born_date" id="">
                </div>
                <!-- <div class="form-grup">
                    <label for="">IS ACTIVE</label>
                    <select name="isactive" class="inp" id="">
                        <option value="1" selected>ACTIVE</option>
                        <option value="0">NON ACTIVE</option>
                    </select>
                </div> -->
                <div class="form-grup">
                    <label for="">COUNTRY</label>
                    <input class="inp" type="text" name="country" id="">
                </div>
                <div class="form-grup">
                    <label for="">NATIONALITY</label>
                    <select style="text-align: center;" name="nationality" class="inp" id="">
                        <option>--SELECT NATIONALITY--</option>
                        <optgroup>
                            <?php
                            foreach ($nation as $nat) {
                            ?>
                                <option value="<?= $nat ?>"><?= $nat ?></option>
                            <?php
                            }
                            ?>
                        </optgroup>
                    </select>
                </div>
                <div class="form-grup">
                    <label for="">GENDER</label>
                    <select style="text-align: center;" name="gender" class="inp" id="">
                        <option>--SELECT GENDER--</option>
                        <optgroup>
                            <?php
                            foreach ($gender as $gen) {
                                if ($gen == "L") {
                                    $gender = "LAKI-LAKI";
                                } else if ($gen == "P") {
                                    $gender = "PEREMPUAN";
                                } else {
                                    $gender = "OTHER";
                                }
                            ?>
                                <option value="<?= $gen ?>"><?= $gender ?></option>
                            <?php
                            }
                            ?>
                        </optgroup>
                    </select>
                </div>
            </div>
            <div class="layer-2">
                <div class="form-grup">
                    <label for="">ADDRESS</label>
                    <textarea style="height: auto;" class="inp" name="address" id="" cols="30" rows="5"></textarea>
                </div>
                <div class="form-butt">
                    <input type="submit" value="SIMPAN">
                </div>
            </div>
        </form>
    </div>
</div>