<div class="show-container">
    <div class="container">
        <h1 class="h1-centered-title">Ver IVA</h1>
        <div style="margin: -20px 0 20px 0; align-content: center; align-items: center; display: flex; justify-items: center; justify-content: center">
            <div style="width: 75%; align-items: initial; justify-content: initial; align-content: initial; display: initial">
                <a href="./router.php?c=iva&a=index" class="btn-styled">Voltar à Lista</a>
            </div>
        </div>
        <div class="show">
            <form>
                <div>
                    <label style="float: left">Descrição</label>
                    <input readonly="true" type="text" value="<?= $iva->descricao ?>" name="descricao" class="form-control">
                </div>
                <div>
                    <label style="float: left">percentagem</label>
                    <input readonly="true" type="text" value="<?= $iva->percentagem . '%' ?>" name="percentagem" class="form-control">
                </div>
                <div>
                    <label style="float: left">Vigor</label>
                    <?php if($iva->vigor == 0){?>
                        <input readonly="true" value="Não está em vigor" class="form-control">
                    <?php }else{ ?>
                        <input readonly="true" value="Em Vigor" class="form-control">
                    <?php } ?>
                </div>
            </form>
        </div>
        <div style="margin: -20px 0 20px 0; align-content: center; align-items: center; display: flex; justify-items: center; justify-content: center">
            <div style="width: 75%; align-items: initial; justify-content: initial; align-content: initial; display: initial">
                <a href="./router.php?c=iva&a=edit&id=<?= $iva->id ?>" class="btn-styled">Editar IVA</a>
            </div>
        </div>
    </div>
</div>