<?php
// source: /opt/lampp/htdocs/iis/app/presenters/templates/Post/show.latte

class Template9b4d00e67d8e180a914e8079d88ecbc3 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('1a83e9340a', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lbfe06ba5e69_content')) { function _lbfe06ba5e69_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><p><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Homepage:default"), ENT_COMPAT) ?>
">← zpět na výpis příspěvků</a></p>

<div class="date"><?php echo Latte\Runtime\Filters::escapeHtml($template->date($post->created_at, 'F j, Y'), ENT_NOQUOTES) ?></div>

<?php call_user_func(reset($_b->blocks['title']), $_b, get_defined_vars())  ?>

<h2>Vložte nový příspěvek</h2>


<?php $_l->tmp = $_control->getComponent("commentForm"); if ($_l->tmp instanceof Nette\Application\UI\IRenderable) $_l->tmp->redrawControl(NULL, FALSE); $_l->tmp->render() ?>

<div class="post"><?php echo Latte\Runtime\Filters::escapeHtml($post->content, ENT_NOQUOTES) ?></div>

<h2>Komentáře</h2>

<div class="comments">
<?php $iterations = 0; foreach ($comments as $comment) { ?>
        <p><b><?php if ($_l->ifs[] = ($comment->email)) { ?><a href="mailto:<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($comment->email), ENT_COMPAT) ?>
"><?php } echo Latte\Runtime\Filters::escapeHtml($comment->name, ENT_NOQUOTES) ;if (array_pop($_l->ifs)) { ?>
</a><?php } ?>
</b> napsal:</p>
        <div><?php echo Latte\Runtime\Filters::escapeHtml($comment->content, ENT_NOQUOTES) ?></div>
<?php $iterations++; } ?>
</div>
<?php
}}

//
// block title
//
if (!function_exists($_b->blocks['title'][] = '_lbee54438b30_title')) { function _lbee54438b30_title($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><h1><?php echo Latte\Runtime\Filters::escapeHtml($post->title, ENT_NOQUOTES) ?></h1>
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