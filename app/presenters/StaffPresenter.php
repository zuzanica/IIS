<?php

namespace App\Presenters;

use Nette,
    Nette\Application\UI\Form,
    Nette\Mail\Message,
    Nette\Mail\SendmailMailer,
    Nette\Security\Passwords;
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

    public function renderUsers()
    {
        $this->template->users = $this->database->table('users');
    }

    public function renderDelete()
    {
        
        $this->template->staff = $this->database->table('staff');
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

        $form->addText('name', '* Meno:')
            ->setRequired("Zadajte meno zamestnanca.");
        $form->addText('lastname', '* Priezvisko:')
            ->setRequired("Zadajte priezvisko zamestnanca."); 
        $form->addText('login', '* Login:')
            ->setRequired("Zadajte login zamestnanca.");
        $form->addSelect('position', '* Pozícia:', $pos)->setPrompt('Zvolte pozíciu')
            ->setRequired("Zvolte pozíciu"); 
        $form->addSelect('shift', '* Smena:', $sft)->setPrompt('Zvolte smenu')
            ->setRequired("Zadajte pracovnu smenu."); 
                
        $form->addSubmit('send', 'Uložit');
        $form->onSuccess[] = array($this, 'staffFormSucceeded');

        $renderer = $form->getRenderer();
        $renderer->wrappers['controls']['container'] = NULL;
        $renderer->wrappers['pair']['container'] = 'div class=form-group';
        $renderer->wrappers['pair']['.error'] = 'has-error';
        $renderer->wrappers['control']['container'] = 'div class=col-sm-8';
        $renderer->wrappers['label']['container'] = 'div class="col-sm-4 control-label"';
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
        
            if( $values->position == 'admin'   ||
                $values->position == 'manager' ||
                $values->position == 'waiter' ) {

                $passw = $this->getRandStr(5);
                //$this->sendMail('zuzanica02@centrum.cz', 'xzuzka00', $passw);

                $person = $this->database->table('users')->insert(array(
                    'id_staff' => $person->id,
                    'login' => $person->login,
                    'password' => md5($passw),
                    'role' => $person->position,
                ));
                $this->flashMessage('Užívateľ bol úspešne pridaný. Údaje Login: '. $person->login.' heslo: '. $passw . '.', 'success');
            }
            else{
                $this->flashMessage('Užívateľ bol úspešne pridaný.', 'success');
            }

        }

        //$this->flashMessage('Užívateľ bol úspešne pridaný.', 'success');
        $this->redirect('Staff:');
    }

        protected function createComponentChangePasswForm()
    {
        $form = new Nette\Application\UI\Form;

        $form->addText('userId', '* Id:')
            ->setType('number')
            ->setRequired("Zadajte ID zamestnanca.");

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
        if (!$this->getUser()->isInRole('admin')) {
            $this->redirect('Homepage:');
        }

        $context = $this->database->table('users')->get($values->userId);

        if(!$context){
            $form->addError('Užívateľ nieje v databáze');
        } else if($values->newpassw != $values->renewpassw){
            $form->addError('Potvrdzujúce heslo sa nezhoduje s novým heslom.');
        } else{
            $context->update(array('password' => md5($values->newpassw)));
            $this->flashMessage('Heslo bolo zmenené.', 'success');
            $this->redirect('Staff:users');
        }

    }

    public function actionChngpassw($userId)
    {
        if (!$this->getUser()->isInRole('admin')) {
            $this->redirect('Homepage:');
        }

        $this['changePasswForm']['userId']->setDefaultValue($userId);
    }


    public function actionEdit($personalId)
    {
        if (!$this->getUser()->isAllowed('editEmployee')) {
            $this->redirect('Homepage:');
        }

        $person = $this->database->table('staff')->get($personalId);
        if (!$person) {
            $this->error('Zamestnanec nieje v databáze.');
        }
        $this['staffForm']->setDefaults($person->toArray());
    }

    public function actionDelete($personalID)
    {
        $person = $this->database->table('staff')->get($personalID);
        if (!$person) {
            $this->error('Zamestnanec nieje v databáze');
        }
        else{
            //$removedPerson = $this->database->table('staff')->where('id', $personalID)->delete();
            //check if it is necessare remove user account
            if( $person->position == 'admin'   ||
                $person->position == 'manager' ||
                $person->position == 'waiter' ) {
                $removedUser = $this->database->table('users')->where('id_staff', $personalID)->delete();
            }            
            
            $logedUserID = $this->getUser()->getID(); 
            $logedUser = $this->database->table('users')->get($logedUserID);
            //update data in _order table
            $updatedRows = $this->database->table('_order')
                ->where('id_staff', $personalID)
                ->update(array(
                    'id_staff' => $logedUser->id_staff));
            //update data in payment table        
            $updatedRows = $this->database->table('payment')
                ->where('id_staff', $personalID)
                ->update(array(
                    'id_staff' => $logedUser->id_staff));
             
            $person->delete();    
        }
        //add check window
        $this->flashMessage('Zamestnanec bol odstránený', 'success');
        $this->redirect('Staff:');
    }

    public function getRandStr($len){
        $result = "";
        $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
        $charArray = str_split($chars);
        
        for($i = 0; $i < $len; $i++){
            $randItem = array_rand($charArray);
            $result .= "".$charArray[$randItem];
        }
        //dump($result);
        return $result; 
    }


    public function sendMail($address, $login, $passw){
        $mail = new Message;
        $mail->setFrom('u3tecek@centrum.cz')
            ->addTo($address)
            ->setSubject('Vitajte U 3 ...')
            ->setBody("Ahoj");
        
        //Dobrý den,\n Práve Vám bol vytvorený účet v našom informačnom systéme.\n Login: ".$login . "\n Heslo: ". $passw . "\n Po prvom prihlásení odporúčame zmeniť heslo.

        $mailer = new SendmailMailer;
        $mailer->send($mail);    

    }
  
} 