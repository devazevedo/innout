<main class="content">
    <?php
        renderTitle('Cadastro de Colaboradores', 'Acompanhe os dados de seus colaboradores', 'icofont-users');

        include(TEMPLATE_PATH ."/messages.php");
    ?>
    <a class="btn btn-lg btn-primary" href="../controllers/save_user.php">Novo Usuário</a>
    <table class="table table-bordered table-sriped table-hover mt-4">
        <thead>
            <th>Nome</th>
            <th>Email</th>
            <th>Data de Admissão</th>
            <th>Data de Desligamento</th>
            <th>Ações</th>
        </thead>
        <tbody>
            <?php foreach ($users as $user) { ?>
                <tr>
                    <td><?= $user->name ?></td>
                    <td><?= $user->email ?></td>
                    <td><?= $user->start_date ?></td>
                    <td><?= $user->end_date ?></td>
                    <td>
                        <a href="../controllers/save_user.php?update=<?=$user->id?>" class="btn btn-warning rounded-circle mr-2" title="Editar">
                            <i class="icofont-edit"></i>
                        </a>
                        <a href="?delete=<?=$user->id?>" class="btn btn-danger rounded-circle" title="Excluir">
                            <i class="icofont-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</main>