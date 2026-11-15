<div class="body-create">
        <div class = "container">
            <h1 class="h1-centered-title">Criar produto</h1>
            <div style="margin: -20px 0 20px 0; align-content: center; align-items: center; display: flex; justify-items: center; justify-content: center">
                <div style="width: 75%; align-items: initial; justify-content: initial; align-content: initial; display: initial">
                    <a href="./router.php?c=produto&a=index" class="btn-styled">Voltar à Lista</a>
                </div>
            </div>
            <div>
                <div class="create-form">
                    <form method="post" action="./router.php?c=produto&a=store">
                        <div>
                            <label style="float: left">Referencia</label>
                            <?php if(isset($criarProduto->errors)){
                                if (is_array($criarProduto->errors->on('referencia'))) {
                                    foreach ($criarProduto->errors->on('referencia') as $error) {?>
                                        <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $error . '<br>'?></a>
                                    <?php }} else { ?>
                                    <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $criarProduto->errors->on('referencia');?></a>
                                <?php }} ?>
                            <input type="text" name="referencia" class="form-control">
                        </div>
                        <div>
                            <label style="float: left">Descricao</label>
                            <?php if(isset($criarProduto->errors)){
                                if (is_array($criarProduto->errors->on('descricao'))) {
                                    foreach ($criarProduto->errors->on('descricao') as $error) {?>
                                        <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $error . '<br>'?></a>
                                    <?php }} else { ?>
                                    <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $criarProduto->errors->on('descricao');?></a>
                                <?php }} ?>
                            <input type="text" name="descricao" class="form-control">
                        </div>
                        <div>
                            <label style="float: left">Preco</label>
                            <?php if(isset($criarProduto->errors)){
                                if (is_array($criarProduto->errors->on('preco'))) {
                                    foreach ($criarProduto->errors->on('preco') as $error) {?>
                                        <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $error . '<br>'?></a>
                                    <?php }} else { ?>
                                    <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $criarProduto->errors->on('preco');?></a>
                                <?php }} ?>
                            <input type="number" step="0.01" name="preco" class="form-control">
                        </div>
                        <div>
                            <label style="float: left">Stock</label>
                            <?php if(isset($criarProduto->errors)){
                                if (is_array($criarProduto->errors->on('stock'))) {
                                    foreach ($criarProduto->errors->on('stock') as $error) {?>
                                        <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $error . '<br>'?></a>
                                    <?php }} else { ?>
                                    <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $criarProduto->errors->on('stock');?></a>
                                <?php }} ?>
                            <input type="number" name="stock" class="form-control">
                        </div>
                        <div>
                            <label style="float: left">IVA</label>
                            <?php if(isset($criarProduto->errors)){
                                if (is_array($criarProduto->errors->on('iva_id'))) {
                                    foreach ($criarProduto->errors->on('iva_id') as $error) {?>
                                        <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $error . '<br>'?></a>
                                    <?php }} else { ?>
                                    <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $criarProduto->errors->on('iva_id');?></a>
                                <?php }} ?>
                            <select name="iva_id" id="ivas">
                                <?php foreach ($ivas as $iva){ ?>
                                    <option value="<?= $iva->id ?>"><?= $iva->descricao . ' ( ' . $iva->percentagem .' % )' ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div style="justify-content: center; align-items: center; display: flex">
                            <input type="submit" value="Criar">
                        </div>
                    </form>
                </div>
            </div>

    </div>
</div>