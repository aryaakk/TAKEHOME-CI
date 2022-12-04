<main>
    <div class="wrapper">
        <div class="header">
            <span>LOGINNN USERR</span>
        </div>
        <form action="<?= base_url('PostLogin')?>" method="post" enctype="multipart/form-data">
            <div class="form-grup"> 
                <div class="form-inp">
                    <input type="email" name="email" id="" placeholder="Enter Email">
                </div>
            </div>
            <div class="form-grup"> 
                <div class="form-inp">
                    <input type="password" name="password" id="" placeholder="Enter Password">
                </div>
            </div>
            <div class="form-butt">
                <input type="submit" value="SIGN IN">
            </div>
        </form>
    </div>
</main>
</body>

</html>