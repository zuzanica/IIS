<?php

namespace App\Presenters;

use Nette;
use App\Model;


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

	    $form->onValidate[] = array($this, 'signInFormSucceeded');
	    
        
        // setup form rendering
        $renderer = $form->getRenderer();
        $renderer->wrappers['controls']['container'] = NULL;
        $renderer->wrappers['pair']['container'] = 'div class=form-group';
        $renderer->wrappers['pair']['.error'] = 'has-error';
        $renderer->wrappers['control']['container'] = 'div class=col-sm-9';
        $renderer->wrappers['label']['container'] = 'div class="col-sm-3 control-label"';
        $renderer->wrappers['control']['description'] = 'span class=help-block';
        $renderer->wrappers['control']['errorcontainer'] = 'span class=help-block';
        // make form and controls compatible with Twitter Bootstrap
        $form->getElementPrototype()->class('form-horizontal');
        foreach ($form->getControls() as $control) {
            if ($control instanceof Controls\Button) {
                $control->getControlPrototype()->addClass(empty($usedPrimary) ? 'btn btn-primary' : 'btn btn-primary');
               // $usedPrimary = TRUE;
            } elseif ($control instanceof Controls\TextBase || $control instanceof Controls\SelectBox || $control instanceof Controls\MultiSelectBox) {
                $control->getControlPrototype()->addClass('form-control');
            } elseif ($control instanceof Controls\Checkbox || $control instanceof Controls\CheckboxList || $control instanceof Controls\RadioList) {
                $control->getSeparatorPrototype()->setName('div')->addClass($control->getControlPrototype()->type);
            }
        }

        return $form;
	}

	public function signInFormSucceeded($form)
	{
	    $values = $form->values;

	    try {
	        $this->getUser()->login($values->username, $values->password);
	        $this->getUser()->setExpiration('30 minutes', TRUE);
	        $this->flashMessage('Boli ste úspešne prihlásený', 'success');
            $this->redirect('Homepage:');
	    } catch (Nette\Security\AuthenticationException $e) {
            $this->flashMessage('Nesprávne meno alebo heslo.', 'failed');
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
