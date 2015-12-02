<?php

namespace App\Presenters;

use Nette,
    Nette\Application\UI\Form;
use App\Model;

class TestPresenter extends BasePresenter
{

	/** @var Nette\Database\Context */
    /*private $database;

    public function __construct(Nette\Database\Context $database)
    {
        $this->database = $database;
    }*/
/*******************************************************/
    private $database = [
    [1 => '2', '4', '9'],
    [4 => '.', '∴', '…'],
    [5 => 'π', '€', '©'],
    ];

    public function beforeRender() {
        parent::beforeRender();
        $this->template->_form = $this['form']; // form {snippet} workaround
    }

    public function renderDefault()
    {
        // required to enable form access in snippets
        $this->template->_form = $this['form']; // form {snippet} workaround
    }

    protected function createComponentForm($name) {
    $form = new Form;
    $this[$name] = $form; // <- Zde je celý fígl

    $form->addSelect('one', 'One', ['Čísla', 'Tečky', 'Symboly'])->setDefaultValue(1);
    //dump($form['one']->value);

    $form->addSelect('two', 'Two', $this->database[$form['one']->value]);

    $form->addSubmit('send', 'Odeslat');
    $form->onSuccess[] = $this->success;
    return $form;
    }

    public function handleInvalidate($value) {
        $this['form']['two']->setItems($this->database[$value]);
        $this->redrawControl('two');
    }

    public function success(Form $form, $vals) {
        dump($vals);
    }

/******************************************************/
   
}
