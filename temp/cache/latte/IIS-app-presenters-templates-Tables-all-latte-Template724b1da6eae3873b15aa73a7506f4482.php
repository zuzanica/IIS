<?php
// source: /opt/lampp/htdocs/IIS/app/presenters/templates/Tables/all.latte

class Template724b1da6eae3873b15aa73a7506f4482 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('7d7a738a27', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb24fb7548a5_content')) { function _lb24fb7548a5_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>	<h2> stoly </h2>
	<a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("showAll"), ENT_COMPAT) ?>
">Zobrazit všetky stoly</a>
	<a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("showFree"), ENT_COMPAT) ?>
">Zobrazit volné stoly</a>

	<div class="terrace">
		<h3> Stoly na terase </h3>
<?php $iterations = 0; foreach ($terrace as $t_table) { ?>
	        <p>Stol : <?php echo Latte\Runtime\Filters::escapeHtml($t_table->id, ENT_NOQUOTES) ?>
, pocet miest: <?php echo Latte\Runtime\Filters::escapeHtml($t_table->seats, ENT_NOQUOTES) ?></p>
<?php $iterations++; } ?>
	</div>

	<div class="gadren">
		<h3> Stoly na záhradke </h3>
<?php $iterations = 0; foreach ($garden as $table) { ?>
	        <p>Stol : <?php echo Latte\Runtime\Filters::escapeHtml($table->id, ENT_NOQUOTES) ?>
, pocet miest: <?php echo Latte\Runtime\Filters::escapeHtml($table->seats, ENT_NOQUOTES) ?></p>
<?php $iterations++; } ?>
	</div>

	<div class="room_A">
		<h3> Stoly v prvej miestnosti</h3>
<?php $iterations = 0; foreach ($room_A as $table) { ?>
	        <p>Stol : <?php echo Latte\Runtime\Filters::escapeHtml($table->id, ENT_NOQUOTES) ?>
, pocet miest: <?php echo Latte\Runtime\Filters::escapeHtml($table->seats, ENT_NOQUOTES) ?></p>
<?php $iterations++; } ?>
	</div>

	<div class="room_B">
		<h3> Stoly v zadnej miestnosti </h3>
<?php $iterations = 0; foreach ($room_B as $table) { ?>
	        <p>Stol : <?php echo Latte\Runtime\Filters::escapeHtml($table->id, ENT_NOQUOTES) ?>
, pocet miest: <?php echo Latte\Runtime\Filters::escapeHtml($table->seats, ENT_NOQUOTES) ?></p>
<?php $iterations++; } ?>
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