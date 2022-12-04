<div class="content">
    <div class="card-header">
        <div style="flex-grow: 20;" class="card <?= $activeMembers ?>">
            <button><i class="fa-solid fa-plus"></i><a href="<?= base_url("Library/member/editMember/$member->id") ?>">EDIT MEMBERS DATA</a></button>
        </div>
        <div style="flex-grow: 2;" class="card">
            <button><i class="fa-solid fa-book"></i><a href="<?= base_url('Members') ?>">SHOW MEMBERS</a></button>
        </div>
    </div>
    <div class="main-add">
        <form action="<?= base_url("Library/member/editMember/$member->id") ?>" method="post" enctype="multipart/form-data">
            <div class="layer-1">
                <div class="form-grup">
                    <label for="">NIK</label>
                    <input maxlength="15" class="inp" type="hidden" value="<?= $member->id ?>" name="id" id="">
                    <input maxlength="15" class="inp" type="number" value="<?= $member->nik ?>" name="nik" id="">
                </div>
                <div class="form-grup">
                    <label for="">FULL NAME</label>
                    <input class="inp" type="text" value="<?= $member->full_name ?>" name="full_name" id="">
                </div>
                <div class="form-grup">
                    <label for="">PHONE</label>
                    <input class="inp" type="number" value="<?= $member->phone ?>" name="phone" id="">
                </div>
                <div class="form-grup">
                    <label for="">BORN PLACE</label>
                    <input class="inp" type="text" value="<?= $member->born_place ?>" name="born_place" id="">
                </div>
                <div class="form-grup">
                    <label for="">BORN DATE</label>
                    <input class="inp" type="date" value="<?= $member->born_date ?>" name="born_date" id="">
                </div>
                <div class="form-grup">
                    <label for="">IS ACTIVE</label>
                    <select name="is_active" class="inp" id="">
                        <?php
                        if ($member->is_active == 1) {
                            $act = "ACTIVE";
                        } else {
                            $act = "NON ACTIVE";
                        }
                        ?>
                        <option selected value="<?= $member->is_active ?>"><?= $act ?></option>
                        <optgroup>
                            <option value="1">ACTIVE</option>
                            <option value="0">NON ACTIVE</option>
                        </optgroup>
                    </select>
                </div>
                <div class="form-grup">
                    <label for="">NATIONALITY</label>
                    <select style="text-align: center;" name="nationality" class="inp" id="">
                        <option value="<?= $member->nationality ?>" selected><?= $member->nationality ?></option>
                        <optgroup>
                            <option>--SELECT NATIONALITY--</option>
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
                        <?php
                        if ($member->gender == "L") {
                            $gen = "LAKI-LAKI";
                        } else if ($member->gender == "P") {
                            $gen = "PEREMPUAN";
                        } else {
                            $gen = "OTHER";
                        }
                        ?>
                        <option value="<?= $member->gender ?>" selected><?= $gen ?></option>
                        <optgroup>
                            <option>--SELECT GENDER--</option>
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
                    <label for="">COUNTRY</label>
                    <input class="inp" type="text" value="<?= $member->country?>" name="country" id="">
                </div>
                <div class="form-grup">
                    <label for="">ADDRESS</label>
                    <textarea style="height: auto;" class="inp" name="address" id="" cols="30" rows="5"><?= $member->address?></textarea>
                </div>
                <div class="form-butt">
                    <input type="submit" value="SIMPAN">
                </div>
            </div>
        </form>
    </div>
</div>