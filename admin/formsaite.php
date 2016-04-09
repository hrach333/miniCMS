<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>Админ</title>
        <link rel="stylesheet" type="text/css" href="{{const.url}}/admin/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="{{const.url}}/admin/css/style.css">

    </head>
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

                            <div>

                                <form action="admin/" method="post" class="form_saite">
                                    <input type="text" name="title" value="{{saite.title}}"><br>
                                    <input type="text" name="desc" value="{{saite.description}}"><br>
                                    <input type="text" name="key" value="{{saite.key}}"><br>
                                    <textarea name="text">{{saite.text}}</textarea><br>
                                    <input type="hidden" value="{{saite.id}}" name="id">
                                    <input type="submit" value="Сохранить" name="edit_blog">
                                </form>
                            </div>	
                        </div>
                   
                        <script type="text/javascript" src="http://code.jquery.com/jquery-1.12.2.min.js"></script> 
                        <script type="text/javascript" src="js/bootstrap.js"></script>
     </body>
</html>