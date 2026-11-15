<div class="edit-container">
    <div class="container">
        <h1 class="h1-centered-title">Editar produto</h1>
        <div style="margin: -20px 0 20px 0; align-content: center; align-items: center; display: flex; justify-items: center; justify-content: center">
            <div style="width: 75%; align-items: initial; justify-content: initial; align-content: initial; display: initial">
                <a href="./router.php?c=produto&a=show&id=<?= $produto->id ?>" class="btn-styled">Voltar Atras</a>
            </div>
        </div>
        <div class="edit">
            <form method="post" action="./router.php?c=produto&a=update&id=<?= $produto->id ?>">
                <div>
                    <label style="float: left">Referencia</label>
                    <?php if(isset($produto->errors)){
                        if (is_array($produto->errors->on('referencia'))) {
                            foreach ($produto->errors->on('referencia') as $error) {?>
                                <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $error . '<br>'?></a>
                            <?php }} else { ?>
                            <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $produto->errors->on('referencia');?></a>
                        <?php }} ?>
                    <input type="text" name="referencia" value="<?= $produto->referencia ?>" class="form-control">
                </div>
                <div>
                    <label style="float: left">Descricao</label>
                    <?php if(isset($produto->errors)){
                        if (is_array($produto->errors->on('descricao'))) {
                            foreach ($produto->errors->on('descricao') as $error) {?>
                                <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $error . '<br>'?></a>
                            <?php }} else { ?>
                            <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $produto->errors->on('descricao');?></a>
                        <?php }} ?>
                    <input type="text" name="descricao" value="<?= $produto->descricao ?>" class="form-control">
                </div>
                <div>
                    <label style="float: left">Preco</label>
                    <?php if(isset($produto->errors)){
                        if (is_array($produto->errors->on('preco'))) {
                            foreach ($produto->errors->on('preco') as $error) {?>
                                <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $error . '<br>'?></a>
                            <?php }} else { ?>
                            <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $produto->errors->on('preco');?></a>
                        <?php }} ?>
                    <input type="number" step="0.01" name="preco" value="<?= $produto->preco ?>" class="form-control">
                </div>
                <div>
                    <label style="float: left">Stock</label>
                    <?php if(isset($produto->errors)){
                        if (is_array($produto->errors->on('stock'))) {
                            foreach ($produto->errors->on('stock') as $error) {?>
                                <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $error . '<br>'?></a>
                            <?php }} else { ?>
                            <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $produto->errors->on('stock');?></a>
                        <?php }} ?>
                    <input type="number" name="stock" value="<?= $produto->stock ?>" class="form-control">
                </div>
                <div>
                    <label style="float: left">IVA</label>
                    <?php if(isset($produto->errors)){
                        if (is_array($produto->errors->on('iva_id'))) {
                            foreach ($produto->errors->on('iva_id') as $error) {?>
                                <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $error . '<br>'?></a>
                            <?php }} else { ?>
                            <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $produto->errors->on('iva_id');?></a>
                        <?php }} ?>
                    <select name="iva_id" id="ivas">
                        <?php $produtoIva = Iva::find_by_id($produto->iva_id) ?>
                        <option value="<?= $produtoIva->id ?>"><?= $produtoIva->descricao . ' ( ' . $produtoIva->percentagem .' % )' ?></option>
                        <?php foreach ($ivas as $iva){ ?>
                                <?php if ($produtoIva->id != $iva->id){ ?>
                            <option value="<?= $iva->id ?>"><?= $iva->descricao . ' ( ' . $iva->percentagem .' % )' ?></option>
                        <?php }} ?>
                    </select>
                </div>
                <div style="justify-content: center; align-items: center; display: flex">
                    <input type="submit" value="Editar">
                </div>
            </form>
        </div>
    </div>
</div>