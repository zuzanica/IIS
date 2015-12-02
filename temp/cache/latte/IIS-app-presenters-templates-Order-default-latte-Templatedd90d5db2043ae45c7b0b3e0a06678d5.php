<?php
// source: /opt/lampp/htdocs/IIS/app/presenters/templates/Order/default.latte

class Templatedd90d5db2043ae45c7b0b3e0a06678d5 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('f64e2999b0', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb91c56aa178_content')) { function _lb91c56aa178_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>	
	<h2>Objednávky </h2>

	<a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Order:new"), ENT_COMPAT) ?>
">Nová objednávka</a>

	<div class="orders">
	    <table border="1" style="width:50%" >
  		<tr>
  			<th>ID</th>
    		<th>Číslo stola</th>
    		<th>Suma</th>
    		<th>Stav</th>
  		</tr>
<?php $iterations = 0; foreach ($orders as $order) { ?>
	        <tr>
		        <td align="center"><?php echo Latte\Runtime\Filters::escapeHtml($order->id, ENT_NOQUOTES) ?></td> 
		        <td><?php echo Latte\Runtime\Filters::escapeHtml($order->id_table, ENT_NOQUOTES) ?></td> 
		        <td><?php echo Latte\Runtime\Filters::escapeHtml($order->amount, ENT_NOQUOTES) ?></td>
		        <td><?php echo Latte\Runtime\Filters::escapeHtml($order->state, ENT_NOQUOTES) ?></td> 
		        <td><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Order:show", array($order->id)), ENT_COMPAT) ?>
">Zobrazit</a></td>
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