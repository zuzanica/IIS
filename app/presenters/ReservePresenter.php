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

   /* public function renderDefault()
	{
    $this->template->posts = $this->database->table('posts')
        ->order('created_at DESC')
        ->limit(5);
	}*/

    public function renderShow($orderId)
    {   

        $context = $this->database;


        $this->template->reservations = $context->query(
            'SELECT r.id, r._date, r._time, r.id_table, c.name, c.lastname, c.email, c.phone  FROM client c, reservation r WHERE r.id_client = c.id');
        //select all item in selcted order
    }

    public function createComponentReservationForm(){

        $rooms = array(
        'Terasa' => 'Terasa', 
        'Zahradka' => 'Zahradka',
        'Miestnost_A' => 'Miestnost_A',
        'Miestnost_B' => 'Miestnost_B',
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

        $form->addSelect('room', 'Miestnosť:', $rooms)->setPrompt('Zvolte miestnosť')
            ->setAttribute('onchange', 'submit()');
            
            $tables = $this->getFreeTables($form->values->room);    

        $form->addSelect('tables', 'Stôl:', $tables)->setPrompt('Zvolte stôl');
    
        $form->addSubmit('send', 'Odoslať rezerváciu');

        $form->onSuccess[] = array($this, 'reservationFormSucceeded');
        return $form;
    }


    public function reservationFormSucceeded($form, $values){
        
       // echo 'submit succes';
        $clientId = $this->getParameter('clientId');
         
         $this->database->table('client')->insert(array(
            'id' => $clientId,
            'name' => $values->name,
            'lastname' => $values->lastname,  
            'phone' => $values->phone,  
            'email' => $values->email,
        ));

        $resId = $this->getParameter('resId');

        $this->database->table('reservation')->insert(array(
            'id' => $resId,
            '_date' => $values->date,
            '_time' => $values->time,
            'id_table' => $values->table,
            'id_client' => $clientId
        ));

        $this->flashMessage('Ďakujeme za rezerváciu, bližšie informácie Vám boli zaslané na uvenú emailovú adresu.', 'success');
        
        $this->redirect('this');
    }

    public function getFreeTables($val){

        $selection = $this->database->table('tables');
        $selection->where('place', $val);

        $tables = array();
        foreach ($selection as $table => $row){
            //echo 'honota:', $table; 
            $tables[] = $table;
        }

        return $tables;

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
        $this->redirect('this');
    }



}
