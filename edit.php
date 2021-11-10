<?php
    require_once 'templates/header.php';
?>

    <?php
        require_once 'templates/backbtn.php';
    ?>

    <h1 id="main-title">Editar Contato</h1>
    
    <form id="edit-form" action="<?= BASE_URL ?>config/process.php" method="POST">
        <input type="hidden" name="type" value="edit">
        <input type="hidden" name="id" value="<?= $contact['id'] ?>">
        <div class="form-group">
            <label for="name">Nome do Contato:</label>
            <input type="text" class="form-control" name="name" id="name"
                placeholder="Digite o nome" value="<?= $contact['name'] ?>" required>
        </div>

        <div class="form-group">
            <label for="phone">Telefone do Contato:</label>
            <input type="text" class="form-control" name="phone" id="phone"
                placeholder="Digite o telefone" value="<?= $contact['phone'] ?>" required>
        </div>

        <div class="form-group">
            <label for="observations">Observações:</label>
            <textarea class="form-control" name="observations"
                id="observations" rows="4" placeholder="Insira as observações"
                    ><?= $contact['observations'] ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>

<?php
    require_once 'config/js_mask.php';
    require_once 'templates/footer.php';
?>