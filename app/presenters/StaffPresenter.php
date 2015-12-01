<?php

namespace App\Presenters;

use Nette,
    Nette\Application\UI\Form;
use App\Model;

class StaffPresenter extends BasePresenter
{
	private $database;

	 public function __construct(Nette\Database\Context $database)
    {
        $this->database = $database;
    }

    public function renderDefault()
    {
  		
        $this->template->staff = $this->database->table('staff');
    }

    public function renderDelete()
    {
        
        $this->template->staff = $this->database->table('staff');
    }

    public function actionDelete($personalID)
    {
        $person = $this->database->table('staff')->get($personalID);
        if (!$person) {
            $this->error('Zamestnanec nieje v databáze');
        }
        else{
            $this->database->table('staff')->where('id', $personalID)->delete();    
        }
        //add check window
        $this->flashMessage('Zamestnanec bol odstránený', 'success');
        $this->redirect('Staff:');
    }

    /**
     * Formular for adding new employees to database 
     */
    protected function createComponentStaffForm()
    {   
        $pos = array( 
        'manager' => 'vedúci smeny',
        'waiter' => 'čašník',
        'cook' => 'kuchár',
        'cleaner' => 'upratovač',
        'other' => 'iný'
        );

        $sft = array( 
        '1' => '1',
        '2' => '2',
        '12' => '12',
        '0' => 'extra'
        );

        $form = new Form;

        $form->addText('name', 'Meno:')
            ->setRequired();
        $form->addText('lastname', 'Priezvisko:')
            ->setRequired(); 
        $form->addText('login', 'Login:')
            ->setRequired();
        $form->addSelect('position', 'Pozícia:', $pos)->setPrompt('Zvolte pozíciu')
            ->setRequired(); 
        $form->addSelect('shift', 'Smena:', $sft)->setPrompt('Zvolte smenu')
            ->setRequired(); 
                
        $form->addSubmit('send', 'Uložit');
        $form->onSuccess[] = array($this, 'staffFormSucceeded');

        return $form;
    }


    public function staffFormSucceeded($form, $values)
    {
            
        $personalId = $this->getParameter('personalId');

        if ($personalId) {
            $person = $this->database->table('staff')->get($personalId);
            $person->update($values);
        } else {
            $person = $this->database->table('staff')->insert(array(
            'id' => $personalId,
            'login' => $values->login,
            'name' => $values->name,
            'lastname' => $values->lastname,  
            'position' => $values->position, 
            'shift' => $values->shift,
        ));
        }

        $this->flashMessage('Užívateľ bol úspešne pridaný.', 'success');
        $this->redirect('Staff:');
    }

    public function actionEdit($personalId)
    {
        if (!$this->getUser()->isAllowed('editEmployee')) {
            $this->redirect('Homepage:');
        }

        $person = $this->database->table('staff')->get($personalId);
        if (!$person) {
            $this->error('Zamestnanec nieje v databáze');
        }
        $this['staffForm']->setDefaults($person->toArray());
    }
  
} 