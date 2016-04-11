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
                                <div id="info"></div>
                                <form action="/admin/" method="post" class="form_saite">
                                    <input type="text" name="title" id="title" value="{{saite.title}}"><br>
                                    <input type="text" name="desc" value="{{saite.description}}" id="desc"><br>
                                    <input type="text" name="key" value="{{saite.key}}" id="key"><br>
                                    <textarea name="text" id="text">{{saite.text}}</textarea><br>
                                    <input type="hidden" value="{{saite.id}}" name="id" id="id">
                                    <input type="button" value="Сохранить" name="edit_saite" id="edit">
                                </form>
                            </div>	
                        </div>
                   
                        <script type="text/javascript" src="http://code.jquery.com/jquery-1.12.2.min.js"></script> 
                        <script type="text/javascript" src="js/bootstrap.js"></script>
                        <script>
                        $(document).ready(function(){
                            $("#edit").click(function(){
                              
                                var title= $("#title").val(),
                                    desc= $("#desc").val(),
                                    key= $("#key").val(),
                                    text= $("#text").val(),
                                    id= $("#id").val();
                                    
                                    $.ajax({
                                        type:"post",
                                        url:"/admin/",
                                        data:"title="+title+"&desc="+desc+"&key="+key+"&text="+text+"&id="+id+"&submit=edit_saite",
                                        success:function(html){
                                            $("#info").html(html);
                                        }
                                    });
                                
                            });
                        });
                        </script>
     </body>
</html>