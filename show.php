<?php
    require_once 'templates/header.php';
?>

    <div class="container" id="view-contact-container">
        <?php
            require_once 'templates/backbtn.php';
        ?>
        <h1 id="main-title"><?= $contact['name'] ?></h1>
        <p class="font-weight-bold">Telefone:</p>
        <p><?= $contact['phone'] ?></p>
        <p class="font-weight-bold">Observações:</p>
        <p><?= $contact['observations'] ?></p>
    </div>

<?php
    require_once 'templates//footer.php';
?>