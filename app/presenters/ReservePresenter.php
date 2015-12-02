<?php

namespace App\Presenters;

use Nette,
    Nette\Application\UI\Form;
use App\Model;

class ReservePresenter extends BasePresenter
{

	/** @var Nette\Database\Context */
    private $database;

    public function __construct(Nette\Database\Context $database)
    {
        $this->database = $database;
    }
/*******************************************************/



    public function renderDefault()
    {
        // required to enable form access in snippets
        //$this->template->_form = $this['selectForm'];
        
        $this->template->_form = $this['reservationForm'];
    }

    /**
     * Load values to second select
     * @param int
     */
     public function handleFirstChange($value)
    {
        if ($value) {
            $secondItems = array(
                1 => 'First option ' . $value . ' - second option 1',
                2 => 'First option ' . $value . ' - second option 2'
            );

            $this['selectForm']['second']->setPrompt('Select')
                ->setItems($secondItems);

        } else {
            $this['selectForm']['second']->setPrompt('Select from first')
                ->setItems(array());
        }

        $this->invalidateControl('secondSnippet');
    }


    /********************** form **********************/


     protected function createComponentSelectForm()
    {
        $firstItems = array(
            1 => 'First option 1',
            2 => 'First option 2'
        );

        $form = new Form;
        $form->addSelect('first', 'First select:', $firstItems)
            ->setPrompt('Select');
        $form->addSelect('second', 'Second select:')
            ->setPrompt('Select from first');
        $form->addSubmit('send', 'Submit');

        $form->onSuccess[] = $this->processSelectForm;

        return $form;
    }

    /**
     * @param form
     */
     public function processSelectForm(Form $form)
    {
        // $form->getValues() ignores invalidated input's values
        $values = $form->getHttpData();
        unset($values['send']);
        dump($values);

        // ...
    }



/******************************************************/
    public function renderShow($orderId)
    {   

        $context = $this->database;


        $this->template->reservations = $context->query(
            'SELECT r.id, r._date, r._time, r.id_table, c.name, c.lastname, c.email, c.phone  FROM client c, reservation r WHERE r.id_client = c.id');
    }

    public function handleRoomChange($value)
    {
        if ($value) {
            $tables= $this->database->table('tables')->where('place', $value);

            $tablesInRoom = array();
            foreach ($tables as $table){
                //echo 'honota:', $table; 
                $tablesInRoom[$table->id] = $table->id . ', miest: '. $table->seats;
            }

            $this['reservationForm']['table']->setPrompt('Zvolte stôl')
                ->setItems($tablesInRoom);

        } else {
            $this['reservationForm']['table']->setPrompt('Zvolte miestnosť')
                ->setItems(array());
        }

        $this->invalidateControl('tableSnippet');
    }


    public function createComponentReservationForm(){

        $rooms = array(
        'terasa' => 'Terasa', 
        'Zahradka' => 'Zahradka',
        'Miestnost_A' => 'Predná miestnosť',
        'Miestnost_B' => 'Zadná miestnosť',
        );

        
        $form = new Form;

        $form->addText('name', 'Meno:')->setRequired();

        $form->addText('lastname', 'Priezvisko:')->setRequired();    

        $form->addText('phone', 'Tel. číslo:')->setRequired(); 

        $form->addText('email', 'Email:')
            ->setType('email')
            ->setRequired();

        $form->addDateTimePicker('date_time', 'Dátum a čas:')
            ->setRequired(); 
        
       // $form->addTimePicker('time', 'Čas:');

        $form->addText('people', 'Počet osôb:')
            ->setType('number') 
            ->setRequired()
            ->addRule(Form::INTEGER, 'Počet osôb musí být číslo')
            ->addRule(Form::RANGE, 'Počet osôb musí byť vačsí ako jedna a menší ako 15. Pri vačsom počte ludí nás kontaktuje telefonicky alebo e-mailom', array(1, 15));
        

        $form->addSelect('room', 'Miestnosť:', $rooms)->setPrompt('Zvolte miestnosť');
            
            //$tables = $this->getFreeTables($form->values->room);    

        $form->addSelect('table', 'Stôl:')->setPrompt('Zvolte najskôr miestnosť');
    
        $form->addSubmit('send', 'Odoslať rezerváciu');

        $form->onSuccess[] = array($this, 'reservationFormSucceeded');
        //$form->onSuccess[] = $this->processSelectForm;
        return $form;
    }


    public function reservationFormSucceeded(Form $form){
        
        $values = $form->getHttpData();
        unset($values['send']);
        //dump($values);
         
        $client = $this->database->table('client')->insert(array(
            'name' => $values['name'],
            'lastname' => $values ['lastname'],  
            'phone' => $values['phone'],  
            'email' => $values['email'],
        ));

        $d = strtotime($values['date_time']);
        $date = date('Y-m-d', $d);
        $time = date('H:i:s', $d);
        $this->database->table('reservation')->insert(array(
            '_date' => $date,
            '_time' => $time,
            'id_table' => $values['table'],
            'id_client' => $client->id
        ));

        $this->flashMessage('Ďakujeme za rezerváciu, bližšie informácie Vám boli zaslané na uvenú emailovú adresu.', 'success');

        $this->redirect('this');
    }

    public function actionDelete($reservationID)
    {   

        if (!$this->getUser()->isLoggedIn()) {
            $this->redirect('Homepage:');
        }

        $reservation = $this->database->table('reservation')->get($reservationID);
        if (!$reservation ) {
            $this->error('Rezervácia už nieje v databáze');
        }
        else{
            $reservation->delete();
        }

        //add check window
        $this->flashMessage('Rezervácia bola odstránená', 'success');
        $this->redirect('Reserve:show');
    }

}
