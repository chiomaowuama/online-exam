<header>
<!-- <div class="topfix_body"> -->
    <div class="topfix">
        <div class="topfix_left">
            <div class ="imagecard">
            <img src=<?= $_SESSION["user-data"]['photo']?> alt="" class="pics">
            </div>
            <!-- <p>nationality</p> -->
        </div>
        <div class="topfix_right">
            <!-- <img src="adminimgs/side.jpg" alt="" class="pics"> -->
            <div class="names">
                <p><?= $_SESSION["user-data"]['sname']?>
                <p><?= $_SESSION["user-data"]['firstname']?>
            </div>
            <div class="genda">
                <p><?= $_SESSION["user-data"]['gender']?></p>&nbsp;&nbsp;&nbsp;
            </div>
        
        </div>
    </div>
</header>