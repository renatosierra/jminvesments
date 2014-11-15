<?php  include("../header.php"); ?> 
    <script src="/backend/public/js/angular.min.js" type="text/javascript"></script>
    <script src="/backend/public/js/angular-route.min.js" type="text/javascript"></script>
    <script src="/backend/public/js/ui-bootstrap-tpls-0.11.0.min.js" type="text/javascript"></script>
    <script src="/public/js/app.config.js"></script>
    <script src="/public/js/app.min.js"></script>
        
        
        <link href="/backend/public/css/bootstrap.min.css" media="print" rel="stylesheet">

<script>
        var app = angular.module('rol', ['ngRoute']);
	angular.module('rol', ['ui.bootstrap']);
     function controller($scope, $modal, $log , $http)
	 {
             
             $scope.calculo = function(){
                $scope.enganche =$scope.precio *0.3;
                $scope.financiar = $scope.precio - $scope.enganche;
            }
            
            $scope.reserva = function(){
                $scope.saldo =$scope.enganche - $scope.reservas;
            } 
            


            $scope.pmt = function(i, n, p) {
                var val = i * p * Math.pow((1 + i), n) / (1 - Math.pow((1 + i), n));
                $scope.cuota = val.toFixed(2);
                $scope.calificar = (val * 3.3).toFixed(2);
            }
             
         }
        
</script>

<style>
    @media print {
        .main-content {
            margin-left: 50px;
            margin-top: 0px;
        }
    }
</style>

 <div class="main-content" ng-app="rol"> 
		<div class="container" ng-controller="controller">
			<div class="row">
				<div class="col-lg-12">
					<!--<img src="/public/img/logojm.png" class="img-responsive pull-right" alt="Logo">-->
					<h1 class="page-header">Cotización en linea - Proyecciones para su Inversion</h1>
				</div>
			</div>
             
            <div class="row">
                <div class="col-sm-8"> 
                   <div class="panel panel-primary">
                        <div class="panel-heading"><h6 class="panel-title">Nombre del apartamento</h6></div>
                        <div class="panel-body">
                            <form role="form" name="userForm">
                                <div class="row">
                                    <div class="col-lg-6 col-xs-6">
                                        <div class="form-group">
                                            <label for="userStatus">Modelo</label>
                                            <input type="text" class="form-control" ng-model="rol.area" id="exampleInputEmail1" placeholder="Modelo"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-xs-6">
                                        <div class="form-group">
                                            <label for="negocio">Nivel</label>
                                            <input type="text" class="form-control" ng-model="rol.area" id="exampleInputEmail1" placeholder="Nivel"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-xs-6">
                                        <div class="form-group">
                                            <label for="zona">Mts² de Construccion</label>
                                            <input type="text" class="form-control" ng-model="rol.area" id="exampleInputEmail1" placeholder="Mts² de Construccion"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-xs-6">
                                        <div class="form-group">
                                            <label for="nombre_proyecto">No. Dormitorios</label>
                                            <input type="text" class="form-control" name="nombre_proyecto" required="true" ng-model="new.nombre_proyecto" id="nombre_proyecto" placeholder="No. de Dormitorios"/>          
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-xs-6">
                                        <div class="form-group">
                                            <label for="nombre_propietario">No. de Parqueos</label>
                                            <input type="text" class="form-control" required="true" ng-model="new.nombre_propietario" id="nombre_propietario" placeholder="No. de Parqueos"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-xs-6">
                                        <div class="form-group">
                                            <label for="dormitorios">No. de Dormitorios</label>
                                            <input type="text" class="form-control" type="number" ng-model="new.dormitorios" id="dormitorios" name="dormitorios" placeholder="Numero de Dormitorios"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-xs-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Bodega</label>
                                            <input type="text" class="form-control" type="number" ng-model="rol.precio_renta" id="exampleInputEmail1" placeholder="Bodega"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-xs-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Precio + IVA</label>
                                            <input type="text" class="form-control" type="number" ng-model="precio" ng-change="calculo()" id="exampleInputEmail1" placeholder="Precio"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-xs-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Enganche</label>
                                            <input type="text" class="form-control" ng-model="enganche" id="exampleInputEmail1" placeholder="Enganche"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-xs-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Reserva</label>
                                            <input type="text" class="form-control" ng-model="reservas" ng-change="reserva()" id="exampleInputEmail1" placeholder="Reserva"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-xs-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Saldo Enganche</label>
                                            <input type="text" class="form-control" ng-model="saldo" id="exampleInputEmail1" placeholder="Saldo Enganche"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-xs-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Saldo Para Financiar</label>
                                            <input type="text" class="form-control" ng-model="financiar" id="exampleInputEmail1" placeholder="Saldo a Financiar"/>
                                        </div>
                                    </div>
                                </div>  
                                
                                 <div class="modal-header">
                                    <h3 class="modal-title">Financiamiento Proyectado</h3>
                                </div>
                                
                                <div class="row">
                                    <div class="col-lg-6 col-xs-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Plazo en Meses</label>
                                            <input type="text" class="form-control" ng-model="plazo" ng-change="pmt()" id="exampleInputEmail1" placeholder="Plazo en Meses"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-xs-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tasa Variable</label>
                                            <input type="text" class="form-control" ng-model="tasa" ng-change="pmt(tasa/1200,plazo,-financiar)" id="exampleInputEmail1" placeholder="Tasa Variable"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-xs-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Cuota Mensual Financiamiento</label>
                                            <input type="text" class="form-control" ng-model="cuota" id="exampleInputEmail1" placeholder="Financiamiento"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-xs-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Ingreso Estimado para Calificar en el banco</label>
                                            <input type="text" class="form-control" ng-model="calificar" id="exampleInputEmail1" placeholder="Saldo a Financiar"/>
                                        </div>
                                    </div>
                                </div> 
                                
                            </form>
                        
                        </div>
                   </div>
               </div>     
            </div>
		</div>
	</div>
        
<?php  include("../footer.php"); ?>

