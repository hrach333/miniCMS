<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Админ</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    
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
                    {% for str in saite%}
					<div class="row">
						<div class="col-xs-2"><!--<img class="img-responsive" src="http://placehold.it/100x70">-->
						</div>
						<div class="col-xs-4">
							<h4 class="product-name"><strong><a href="admin/editsaite">{{str.title}}</a></strong></h4><h4><small>{{str.description}}</small></h4>
						</div>
                        <!--
						<div class="col-xs-6">
							<div class="col-xs-6 text-right">
								
							</div>
							<div class="col-xs-4">
								
							</div>
                            -->
							<div class="col-xs-2">
								<button type="button" class="btn btn-link btn-xs">
									<span class="glyphicon glyphicon-trash"> </span>
								</button>
							</div>
						</div>
					</div>
					<hr>
                    {% endfor %}
                    <!--
					<div class="row">
						<div class="text-center">
							<div class="col-xs-9">
								<h6 class="text-right">Added items?</h6>
							</div>
							<div class="col-xs-3">
								<button type="button" class="btn btn-default btn-sm btn-block">
									Update cart
								</button>
							</div>
						</div>
					</div>
				</div>
                -->
                <!--
				<div class="panel-footer">
					<div class="row text-center">
						<div class="col-xs-9">
							<h4 class="text-right">Total <strong>$50.00</strong></h4>
						</div>
						<div class="col-xs-3">
							<button type="button" class="btn btn-success btn-block">
								Checkout
							</button>
						</div>
					</div>
                    -->
    </div>
     <script type="text/javascript" src="http://code.jquery.com/jquery-1.12.2.min.js"></script> 
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>