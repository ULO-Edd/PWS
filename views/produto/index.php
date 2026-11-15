<div class="body-index">
    <div class="container">
        <div>
            <h1 class="h1-centered-title">Produtos</h1>
        </div>

        <div style="margin: -20px 0 20px 0; align-content: center; align-items: center; display: flex; justify-items: center; justify-content: center">
            <div style="width: 75%; align-items: initial; justify-content: initial; align-content: initial; display: initial">
                <a href="./router.php?c=mainView&a=index" class="btn-styled">Voltar ao Menu Principal</a>
            </div>
        </div>
        <div style="text-align: -webkit-center">
            <div class="row">
                <div style="width: 75%;">
                    <table id="info-table"><thead style="align-content: center"><th><h3>Referência</h3></th><th><h3>Descrição</h3></th><th><h3>Preço</h3><th><h3>Stock</h3></th></thead>
                        <tbody>
                        <?php  foreach ($produtos as $produto) {?>

                            <tr>
                                <td><?= $produto->referencia?></td>
                                <td><?= $produto->descricao?></td>
                                <td><?= $produto->preco . " €"?></td>
                                <td><?= $produto->stock?></td>
                                <td>
                                    <a href="router.php?c=produto&a=show&id=<?= $produto->id ?>"
                                       class="btn-styled">Ver Produto</a>
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
                <a href="./router.php?c=produto&a=create" class="btn-styled">Criar Produto</a>
            </div>
        </div>
    </div>
</div>