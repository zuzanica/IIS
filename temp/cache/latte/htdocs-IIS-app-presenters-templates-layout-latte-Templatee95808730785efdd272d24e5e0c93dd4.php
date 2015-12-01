<?php
// source: /opt/lampp/htdocs/IIS/app/presenters/templates/@layout.latte

class Templatee95808730785efdd272d24e5e0c93dd4 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('4ac7bbb2a8', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block head
//
if (!function_exists($_b->blocks['head'][] = '_lbf9ac870696_head')) { function _lbf9ac870696_head($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;
}}

//
// block title
//
if (!function_exists($_b->blocks['title'][] = '_lb07b6ad8798_title')) { function _lb07b6ad8798_title($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>		 	<h2>Prihlásenie</h2>
<?php
}}

//
// block scripts
//
if (!function_exists($_b->blocks['scripts'][] = '_lbeaf477db7c_scripts')) { function _lbeaf477db7c_scripts($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="//nette.github.io/resources/js/netteForms.min.js"></script>
	<script src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/js/main.js"></script>
	<script src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/libs/ipub.formDateTime.js"></script>
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
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title><?php if (isset($_b->blocks["title"])) { ob_start(); Latte\Macros\BlockMacrosRuntime::callBlock($_b, 'title', $template->getParameters()); echo $template->striptags(ob_get_clean()) ?>
 | <?php } ?>Nette Sandbox</title>

	<link rel="stylesheet" href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/css/style.css">
	<link rel="shortcut icon" href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/favicon.ico">
	<meta name="viewport" content="width=device-width">
	<?php if ($_l->extends) { ob_end_clean(); return $template->renderChildTemplate($_l->extends, get_defined_vars()); }
call_user_func(reset($_b->blocks['head']), $_b, get_defined_vars())  ?>

</head>

<body>
<?php $iterations = 0; foreach ($flashes as $flash) { ?>	<div<?php if ($_l->tmp = array_filter(array('flash', $flash->type))) echo ' class="', Latte\Runtime\Filters::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT), '"' ?>
><?php echo Latte\Runtime\Filters::escapeHtml($flash->message, ENT_NOQUOTES) ?></div>
<?php $iterations++; } ?>

	<h1>Vitajte v restauracii u ...</h1>

	<ul class="navig">
	    <li><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Homepage:"), ENT_COMPAT) ?>
">O nas</a></li>
		<li><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Homepage:"), ENT_COMPAT) ?>
">Jenálniček</a></li>
		<li><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Contact:"), ENT_COMPAT) ?>
">Kontakt</a></li>
		<li><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Reserve:createReservation"), ENT_COMPAT) ?>
">Rezervovať</a></li>
	</ul>

	<ul>
<?php if ($user->loggedIn) { ?>
		<div class="user">Prihlásený ako: <?php echo Latte\Runtime\Filters::escapeHtml($user->getIdentity()->login, ENT_NOQUOTES) ?>

		<p><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Sign:chngpassword"), ENT_COMPAT) ?>
">Zmeniť heslo</a> <a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Sign:out"), ENT_COMPAT) ?>
">Odhlásit</a></p>
		</div>


<?php if ($user->isAllowed('Sales')) { ?>
	       	<li><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Homepage:"), ENT_COMPAT) ?>
">Tržby</a></li>
<?php } ?>

<?php if ($user->isAllowed('Goods')) { ?>
	       	<li><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Goods:"), ENT_COMPAT) ?>
">Tovar</a></li>
<?php } ?>
	    
<?php if ($user->isAllowed('Staff')) { ?>
	    	<li><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Staff:"), ENT_COMPAT) ?>
">Zamestnanci</a></li> 
<?php } ?>

<?php if ($user->isAllowed('Tables')) { ?>
	    	<li><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Tables:"), ENT_COMPAT) ?>
">Stoly</a></li> 
<?php } ?>
	    
<?php if ($user->isAllowed('Reservations')) { ?>
	    	<li><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Homepage:"), ENT_COMPAT) ?>
">Rezervacie</a></li>
<?php } ?>

<?php if ($user->isAllowed('Orders')) { ?>
	    	<li><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Order:"), ENT_COMPAT) ?>
">Objednavky</a></li> 
<?php } ?>
	
	</ul>
<?php } else { ?>
		 	<div class="signIn">
<?php call_user_func(reset($_b->blocks['title']), $_b, get_defined_vars()) ; $_l->tmp = $_control->getComponent("signInForm"); if ($_l->tmp instanceof Nette\Application\UI\IRenderable) $_l->tmp->redrawControl(NULL, FALSE); $_l->tmp->render() ?>

			</div>
<?php } ?>

	
	
<?php Latte\Macros\BlockMacrosRuntime::callBlock($_b, 'content', $template->getParameters()) ?>

<?php call_user_func(reset($_b->blocks['scripts']), $_b, get_defined_vars())  ?>


</body>
</html>
<?php
}}