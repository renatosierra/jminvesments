<?php  include("../header.php"); ?>    <script src="/backend/public/js/ui-bootstrap-tpls-0.11.0.min.js" type="text/javascript"></script>	<script src="/public/js/app.config.js"></script>	<script src="/public/js/app.min.js"></script>    <script src="/public/js/plugins/select2.min.js"></script>    <link href="/public/css/select2-bootstrap.css" rel="stylesheet">    <link href="/public/css/select2.css" rel="stylesheet">    <script>     var app = angular.module('rol', ['ngRoute']);	 angular.module('rol', ['ui.bootstrap']);	 function controller($scope, $modal, $log , $http)	 {	 	<?php	 	if(!empty($_POST)){	 		echo '$scope.src = '.json_encode($_POST).';';	 		 	}else{	 		 		echo '$scope.src = {};';	 		 	}?>	 		 	<?php if(!empty($_POST)){ ?>	 	if($scope.src.amueblado !=null){	 		 		$scope.src.amueblado = true;	 		 	} 	     	    $scope.$watch('src.dormitorios',function(val,old){       		$scope.src.dormitorios = parseFloat(val);     	});    	<?php } ?>    	$scope.resultados = {"mostrar":false};            angular.element(document).ready(function () {            $("#tipo").select2({formatResult: format,formatSelection: result});        	$("#negocio").select2({formatResult: format,formatSelection: result});        	$("#zona").select2({formatResult: format,formatSelection: result});        		        <?php if(!empty($_POST)){ ?>        		$scope.findProperties($scope.src);     		<?php } ?>        });		$scope.showDetail = function (data){			window.location = "/app/views/propiedades/index.php?property="+data.id_propiedad;		} 		$scope.findProperties = function (datos){ 			$scope.resultados.mostrar = true; 			console.log(datos);			$http.post('/app/controllers/busqueda/busquedaFunctions.php', '{"action":"query","data":'+JSON.stringify(datos)+'}').success(function(data){				$scope.properties = data;				$scope.src = {};			});             		}	 }	 function format(icon) {	    var originalOption = icon.element;	    return '<i class="fa ' + $(originalOption).data('icon') + '"></i> ' + icon.text;	}	function result(icon) {	    var originalOption = icon.element;	    return '<i style="margin-left:-10px" class="fa fa-check-square-o"></i> ' + icon.text;	}    </script>    <div class="main-content" ng-app="rol"> 		<div class="container" ng-controller="controller">			<div class="row">				<div class="col-lg-12">					<button class="btn btn-default pull-right btn-xs" ng-click="isCollapsed = !isCollapsed">{{ isCollapsed ? 'Mostrar':'Ocultar' }}</button>					<h1 class="page-header">Busqueda </h1>				</div>				<div class="col-lg-3">					<div class="panel panel-default"  collapse="isCollapsed">						<div class="panel-heading">							<div class="row">								<div class="col-lg-12">									<label for="tipo">Tipo</label>									<div class="form-group">										<select multiple=""  ng-model="src.tipo" name="tipo" id="tipo" class="form-control populate select2-offscreen" tabindex="-1">							            	<option data-icon="fa-square-o">Apartamento</option>							            	<option data-icon="fa-square-o">Bodega</option>							            	<option data-icon="fa-square-o">Casa</option>							            	<option data-icon="fa-square-o">Edificio</option>							            	<option data-icon="fa-square-o">Local</option>							            	<option data-icon="fa-square-o">Terreno</option>							            	<option data-icon="fa-square-o">Oficina</option>						              	</select>									</div>									<label for="negocio">Negocio</label>									<div class="form-group">										<select multiple="" ng-model="src.negocio" name="negocio" id="negocio" class="form-control populate select2-offscreen" tabindex="-1">							            	<option data-icon="fa-square-o">Venta</option>							            	<option data-icon="fa-square-o">Renta</option>						              	</select>									</div>									<div class="form-group">										<label for="dormitorios">Dormitorios</label>																				<input type="number" class="form-control" ng-model="src.dormitorios" id="dormitorios" >									</div>									<div class="form-group">										<label for="precio_venta">Precio de venta</label>										<select name="precio_venta" ng-model="src.precio_venta" class="form-control" id="precio_venta">										   <option  value="" selected="">[Opcional]</option>										      <option  value="1">Menor a  $ 75,000 USD</option>										      <option  value="2">$ 75,000 - $ 100,000 USD</option>										      <option  value="3">$ 100,001 - $ 150,000 USD</option>										      <option  value="4">$ 150,001 - $ 200,000 USD</option>										      <option  value="5">$ 200,001 - $ 250,000 USD</option>										      <option  value="6">$ 250,001 - $ 300,000 USD</option>										      <option  value="7">Mayor a  $ 300,000 USD</option>										</select>									</div>									<div class="form-group">										<label for="precio_renta">Precio de renta</label> 										<select name="precio_renta" ng-model="src.precio_renta" class="form-control" id="precio_renta">										   <option  value="" selected="">[Opcional]</option>										      <option  value="8">Menor a  $ 500 USD</option>										      <option  value="9">$ 500 - $ 1,000 USD</option>										      <option  value="10">$ 1,001 - $ 1,500 USD</option>										      <option  value="11">$ 1,501 - $ 2,000 USD</option>										      <option  value="12">$ 2,001 - $ 2,500 USD</option>										      <option  value="13">$ 2,501 - $ 3,000 USD</option>										      <option  value="14">Mayor a  $ 3,000 USD</option>										</select>									</div>																		 <label for="zona">Zonas</label>                                <div class="form-group">                                    <select multiple="" name="zona" id="zona" ng-model="src.zona" class="form-control populate select2-offscreen" tabindex="-1">                                        <option data-icon="fa-square-o">Todas</option>                                        <option data-icon="fa-square-o">Carretera a El Salvador</option>                                        <option data-icon="fa-square-o">1</option>                                        <option data-icon="fa-square-o">2</option>                                        <option data-icon="fa-square-o">3</option>                                        <option data-icon="fa-square-o">4</option>                                        <option data-icon="fa-square-o">5</option>                                        <option data-icon="fa-square-o">6</option>                                        <option data-icon="fa-square-o">7</option>                                        <option data-icon="fa-square-o">8</option>                                        <option data-icon="fa-square-o">9</option>                                        <option data-icon="fa-square-o">10</option>                                        <option data-icon="fa-square-o">11</option>                                        <option data-icon="fa-square-o">12</option>                                        <option data-icon="fa-square-o">13</option>                                        <option data-icon="fa-square-o">14</option>                                        <option data-icon="fa-square-o">15</option>                                        <option data-icon="fa-square-o">16</option>                                        <option data-icon="fa-square-o">17</option>                                        <option data-icon="fa-square-o">18</option>                                        <option data-icon="fa-square-o">19</option>                                        <option data-icon="fa-square-o">21</option>                                    </select>                                </div>									<div class="form-group">										<div class="checkbox">										<label>											<input type="checkbox" ng-model="src.amueblado"> Amueblado										</label>										</div>																						</div>								</div>									<div class="col-lg-12">										<button type="submit" ng-click="findProperties(src)" class="btn btn-default pull-right">Busqueda</button>								</div>							</div>				    	</div>					</div>				</div>				<div class="col-lg-9">					<div class="panel panel-default" ng-show="resultados.mostrar">						<div class="panel-heading">							<div class="row">								<div class="col-md-4 col-sm-4 col-xs-12"  ng-repeat="property in properties">									<div class="well" style="height:175px; overflow-y:hidden; cursor:pointer;" ng-click="showDetail(property)">										<div class="row">											<div class="col-xs-4 olis" style="height: 60px;padding-right: 0px; 	">												<img class="img-responsive img-circle" style="height: inherit;width: 64px;" ng-src="/backend/images/{{property.id_propiedad}}/{{property.url}}"></img>											</div>											<div class="col-xs-8">												<small><strong>Tipo: </strong>{{property.tipo}}</small></br>												<small><strong>Zona: </strong>{{property.zona}}</small></br>												<small><strong>Amueblada: </strong>{{property.amueblado === 'true' ? 'Si': 'No' }} </small></br>											</div>										</div>										<div class="row">											<div class="col-xs-12" style="overflow:auto;">												<small><strong>Direccion: </strong>{{property.direccion}}</small></br>												<small><strong>Ambiente: </strong>{{property.ambiente}}</small>											</div>																					</div>									</div>								</div>															</div>						</div>					</div>				</div>			</div>		</div>	</div><?php  include("../footer.php"); ?>