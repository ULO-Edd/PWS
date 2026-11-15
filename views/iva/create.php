<div class="body-create">
        <div class = "container">
            <h1 class="h1-centered-title">Criar IVA</h1>
            <div style="margin: -20px 0 20px 0; align-content: center; align-items: center; display: flex; justify-items: center; justify-content: center">
                <div style="width: 75%; align-items: initial; justify-content: initial; align-content: initial; display: initial">
                    <a href="./router.php?c=iva&a=index" class="btn-styled">Voltar à Lista</a>
                </div>
            </div>
            <div>
                <div class="create-form">
                    <form method="post" action="./router.php?c=iva&a=store">
                        <div>
                            <label style="float: left">Descrição</label>
                            <?php if(isset($iva->errors)){
                                if (is_array($iva->errors->on('descricao'))) {
                                    foreach ($iva->errors->on('descricao') as $error) {?>
                                        <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $error . '<br>'?></a>
                                    <?php }} else { ?>
                                    <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $iva->errors->on('descricao');?></a>
                                <?php }} ?>
                            <input type="text" name="descricao" class="form-control">
                        </div>
                        <div>
                            <label style="float: left">percentagem</label>
                            <?php if(isset($iva->errors)){
                                if (is_array($iva->errors->on('percentagem'))) {
                                    foreach ($iva->errors->on('percentagem') as $error) {?>
                                        <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $error . '<br>'?></a>
                                    <?php }} else { ?>
                                    <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $iva->errors->on('percentagem');?></a>
                                <?php }} ?>
                            <input type="number" name="percentagem" class="form-control">
                        </div>
                        <div>
                            <label style="float: left">Vigor</label>
                            <input readonly="true" value="Não está em vigor" class="form-control">
                        </div>
                        <div style="justify-content: center; align-items: center; display: flex">
                            <input type="submit" value="Criar">
                        </div>
                    </form>
                </div>
            </div>

    </div>
</div>