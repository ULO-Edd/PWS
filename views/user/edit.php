<div class="edit-container">
    <div class="container">
        <h1 class="h1-centered-title">Editar Informações</h1>
        <div style="margin: -20px 0 20px 0; align-content: center; align-items: center; display: flex; justify-items: center; justify-content: center">
            <div style="width: 75%; align-items: initial; justify-content: initial; align-content: initial; display: initial">
                <a href="./router.php?c=user&a=show&id=<?= $user->id ?>" class="btn-styled">Voltar Atras</a>
            </div>
        </div>
        <div class="register-form">
            <form method="post" action="./router.php?c=user&a=update&id=<?= $user->id ?>">
                    <div>
                        <label style="float: left">Username</label>
                        <input readonly="true" type="text" name="username" value="<?= $user->username ?>" class="form-control">
                    </div>
                    <div>
                        <label style="float: left">Password</label>
                            <?php if(isset($editUser->errors)){
                                if (is_array($editUser->errors->on('password'))) {
                                    foreach ($editUser->errors->on('password') as $error) {?>
                                        <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $error . '<br>'?></a>
                                    <?php }} else { ?>
                                        <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $editUser->errors->on('password');?></a>
                                    <?php }} ?>
                        <input type="password" name="password" value="987654" class="form-control">
                    </div>
                    <div>
                        <label style="float: left">Email</label>
                        <?php if(isset($editUser->errors)){
                            if (is_array($editUser->errors->on('email'))) {
                                foreach ($editUser->errors->on('email') as $error) {?>
                                    <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $error . '<br>'?></a>
                                <?php }} else { ?>
                                <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $editUser->errors->on('email');?></a>
                            <?php }} ?>
                        <input type="text" name="email" value="<?= $user->email ?>" class="form-control">
                    </div>
                    <div>
                        <label style="float: left">Telefone</label>
                        <input readonly="true" type="text" name="telefone" value="<?= $user->telefone ?>" class="form-control">
                    </div>
                    <div>
                        <label style="float: left">NIF</label>
                        <input readonly="true" type="text" name="nif" value="<?= $user->nif ?>" class="form-control">
                    </div>
                    <div>
                        <label style="float: left">Morada</label>
                        <input readonly="true" type="text" name="morada" value="<?= $user->morada ?>" class="form-control">
                    </div>
                <div>
                    <label style="float: left">Código Postal</label>
                    <input readonly="true" type="text" name="codpostal"  value="<?= $user->codpostal ?>" class="form-control">
                </div>
                    <div>
                        <label style="float: left">Localidade</label>
                        <input readonly="true" type="text" name="localidade" value="<?= $user->localidade ?>" class="form-control">
                    </div>
                    <div>
                        <label style="float: left">Role</label>
                        <input readonly="true" type="text" name="role" value="<?= $user->role ?>" class="form-control">
                    </div>
                    <div style="justify-content: center; align-items: center; display: flex">
                        <input type="submit" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>