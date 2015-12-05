<?php
// source: /opt/lampp/htdocs/IIS/app/presenters/templates/Tables/freetables.latte

class Templatecb7db3789024577cee5f21f4db3e1326 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('e859a5577b', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb0132e5ad11_content')) { function _lb0132e5ad11_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>	
	<h2> Stoly </h2>
	<div class="left" ><a  href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("showAll"), ENT_COMPAT) ?>
">Zobrazit všetky stoly</a></div>
	<div class="right" ><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("showFree"), ENT_COMPAT) ?>
">Zobrazit volné stoly</a></div>

	<div class="terrace">
		<h3> Stoly na terase </h3>
		<table class="table table-hover">
  		<tr>
    		<th>stol</td>
    		<th>pocet miest</td> 
    		<th>stav</td>
  		</tr>
<?php $iterations = 0; foreach ($terrace as $table) { ?>
	    	<tr>
		        <td><?php echo Latte\Runtime\Filters::escapeHtml($table->id, ENT_NOQUOTES) ?></td> 
		        <td><?php echo Latte\Runtime\Filters::escapeHtml($table->seats, ENT_NOQUOTES) ?></td>
		        <td><?php echo Latte\Runtime\Filters::escapeHtml($table->state, ENT_NOQUOTES) ?></<td>
	        </tr>
<?php $iterations++; } ?>
	    </table>
	</div>

	<div class="gadren">
		<h3> Stoly na záhradke </h3>
	    <table class="table table-hover">
  		<tr>
    		<th>stol</td>
    		<th>pocet miest</td> 
    		<th>stav</td>
  		</tr>
<?php $iterations = 0; foreach ($garden as $table) { ?>
	        <tr>
		        <td><?php echo Latte\Runtime\Filters::escapeHtml($table->id, ENT_NOQUOTES) ?></td> 
		        <td><?php echo Latte\Runtime\Filters::escapeHtml($table->seats, ENT_NOQUOTES) ?></td>
		        <td><?php echo Latte\Runtime\Filters::escapeHtml($table->state, ENT_NOQUOTES) ?></<td>
	        </tr>
<?php $iterations++; } ?>
	    </table>
	</div>

	<div class="room_A">
		<h3> Stoly v prvej miestnosti</h3>
		<table class="table table-hover">
  		<tr>
    		<th>stol</td>
    		<th>pocet miest</td> 
    		<th>stav</td>
  		</tr>
<?php $iterations = 0; foreach ($room_A as $table) { ?>
	        <tr>
		        <td><?php echo Latte\Runtime\Filters::escapeHtml($table->id, ENT_NOQUOTES) ?></td> 
		        <td><?php echo Latte\Runtime\Filters::escapeHtml($table->seats, ENT_NOQUOTES) ?></td>
		        <td><?php echo Latte\Runtime\Filters::escapeHtml($table->state, ENT_NOQUOTES) ?></<td>
	        </tr>
<?php $iterations++; } ?>
	    </table>
	</div>

	<div class="room_B">
		<h3> Stoly v zadnej miestnosti </h3>
	    <table class="table table-hover">
  		<tr>
    		<th>stol</td>
    		<th>pocet miest</td> 
    		<th>stav</td>
  		</tr>
<?php $iterations = 0; foreach ($room_B as $table) { ?>
	        <tr>
		        <td><?php echo Latte\Runtime\Filters::escapeHtml($table->id, ENT_NOQUOTES) ?></td> 
		        <td><?php echo Latte\Runtime\Filters::escapeHtml($table->seats, ENT_NOQUOTES) ?></td>
		        <td><?php echo Latte\Runtime\Filters::escapeHtml($table->state, ENT_NOQUOTES) ?></<td>
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