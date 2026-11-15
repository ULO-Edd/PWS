<div class="show-container">
    <div class="container">
        <h1 class="h1-centered-title">Ver Fatura</h1>
        <?php if($cliente->id != $user->id){ ?>
        <div style="align-content: center; align-items: center; display: flex; justify-items: center; justify-content: center">
            <div style="width: 75%; align-items: initial; justify-content: initial; align-content: initial; display: initial">
                <a href="./router.php?c=fatura&a=index" class="btn-styled" style="margin-left: 50px">Voltar à Lista</a>
            </div>
        </div>
        <?php } ?>
        <div class="show-fatura">
            <div style="display: flex; justify-content: center; align-items: center">
                <div style="margin-top: 30px;border-style: solid;background-color: #ffffff;padding: 20px 50px 20px 50px;border-radius: 10px; width: 50%">
                    <?php if($cliente->id != $user->id){ ?>
                        <div style="text-align: -webkit-center">
                            <div style="width: 75%;">
                                <a>Estado da Fatura</a>
                                <p style="font-size: 30px; color: #0b93d5;"><b><u><?= strtoupper($fatura->estado) ?></u></b></p>
                            </div>
                        </div>
                        <hr>
                    <?php } ?>
                    <div>
                        <div style="margin-bottom: 10px">
                            <a>Empresa</a>
                        </div>
                        <div>
                            <div style="width: 100%">
                                <a>Desginação:<a style="color: #0b93d5;font-weight: bold;text-align: start;"><?= $empresa->designacao ?></a></a>
                            </div>
                            <div style="width: 100%">
                                <a>Email:<a style="color: #0b93d5;font-weight: bold;text-align: start;"><?= $empresa->email ?></a></a>
                            </div>
                            <div style="width: 100%">
                                <a>Telefone:<a style="color: #0b93d5;font-weight: bold;text-align: start;"><?= $empresa->telefone ?></a></a>
                            </div>
                            <div style="width: 100%">
                                <a>NIF:<a style="color: #0b93d5;font-weight: bold;text-align: start;"><?= $empresa->nif ?></a></a>
                            </div>
                            <div style="width: 100%">
                                <a>Morada:<a style="color: #0b93d5;font-weight: bold;text-align: start;"><?= $empresa->morada ?></a></a>
                            </div>
                            <div style="width: 100%">
                                <a>Codigo postal:<a style="color: #0b93d5;font-weight: bold;text-align: start;"><?= $empresa->codpostal ?></a></a>
                            </div>
                            <div style="width: 100%">
                                <a>Localidade:<a style="color: #0b93d5;font-weight: bold;text-align: start;"><?= $empresa->localidade ?></a></a>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div>
                        <div style="margin-bottom: 10px">
                            <a>Cliente</a>
                        </div>
                        <div>
                            <div style="width: 100%">
                                <a>Nome:<a style="color: #0b93d5;font-weight: bold;text-align: start;"><?= $cliente->username ?></a></a>
                            </div>
                            <div style="width: 100%">
                                <a>Email:<a style="color: #0b93d5;font-weight: bold;text-align: start;"><?= $cliente->email ?></a></a>
                            </div>
                            <div style="width: 100%">
                                <a>Telefone:<a style="color: #0b93d5;font-weight: bold;text-align: start;"><?= $cliente->telefone ?></a></a>
                            </div>
                            <div style="width: 100%">
                                <a>NIF:<a style="color: #0b93d5;font-weight: bold;text-align: start;"><?= $cliente->nif ?></a></a>
                            </div>
                            <div style="width: 100%">
                                <a>Morada:<a style="color: #0b93d5;font-weight: bold;text-align: start;"><?= $cliente->morada ?></a></a>
                            </div>
                            <div style="width: 100%">
                                <a>Codigo postal:<a style="color: #0b93d5;font-weight: bold;text-align: start;"><?= $cliente->codpostal ?></a></a>
                            </div>
                            <div style="width: 100%">
                                <a>Localidade:<a style="color: #0b93d5;font-weight: bold;text-align: start;"><?= $cliente->localidade ?></a></a>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div>
                        <div style="margin-bottom: 10px">
                            <a>Linhas de Fatura</a>
                        </div>
                        <?php if($linhasFatura == null){ ?>
                            <a style="color: #0b93d5;font-weight: bold;text-align: start;">NÂO PUSSUI QUAISQUER LINHAS FATURA</a>
                        <?php }else{ ?>
                            <div style="text-align: -webkit-center">
                                <div class="row">
                                    <div>
                                        <table id="info-table"><thead style="align-content: center"><th><h3>Produto</h3></th><th><h3>Quantidade</h3></th><th><h3>Valor p/ unidade</h3><th><h3>valor iva</h3></th></thead>
                                            <tbody>
                                            <?php  foreach ($linhasFatura as $linha) {
                                                $linhaPodutoID = $linha->produto_id;
                                                $produto = Produto::find_by_id($linhaPodutoID);
                                                ?>
                                                <tr>
                                                    <td><?= $produto->descricao . '     ( ' . $produto->referencia . ' )' ?></td>
                                                    <td><?= $linha->quantidade?></td>
                                                    <td><?= $linha->valoruni . ' €'?></td>
                                                    <td><?= $linha->valoriva . ' €'?></td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                        <?php if($fatura->estado == 'emitido'){ ?>
                                                <hr>
                                            <div style="display: flex; margin-top: 5px; justify-content: space-between">
                                                <a style="font-size: 18px">Total sem IVA: <?= $fatura->valortotal - $fatura->ivatotal .'€'?></a>
                                                <a style="font-size: 18px">Total IVA: <?= $fatura->ivatotal .'€'?></a>
                                                <a style="font-size: 18px">Total : <?= $fatura->valortotal .'€'?></a>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if($fatura->estado == 'por emitir'){ ?>
                        <div style="align-content: start; align-items: start; display: flex; justify-items: start; justify-content: start; margin-top: 10px">
                            <a href="./router.php?c=fatura&a=edit&id=<?= $fatura->id ?>" class="btn-styled" style="z-index: 1">Adicionar Linha</a>
                        </div>
                        <?php } ?>
                    </div>
                    <hr>
                    <div>
                        <div>
                            <br>
                            <div style="width: 100%">
                                <a>Emitido por:<a style="color: #0b93d5;font-weight: bold;text-align: start;"><?= $funcionario->username ?></a></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>