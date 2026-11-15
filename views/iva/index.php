<div class="body-index">
    <div class="container">
        <div>
            <h1 class="h1-centered-title">IVAs</h1>
        </div>
        <div style="margin: -20px 0 20px 0; align-content: center; align-items: center; display: flex; justify-items: center; justify-content: center">
            <div style="width: 75%; align-items: initial; justify-content: initial; align-content: initial; display: initial">
                <a href="./router.php?c=mainView&a=index" class="btn-styled">Voltar ao Menu Principal</a>
            </div>
        </div>
        <div style="text-align: -webkit-center">
            <div class="row">
                <div style="width: 75%;">
                    <table id="info-table"><thead style="align-content: center"><th><h3>Descrição</h3></th><th><h3>Percentagem</h3></th><th><h3>Vigor</h3></thead>
                        <tbody>
                        <?php  foreach ($ivas as $iva) {?>

                            <tr>
                                <td><?= $iva->descricao?></td>
                                <td><?= $iva->percentagem . " %"?></td>
                                <?php if($iva->vigor == true){ ?>
                                    <td>Em vigor</td>
                                <?php }else{ ?>
                                    <td>Não está em vigor</td>
                                <?php } ?>
                                <td>
                                    <a href="router.php?c=iva&a=show&id=<?= $iva->id ?>"
                                       class="btn-styled">Ver IVA</a>
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
                <a href="./router.php?c=iva&a=create" class="btn-styled">Criar IVA</a>
            </div>
        </div>
    </div>
</div>