<?php
/**
 * Created by IntelliJ IDEA.
 * User: erdal
 * Date: 08.02.2018
 * Time: 14:11
 */
//header('Content-Type: application/json; charset=UTF-8');

error_reporting(E_ALL);
ini_set('display_errors', 1);

define('BASE_PATH', realpath(dirname(__FILE__)));

spl_autoload_register(function ($class){
    $filename = BASE_PATH . '/../src/' . str_replace('\\', '/', $class) . '.php';
    require_once ''.$filename;
});
/*------------config for test-------------*/
require_once 'TestForm.php';



if($_SERVER['REQUEST_METHOD'] === 'POST'){
    header('Content-Type: application/json; charset=UTF-8');

    if(isset($_GET['form'])){
        $form = new TestForm();
        echo json_encode($form);
        exit;
    }elseif (isset($_GET['valid'])){
        $form = new TestForm();
        var_dump($form->isValid($_POST));
        exit;
    }elseif (isset($_GET['messages'])){
        $form = new TestForm();
        echo json_encode($form->getErrorMessages($_POST));
        exit;
    }
}


?>
<html lang="tr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/css/bootstrap-slider.min.css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/bootstrap-slider.min.js"></script>
</head>
<body>
<button class="btn getir">Getir</button>
<button class="btn test-et">Test Et</button>
<button class="btn mesaj-al">Mesaj Al</button>

<div id="form-wrapper" class="w-25"></div>
<script>
    $(".getir").click(function(){
        var wrapper = $("#form-wrapper");
        wrapper.html("");
        $.post("examples.php?form=1",function (res) {
            var wrapper = $("#form-wrapper");
            wrapper.append("<h1>"+res.title+"</h1>");
            var form = $("<form class=''></form>").appendTo(wrapper);
            res.fields.forEach(function (item, index) {

                if(item.type =='Text'){
                    var  row = $("<div class='form-group'></div>").appendTo(form);
                    row.append("<label for='"+item.name+index+"'>"+item.label+"</label>");
                    row.append("<input class='form-control' type='text' name='"+item.name+"' id='"+item.name+index+"' value='"+item.value+"' />");
                }
                if(item.type =='TextArea'){
                    var  row = $("<div class='form-group'></div>").appendTo(form);
                    row.append("<label for='"+item.name+index+"'>"+item.label+"</label>");
                    row.append("<textarea class='form-control' name='"+item.name+"' id='"+item.name+index+"'>"+item.value+"</textarea>");
                }
                if(item.type =='CheckBox'){
                    form.append("<span>"+item.label+"</span>");
                    item.values.forEach(function (subItem, index) {
                        var  row = $("<div class='form-check'></div>").appendTo(form);
                        row.append("<input class='form-check-input' type='checkbox' name='"+item.name+"[]' id='"+item.name+index+"' value='"+subItem.value+"' />");
                        row.append("<label class='form-check-label' for='"+item.name+index+"'>"+subItem.text+"</label>");
                    });
                }
                if(item.type =='Radio'){
                    form.append("<span>"+item.label+"</span>");
                    item.values.forEach(function (subItem, index) {
                        var  row = $("<div class='form-check'></div>").appendTo(form);
                        row.append("<input class='form-check-input' type='radio' name='"+item.name+"' id='"+item.name+index+"' value='"+subItem.value+"' />");
                        row.append("<label class='form-check-label' for='"+item.name+index+"'>"+subItem.text+"</label>");
                    });
                }
                if(item.type =='Select'){
                    form.append("<span>"+item.label+"</span>");
                    var  row = $("<div class='form-group'></div>").appendTo(form);
                    var  select = $("<select name='"+item.name+"'></select>").appendTo(row);
                    item.values.forEach(function (subItem, index) {
                        select.append("<option value='"+subItem.value+"'>"+subItem.text+"</option>")
                    });
                }
                if(item.type =='Slide'){
                    form.append("<span>"+item.label+"</span>");
                    var  row = $("<div></div>").appendTo(form);
                    var  input = $("<input data-type='slide' id='"+item.name+"' />").appendTo(row);
                    $("#"+item.name).slider({
                        tooltip: 'always',
                        min: item.min,
                        max: item.max,
                        step: item.step,
                        value: item.value
                    });
                }
                if(item.type =='Range'){
                    form.append("<span>"+item.label+"</span>");
                    var  row = $("<div></div>").appendTo(form);
                    var  input = $("<input data-type='range' id='"+item.name+"' />").appendTo(row);
                    $("#"+item.name).slider({
                        min: item.min,
                        max: item.max,
                        step: item.step,
                        value: [item.values.min, item.values.max]
                    });
                }

            });
        });
    });
    $(".test-et").click(function () {
        $.post("examples.php?valid=1",getFormData(),function (res) {

        });
    });
    $(".mesaj-al").click(function () {
        $.post("examples.php?messages=1",getFormData(),function (res) {

        });
    });

    var getFormData = function () {
        var data = $("form").serializeArray();
        $("[data-type=range]").each(function(){

            data.push({name: $(this).attr("id")+"[]", value: $(this).val().split(",")[0]});
            data.push({name: $(this).attr("id")+"[]", value: $(this).val().split(",")[1]});
        });

        $("[data-type=slide]").each(function(){
            data.push({name: $(this).attr("id"), value: $(this).val()});
        });

        return data;
    }
</script>
</body>
</html>
