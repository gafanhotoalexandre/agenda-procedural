<?php
    require_once 'templates/header.php';
?>

    <?php if (isset($printMessage) && !empty($printMessage)): ?>
        <p id="msg"><?= $printMessage ?></p>
    <?php endif; ?>

    <h1 id="main-title">
        Minha Agenda
    </h1>

    <?php if (count($contacts) > 0): ?>
        <div class="table-responsive-md">
            <table id="contacts-table" class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Telefone</th>
                        <th scope="col"></th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($contacts as $contact): ?>
                        <tr>
                            <td class="col-id" scope="row"><?= $contact['id'] ?></td>
                            <td scope="row"><?= $contact['name'] ?></td>
                            <td scope="row"><?= $contact['phone'] ?></td>
                            <td class="actions">
                                <a href="<?= BASE_URL ?>show.php?id=<?= $contact['id'] ?>"><i class="fas fa-eye check-icon"></i></a>
                                <a href="<?= BASE_URL ?>edit.php?id=<?= $contact['id'] ?>"><i class="far fa-edit edit-icon"></i></a>
                                <form class="delete-form" action="<?= BASE_URL ?>config/process.php" method="POST">
                                    <input type="hidden" name="type" value="delete">
                                    <input type="hidden" name="id" value="<?= $contact['id'] ?>">
                                    <button class="delete-btn" type="submit"
                                        onclick="return window.confirm('Tem certeza?')"><i class="fas fa-times delete-icon"></i></button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <p id="empty-list-text">
            Ainda não há contatos na sua agenda,
            <a href="<?= BASE_URL ?>create.php">clique aqui para adicionar</a>.
        </p>
    <?php endif; ?>
<?php
    require_once 'templates/footer.php';
?>