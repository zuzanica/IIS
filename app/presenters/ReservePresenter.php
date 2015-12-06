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

    public function renderDefault()
    {
        // required to enable form access in snippets      
        $this->template->_form = $this['reservationForm'];
    }

    public function renderShow($orderId)
    {   

        $context = $this->database;
        $this->template->reservations = $context->query(
            'SELECT r.id, r._date, r._time, r.id_table, c.name, c.lastname, c.email, c.phone  FROM client c, reservation r WHERE r.id_client = c.id');
    }

    /**
    * Action called after form->select changed (working with JS in default.latte)
    */
    public function handleRoomChange($value)
    {
        if ($value) {
            $tables= $this->database->table('tables')->where('place', $value);

            $tablesInRoom = array();
            foreach ($tables as $table){
                $tablesInRoom[$table->id] = $table->id . ', miest: '. $table->seats;
            }

            $this['reservationForm']['table']->setPrompt('Zvolte stôl')
                ->setItems($tablesInRoom)
                ->setRequired("Vyberete stôl");      

        } else {
            $this['reservationForm']['table']->setPrompt('Zvolte miestnosť')
                ->setItems(array());  
        }

        $this->invalidateControl('tableSnippet');
    }


    public function getFreeTimes(){
        $resTables = $this->database->table('times');

        $free_times = array();
            foreach ($resTables as $resT){
                $free_times[$resT->id] = $resT->free_time->format('%H:%I');
            }
        return $free_times;
        
    }

    public function createComponentReservationForm(){

        $today = date('Y-m-d');     

        $rooms = array(
        'terasa' => 'Terasa', 
        'Zahradka' => 'Zahradka',
        'Miestnost_A' => 'Predná miestnosť',
        'Miestnost_B' => 'Zadná miestnosť',
        );

        $free_times =$this->getFreeTimes();

        $form = new Form;

        $form->addText('name', '* Meno:')->setRequired('Zadajte Vaše Meno.');

        $form->addText('lastname', '* Priezvisko:')->setRequired('Zadajte Vaše Priezvisko.');    

        $form->addText('phone', 'Tel. číslo:'); 

        $form->addText('email', '* Email:')
            ->setType('email')
            ->setRequired('Zadajte e-mail.');
   
        
        $form->addText('people', '* Počet osôb:')
            ->setType('number') 
            ->addRule(Form::INTEGER, 'Počet osôb musí být číslo')
            ->addRule(Form::RANGE, 'Počet osôb musí byť vačsí ako jedna a menší ako 15. Pri vačsom počte ludí nás kontaktuje telefonicky alebo e-mailom', array(1, 15));
        

        $form->addSelect('room', '* Miestnosť:', $rooms)->setPrompt('Zvolte miestnosť')
            ->setRequired('Vyberete miestnosť');   

        $form->addSelect('table', '* Stôl:')->setPrompt('Zvolte najskôr miestnosť');

        $form->addDatePicker('date', '* Dátum:')
            ->setDefaultValue($today)
            ->setRequired('Zvolte dátum.'); 

        $form->addSelect('time', '* Čas:', $free_times)->setPrompt('Zvolte čas.')
        ->setRequired('Zvolte čas.'); 

        $form->addSubmit('send', 'Odoslať rezerváciu');

        $form->onValidate[] = array($this, 'reservationFormSucceeded');
        return $form;
    }


    public function reservationFormSucceeded(Form $form){

        $values = $form->getHttpData();
        unset($values['send']);
       // dump($values);
        $reservation = $this->database->table('reservation');
        $reserved = false; 
        $t= $this->database->table('times')->get($values['time']);

        foreach ($reservation as $r) {
            //$this->flashMessage(print_r($values ['time']));
            if($r->id_table == $values ['table'] 
                && $r->_time->format('%H:%I:%S') == $t->free_time->format('%H:%I:%S') 
                && $r->_date->format('Y-m-d') == $values ['date'])
            {
                $reserved = true;    
            }  
        }   

            if($reserved)
            {
                $form->addError('Ľutujeme niekto si už rezervoval toto miesto zmente prosím čas alebo stôl.');
            }        
            else
            {
            //insert into table client 
            $client = $this->database->table('client')->insert(array(
                'name' => $values['name'],
                'lastname' => $values ['lastname'],  
                'phone' => $values['phone'],  
                'email' => $values['email'],
            ));

            //create valit Date and Time format
            //$d = strtotime($values['date_time']);
            //$date = date('Y-m-d', $d);
            //$time = date('H:i:s', $d);
            //insert into table reservation
            $t= $this->database->table('times')->get($values['time']);

            $this->database->table('reservation')->insert(array(
                '_date' => $values['date'],
                '_time' => $t->free_time,
                'id_table' => $values['table'],
                'id_client' => $client->id
            ));

            $this->flashMessage('Ďakujeme za rezerváciu.', 'success');

            $this->redirect('Reserve:');

            } 
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
