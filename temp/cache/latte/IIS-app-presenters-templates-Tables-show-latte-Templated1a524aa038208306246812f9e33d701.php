<?php
// source: /opt/lampp/htdocs/IIS/app/presenters/templates/Tables/show.latte

class Templated1a524aa038208306246812f9e33d701 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('722527d14d', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb95c91830a4_content')) { function _lb95c91830a4_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>	<div class="terrace">
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
?>

<?php if ($_l->extends) { ob_end_clean(); return $template->renderChildTemplate($_l->extends, get_defined_vars()); }
call_user_func(reset($_b->blocks['content']), $_b, get_defined_vars()) ; 
}}