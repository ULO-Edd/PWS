<div class="body-index">
    <div class="container">
        <div>
            <h1 class="h1-centered-title">Users</h1>
        </div>
        <div style="margin: -20px 0 20px 0; align-content: center; align-items: center; display: flex; justify-items: center; justify-content: center">
            <div style="width: 75%; align-items: initial; justify-content: initial; align-content: initial; display: initial">
                <a href="./router.php?c=mainView&a=index" class="btn-styled">Voltar ao Menu Principal</a>
            </div>
        </div>
        <div style="text-align: -webkit-center">
            <div class="row">
                <div style="width: 75%;">
                    <table id="info-table"><thead style="align-content: center"><th><h3>Nome</h3></th><th><h3>Email</h3></th><th><h3>Localidade</h3><th><h3>Role</h3></th></thead>
                        <tbody>
                        <?php  foreach ($users as $user) {?>

                            <tr>
                                <td><?= $user->username?></td>
                                <td><?= $user->email?></td>
                                <td><?= $user->localidade?></td>
                                <td><?= $user->role?></td>
                                <td>
                                    <a href="router.php?c=user&a=show&id=<?= $user->id ?>"
                                       class="btn-styled">Ver User</a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div style="margin: -20px 0 20px 0; align-content: center; align-items: center; display: flex; justify-items: center; justify-content: center">
            <div style="margin-top: 45px;width: 75%; align-items: initial; justify-content: initial; align-content: initial; display: initial">
                <a href="./router.php?c=user&a=register" class="btn-styled">Registar User</a>
            </div>
        </div>
    </div>
</div>