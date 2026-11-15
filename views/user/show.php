<div class="show-container">
    <div class="container">
        <?php
        if($showUser->id == $_SESSION['userID']){ ?>
            <h1 class="h1-centered-title">Ver informações</h1>
        <?php }else{ ?>
            <h1 class="h1-centered-title">Ver User</h1>
        <?php } ?>
        <div style="margin: -20px 0 20px 0; align-content: center; align-items: center; display: flex; justify-items: center; justify-content: center">
            <div style="width: 75%; align-items: initial; justify-content: initial; align-content: initial; display: initial">
                <a href="./router.php?c=user&a=index" class="btn-styled">Voltar à Lista</a>
            </div>
        </div>
        <div class="show">
            <form>
                <div>
                    <label style="float: left">Nome</label>
                    <input readonly="true" type="text" value="<?= $showUser->username ?>" class="form-control">
                </div>
                <div>
                    <label style="float: left">Email</label>
                    <input readonly="true" type="text" value="<?= $showUser->email ?>" class="form-control">
                </div>
                <div>
                    <label style="float: left">Telefone</label>
                    <input readonly="true" type="text" value="<?= $showUser->telefone ?>" class="form-control">
                </div>
                <div>
                    <label style="float: left">Nif</label>
                    <input readonly="true" type="text" value="<?= $showUser->nif ?>" name="" class="form-control">
                </div>
                <div>
                    <label style="float: left">Morada</label>
                    <input readonly="true" type="text" value="<?= $showUser->morada ?>" name="" class="form-control">
                </div>
                <div>
                    <label style="float: left">Código Postal</label>
                    <input readonly="true" type="text" value="<?= $showUser->codpostal ?>" name="" class="form-control">
                </div>
                <div>
                    <label style="float: left">Localidade</label>
                    <input readonly="true" type="text" value="<?= $showUser->localidade ?>" name="" class="form-control">
                </div>
                <div>
                    <label style="float: left">Role</label>
                    <input readonly="true" type="text" value="<?= $showUser->role ?>" name="" class="form-control">
                </div>
            </form>
        </div>
        <?php if($showUser->id == $user->id){
            if($showUser->role != "cliente"){?>
        <div style="margin: -20px 0 20px 0; align-content: center; align-items: center; display: flex; justify-items: center; justify-content: center">
            <div style="width: 75%; align-items: initial; justify-content: initial; align-content: initial; display: initial">
                <a href="./router.php?c=user&a=edit&id=<?= $showUser->id ?>" class="btn-styled" style="margin-left: 50px">Editar informações</a>
            </div>
        </div>
        <?php }} ?>
        <?php if($showUser->role == "cliente" && $user->role == "adminstrador"){ ?>
            <hr>
            <h2 class="h2-centered-title">Faturas do user</h2>
            <div style="text-align: -webkit-center">
                <div class="row">
                    <div style="width: 75%;">
                        <table id="info-table"><thead style="align-content: center"><th><h3>Data</h3></th><th><h3>Valor Total</h3></th><th><h3>Iva Total</h3><th><h3>Estado</h3></th></thead>
                            <tbody>
                            <?php  foreach ($faturas as $fatura) {?>

                                <tr>
                                    <td><?= date_format($fatura->data, "d/m/Y") ?></td>
                                    <td><?= $fatura->valortotal . "€"?></td>
                                    <td><?= $fatura->ivatotal . "€"?></td>
                                    <?php if($fatura->estado == true){ ?>
                                        <td>Emitido</td>
                                    <?php }else{ ?>
                                        <td>Por Emitir</td>
                                    <?php } ?>
                                    <td>
                                        <?php if ($user->role != "cliente"){?>
                                            <a href="router.php?c=fatura&a=show&id=<?= $fatura->id ?>"
                                               class="btn-styled">Ver Fatura</a>
                                        <?php }?>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>