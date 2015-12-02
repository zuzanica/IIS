<?php

namespace App\Presenters;

use Nette,
    Nette\Application\UI\Form;
use App\Model;

class SalesPresenter extends BasePresenter
{
	private $database;
    public $month = 0;

	 public function __construct(Nette\Database\Context $database)
    {
        $this->database = $database;
    }

    public function renderDefault()
    {   

  		$context = $this->database;

        $payments = $context->table('payment')->where('state', "uhradená");
        //check if month was selected
        if(is_numeric($this->month) && $this->month > 0 && $this->month <= 12){
            $p = array();
            $sum = 0;
            foreach ($payments as $payment) {
                $paymentDate = $payment->date_time->format('m');
                if($payment->date_time->format('m') == $this->month){
                    $p[] = $payment;
                    $sum += $payment->amount; 
                }
            }
            $this->template->payments = $p;
            $this->template->sum = $sum;
        }else{
            $this->template->payments = $payments;
            $this->template->sum = $context->table('payment')->where('state', "uhradená")->sum('amount');
        }     
       
        //$this->flashMessage(print_r($payment->date_time->format('m')));
    }

    protected function createComponentMonthForm(){

        $months = array(
            '1' => "január",
            '2' => "február",  
            '3' => "marec", 
            '4' => "apríl", 
            '5' => "máj", 
            '6' => "jún", 
            '7' => "júl", 
            '8' => "august", 
            '9' => "september", 
            '10' => "oktober", 
            '11' => "november", 
            '12' => "december", 
        );

        $form = new Form;   
        $form->addSelect('month', 'Miesiac:', $months)->setPrompt('Zvolte mesiac')
            ->setAttribute('onchange', 'submit()');

        $form->onSuccess[] = array($this, 'monthFormSucceeded');
        return $form;
    }    

    public function monthFormSucceeded(Form $form)
    {
        if (!$this->getUser()->isAllowed('Sales')) {
            $this->redirect('Homepage:');
        }

        $values = $form->getValues(true);

        $this->month = $values['month'];
        //$this->flashMessage(print_r($values['month']));

    }
} 