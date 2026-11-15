<div class="body-login">
    <div>
        <img alt="page image" src="./public/img/fatura.jpg">
        <div class = "container">
            <h1 class="h1-centered-title">Sign in</h1>
            <div>
                <div class="login-form">
                <form method="post" action="./router.php?c=user&a=auth">
                    <div>
                        <label style="float:left">Username<span>*</span></label>
                        <input type="text" name="username">
                    </div>
                    <div >
                        <label style="float:left">Password<span>*</span></label>
                        <input type="password" name="password">
                    </div>

                    <div>
                        <div style="justify-content: center; align-items: center; display: flex">
                            <input type="submit" value="Log In">
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>