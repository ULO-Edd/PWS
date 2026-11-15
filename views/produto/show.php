<div class="show-container">
    <div class="container">
        <h1 class="h1-centered-title">Ver produto</h1>
        <div style="margin: -20px 0 20px 0; align-content: center; align-items: center; display: flex; justify-items: center; justify-content: center">
            <div style="width: 75%; align-items: initial; justify-content: initial; align-content: initial; display: initial">
                <a href="./router.php?c=produto&a=index" class="btn-styled">Voltar à Lista</a>
            </div>
        </div>
        <div class="show">
            <form>
                <div>
                    <label style="float: left">Referencia</label>
                    <input readonly="true" type="text" name="referencia" value="<?= $produto->referencia ?>" class="form-control">
                </div>
                <div>
                    <label style="float: left">Descricao</label>
                    <input readonly="true" type="text" name="descricao" value="<?= $produto->descricao ?>" class="form-control">
                </div>
                <div>
                    <label style="float: left">Preco</label>
                    <input readonly="true" type="text" step="0.01" name="preco" value="<?= $produto->preco . ' €' ?>" class="form-control">
                </div>
                <div>
                    <label style="float: left">Stock</label>
                    <input readonly="true" type="text" name="stock" value="<?= $produto->stock ?>" class="form-control">
                </div>
                <div>
                    <label style="float: left">IVA</label>
                    <?php $produtoIva = Iva::find_by_id($produto->iva_id) ?>
                    <input readonly="true" type="text" name="iva_id" value="<?= $produtoIva->descricao . ' ( ' . $produtoIva->percentagem .' % )' ?>">
                </div>

            </form>
        </div>
        <div style="margin: -20px 0 20px 0; align-content: center; align-items: center; display: flex; justify-items: center; justify-content: center">
            <div style="width: 75%; align-items: initial; justify-content: initial; align-content: initial; display: initial">
                <a href="./router.php?c=produto&a=edit&id=<?= $produto->id ?>" class="btn-styled">Editar Produto</a>
            </div>
        </div>
    </div>
</div>