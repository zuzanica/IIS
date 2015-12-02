<?php
// source: /opt/lampp/htdocs/IIS/app/presenters/templates/Test/default.latte

class Templatec4249a88feec45162ce8808ae9f48f1d extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('f4143b39cd', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb056e79ef00_content')) { function _lb056e79ef00_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin($form = $_form = $_control["form"], array()) ?>

<?php $_input = $_form["one"];echo Nextras\Forms\Bridges\Latte\Macros\BS3InputMacros::input($_input->getControl()->addAttributes(array('size' => 3)), $_input, false)  ?>
<div id="<?php echo $_control->getSnippetId('two') ?>"><?php call_user_func(reset($_b->blocks['_two']), $_b, $template->getParameters()) ?>
</div><?php $_input = $_form["send"];echo Nextras\Forms\Bridges\Latte\Macros\BS3InputMacros::input($_input->getControl()->addAttributes(array()), $_input, false) ;echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd($_form) ?>


<?php
}}

//
// block _two
//
if (!function_exists($_b->blocks['_two'][] = '_lb35003ed85b__two')) { function _lb35003ed85b__two($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v; $_control->redrawControl('two', FALSE)
;$_input = $_form["two"];echo Nextras\Forms\Bridges\Latte\Macros\BS3InputMacros::input($_input->getControl()->addAttributes(array('size' => 3)), $_input, false) ;
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
  
}}