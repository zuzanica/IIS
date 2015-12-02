<?php
// source: /opt/lampp/htdocs/IIS/app/presenters/templates/Goods/default.latte

class Template81615d9cfd9954f70c103a4e1d32ab8a extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('7fb340a054', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb3b25c9e1b8_content')) { function _lb3b25c9e1b8_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>	
	<h2>Tovar </h2>
	<h3>Zoznam jedál</h3>

	<a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Goods:food"), ENT_COMPAT) ?>
">Pridať jedlo</a>
	<div class="food">
	    <table border="1" style="width:50%">
  		<tr>
  			<th>ID</th>
    		<th>Nazáv</th>
    		<th>Typ</th>
    		<th>Alergeny</th>
    		<th>Váha[g]</th>
    		<th>Cena</th>
  		</tr>
<?php $iterations = 0; foreach ($foods as $food) { ?>
	        <tr>
		        <td><?php echo Latte\Runtime\Filters::escapeHtml($food->id, ENT_NOQUOTES) ?></td> 
		        <td><?php echo Latte\Runtime\Filters::escapeHtml($food->name, ENT_NOQUOTES) ?></td> 
		        <td><?php echo Latte\Runtime\Filters::escapeHtml($food->type, ENT_NOQUOTES) ?></td> 
		        <td><?php echo Latte\Runtime\Filters::escapeHtml($food->alergens, ENT_NOQUOTES) ?></td> 
		        <td><?php echo Latte\Runtime\Filters::escapeHtml($food->weigth, ENT_NOQUOTES) ?></td> 
		        <td><?php echo Latte\Runtime\Filters::escapeHtml($food->prize, ENT_NOQUOTES) ?></td> 
		        <td><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("deletefood", array($food->id)), ENT_COMPAT) ?>
">Odstrániť tovar</a></td>
	        </tr>
<?php $iterations++; } ?>
	    </table>
	</div>

	<h3>Zoznam nápojov</h3>

	<a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Goods:drink"), ENT_COMPAT) ?>
">Pridať nápoj</a>
	<div class="drink">
	    <table border="1" style="width:50%">
  		<tr>
  			<th>ID</th>
    		<th>Nazáv</th>
    		<th>Alergeny</th>
    		<th>Objem[ml]</th>
    		<th>Cena</th>
  		</tr>
<?php $iterations = 0; foreach ($drinks as $drink) { ?>
	        <tr>
		        <td><?php echo Latte\Runtime\Filters::escapeHtml($drink->id, ENT_NOQUOTES) ?></td> 
		        <td><?php echo Latte\Runtime\Filters::escapeHtml($drink->name, ENT_NOQUOTES) ?></td>  
		        <td><?php echo Latte\Runtime\Filters::escapeHtml($drink->alergens, ENT_NOQUOTES) ?></td> 
		        <td><?php echo Latte\Runtime\Filters::escapeHtml($drink->volume, ENT_NOQUOTES) ?></td> 
		        <td><?php echo Latte\Runtime\Filters::escapeHtml($drink->prize, ENT_NOQUOTES) ?></td>
		        <td><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("deletedrink", array($drink->id)), ENT_COMPAT) ?>
">Odstrániť tovar</a></td> 
	        </tr>
<?php $iterations++; } ?>
	    </table>
	</div>
<?php
}}

//
// end of blocks
//

// template extending

$_l->extends = empty($_g->extended) && isset($_control) && $_control instanceof Nette\Application\UI\Presenter ? $_control->findLayoutTemplateFile() : NULL; $_g->extended = TRUE;

if ($_l->extends) { ob_start();}

// prolog Nette\Bridges\ApplicationLatte\UIMacros

// snippets support
if (empty($_l->extends) && !empty($_control->snippetMode)) {
	return Nette\Bridges\ApplicationLatte\UIRuntime::renderSnippets($_control, $_b, get_defined_vars());
}

//
// main template
//
if ($_l->extends) { ob_end_clean(); return $template->renderChildTemplate($_l->extends, get_defined_vars()); }
call_user_func(reset($_b->blocks['content']), $_b, get_defined_vars()) ; 
}}