<?php
// source: /opt/lampp/htdocs/IIS/app/presenters/templates/Staff/edit.latte

class Template35bfa49622dc0817d0025a15bdfbd7b8 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('f66930591a', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb3783ae7152_content')) { function _lb3783ae7152_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>	<div class="center-form">
		<h2> Upraviť zamestnanca </h2>

<?php $_l->tmp = $_control->getComponent("staffForm"); if ($_l->tmp instanceof Nette\Application\UI\IRenderable) $_l->tmp->redrawControl(NULL, FALSE); $_l->tmp->render() ?>
	</div>	
	<a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Staff:"), ENT_COMPAT) ?>
">← Spať na zoznam zamestnancov</a>

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