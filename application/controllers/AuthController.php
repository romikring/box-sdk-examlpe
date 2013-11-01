<?php
/**
 *
 */
class AuthController extends Rabox_Controller_Action
{
    /**
     *
     */
    public function indexAction()
    {
        if (!$this->box->isAuthorized()) {
            $url = $this->box->getAuth()->generateAuthUrl();
            $this->redirect($url);
        }

        $this->redirect('/');
    }

    public function grantedAction()
    {
        $request = $this->getRequest();
        $code = $request->getParam('code');
        $state = $request->getParam('state');

        if (!$request->isGet() || !$state) {
            $this->redirect('/auth/');
        }

        var_dump($request->getParams());
    }
}

