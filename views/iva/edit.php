<div class="edit-container">
    <div class="container">
        <h1 class="h1-centered-title">Editar IVA</h1>
        <div style="margin: -20px 0 20px 0; align-content: center; align-items: center; display: flex; justify-items: center; justify-content: center">
            <div style="width: 75%; align-items: initial; justify-content: initial; align-content: initial; display: initial">
                <a href="./router.php?c=iva&a=update&id=<?= $iva->id ?>" class="btn-styled">Voltar Atras</a>
            </div>
        </div>
        <div class="edit">
            <form method="post" action="./router.php?c=iva&a=update&id=<?= $iva->id ?>">
                <div>
                    <label style="float: left">Descrição</label>
                    <?php if(isset($iva->errors)){
                        if (is_array($iva->errors->on('descricao'))) {
                            foreach ($iva->errors->on('descricao') as $error) {?>
                                <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $error . '<br>'?></a>
                            <?php }} else { ?>
                            <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $iva->errors->on('descricao');?></a>
                        <?php }} ?>
                    <input type="text" value="<?= $iva->descricao ?>" name="descricao" class="form-control">
                </div>
                <div>
                    <label style="float: left">Percentagem</label>
                    <?php if(isset($iva->errors)){
                        if (is_array($iva->errors->on('percentagem'))) {
                            foreach ($iva->errors->on('percentagem') as $error) {?>
                                <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $error . '<br>'?></a>
                            <?php }} else { ?>
                            <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $iva->errors->on('percentagem');?></a>
                        <?php }} ?>
                    <input type="number" value="<?= $iva->percentagem ?>" name="percentagem" class="form-control">
                </div>
                <div>
                    <select name="vigor" id="vigor">
                        <?php if($iva->vigor == 0){ ?>
                            <option value="<?= $iva->vigor ?>">Não está em vigor</option>
                            <option value="<?= 1 ?>">Em vigor</option>
                        <?php }else{ ?>
                            <option value="<?= $iva->vigor ?>">Em vigor</option>
                            <option value="<?= 0 ?>">Não está em vigor</option>
                        <?php } ?>
                    </select>
                </div>
                <div style="justify-content: center; align-items: center; display: flex">
                    <input type="submit" value="Editar">
                </div>
            </form>
        </div>
    </div>
</div>