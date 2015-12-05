<?php
// source: /opt/lampp/htdocs/IIS/app/presenters/templates/Reserve/show.latte

class Template58a393d36219e14843ff7ca75f3da34c extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('5cdb0c9fbb', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb4ef1ed152c_content')) { function _lb4ef1ed152c_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>	
	<h2>Rezervácie </h2>

	<div class="reservation">
	    <table class="table table-hover">
  		<tr>
  			<th>ID</th>
  			<th>Dátum</th>
  			<th>Čas</th>
  			<th>Stôl</th>
    		<th>Meno</th>
    		<th>Priezvisko</th>
    		<th>E-mail</th>
    		<th>Tel. č.</th>
  		</tr>
<?php $iterations = 0; foreach ($reservations as $reservation) { ?>
	        <tr>
		        <td><?php echo Latte\Runtime\Filters::escapeHtml($reservation->id, ENT_NOQUOTES) ?></td>
		        <td><?php echo Latte\Runtime\Filters::escapeHtml($reservation->_date->format("d.m.Y"), ENT_NOQUOTES) ?></td> 
		        <td><?php echo Latte\Runtime\Filters::escapeHtml($reservation->_time->format('%H:%M:%S'), ENT_NOQUOTES) ?></td> 
		        <td><?php echo Latte\Runtime\Filters::escapeHtml($reservation->id_table, ENT_NOQUOTES) ?></td> 
		        <td><?php echo Latte\Runtime\Filters::escapeHtml($reservation->name, ENT_NOQUOTES) ?></td> 
		        <td><?php echo Latte\Runtime\Filters::escapeHtml($reservation->lastname, ENT_NOQUOTES) ?></td> 
		        <td><?php echo Latte\Runtime\Filters::escapeHtml($reservation->email, ENT_NOQUOTES) ?></td> 
		        <td><?php echo Latte\Runtime\Filters::escapeHtml($reservation->phone, ENT_NOQUOTES) ?></td> 
		        <td><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("delete", array($reservation->id)), ENT_COMPAT) ?>
">Odstrániť rezerváciu</a></td>
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