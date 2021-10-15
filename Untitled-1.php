<?php
                if(isset($_SESSION['error'])):  ?>
                <div class="alert alert-danger">
                    <?php #print $_SESSION['error']; ?> <!-- php-ba html-->
                    <!<?=$SESSION['error']?> ><!-- gyors kiiratas-->
                </div>
            <?php
                if(isset($_SESSION['error'])):  ?>
                <div class="alert alert-success">
                    <?php #print $_SESSION['error']; ?> <!-- php-ba html-->
                    <!<?=$SESSION['error']?> ><!-- gyors kiiratas-->
                </div>
            ?>