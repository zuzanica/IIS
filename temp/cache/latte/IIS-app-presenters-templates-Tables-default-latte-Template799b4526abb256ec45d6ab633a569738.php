<?php
// source: /opt/lampp/htdocs/IIS/app/presenters/templates/Tables/default.latte

class Template799b4526abb256ec45d6ab633a569738 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('cbb6a32c78', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb29c464a949_content')) { function _lb29c464a949_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>	
	<h2> stoly </h2>

	<a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("showAll"), ENT_COMPAT) ?>
">Zobrazit všetky stoly</a>
	<a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("showFree"), ENT_COMPAT) ?>
">Zobrazit volné stoly</a>

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