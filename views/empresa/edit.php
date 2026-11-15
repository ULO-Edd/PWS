<div class="edit-container">
    <div class="container">
        <h1 class="h1-centered-title">Editar empresa</h1>
        <div style="margin: -20px 0 20px 0; align-content: center; align-items: center; display: flex; justify-items: center; justify-content: center">
            <div style="width: 75%; align-items: initial; justify-content: initial; align-content: initial; display: initial">
                <a href="./router.php?c=mainView&a=index" class="btn-styled">Voltar ao Menu Principal</a>
            </div>
        </div>
        <div class="edit">
            <form method="post" action="./router.php?c=empresa&a=update&id=<?= $empresa->id ?>">
                <div>
                    <label style="float: left">Desginação</label>
                    <?php if(isset($empresa->errors)){
                        if (is_array($empresa->errors->on('designacao'))) {
                            foreach ($empresa->errors->on('designacao') as $error) {?>
                                <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $error . '<br>'?></a>
                            <?php }} else { ?>
                            <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $empresa->errors->on('designacao');?></a>
                        <?php }} ?>
                    <input type="text" value="<?= $empresa->designacao ?>" name="designacao" class="form-control">
                </div>
                <div>
                    <label style="float: left">Email</label>
                    <?php if(isset($empresa->errors)){
                        if (is_array($empresa->errors->on('email'))) {
                            foreach ($empresa->errors->on('email') as $error) {?>
                                <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $error . '<br>'?></a>
                            <?php }} else { ?>
                            <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $empresa->errors->on('email');?></a>
                        <?php }} ?>
                    <input type="text" value="<?= $empresa->email ?>" name="email" class="form-control">
                </div>
                <div>
                    <label style="float: left">Telefone</label>
                    <?php if(isset($empresa->errors)){
                        if (is_array($empresa->errors->on('telefone'))) {
                            foreach ($empresa->errors->on('telefone') as $error) {?>
                                <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $error . '<br>'?></a>
                            <?php }} else { ?>
                            <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $empresa->errors->on('telefone');?></a>
                        <?php }} ?>
                    <input type="number" value="<?= $empresa->telefone ?>" name="telefone" class="form-control">
                </div>
                <div>
                    <label style="float: left">NIF</label>
                    <?php if(isset($empresa->errors)){
                        if (is_array($empresa->errors->on('nif'))) {
                            foreach ($empresa->errors->on('nif') as $error) {?>
                                <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $error . '<br>'?></a>
                            <?php }} else { ?>
                                <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $empresa->errors->on('nif');?></a>
                        <?php }} ?>
                    <input type="number" value="<?= $empresa->nif ?>" name="nif" class="form-control">
                </div>
                <div>
                    <label style="float: left">Morada</label>
                    <?php if(isset($empresa->errors)){
                        if (is_array($empresa->errors->on('morada'))) {
                            foreach ($empresa->errors->on('morada') as $error) {?>
                                <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $error . '<br>'?></a>
                    <?php }} else { ?>
                                <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $empresa->errors->on('morada');?></a>
                    <?php }} ?>
                    <input type="text" value="<?= $empresa->morada ?>" name="morada" class="form-control">
                </div>
                <div>
                    <label style="float: left">Código Postal</label>
                    <?php if(isset($empresa->errors)){
                        if (is_array($empresa->errors->on('codpostal'))) {
                            foreach ($empresa->errors->on('codpostal') as $error) {?>
                                <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $error . '<br>'?></a>
                            <?php }} else { ?>
                            <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $empresa->errors->on('codpostal');?></a>
                        <?php }} ?>
                    <input type="text" value="<?= $empresa->codpostal ?>" name="codpostal" class="form-control">

                </div>
                <div>
                    <label style="float: left">Localidade</label>
                    <?php if(isset($empresa->errors)){
                        if (is_array($empresa->errors->on('localidade'))) {
                            foreach ($empresa->errors->on('localidade') as $error) {?>
                                <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $error . '<br>'?></a>
                            <?php }} else { ?>
                            <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $empresa->errors->on('localidade');?></a>
                        <?php }} ?>
                    <input type="text" value="<?= $empresa->localidade ?>" name="localidade" class="form-control">
                </div>
                <div>
                    <label style="float: left">Capital</label>
                    <?php if(isset($empresa->errors)){
                        if (is_array($empresa->errors->on('capital'))) {
                            foreach ($empresa->errors->on('capital') as $error) {?>
                                <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $error . '<br>'?></a>
                            <?php }} else { ?>
                            <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $empresa->errors->on('capital');?></a>
                        <?php }} ?>
                    <input type="number" value="<?= $empresa->capital ?>" name="capital" class="form-control">
                </div>
                <div style="justify-content: center; align-items: center; display: flex">
                    <input type="submit" value="Editar">
                </div>
            </form>
        </div>

    </div>
</div>