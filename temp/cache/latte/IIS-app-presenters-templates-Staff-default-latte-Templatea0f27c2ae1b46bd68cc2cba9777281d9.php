<?php
// source: /opt/lampp/htdocs/IIS/app/presenters/templates/Staff/default.latte

class Templatea0f27c2ae1b46bd68cc2cba9777281d9 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('b981506556', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb2b9fe19434_content')) { function _lb2b9fe19434_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>	
	<h2> Zamestnanci </h2>

	<a class="glyphicon glyphicon-plus" aria-hidden="true" href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Staff:new"), ENT_COMPAT) ?>
"></a>
	<a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Staff:new"), ENT_COMPAT) ?>
">Pridať zamestnanca</a>


	<div class="staff">
	    <table class="table table-hover">
  		<tr>
    		<th>id</td>
    		<th>login</td>
    		<th>meno</td> 
    		<th>priezvisko</td>
    		<th>prac. pozícia</td>
    		<th>smena</td>
  		</tr>
<?php $iterations = 0; foreach ($staff as $person) { ?>
	        <tr>
		        <td><?php echo Latte\Runtime\Filters::escapeHtml($person->id, ENT_NOQUOTES) ?></td> 
		        <td><?php echo Latte\Runtime\Filters::escapeHtml($person->login, ENT_NOQUOTES) ?></td>
		        <td><?php echo Latte\Runtime\Filters::escapeHtml($person->name, ENT_NOQUOTES) ?></<td>
		        <td><?php echo Latte\Runtime\Filters::escapeHtml($person->lastname, ENT_NOQUOTES) ?></<td>
		        <td><?php echo Latte\Runtime\Filters::escapeHtml($person->position, ENT_NOQUOTES) ?></<td>
		        <td><?php echo Latte\Runtime\Filters::escapeHtml($person->shift, ENT_NOQUOTES) ?></<td>
<?php if ($person->position != 'admin') { ?>
					<td><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("edit", array($person->id)), ENT_COMPAT) ?>
">Upravit zanestnanca</a></td>
					<td><?php if ($user->isAllowed('delete')) { ?><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("delete", array($person->id)), ENT_COMPAT) ?>
">Odstrániť zamestnanca</a><?php } ?>
</td>
<?php } ?>
		        </td>

	        </tr>
	        
<?php $iterations++; } ?>
	    </table>
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
call_user_func(reset($_b->blocks['content']), $_b, get_defined_vars()) ; 
}}