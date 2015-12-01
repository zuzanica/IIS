<?php

namespace App\Presenters;

use Nette,
    Nette\Application\UI\Form;
use App\Model;

class GoodsPresenter extends BasePresenter
{
	private $database;

	 public function __construct(Nette\Database\Context $database)
    {
        $this->database = $database;
    }

    public function renderDefault()
    {
  		$context = $this->database;

        $this->template->foods = $context->query('SELECT * FROM goods g, food f WHERE g.id = f.id_goods ORDER BY g.id');
        $this->template->drinks = $context->query('SELECT * FROM goods g, drink d WHERE g.id = d.id_goods ORDER BY g.id');
    }

    public function actionDeletefood($goodsID)
    {
        $component = $this->database->table('goods')->get($goodsID);
        $food = $this->database->table('food')->where('id_goods', $goodsID);
        if (!$component or !$food) {
            $this->error('Jedlo nieje v databáze');
        }
        else{
            $this->database->table('food')->where('id_goods', $goodsID)->delete();    
            $this->database->table('goods')->where('id', $goodsID)->delete();    
        }

        //add check window
        $this->flashMessage('Jedlo bolo odstránené', 'success');
        $this->redirect('Goods:');
    }

    public function actionDeletedrink($goodsID)
    {
        $component = $this->database->table('goods')->get($goodsID);
        $drink = $this->database->table('drink')->where('id_goods', $goodsID);
        if (!$component or !$drink) {
            $this->error('Jedlo nieje v databáze');
        }
        else{
            $this->database->table('drink')->where('id_goods', $goodsID)->delete();
            $this->database->table('goods')->where('id', $goodsID)->delete();    
        }

        //add check window
        $this->flashMessage('Jedlo bolo odstránené', 'success');
        $this->redirect('Goods:');
    }

    /**
     * Formular for adding new employees to database 
     */
    protected function createComponentFoodForm()
    {   
        $type = array( 
        'Hlavné jedlo' => 'Hlavné jedlo',
        'Rýchle obcerstvenie' => 'Rýchle obcerstvenie',
        'Predjedlo' => 'Predjedlo',
        'Polievka' => 'Polievka',
        'Dezert' => 'Dezert'
        );

        $form = new Form;

        $form->addText('name', 'Názov:')
            ->setRequired();
        $form->addText('prize', 'Cena:')
            ->setRequired();    
        $form->addText('alergens', 'Alergény:');
        $form->addText('weigth', 'Hmotnosť:');
        $form->addSelect('type', 'Typ:', $type)->setPrompt('Zvolte typ')
            ->setRequired();  
                
        $form->addSubmit('send', 'Vložiť');
        $form->onSuccess[] = array($this, 'foodFormSucceeded');

        return $form;
    }


    public function foodFormSucceeded($form, $values)
    {
        
        if (!$this->getUser()->isAllowed('Goods')) {
            $this->redirect('Homepage:');
        }

        $component = $this->database->table('goods')->insert(array(
            'id' => null,
            'name' => $values->name,
            'alergens' => $values->alergens,  
            'prize' => $values->prize
        ));

        $drink = $this->database->table('food')->insert(array(
            'id_goods' => $component->id,
            'type' => $values->type,
            'weigth' => $values->weigth
        ));

        $this->flashMessage('Užívateľ bol úspešne pridaný.', 'success');
        $this->redirect('Goods:');
    }


        protected function createComponentDrinkForm()
    {   

        $form = new Form;

        $form->addText('name', 'Názov:')
            ->setRequired();
        $form->addText('prize', 'Cena:')
            ->setRequired();    
        $form->addText('alergens', 'Alergény:');
        $form->addText('volume', 'Objem:');

        $form->addSubmit('send', 'Vložiť');
        $form->onSuccess[] = array($this, 'drinkFormSucceeded');

        return $form;
    }


    public function drinkFormSucceeded($form, $values)
    {
        
        if (!$this->getUser()->isAllowed('Goods')) {
            $this->redirect('Homepage:');
        }

        //$idGoods = $this->getParameter('id');
        $component = $this->database->table('goods')->insert(array(
            'id' => null,
            'name' => $values->name,
            'alergens' => $values->alergens,  
            'prize' => $values->prize 
        ));

        $food = $this->database->table('drink')->insert(array(
            'id_goods' => $component->id,
            'volume' => $values->volume  
        ));

        $this->flashMessage('Užívateľ bol úspešne pridaný.', 'success');
        $this->redirect('Goods:');
    }
  
} 