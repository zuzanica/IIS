<?php
// source: /opt/lampp/htdocs/IIS/app/presenters/templates/Sign/in.latte

class Template18856956871c1e23d662c1fe9f74ae89 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('14038714a0', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb825cb1d2b8_content')) { function _lb825cb1d2b8_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;if ($user->loggedIn) { ?>
		<div class="user">{}</div>
	    <p><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Sign:out"), ENT_COMPAT) ?>
">Odhlásit</a></p>

<?php } else { ?>
	 	<div class="signIn">
<?php call_user_func(reset($_b->blocks['title']), $_b, get_defined_vars()) ; $_l->tmp = $_control->getComponent("signInForm"); if ($_l->tmp instanceof Nette\Application\UI\IRenderable) $_l->tmp->redrawControl(NULL, FALSE); $_l->tmp->render() ?>
		</div>
<?php } ?>

<?php
}}

//
// block title
//
if (!function_exists($_b->blocks['title'][] = '_lb6a7454f128_title')) { function _lb6a7454f128_title($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>	 		<h2>Prihlásenie</h2>
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