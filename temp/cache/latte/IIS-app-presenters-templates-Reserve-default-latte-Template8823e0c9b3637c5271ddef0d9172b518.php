<?php
// source: /opt/lampp/htdocs/IIS/app/presenters/templates/Reserve/default.latte

class Template8823e0c9b3637c5271ddef0d9172b518 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('f420994551', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lbcf2049ff6a_content')) { function _lbcf2049ff6a_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><div class="center-form">
<h2>Rezervovať</h2>


<?php echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin($form = $_form = $_control["reservationForm"], array('class'=>"form-horizontal")) ?>

    

        <div class="form-group">
            <?php $_input = $_form["name"];if ($_label = $_input->getLabel()) echo Nextras\Forms\Bridges\Latte\Macros\BS3InputMacros::label($_label->addAttributes(array('class' => "control-label col-xs-4")), $_input, false)  ?>

            <div class="col-xs-8">
<?php $_input = $_form["name"];echo Nextras\Forms\Bridges\Latte\Macros\BS3InputMacros::input($_input->getControl()->addAttributes(array('placeholder'=>"Meno")), $_input, false) ?>
            </div>
        </div>

        <div class="form-group">
            <?php $_input = $_form["lastname"];if ($_label = $_input->getLabel()) echo Nextras\Forms\Bridges\Latte\Macros\BS3InputMacros::label($_label->addAttributes(array('class' => "control-label col-xs-4")), $_input, false)  ?>

            <div class="col-xs-8">
<?php $_input = $_form["lastname"];echo Nextras\Forms\Bridges\Latte\Macros\BS3InputMacros::input($_input->getControl()->addAttributes(array('placeholder'=>"Priezvisko")), $_input, false) ?>
            </div>
        </div>

        <div class="form-group">
            <?php $_input = $_form["phone"];if ($_label = $_input->getLabel()) echo Nextras\Forms\Bridges\Latte\Macros\BS3InputMacros::label($_label->addAttributes(array('class' => "control-label col-xs-4")), $_input, false)  ?>

            <div class="col-xs-8">
<?php $_input = $_form["phone"];echo Nextras\Forms\Bridges\Latte\Macros\BS3InputMacros::input($_input->getControl()->addAttributes(array('placeholder'=>"Tel. číslo:")), $_input, false) ?>
            </div>
        </div>

        <div class="form-group">
            <?php $_input = $_form["email"];if ($_label = $_input->getLabel()) echo Nextras\Forms\Bridges\Latte\Macros\BS3InputMacros::label($_label->addAttributes(array('class' => "control-label col-xs-4")), $_input, false)  ?>

            <div class="col-xs-8">
<?php $_input = $_form["email"];echo Nextras\Forms\Bridges\Latte\Macros\BS3InputMacros::input($_input->getControl()->addAttributes(array('placeholder'=>"Email")), $_input, false) ?>
            </div>
        </div>

        <div class="form-group">
            <?php $_input = $_form["people"];if ($_label = $_input->getLabel()) echo Nextras\Forms\Bridges\Latte\Macros\BS3InputMacros::label($_label->addAttributes(array('class' => "control-label col-xs-4")), $_input, false)  ?>

            <div class="col-xs-8">
<?php $_input = $_form["people"];echo Nextras\Forms\Bridges\Latte\Macros\BS3InputMacros::input($_input->getControl()->addAttributes(array('placeholder'=>"0")), $_input, false) ?>
            </div>
        </div>       

        <div class="form-group">
            <?php $_input = $_form["room"];if ($_label = $_input->getLabel()) echo Nextras\Forms\Bridges\Latte\Macros\BS3InputMacros::label($_label->addAttributes(array('class' => "control-label col-xs-4")), $_input, false)  ?>

            <div class="col-xs-8">
<?php $_input = $_form["room"];echo Nextras\Forms\Bridges\Latte\Macros\BS3InputMacros::input($_input->getControl()->addAttributes(array()), $_input, false) ?>
            </div>
        </div>

        <div class="form-group">
<div id="<?php echo $_control->getSnippetId('tableSnippet') ?>"><?php call_user_func(reset($_b->blocks['_tableSnippet']), $_b, $template->getParameters()) ?>
</div>        </div>

        <div class="form-group">
            <?php $_input = $_form["date"];if ($_label = $_input->getLabel()) echo Nextras\Forms\Bridges\Latte\Macros\BS3InputMacros::label($_label->addAttributes(array('class' => "control-label col-xs-4")), $_input, false)  ?>

            <div class="col-xs-8">
<?php $_input = $_form["date"];echo Nextras\Forms\Bridges\Latte\Macros\BS3InputMacros::input($_input->getControl()->addAttributes(array()), $_input, false) ?>
            </div>
        </div>

        <div class="form-group">
            <?php $_input = $_form["time"];if ($_label = $_input->getLabel()) echo Nextras\Forms\Bridges\Latte\Macros\BS3InputMacros::label($_label->addAttributes(array('class' => "control-label col-xs-4")), $_input, false)  ?>

            <div class="col-xs-8">
<?php $_input = $_form["time"];echo Nextras\Forms\Bridges\Latte\Macros\BS3InputMacros::input($_input->getControl()->addAttributes(array()), $_input, false) ?>
            </div>
        </div>

<?php if ($form->hasErrors()) { ?>        <ul class="errors">
<?php $iterations = 0; foreach ($form->errors as $error) { ?>            <li><?php echo Latte\Runtime\Filters::escapeHtml($error, ENT_NOQUOTES) ?></li>
<?php $iterations++; } ?>
        </ul>
<?php } ?>

        <div class="form-group">
            <div class="col-xs-offset-4 col-xs-8">
<?php $_input = $_form["send"];echo Nextras\Forms\Bridges\Latte\Macros\BS3InputMacros::input($_input->getControl()->addAttributes(array('class'=>"btn btn-primary")), $_input, false) ?>
            </div>
        </div>
<?php echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd($_form) ?>


</div>

<script>
<?php Latte\Macros\BlockMacrosRuntime::callBlock($_b, 'jsCallback', array('input' => 'room', 'link' => 'roomChange') + $template->getParameters()) ?>
</script>

<?php
}}

//
// block _tableSnippet
//
if (!function_exists($_b->blocks['_tableSnippet'][] = '_lb89d07e6f0f__tableSnippet')) { function _lb89d07e6f0f__tableSnippet($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v; $_control->redrawControl('tableSnippet', FALSE)
?>                <?php $_input = $_form["table"];if ($_label = $_input->getLabel()) echo Nextras\Forms\Bridges\Latte\Macros\BS3InputMacros::label($_label->addAttributes(array('class' => "control-label col-xs-4")), $_input, false)  ?>

                <div class="col-xs-8">
<?php $_input = $_form["table"];echo Nextras\Forms\Bridges\Latte\Macros\BS3InputMacros::input($_input->getControl()->addAttributes(array()), $_input, false) ?>
                </div>
<?php
}}

//
// block jsCallback
//
if (!function_exists($_b->blocks['jsCallback'][] = '_lbb7713b0df5_jsCallback')) { function _lbb7713b0df5_jsCallback($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>$('#<?php echo Latte\Runtime\Filters::escapeHtml($control["reservationForm"][$input]->htmlId, ENT_NOQUOTES) ?>').on('change', function() {
    $.nette.ajax({
        type: 'GET',
        url: '<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("{$link}!"), ENT_NOQUOTES) ?>',
        data: {
            'value': $(this).val(),
        }
    });
});

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
call_user_func(reset($_b->blocks['content']), $_b, get_defined_vars())  ?>



<?php
}}