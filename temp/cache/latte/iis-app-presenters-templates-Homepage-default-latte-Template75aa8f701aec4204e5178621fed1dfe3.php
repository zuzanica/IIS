<?php
// source: /opt/lampp/htdocs/iis/app/presenters/templates/Homepage/default.latte

class Template75aa8f701aec4204e5178621fed1dfe3 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('291ce1d280', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lbfaebda8e0b_content')) { function _lbfaebda8e0b_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;call_user_func(reset($_b->blocks['title']), $_b, get_defined_vars())  ?>

<?php $iterations = 0; foreach ($posts as $post) { ?> 	<div class="post">
	    <div class="date"><?php echo Latte\Runtime\Filters::escapeHtml($template->date($post->created_at, 'F j, Y'), ENT_NOQUOTES) ?></div>

	    <h2><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Post:show", array($post->id)), ENT_COMPAT) ?>
"><?php echo Latte\Runtime\Filters::escapeHtml($post->title, ENT_NOQUOTES) ?></a></h2>

	    <div><?php echo Latte\Runtime\Filters::escapeHtml($post->content, ENT_NOQUOTES) ?></div>
	</div>
<?php $iterations++; } ?>



<?php
}}

//
// block title
//
if (!function_exists($_b->blocks['title'][] = '_lb7240a4cbd0_title')) { function _lb7240a4cbd0_title($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>	<h1>Můj blog</h1>
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