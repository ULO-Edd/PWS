<div class="body-index">
    <div class="container">
        <div>
            <?php
            if ($user->role == "cliente"){?>
                <h1 class="h1-centered-title">As suas Faturas</h1>
            <?php }else{ ?>
                <h1 class="h1-centered-title">Faturas</h1>
            <?php } ?>
        </div>
        <?php if ($user->role != "cliente"){?>
        <div style="margin: -20px 0 20px 0; align-content: center; align-items: center; display: flex; justify-items: center; justify-content: center">
            <div style="width: 75%; align-items: initial; justify-content: initial; align-content: initial; display: initial">
                    <a href="./router.php?c=mainView&a=index" class="btn-styled">Voltar ao Menu Principal</a>
            </div>
        </div>
        <div style="margin: -20px 0 20px 0; align-content: center; align-items: center; display: flex; justify-items: center; justify-content: center">
            <div style="width: 75%; align-items: initial; justify-content: initial; align-content: initial; display: initial">
                <form method="post" action="./router.php?c=fatura&a=index">
                <div style="margin-top: 25px">
                 <label>Filtrar</label>
                </div>
                <div style="width: 25%; display: flex; justify-items: center">
                    <select name="filter" id="filter-faturas">
                        <option value="">Todas</option>
                        <option value="emitidas">Emitidas</option>
                        <option value="por emitir">Por emitir</option>
                        <option value="anuladas">Anuladas</option>
                    </select>
                    <div>
                        <input style="margin-left: 10px" type="submit" value="Filtrar">
                    </div>
                </div>
                </form>
            </div>
        </div>
        <?php } ?>
        <?php if($faturas != null){ ?>
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
                                <td><?= $fatura->estado ?></td>
                                <td>
                                    <?php if ($user->role != "cliente"){?>
                                        <a href="router.php?c=fatura&a=show&id=<?= $fatura->id ?>"
                                           class="btn-styled">Ver Fatura</a>
                                    <?php } else { ?>
                                        <a target="_blank" href="router.php?c=fatura&a=show&id=<?= $fatura->id ?>"
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
        <?php }else{ ?>
        <div style="text-align: -webkit-center">
            <div class="row">
                <div style="width: 75%;">
                    <p style="font-size: 20px"><b>NÂO EXISTE FATURAS</b></p>
                    <img style="width: 50px" src="./public/img/Thinking.png">
                </div>
            </div>
        </div>
        <?php } ?>
        <div style="margin: -20px 0 20px 0; align-content: center; align-items: center; display: flex; justify-items: center; justify-content: center">
            <div style="margin-top: 45px;width: 75%; align-items: initial; justify-content: initial; align-content: initial; display: initial">
                <?php if ($user->role != "cliente"){?>
                    <a href="./router.php?c=fatura&a=getuser" class="btn-styled">Criar Fatura</a>
                <?php } ?>
            </div>
        </div>
    </div>
</div>