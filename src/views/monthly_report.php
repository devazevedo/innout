<main class="content">
    <?php
        renderTitle('Relatório Mensal', 'Acompanhe seu saldo de horas', 'icofont-ui-calendar');
    ?>
    <div>
        <form action="#" class="mb-4" method="post">
            <div class="input-group">
                <?php if($user->is_admin){ ?>
                    <select name="user" id="user" class="form-control mr-2">
                        <option value="">Selecione o Usuário</option>
                        <?php foreach ($users as $user) { ?>
                            <?php $selectedUser = $user->id === $selectedUserId ? 'selected' : ''?> 
                            <option <?= $selectedUser ?> value="<?= $user->id ?>"><?= $user->name ?></option>
                        <?php } ?>
                    </select>
                <?php  } ?>
                <select name="period" id="period" class="form-control">
                    <?php foreach ($periods as $yearAndMonth => $month) { ?>
                        <?php $selected = $yearAndMonth === $selectedPeriod ? 'selected' : ''?> 
                        <option <?= $selected ?> value="<?= $yearAndMonth ?>"><?= $month ?></option>
                    <?php } ?>
                </select>
                <button class="btn btn-primary mx-2">
                    <i class="icofont-search"></i>
                </button>
            </div>
        </form>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <th>Dia</th>
                <th>Entrada 1</th>
                <th>Saída 1</th>
                <th>Entrada 2</th>
                <th>Saída 2</th>
                <th>Saldo</th>
            </thead>
            <tbody>
                <?php foreach($report as $registry) { ?>
                       <tr>
                            <td><?= formatDateWithLocale($registry->work_date, '%A, %d de %B de %Y') ?></td>
                            <td><?= $registry->time1 ?></td>
                            <td><?= $registry->time2 ?></td>
                            <td><?= $registry->time3 ?></td>
                            <td><?= $registry->time4 ?></td>
                            <td><?= $registry->getBalance() ?></td>
                       </tr>
                <?php } ?>
                <tr class="bg-primary text-white">
                    <td>Horas Trabalhadas</td>
                    <td colspan="3"><?= $sumOfWorkedTime ?></td>
                    <td>Saldo Mensal</td>
                    <td><?= $balance ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</main>