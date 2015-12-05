<?php

namespace App\Presenters;

use Nette,
    Nette\Application\UI\Form;
use App\Model;

class OrderPresenter extends BasePresenter
{
	private $database;

	 public function __construct(Nette\Database\Context $database)
    {
        $this->database = $database;
    }

    public function renderDefault()
    {   

  		$context = $this->database;

        $this->template->orders = $context->query('SELECT o.id, o.id_table, p.amount, p.state FROM _order o, payment p WHERE o.id_payment = p.id');
        //$this->template->orders = $context->table('order')->order('id_table');
    }


    public function renderShow($orderId)
    {   

        $context = $this->database;
        $orderline= $context->table('_order')->get($orderId);

        $order = array();
        $order['id'] = $orderline->id;
        $order['payment'] = $orderline->payment->amount;
        $order['table'] = $orderline->id_table;

        //show everithing from order
        $this->template->order = $order;
        //select all item in selcted order
        $this->template->items = $context->query(
            'SELECT g.name, go.amount, g.prize FROM _order o, goods_order go, goods g 
            WHERE o.id = ? AND go.id_order = o.id AND go.id_goods = g.id', $orderId);


        //$this->flashMessage(print_r($orderline->id));
    }

     public function renderEdit($orderId)
    {   
        //show everithing from order
        $this->template->order = $orderId;
    }

    protected function createComponentAmounthForm()
    {   

        $context = $this->database;
        $foods = $context->query('SELECT * FROM goods g, food f WHERE g.id = f.id_goods ORDER BY g.id');
        $drinks = $context->query('SELECT * FROM goods g, drink d WHERE g.id = d.id_goods ORDER BY g.id');

        $tables = $context->table('tables');
        foreach ($tables as $table => $tab) {
            $t[$table] = $tab;
        }    

        $form = new Form;
        $form->addGroup('Stoly');   
        $form->addSelect('table', 'Stôl:', $t)->setPrompt('Zvolte stôl')
            ->setRequired();

        $form->addGroup('Jedlá  ');    
        foreach ($foods as $food) {
            $form->addText( $food->id, $food->name )
            ->setType('number') 
            ->addRule(Form::INTEGER, 'Počet osôb musí být číslo')
            ->addRule(Form::RANGE, 'Počet osôb musí byť vačsí ako jedna a menší ako 15. Pri vačsom počte ludí nás kontaktuje telefonicky alebo e-mailom', array(0, 100))
            ->setValue('0');
            //->setAttribute('onchange', 'submit()');
        }

        $form->addGroup('Nápoje');
        foreach ($drinks as $drink) {
            $form->addText( $drink->id, $drink->name )
            ->setType('number') 
            ->addRule(Form::INTEGER, 'Počet osôb musí být číslo')
            ->addRule(Form::RANGE, 'Počet osôb musí byť vačsí ako jedna a menší ako 15. Pri vačsom počte ludí nás kontaktuje telefonicky alebo e-mailom', array(0, 100))
            ->setValue('0');
            //->setAttribute('onchange', 'submit()');
        }

        $form->addGroup();
        $form->addSubmit('send', 'Hotovo');
        
        $form->onSuccess[] = array($this, 'amounthFormSucceeded');


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
                $control->getControlPrototype()->addClass(empty($usedPrimary) ? 'btn btn-primary' : 'btn btn-default');
                $usedPrimary = TRUE;
            } elseif ($control instanceof Controls\TextBase || $control instanceof Controls\SelectBox || $control instanceof Controls\MultiSelectBox) {
                $control->getControlPrototype()->addClass('form-control');
            } elseif ($control instanceof Controls\Checkbox || $control instanceof Controls\CheckboxList || $control instanceof Controls\RadioList) {
                $control->getSeparatorPrototype()->setName('div')->addClass($control->getControlPrototype()->type);
            }
        }

        return $form;
    }   


    public function amounthFormSucceeded(Form $form)
    {
        

        if (!$this->getUser()->isLoggedIn()) {
            $this->redirect('Homepage:');
        }
        $values = $form->getValues(true); 

        //$this->flashMessage(print_r($values));
        $db = $this->database;
        $now = date('Y-m-d H:i:s');     
        $sum = 0;
        foreach ($values as $key => $value){
            //echo 'key:' , $key , 'value:' , $value;
            if(is_numeric($key) && $value > 0){
                $p = $db->table('goods')->where('id', $key);
                //echo '  ', $p[$key]->prize, '  '  ;
                
                $sum += $p[$key]->prize*$value;
            }   
        }
        //create payment into every order    
        $payment = $db->table('payment')->insert(array(
            'id' => null,
            'amount' => $sum,
            'date_time' => $now,  
            'state' => 'neuhradena',
            'id_staff' => $this->getUser()->getID()
        ));    

        //echo $values['table'];
        $order = $db->table('_order')->insert(array(
            'id' => null,
            'id_reservation' => null,
            'id_table' => $values['table'],  
            'id_staff' => $this->getUser()->getID(), 
            'id_payment' => $payment->id
        ));



        foreach ($values as $key => $value){
            if(is_numeric($key) && $value > 0){
                $goods_order = $db->table('goods_order')->insert(array(
                    'amount' => $value,
                    'id_goods' => $key,  
                    'id_order' => $order->id, 
             ));
            }   
        }

        $this->flashMessage('Objednávka bola pridaná', 'success');
        $this->redirect('Order:');
    }


     protected function createComponentEditOrderForm()
    {   

        $context = $this->database;
        $foods = $context->query('SELECT * FROM goods g, food f WHERE g.id = f.id_goods ORDER BY g.id');
        $drinks = $context->query('SELECT * FROM goods g, drink d WHERE g.id = d.id_goods ORDER BY g.id');  

        $form = new Form;

        $form->addGroup('Jedlá  ');    
        foreach ($foods as $food) {
            $form->addText( $food->id, $food->name )
            ->setType('number') 
            ->addRule(Form::INTEGER, 'Počet osôb musí být číslo')
            ->addRule(Form::RANGE, 'Počet osôb musí byť vačsí ako jedna a menší ako 15. Pri vačsom počte ludí nás kontaktuje telefonicky alebo e-mailom', array(0, 100))
            ->setValue('0');
        }

        $form->addGroup('Nápoje');
        foreach ($drinks as $drink) {
            $form->addText( $drink->id, $drink->name )
            ->setType('number') 
            ->addRule(Form::INTEGER, 'Počet osôb musí být číslo')
            ->addRule(Form::RANGE, 'Počet osôb musí byť vačsí ako jedna a menší ako 15. Pri vačsom počte ludí nás kontaktuje telefonicky alebo e-mailom', array(0, 100))
            ->setValue('0');
        }

        $form->addGroup();
        $form->addSubmit('send', 'Hotovo');
        
        $form->onSuccess[] = array($this, 'editOrderFormSucceeded');

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

    /**NUTNO PRIDAT OBJEDNAVKU DO DATABAZE*/
    public function editOrderFormSucceeded(Form $form)
    {
        if (!$this->getUser()->isLoggedIn()) {
            $this->redirect('Homepage:');
        }
        $values = $form->getValues(true); 

        foreach ($values as $key => $value){
            if(is_numeric($key) && $value > 0){
                $goods_order = $db->table('goods_order')->insert(array(
                    'amount' => $value,
                    'id_goods' => $key,  
                    'id_order' => $order->id, 
             ));
            }   
        }

        $this->flashMessage('Objednávka bola zmenená', 'success');
        $this->redirect('Order:');
    }

    public function actionPay($orderId)
    {   
        if (!$this->getUser()->isLoggedIn()) {
            $this->redirect('Homepage:');
        }
        
        $payed_order = $this->database->table('_order')->get($orderId);
        //$orderline= $context->table('_order')->get($orderId);
        $paymentId = $payed_order->payment->id;

        $payment = $this->database->table('payment')->get($paymentId)->update(array(
            'state' => "uhradená",  
            'id_staff' => $this->getUser()->getID(), 
        ));

        /*$goods_orders = $this->database->query(
            'SELECT * FROM _order o, goods_order go 
            WHERE o.id = ? AND go.id_order = o.id', $orderId)*/
        $goods_orders = $this->database->table('goods_order')->where('id_order', $orderId)->delete();

        /*foreach ($goods_orders as $goods_order) {
            $goods_order->delete();
        }*/

        $payed_order->delete();
        $this->flashMessage('Objednávka bola zaplatená.', 'success');
        $this->redirect('Order:');
    }


    public function actionEdit($orderId){
        if (!$this->getUser()->isLoggedIn()) {
            $this->redirect('Homepage:');
        }

        $goods_orders = $this->database->table('goods_order')->where('id_order', $orderId);
        /*if (!$goods_orders) {
            $this->error('Na objednávku nieje v databáze');
        }*/
        $values = array();
        foreach ($goods_orders as $goods_order) {
            //$this->flashMessage(print_r($goods_order->id_goods));
            $values[$goods_order->id_goods] = $goods_order->amount;
        }

        $this['editOrderForm']->setDefaults($values);
    }

} 