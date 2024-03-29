<?php
// source: /opt/lampp/htdocs/IIS/app/presenters/templates/Staff/showpassw.latte

class Template49895648e561715f20aaa270691d5e08 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('54326b993e', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb35ae8d9c54_content')) { function _lb35ae8d9c54_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;if ($user->isInRole('admin')) { ?>
		<a class="right" href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Staff:"), ENT_COMPAT) ?>
">Zamestnanci</a>
		<h2>Užívatelia v systéme</h2>
		<div class="users">
		    <table class="table table-hover">
	  		<tr>
	    		<th>id</td>
	    		<th>id zamestnanca</td>
	    		<th>login</td> 
	    		<th>heslo</td>
	    		<th>rola</td>
	  		</tr>
<?php $iterations = 0; foreach ($users as $user) { ?>
		        <tr>
			        <td><?php echo Latte\Runtime\Filters::escapeHtml($user->id, ENT_NOQUOTES) ?></td> 
			        <td><?php echo Latte\Runtime\Filters::escapeHtml($user->id_staff, ENT_NOQUOTES) ?></td>
			        <td><?php echo Latte\Runtime\Filters::escapeHtml($user->login, ENT_NOQUOTES) ?></<td>
<?php if ($user->id == $userID) { ?>
			        	<td><?php echo Latte\Runtime\Filters::escapeHtml($passw, ENT_NOQUOTES) ?></<td>
<?php } else { ?>
			        	<td><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("showpassw", array($user->id)), ENT_COMPAT) ?>
">Zobraziť heslo</a></<td>
<?php } ?>
			        <td><?php echo Latte\Runtime\Filters::escapeHtml($user->role, ENT_NOQUOTES) ?></<td>
		        </tr>
		        
<?php $iterations++; } ?>
		    </table>
		</div>
<?php } ?>



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