<?php
function getLoggedUser() { ?>
    <!-- Recebe dados do Usuario logado -->
    <div class="logged">
        <a href="#" class="name-user"><i class="fas fa-user-circle"></i> <?php echo $_SESSION['NOME'] ?></a>
        <a href="index.php"><i class="fas fa-sign-out-alt"></i></a>
    </div>
<?php } ?>

