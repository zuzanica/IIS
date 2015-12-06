<?php
// source: /opt/lampp/htdocs/IIS/app/presenters/templates/Homepage/contact.latte

class Templateee3c9547619cc2d3e17e87199423691e extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('3da7df44f3', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb380eaaba04_content')) { function _lb380eaaba04_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>	<div class=align-mid>

		<p>Vytvorili:</p>
		<dl>	
		  <dt>Zuzana Studená</dt>
		  <dd>Login: xstude22</dd>
		  <dd>E-mail: xstude22@stud.fit.vutbr.cz</dd>
		</dl>
		<dl>
		  <dt>Beňo Marek</dt>
		  <dd>Login: xbenom01</dd>
		  <dd>E-mail: xbenom01@stud.fit.vutbr.cz </dd>
		</dl>  

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
call_user_func(reset($_b->blocks['content']), $_b, get_defined_vars())  ?>	<?php
}}