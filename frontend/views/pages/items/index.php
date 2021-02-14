<?php
/** @var Page $page */
$context = $page->getContext();

/** @var ItemDAO $itemDAO */
$itemDAO = action::dao('ItemDAO');
$templates = $itemDAO->getAllItems();
?>
<body>
<!--<script src="http://lost-found.96.lt/assets/action/js/action.lib.js"></script>-->
<script>window.itemTemplates = {};</script>

<? $page->loadInclude('landingNav') ?>

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">
        <h1>Додати втрачену річ</h1>
        <p>Знайшли або втратили річ? Просто додайте її сюди</p>
    </div>
</div>

<div class="container">
    <!-- Example row of columns -->
    <?php if (Helper::getSessionParam('user')): ?>
    <div class="row" id="formWrap">
        <div class="col-md-6">
            <h3>Що трапилось?</h3>
            <div class="input-group input-group-lg">
                <div class="input-group-btn">
                    <select class="form-control" name="type" id="type">
                        <option value="lost" selected>Втрачено</option>
                        <option value="found">Знайдено</option>
                    </select>
                </div>
                <div class="input-group-btn">
                    <select class="form-control" name="item" id="item">
                        <? foreach ($templates as $template): ?><option value="<?= $template['id'] ?>"><?= $template['name'] ?></option><script>itemTemplates['<?= $template['id'] ?>'] = <?= $template['template'] ?></script><? endforeach; ?>
                    </select>
                </div>
            </div>

            <h3>Коротко опишіть деталі</h3>
            <p>
                <textarea class="form-control" id="description" name="description" maxlength="511" placeholder="Опис"></textarea>
            </p>
        </div>
        <div class="col-md-6">
            <h3>Детальна інформація</h3>
            <div id="fieldSets">
            </div>
            <p>
                <a class="btn btn-success" href="#" role="button" id="save"><span class="glyphicon glyphicon-floppy-disk"></span> Зберегти інформацію</a>
<!--                <a class="btn btn-success" href="#" role="button" id="generate"><span class="glyphicon glyphicon-play"></span> Згенерити JSON</a>-->
            </p>
        </div>
        <div id="jsonWrap" style="display: none">
            <textarea class="form-control" id="json"></textarea>
        </div>
    </div>
        <script>
            function generateField(name, type) {
                return $('<div class="form-group"><label>' + name +'</label><input class="form-control" placeholder="' + name +'" type="' + type +'" data-name="' + name +'"></div>')
            }

            function generateTemplate(templateID) {
                var template = itemTemplates[templateID];
                var fields = template.fields;
                var sets = $("#fieldSets");
                sets.empty();
                for (var i = 0; i< fields.length; i++) {
                    sets.append(generateField(fields[i].name, fields[i].type))
                }
            }
            $("#item").on("change", function () {
                generateTemplate($(this).val());

            })
            $(document).ready( function () {
                generateTemplate($("#item").val());
            })

            $("#save").on("click", function (event) {
                event.preventDefault();
                var template = itemTemplates[$("#item").val()];
                var data = {
                    type: $("#type").val(),
                    item: $("#item").val(),
                    description: $("#description").val(),
                    body: {
                        name: template.name,
                        fields: []
                    }
                };

                var fields = template.fields;
                for (var i = 0; i< fields.length; i++) {
                    fields[i]['value'] = $('input[placeholder="' +fields[i].name +'"]').val()
                }

                data.body.fields = fields;
                data.body = JSON.stringify(data.body);

                Core.action("items/create", data, function (response) {
                    alert(response.message);
                    if (response.success) {
                        location.href = '/items/' + response.data.type
                    }
                });
            });

            $("#generate").on("click", function (event) {
                event.preventDefault();
                var template = itemTemplates[$("#item").val()];

                var fields = template.fields;
                for (var i = 0; i< fields.length; i++) {
                    fields[i]['value'] = $('input[placeholder="' +fields[i].name +'"]').val()
                }

                template.fields = fields;
                $("#jsonWrap").show();
                $("#json").val(JSON.stringify(template))
            });
        </script>
    <? else: ?>
    <h2>Авторизуйтесь щоб додати запис</h2>
    <? endif; ?>

    <hr>

    <footer>
        <p>&copy; 2020 Codaline</p>
    </footer>

</div> <!-- /container -->
</body>