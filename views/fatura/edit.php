<div class="show-container">
    <div class="container">
        <h1 class="h1-centered-title">Editar Fatura</h1>
        <div style="align-content: center; align-items: center; display: flex; justify-items: center; justify-content: center">
            <div style="width: 75%; align-items: initial; justify-content: initial; align-content: initial; display: initial">
                <a href="./router.php?c=fatura&a=index" class="btn-styled" style="margin-left: 50px">Voltar ào Lista</a>
            </div>
        </div>
        <div class="show-fatura">
            <div style="display: flex; justify-content: center; align-items: center">
                <div style="margin-top: 30px;border-style: solid;background-color: #ffffff;padding: 20px 50px 20px 50px;border-radius: 10px; width: 50%">
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
                        <form method="post" action="./router.php?c=linhaFatura&a=store&id=<?= $fatura->id ?>">
                            <div style="display:flex;">
                                <div>
                                    <a>Produto</a>
                                    <?php if(!isset($produto)){ ?>
                                        <?php if(isset($linhaFatura->errors)){ ?>
                                            <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $linhaFatura->errors->on('produto_id');?></a>
                                        <?php } ?>
                                        <input type="text" name="produto_id" class="form-control">
                                    <?php }else{ ?>
                                        <?php if(isset($linhaFatura->errors)){ ?>
                                                <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $linhaFatura->errors->on('produto_id');?></a>
                                            <?php } ?>
                                        <input type="text" name="produto_id" value="<?= $produto->referencia ?>" class="form-control">
                                    <?php } ?>
                                    <a style="margin-left: 0; z-index: 1" href="./router.php?c=fatura&a=getproduct&fatura_id=<?= $fatura->id ?>" class="btn-styled">Pesquisar Produto</a>
                                </div>
                                <div>
                                    <a>Quantidade</a>
                                    <?php if(isset($linhaFatura->errors)){
                                        if (is_array($linhaFatura->errors->on('quantidade'))) {
                                            foreach ($linhaFatura->errors->on('quantidade') as $error) {?>
                                                <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $error . '<br>'?></a>
                                            <?php }} else { ?>
                                            <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $linhaFatura->errors->on('quantidade');?></a>
                                        <?php }} ?>
                                    <input type="number" name="quantidade" class="form-control">
                                </div>
                            </div>
                            <div style="justify-content: center; align-items: center; display: flex; margin-bottom: 20px">
                                <input type="submit" value="Adicionar">
                            </div>
                        </form>
                        <?php if($linhasFatura != null){ ?>
                            <div style="text-align: -webkit-center; margin-bottom: 30px">
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
                                    </div>
                                </div>
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
            <div style="justify-content: center; align-items: center; justify-items: center; align-content: center">
                <div style="margin-top: 30px; display: flex; justify-content: center; align-items: center;">
                    <form method="post" action="./router.php?c=fatura&a=update&id=<?= $fatura->id ?>">
                        <div>
                            <label>Estado</label>
                        </div>
                        <div style="justify-items: center">
                            <select name="estado" id="estado-fatura">
                                <?php if($fatura->estado == "por emitir" && $linhasFatura == null){ ?>
                                <option value="por emitir">Por emitir</option>
                                <option value="anular">Anular</option>
                                <?php }else if ($fatura->estado == "por emitir"){ ?>
                                    <option value="por emitir">Por emitir</option>
                                    <option value="emitir">Emitir</option>
                                    <option value="anular">Anular</option>
                                <?php }else if ($fatura->estado == "anulado"){ ?>
                                <option value="anular">Anular</option>
                                <option value="por emitir">Por emitir</option>
                                <?php } ?>
                            </select>
                            <div style=" display: flex; justify-content: center; align-items: center;">
                                <input type="submit" value="Editar">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>