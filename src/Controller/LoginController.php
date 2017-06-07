<?php

namespace App\Controller;

use Slim\Http\Request;
use Slim\Http\Response;

/**
 * LoginController.
 */
class LoginController extends AppController
{
    /**
     * User login
     *
     * @param Request $request The request
     * @return Response
     */
    public function loginPage(Request $request)
    {
        $this->setRequest($request);
        $this->user->logout();

        $assets = $this->getAssets();
        $assets[] = 'view::Login/login.css';

        $viewData = $this->getViewData();
        return $this->render('view::Login/login.html.php', $viewData);
    }

    /**
     * User login submit
     *
     * @param Request $request The request
     * @return Response
     */
    public function loginSubmit(Request $request)
    {
        $this->setRequest($request);
        $data = $request->getParsedBody();
        $username = $data['username'];
        $password = $data['password'];

        $result = $this->user->login($username, $password);
        $url = ($result) ? '/' : '/login';

        return $this->redirect($url);
    }

    /**
     * User logout
     *
     * @param Request $request The request
     * @return Response Redirect response
     */
    public function logout(Request $request)
    {
        $this->setRequest($request);
        $this->user->logout();
        return $this->redirect('/login');
    }
}
