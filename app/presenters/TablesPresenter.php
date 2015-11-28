<?php

namespace App\Presenters;

use Nette;
use App\Model;

class TablesPresenter extends BasePresenter
{
	private $database;

	 public function __construct(Nette\Database\Context $database)
    {
        $this->database = $database;
    }

    public function renderDefault()
    {
  		
        $this->template->terrace = $this->database->table('tables')->where('place', 'Terasa');
        $this->template->garden = $this->database->table('tables')->where('place', 'Zahradka');
        $this->template->room_A = $this->database->table('tables')->where('place', 'Miestnost_A');  
        $this->template->room_B = $this->database->table('tables')->where('place', 'Miestnost_B');  
    }

    public function renderAlltables()
    {
        $this->template->terrace = $this->database->table('tables')->where('place', 'Terasa');
        $this->template->garden = $this->database->table('tables')->where('place', 'Zahradka');
        $this->template->room_A = $this->database->table('tables')->where('place', 'Miestnost_A');  
        $this->template->room_B = $this->database->table('tables')->where('place', 'Miestnost_B');  
    }    

    public function renderFreetables()
    {   

        $selectionA = $this->database->table('tables')->where('place = ? AND state = ?', 'Terasa', 'volný');
        $this->template->terrace =  $selectionA; 

        $selectionA = $this->database->table('tables')->where('place = ? AND state = ?', 'Zahradka', 'volný');
        $this->template->garden = $selectionA; 

        $selectionA = $this->database->table('tables')->where('place = ? AND state = ?', 'Miestnost_A', 'volný');
        $this->template->room_A = $selectionA;  
        
        $selectionA = $this->database->table('tables')->where('place = ? AND state = ?', 'Miestnost_B', 'volný');
        $this->template->room_B = $selectionA;   
    } 

    public function actionShowAll(){
        $this->redirect('Tables:alltables');
    }

    public function actionShowFree(){
        $this->redirect('Tables:freetables');
    }
}