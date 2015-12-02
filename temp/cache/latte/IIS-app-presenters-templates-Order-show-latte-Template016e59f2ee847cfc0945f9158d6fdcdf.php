<?php
// source: /opt/lampp/htdocs/IIS/app/presenters/templates/Order/show.latte

class Template016e59f2ee847cfc0945f9158d6fdcdf extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('7ae0a49f0e', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lbec1ae6ee7e_content')) { function _lbec1ae6ee7e_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>	
	<h2>Objednávka č. : <?php echo Latte\Runtime\Filters::escapeHtml($order['id'], ENT_NOQUOTES) ?>
 , stôl: <?php echo Latte\Runtime\Filters::escapeHtml($order['table'], ENT_NOQUOTES) ?> </h2>	

	<a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Order:edit", array($order['id'])), ENT_COMPAT) ?>
">Upraviť objednávku</a>
	<div class="orders">
	    <table border="1" style="width:50%" >
  		<tr>
  			<th>Produkt</th>
    		<th>Množstvo</th>
    		<th>Cena</th>
  		</tr>
<?php $iterations = 0; foreach ($items as $item) { ?>
	        <tr>
		        <td><?php echo Latte\Runtime\Filters::escapeHtml($item->name, ENT_NOQUOTES) ?></td> 
		        <td><?php echo Latte\Runtime\Filters::escapeHtml($item->amount, ENT_NOQUOTES) ?></td> 
		        <td><?php echo Latte\Runtime\Filters::escapeHtml($item->prize, ENT_NOQUOTES) ?></td>
	        </tr>
<?php $iterations++; } ?>
	    <tr>
		    <td></td> 
		    <td></td> 
		    <td><?php echo Latte\Runtime\Filters::escapeHtml($order['payment'], ENT_NOQUOTES) ?></td>
	    </tr>
	    </table>
	</div>	

	<h3><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Order:pay", array($order['id'])), ENT_COMPAT) ?>
">Zaplatiť <?php echo Latte\Runtime\Filters::escapeHtml($order['payment'], ENT_NOQUOTES) ?> € </a></h3>

	<a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Order:"), ENT_COMPAT) ?>
">← Spať na zoznam objednávok</a>
	
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