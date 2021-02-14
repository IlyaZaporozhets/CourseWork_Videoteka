<?php
/** @var Page $page */
$context = $page->getContext();
?>
<body>
<style>
    #fieldSets .row {
        padding-bottom: 10px;
    }
</style>
<? $page->loadInclude('landingNav') ?>

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">
        <h1>Створити шаблон речі</h1>
        <p>Конкртуктор шаблонів</p>
    </div>
</div>

<div class="container">
    <!-- Example row of columns -->
    <div class="row">
        <div class="col-md-4">
            <h2>Назва шаблону</h2>
            <p><input class="form-control" id="name" type="text" placeholder="Назва шаблону"/></p>
        </div>
        <div class="col-md-8">
            <h2>Поля шаблону</h2>
            <div id="fieldSets">
            </div>
            <p>
                <a class="btn btn-default" href="#" role="button" id="add"><span class="glyphicon glyphicon-plus"></span> Додати поле</a>&nbsp;
                <a class="btn btn-success disabled" href="#" role="button" id="save" disabled><span class="glyphicon glyphicon-floppy-disk"></span> Зберегти форму</a>
                <a class="btn btn-success" href="#" role="button" id="generate"><span class="glyphicon glyphicon-play"></span> Згенерити JSON</a>
            </p>
            <div id="jsonWrap" style="display: none">
                <textarea class="form-control" id="json"></textarea>
            </div>
        </div>
    </div>

    <hr>

    <footer>
        <p>&copy; 2020 Codaline</p>
    </footer>
    <script>
        var fieldSet = function (uniqueID) {
            return $('<div class="row" id="'+uniqueID+'"><div class="col-md-6"><input type="text" class="form-control" name="name" placeholder="Назва поля"></div><div class="col-md-6"><input type="text" class="form-control" name="type" placeholder="Тип даних"></div></div>')
        }
        var lastId = 1;
        $("#add").on("click", function (event) {
            event.preventDefault();
            $("#fieldSets").append(fieldSet(lastId));
            lastId++;
        });

        $("#generate").on("click", function (event) {
            event.preventDefault();
            var result = {
                name: $("#name").val(),
                fields: []
            };

            var fieldSets = $("#fieldSets .row")

            for (var i = 0; i < fieldSets.length; i++) {
                var fs = $(fieldSets[i]);
                result.fields.push({
                    name: fs.find('[name="name"]').val(),
                    type: fs.find('[name="type"]').val()
                })
            }
            $("#jsonWrap").show();
            $("#json").val(JSON.stringify(result))
        });
    </script>
</div> <!-- /container -->
</body>