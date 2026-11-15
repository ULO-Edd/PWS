<?php


class UserController extends BaseController
{
    public function __construct()
    {
        session_start();
    }

    public function index()
    {
        if ($_SESSION == null) {
            $this->redirectToRoute('mainView', 'login');
        } else {

            $user = User::find_by_id($_SESSION['userID']);
            $users = null;

            if ($user->role == "cliente") {
                $this->redirectToRoute('fatura', 'index');
            } else if ($user->role == "funcionario") {
                $users = User::find_all_by_role("cliente");
            } else {
                $users = User::all();
            }
            $this->renderView('user/index', ["users" => $users]);
        }
    }

    public function register()
    {
        if ($_SESSION == null) {
            $this->redirectToRoute('mainView', 'login');
        } else {
            $user = User::find_by_id($_SESSION['userID']);

            if ($user->role == "cliente") {
                $this->redirectToRoute('fatura', 'index');
            } else {
                $this->renderView('user/register');
            }
        }
    }

    public function store()
    {
        if ($_SESSION == null) {
            $this->redirectToRoute('mainView', 'login');
        } else {

            $user = new User($_POST);
            if ($user->is_valid()) {
                $user->password = md5($user->password);
                $user->save();
                $this->index();
            } else {
                $this->renderView("user/register", ["registerUser" => $user]);
            }
        }
    }

    public function show($id)
    {
        if ($_SESSION == null) {
            $this->redirectToRoute('mainView', 'login');
        } else {
            $sessionUser = User::find_by_id($_SESSION['userID']);

            if ($sessionUser->role == "cliente") {
                $this->redirectToRoute('fatura', 'index');
            } else if ($sessionUser->role == "funcionario") {
                $user = User::find_by_id($id);

                if ($user == null) {
                    $this->index();
                } else {
                    if ($user->role == "cliente" || $user->id == $_SESSION['userID']) {
                        $this->renderView('user/show', ['showUser' => $user]);
                    } else {
                        $this->index();
                    }
                }
            } else {
                $user = User::find_by_id($id);
                $userFaturas = Fatura::find_all_by_cliente_id($id);

                if ($user == null) {
                    $this->index();
                } else {
                    $this->renderView('user/show', ['showUser' => $user, 'faturas' => $userFaturas]);
                }

            }
        }
    }

    public function edit($id)
    {
        if ($_SESSION == null) {
            $this->redirectToRoute('mainView', 'login');
        } else {
            $user = User::find_by_id($_SESSION['userID']);

            if ($user->role == "cliente") {
                $this->redirectToRoute('fatura', 'index');
            } else {
                $user = User::find_by_id($id);

                if ($user->id != $_SESSION['userID']) {
                    $this->show($user->id);
                } else {
                    $this->renderView('user/edit', ['user' => $user]);
                }
            }
        }
    }

    public function update($id)
    {
        if ($_SESSION == null) {
            $this->redirectToRoute('mainView', 'login');
        } else {
            $user = User::find_by_id($id);
            if ($user->id != $_SESSION['userID']) {
                $this->index();
            } else {
                if ($_POST['password'] == "987654") {
                    $_POST['password'] = $user->password;
                } else {
                    $_POST['password'] = md5($_POST['password']);
                }
                $user->update_attributes($_POST);
                if ($user->is_valid()) {
                    $user->save();
                    $this->show($user->id);
                } else {
                    $this->renderView("user/edit", ["editUser" => $user]);
                }
            }
        }
    }

    public function auth($username, $password)
    {

        $hashPassowrd = md5($password);

        $user = User::find_by_username_and_password($username, $hashPassowrd);

        if ($user != null) {
            $_SESSION["userID"] = $user->id;
            if ($user->role == "funcionario" || $user->role == "adminstrador") {
                $this->redirectToRoute('mainView', 'index');
            } else {
                $this->redirectToRoute('fatura', 'index');
            }
        } else {
            $this->renderView('mainView/login');
        }

    }

    public function logout()
    {
        if (session_destroy()) {
            $this->redirectToRoute('mainView', 'login');;
        }
    }
}