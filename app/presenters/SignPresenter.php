<?php

namespace App\Presenters;

use Nette,
	Nette\Application\UI\Form;


class SignPresenter extends BasePresenter
{

	private $database;

	/**
	 * Sign-in form factory.
	 * @return Nette\Application\UI\Form
	 */
	 public function __construct(Nette\Database\Context $database)
    {
        $this->database = $database;
    }

	public function actionOut()
	{
	    $this->getUser()->logout();
	    $this->flashMessage('Odhlásenie bolo úspešné.');
	    $this->redirect('Homepage:');
	}

	public function actionCreate()
	{
	    if (!$this->getUser()->isLoggedIn()) {
	        $this->redirect('Sign:in');
	    }
	}

	protected function createComponentChangePasswForm()
	{
		$form = new Nette\Application\UI\Form;
	    $form->addPassword('oldpassw', '* Súčasné heslo: ')
	        ->setRequired('Prosím zadajte súčasné heslo.');

	    $form->addPassword('newpassw', '* Nové heslo: ')
	        ->setRequired('Prosím vyplňte nové heslo.');

	    $form->addPassword('renewpassw', '* Potvrdenie hesla: ')
	    	->setRequired('Prosím potvrdte nové heslo.');

	    $form->addSubmit('send', 'Zmeniť');

	    $form->onSuccess[] = array($this, 'changePasswFormSucceeded');
	    
	    $renderer = $form->getRenderer();
        $renderer->wrappers['controls']['container'] = NULL;
        $renderer->wrappers['pair']['container'] = 'div class=form-group';
        $renderer->wrappers['pair']['.error'] = 'has-error';
        $renderer->wrappers['control']['container'] = 'div class=col-sm-7';
        $renderer->wrappers['label']['container'] = 'div class="col-sm-5 control-label"';
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

	public function changePasswFormSucceeded($form)
	{
	    $values = $form->values;

	    /*uzivalte nebol prihlázeny jak je mozne ze sa sem vobec dostal*/
	    if (!$this->getUser()->isLoggedIn()) {
	        $this->redirect('Homepage:');
	    }


	    $userId = $this->getUser()->getIdentity()->id;
	    //echo $userId;
	    $context = $this->database->table('users')->where('id', $userId);

	 	if($context[$userId]->password != $values->oldpassw){
	 		$form->addError('Nesprávne zadané súčasné heslo.');
	 	} else if($values->newpassw != $values->renewpassw){
	    	$form->addError('Potvrdzujúce heslo sa nezhoduje s novým heslom.');
	    } else{
	    	$context->update(array('password' => $values->newpassw));
	    	$this->flashMessage('Heslo bolo zmenené.', 'success');
	    }
	}

}
