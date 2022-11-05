<header>
            <!-- <div class="topfix_body"> -->
                <div class="topfix">
                    <div class="topfix_left">
                        <i class="fa-solid fa-moon"></i>
                        <p>nationality</p>
                    </div>
                    <div class="topfix_right">
                        <!-- <img src="adminimgs/side.jpg" alt="" class="pics"> -->
                        <div class ="imagecard">
                        <img src=<?= $_SESSION["admin"]['photo']?> alt="" class="pics">
                        </div>
                        <p><?= $_SESSION["admin"]['gender']?></p>&nbsp;&nbsp;&nbsp;
                        <p><?= $_SESSION["admin"]['sname']?>
                    
                    </div>
                </div>
            </header>