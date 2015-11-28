<?php
// source: /opt/lampp/htdocs/IIS/app/presenters/logedUsers/templates/Tables/default.latte

class Template9d477eec90c0e9d8273d3fed484c827c extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('3f80116217', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lbe09bf7e138_content')) { function _lbe09bf7e138_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>	
	<h2> stoly </h2>

	
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