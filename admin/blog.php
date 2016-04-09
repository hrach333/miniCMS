<!DOCTYPE html>
<html lang="ru">

    <meta charset="UTF-8">
    <title>Админ</title>
    <link rel="stylesheet" type="text/css" href="{{const.url}}/admin/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="{{const.url}}/admin/css/style.css">


    <body>
        <div class="container">
            <div class="row">
                <div class="col-xs-8">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <h5>Сайты</h5>
                                    </div>
                                    <div class="col-xs-6">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div id="info"></div>
                            {% for str in blogs%}
                            <div class="row">
                                    <div class="col-xs-2"><!--<img class="img-responsive" src="http://placehold.it/100x70">-->
                                </div>
                                <div class="col-xs-4">
                                    <h4 class="product-name"><strong><a href="?option=admin&action=index&type=blog&id={{str.id}}">{{str.title}}</a></strong>
                                        <input type="hidden" value="{{str.id}}" id="id_saite{{str.id}}">
                                    </h4>
                                    <h4><small>{{str.description}}</small></h4>
                                </div>

                                <div class="col-xs-2" id="delet_content">
                                    <button type="button" class="btn btn-link btn-xs" id="{{str.id}}">
                                        <span class="glyphicon glyphicon-trash"> </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <hr>
                        {% endfor %}
                        
                    </div>
                    <script type="text/javascript" src="http://code.jquery.com/jquery-1.12.2.min.js"></script> 
                    <script type="text/javascript" src="js/bootstrap.js"></script>
                    <script>
                    $(document).ready(function () {

                        $("#delet_content button").click(function () {
                            var del_ids = $(this).attr('id');
                            var id = $("#id_saite" + del_ids).val();
                            $.ajax({
                                type: "post",
                                url: "admin/",
                                data: "id=" + id + "&delete=yes",
                                success: function (text) {

                                    location.reload();
                                    $("#info").text("Страница удалена! " + text);
                                }

                            });
                        });
                    });
                    </script>
                    </body> 
                    </html>