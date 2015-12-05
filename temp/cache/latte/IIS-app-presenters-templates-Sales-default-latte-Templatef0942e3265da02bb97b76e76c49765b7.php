<?php
// source: /opt/lampp/htdocs/IIS/app/presenters/templates/Sales/default.latte

class Templatef0942e3265da02bb97b76e76c49765b7 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('42d7dcd231', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb57991bc9af_content')) { function _lb57991bc9af_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>	
	<h2>Tržby </h2>
	<div class="right">
<?php $_l->tmp = $_control->getComponent("monthForm"); if ($_l->tmp instanceof Nette\Application\UI\IRenderable) $_l->tmp->redrawControl(NULL, FALSE); $_l->tmp->render() ?>
	</div>

	<div class="payment">
	    <table class="table table-hover" >
  		<tr>
  			<th>ID</th>
    		<th>Dátum/čas</th>
    		<th>Suma </th>
    		<th>Stav</th>
  		</tr>
<?php $iterations = 0; foreach ($payments as $payment) { ?>
	        <tr>
		        <td align="center"><?php echo Latte\Runtime\Filters::escapeHtml($payment->id, ENT_NOQUOTES) ?></td> 
		        <td><?php echo Latte\Runtime\Filters::escapeHtml($payment->date_time, ENT_NOQUOTES) ?></td> 
		        <td><?php echo Latte\Runtime\Filters::escapeHtml($payment->amount, ENT_NOQUOTES) ?> €</td>
		        <td><?php echo Latte\Runtime\Filters::escapeHtml($payment->state, ENT_NOQUOTES) ?></td>
	        </tr>
<?php $iterations++; } ?>
	    </table>
	</div>	

	<p class=sum >Spolu: <?php echo Latte\Runtime\Filters::escapeHtml($sum, ENT_NOQUOTES) ?> €</p>

	
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