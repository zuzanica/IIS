<?php

namespace App\Presenters;

use Nette;
use App\Model;
use RadekDostal;



/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends Nette\Application\UI\Presenter
{
	public $user;

	public function beforeRenderer()
    {
    	BasePresenter::beforeRender();
    }
	/**
	 * Sign-in form factory.<php
	 * @return Nette\Application\UI\Form
	 */
	protected function createComponentSignInForm()
	{
		$form = new Nette\Application\UI\Form;
	    $form->addText('username', 'Login:')
	        ->setRequired('Prosím vyplňte své uživatelské jméno.');

	    $form->addPassword('password', 'Heslo:')
	        ->setRequired('Prosím vyplňte své heslo.');

	    $form->addCheckbox('remember', 'Zůstat přihlášen');

	    $form->addSubmit('send', 'Přihlásit');

	    $form->onSuccess[] = array($this, 'signInFormSucceeded');
	    return $form;
	}

	public function signInFormSucceeded($form)
	{
	    $values = $form->values;

	    try {
	        $this->getUser()->login($values->username, $values->password);
	        $this->getUser()->setExpiration(0, TRUE);
	        $this->redirect('Homepage:');

	    } catch (Nette\Security\AuthenticationException $e) {
	        $form->addError('Nesprávne prihlasovacie meno alebo heslo.');
	    }
	}

	/*public function startup()
    {
        parent::startup();

        $this->user = $this->getUser();
        if ($this->name != 'Admin:Auth') {
            if (!$this->user->isLoggedIn()) {
                if ($this->user->getLogoutReason() === User::INACTIVITY) {
                    $this->flashMessage('Session timeout, you have been logged out');
                }

                $this->redirect('Auth:login', array(
                    'backlink' => $this->storeRequest()
                ));

            } else {
                if (!$this->user->isAllowed($this->name, $this->action)) {
                    $this->flashMessage('Access denied');
                    $this->redirect('Default:');
                }
            }
        }
    }


    /**
     * Logout user
    */ 
    /*public function handleLogout()
    {
        $this->user->logOut();
        $this->flashMessage('You were logged off.');
        $this->redirect('this');
    }*/

}
