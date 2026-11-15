<div class="body-register">
        <div class = "container">
            <?php if($user->role != "adminstrador"){ ?>
                <h1 class="h1-centered-title">Registar Cliente</h1>
            <?php } else { ?>
                <h1 class="h1-centered-title">Registar User</h1>
            <?php } ?>
            <div style="margin: -20px 0 20px 0; align-content: center; align-items: center; display: flex; justify-items: center; justify-content: center">
                <div style="width: 75%; align-items: initial; justify-content: initial; align-content: initial; display: initial">
                    <a href="./router.php?c=user&a=index" class="btn-styled">Voltar à Lista</a>
                </div>
            </div>
            <div>
                <div class="register-form">
                <form method="post" action="./router.php?c=user&a=store">
                    <div>
                        <label style="float: left">Username</label>
                        <?php if(isset($registerUser->errors)){
                            if (is_array($registerUser->errors->on('username'))) {
                                foreach ($registerUser->errors->on('username') as $error) {?>
                                    <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $error . '<br>'?></a>
                                <?php }} else { ?>
                                <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $registerUser->errors->on('username');?></a>
                            <?php }} ?>
                        <input type="text" name="username" class="form-control">
                    </div>
                    <div>
                        <label style="float: left">Password</label>
                        <?php if(isset($registerUser->errors)){
                            if (is_array($registerUser->errors->on('password'))) {
                                foreach ($registerUser->errors->on('password') as $error) {?>
                                    <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $error . '<br>'?></a>
                                <?php }} else { ?>
                                <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $registerUser->errors->on('password');?></a>
                            <?php }} ?>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div>
                        <label style="float: left">Email</label>
                        <?php if(isset($registerUser->errors)){
                            if (is_array($registerUser->errors->on('email'))) {
                                foreach ($registerUser->errors->on('email') as $error) {?>
                                    <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $error . '<br>'?></a>
                                <?php }} else { ?>
                                <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $registerUser->errors->on('email');?></a>
                            <?php }} ?>
                        <input type="text" name="email" class="form-control">
                    </div>
                    <div>
                        <label style="float: left">Telefone</label>
                        <?php if(isset($registerUser->errors)){
                            if (is_array($registerUser->errors->on('telefone'))) {
                                foreach ($registerUser->errors->on('telefone') as $error) {?>
                                    <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $error . '<br>'?></a>
                                <?php }} else { ?>
                                <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $registerUser->errors->on('telefone');?></a>
                            <?php }} ?>
                        <input type="number" name="telefone" class="form-control">
                    </div>
                    <div>
                        <label style="float: left">NIF</label>
                        <?php if(isset($registerUser->errors)){
                            if (is_array($registerUser->errors->on('nif'))) {
                                foreach ($registerUser->errors->on('nif') as $error) {?>
                                    <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $error . '<br>'?></a>
                                <?php }} else { ?>
                                <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $registerUser->errors->on('nif');?></a>
                            <?php }} ?>
                        <input type="number" name="nif" class="form-control">
                    </div>
                    <div>
                        <label style="float: left">Morada</label>
                        <?php if(isset($registerUser->errors)){
                            if (is_array($registerUser->errors->on('morada'))) {
                                foreach ($registerUser->errors->on('morada') as $error) {?>
                                    <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $error . '<br>'?></a>
                                <?php }} else { ?>
                                <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $registerUser->errors->on('morada');?></a>
                            <?php }} ?>
                        <input type="text" name="morada" class="form-control">
                    </div>
                    <div>
                        <label style="float: left">Codigo Postal</label>
                        <?php if(isset($registerUser->errors)){
                            if (is_array($registerUser->errors->on('codpostal'))) {
                                foreach ($registerUser->errors->on('codpostal') as $error) {?>
                                    <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $error . '<br>'?></a>
                                <?php }} else { ?>
                                <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $registerUser->errors->on('codpostal');?></a>
                            <?php }} ?>
                        <input type="text" name="codpostal" class="form-control">
                    </div>
                    <div>
                        <label style="float: left">Localidade</label>
                        <?php if(isset($registerUser->errors)){
                            if (is_array($registerUser->errors->on('localidade'))) {
                                foreach ($registerUser->errors->on('localidade') as $error) {?>
                                    <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $error . '<br>'?></a>
                                <?php }} else { ?>
                                <a style="color:red; font-size: 12px; padding-bottom:10px;"><?php echo $registerUser->errors->on('localidade');?></a>
                            <?php }} ?>
                        <input type="text" name="localidade" class="form-control">
                    </div>
                    <?php if ($user->role == "adminstrador"){?>
                    <div>
                        <label style="float: left">Role</label>
                        <select name="role" id="user-roles">
                            <option value="cliente">cliente</option>
                            <option value="funcionario">funcionario</option>
                        </select>
                    </div>
                    <?php }else { ?>
                    <label style="float: left">Role</label>
                    <input readonly="true" type="text" name="role" value="cliente" class="form-control">
                    <?php }?>
                    <div style="justify-content: center; align-items: center; display: flex">
                        <input type="submit" value="Registar">
                    </div>
                </form>
                </div>
            </div>

    </div>
</div>