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
// block modal
//
if (!function_exists($_b->blocks['modal'][] = '_lb419d5821ec_modal')) { function _lb419d5821ec_modal($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  	<div class="modal-dialog">
    
	    <!-- Modal content-->
	    <div class="modal-content">
	      	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal">&times;</button>
	        	<h4 class="modal-title">Prihlásiť sa</h4>
	      	</div>
	      	<div class="modal-body">
<?php $_l->tmp = $_control->getComponent("signInForm"); if ($_l->tmp instanceof Nette\Application\UI\IRenderable) $_l->tmp->redrawControl(NULL, FALSE); $_l->tmp->render() ?>
	      	</div>

	    </div>
  	</div>
</div>

<?php
}}

//
// block head
//
if (!function_exists($_b->blocks['head'][] = '_lbf9ac870696_head')) { function _lbf9ac870696_head($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;
}}

//
// block scripts
//
if (!function_exists($_b->blocks['scripts'][] = '_lbeaf477db7c_scripts')) { function _lbeaf477db7c_scripts($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>		<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
		<script src="//nette.github.io/resources/js/netteForms.min.js"></script>
		<script src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/js/main.js"></script>
		<script src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/js/nette.ajax.js"></script>

		<script src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/js/bootstrap-datetimepicker.min.js"></script>

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
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
call_user_func(reset($_b->blocks['modal']), $_b, get_defined_vars())  ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title><?php if (isset($_b->blocks["title"])) { ob_start(); Latte\Macros\BlockMacrosRuntime::callBlock($_b, 'title', $template->getParameters()); echo $template->striptags(ob_get_clean()) ?>
 | <?php } ?>Nette Sandbox</title>

	<!--  BOOSTSTRAP -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">


	<link rel="stylesheet" type="text/css" href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/css/style.css">
	<link rel="shortcut icon" href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/favicon.ico">
	
	<link rel="stylesheet" type="text/css" href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/css/bootstrap-datetimepicker.min.css">
	<meta name="viewport" content="width=device-width">


	<?php call_user_func(reset($_b->blocks['head']), $_b, get_defined_vars())  ?>

</head>

<body>

<?php call_user_func(reset($_b->blocks['scripts']), $_b, get_defined_vars())  ?>

<?php $iterations = 0; foreach ($flashes as $flash) { ?>	<div<?php if ($_l->tmp = array_filter(array('flash', $flash->type))) echo ' class="', Latte\Runtime\Filters::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT), '"' ?>
><?php echo Latte\Runtime\Filters::escapeHtml($flash->message, ENT_NOQUOTES) ?></div>
<?php $iterations++; } ?>

	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
	    	<ul nav navbar-nav>
	    		<li class="navbar-text"><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Homepage:"), ENT_COMPAT) ?>
">O nas</a></li>
				<li class="navbar-text"><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Homepage:menu"), ENT_COMPAT) ?>
">Jenálniček</a></li>
				<li class="navbar-text"><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Reserve:"), ENT_COMPAT) ?>
">Rezervovať</a></li>
				<li class="navbar-text"><a class="contact" href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Homepage:contact"), ENT_COMPAT) ?>
">Kontakt</a></li>

<?php if ($user->loggedIn) { ?>
					<li class="dropdown navbar-text navbar-right">
						<a href="#" class="dropdown-toggle glyphicon glyphicon-user" aria-hidden="true" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="caret"></span></a>
			       		<ul class="dropdown-menu">
			        	    <li><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Sign:chngpassword"), ENT_COMPAT) ?>
">Zmeniť heslo</a></li>
			    	    	<li><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Sign:out"), ENT_COMPAT) ?>
">Odhlásit</a></li>
			         	</ul>
			       </li>
			       <li class="navbar-text navbar-right">Prihlásený ako: <?php echo Latte\Runtime\Filters::escapeHtml($user->getIdentity()->login, ENT_NOQUOTES) ?></li> 
<?php } else { ?>
					<li class="navbar-text navbar-right" data-toggle="modal" data-target="#myModal">
						<a>Prihlásiť</a>
					</li>	
<?php call_user_func(reset($_b->blocks['modal']), $_b, get_defined_vars()) ;} ?>

			</ul>	
	  	</div>
	</nav>

	<div id=wrapper>
		<div class="page-header">
			<h1>Vitajte v reštaurácii u ...</h1>
			<ul>
<?php if ($user->loggedIn) { if ($user->isAllowed('Sales')) { ?>
				       	<li class="navbar-text"><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Sales:"), ENT_COMPAT) ?>
">Tržby</a></li>
<?php } ?>

<?php if ($user->isAllowed('Goods')) { ?>
				       	<li class="navbar-text"><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Goods:"), ENT_COMPAT) ?>
">Tovar</a></li>
<?php } ?>
				    
<?php if ($user->isAllowed('Staff')) { ?>
				    	<li class="navbar-text"><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Staff:"), ENT_COMPAT) ?>
">Zamestnanci</a></li> 
<?php } ?>

<?php if ($user->isAllowed('Tables')) { ?>
				    	<li class="navbar-text"><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Tables:"), ENT_COMPAT) ?>
">Stoly</a></li> 
<?php } ?>
				    
<?php if ($user->isAllowed('Reservations')) { ?>
				    	<li class="navbar-text"><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Reserve:show"), ENT_COMPAT) ?>
">Rezervacie</a></li>
<?php } ?>

<?php if ($user->isAllowed('Orders')) { ?>
				    	<li class="navbar-text"><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Order:"), ENT_COMPAT) ?>
">Objednavky</a></li> 
<?php } } ?>
			</ul>
		</div>	

		<div class="page-body">
<?php Latte\Macros\BlockMacrosRuntime::callBlock($_b, 'content', $template->getParameters()) ?>
		</div>

	</div>	
	
</body>
</html>
<?php
}}