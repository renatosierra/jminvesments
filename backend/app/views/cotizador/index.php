<?php  include("../header.php"); 
?>

<script>

var app = angular.module('moduloCompras', ['ngRoute']);

angular.module('moduloCompras', ['ui.bootstrap']);

function controller($scope, $modal, $log , $http,$location)

 {

    $scope.alerts = [];

    $scope.compra = [];

    $scope.comprasIniciales =[];

    $scope.detailComprasInit = [];

    $scope.propiedades = [];

    $scope.users = [];



    angular.element(document).ready(function () {

        $http.post('./../../controllers/propiedad/propiedadFunctions.php', '{"action":"query"}').success(function(data){

            $scope.comprasIniciales = data;
            
         });

    });

    

   

    $scope.alerts = [];

      $scope.closeAlert = function(index) {

        $scope.alerts.splice(index, 1);

      };

      

      

      $scope.agregarQuitar = function(propiedad){

          var index = functiontofindIndexByKeyValue($scope.propiedades,"id_propiedad",propiedad.id_propiedad);

          if(index!==null) 

          {

               $scope.propiedades.splice(index,1);

          }else{

               $scope.propiedades.push(propiedad);

          }

          console.log($scope.propiedades);

      }



      $scope.crearCotizacion = function(){

            document.getElementById("param").value = JSON.stringify($scope.propiedades);

      }

 }

 

 function functiontofindIndexByKeyValue(arraytosearch, key, valuetosearch) {

  for (var i = 0; i < arraytosearch.length; i++) {

    if (arraytosearch[i][key] == valuetosearch) {

      return i;

    }

  }

  return null;

}

 

 

 </script>

 <div ng-app="moduloCompras">

     <div ng-controller="controller">

		<div class="row">

             <alert ng-repeat="alert in alerts" type="{{alert.type}}" close="closeAlert($index)">{{alert.msg}}</alert>

            <div class="col-lg-12">

		        <h1 class="page-header">Cotizador de Propiedades</h1>

            </div>

             

             

             <form action="../cotizador/impresion.php" method="POST" id="idForm"> 

                                <div class="col-lg-12">

                                    <div class="col-lg-6">

                                        <div class="form-group">

                                            <label for="userStatus">Encabezado</label>

                                            <input type="text" name="encabezado" class="form-control" ng-model="encabezado" id="exampleInputEmail1" placeholder="Encabezado"/>

                                        </div>

                                    </div>

                                </div>

             

                                 <div class="col-lg-12">

                                    <div class="col-lg-6">

                                        <div class="form-group">

                                            <label for="userStatus">Cliente</label>

                                            <input type="text" name="cliente" class="form-control" ng-model="cliente" id="exampleInputEmail1" placeholder="Cliente"/>

                                        </div>

                                    </div>

                                 </div>

                                

                                <div class="col-lg-12">

                                    <div class="col-lg-6">

                                        <div class="form-group">

                                            <label for="userStatus">Asesor</label>

                                            <input type="text" name="asesor" class="form-control" ng-model="asesor" id="exampleInputEmail1" placeholder="Asesor"/>

                                        </div>

                                    </div>

                                </div> 

                                

                                <div class="col-lg-12">

                                    <div class="col-lg-6">

                                        <div class="form-group">

                                            <label for="userStatus">Puesto</label>

                                            <input type="text" name="puesto" class="form-control" ng-model="puesto" id="exampleInputEmail1" placeholder="Puesto"/>

                                        </div>

                                    </div>

                                </div>

                                 <div class="col-lg-12">

                                    <div class="col-lg-6">

                                        <div class="form-group">

                                            <label for="userStatus">Direccion Oficina</label>

                                            <input type="text" name="direccion" class="form-control" ng-model="direccion" id="exampleInputEmail1" placeholder="Direccion Oficina"/>

                                        </div>

                                    </div>

                                </div> 
                 
                             <div class="col-lg-12">

                                    <div class="col-lg-6">

                                        <div class="form-group">

                                            <label for="userStatus">Pais</label>

                                            <input type="text" name="pais" class="form-control" ng-model="pais" id="exampleInputEmail1" placeholder="Pais"/>

                                        </div>

                                    </div>

                                </div> 
                 
                                <div class="col-lg-12">

                                    <div class="col-lg-6">

                                        <div class="form-group">

                                            <label for="userStatus">Telefono</label>

                                            <input type="text" name="telefono" class="form-control" ng-model="telefono" id="exampleInputEmail1" placeholder="Telefono"/>

                                        </div>

                                    </div>

                                </div>
                 
                                <div class="col-lg-12">

                                    <div class="col-lg-6">

                                        <div class="form-group">

                                            <label for="userStatus">Celular</label>

                                            <input type="text" name="celular" class="form-control" ng-model="celular" id="exampleInputEmail1" placeholder="Celular"/>

                                        </div>

                                    </div>

                                </div>
                                 <div class="col-lg-12">    

                                    <div class="col-lg-6">

                                      <div class="checkbox">
                                      <label>
                                        <input type="checkbox" name="check" id="check"> Mostrar Logo
                                      </label>
                                    </div>

                                    </div>

                                 </div>


                                 <div class="col-lg-12">    

                                    <div class="col-lg-6">

                                        <div class="form-group">

                                            <div class="btn-group">

                                                <button type="Submit" ng-click="crearCotizacion()" class="btn btn-primary">Crear Cotizacion</button>

                                            </div>

                                         </div>

                                    </div>

                                 </div>

                               
                 

                 <input type="hidden" id="param" name="param" value=""/>

             </form>

             

            <div class="col-lg-12">

                <div class="panel panel-default">

                    <div class="panel-heading">

                        Propiedad

                    </div>

                    <!-- /.panel-heading -->

                    <div class="panel-body">

                        <div class="table-responsive" style="overflow-x:auto ; height:600px; overflow-y:autp">

                            <table class="table table-striped table-bordered table-hover" id="dataTables-example1">

                                <thead>

                                    <tr>

                                        <th>Id</th>

                                        <th>Ambiente</th>

                                        <th>Negocio</th>

                                        <th>Zona</th>

                                        <th>Agregar a Lista</th>

                                    </tr>

                                </thead>

                                <tbody ng-show="comprasIniciales.compras.length > 0">
                                  <div class="form-group">

                                    <div class="input-group">

                                      <div class="input-group-addon">Filtro</div>

                                      <input class="form-control" type="text" placeholder="Filtrar" ng-model="campo">

                                    </div>

                                  </div>

                                    <tr  class="odd gradeX" ng-repeat="compras in comprasIniciales.compras | filter:campo"> 

                                        <td>{{compras.id_propiedad}}</td>

                                        <td>{{compras.ambiente}}</td>

                                        <td>{{compras.negocio}}</td>

                                        <td>{{compras.zona}}</td>

                                        <td>

                                            <input ng-model="compras.check" type="checkbox" ng-click="agregarQuitar(compras)">

                                    	</td>    

                                    </tr>

                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>   

            </div>

        </div>   

            </div>      

        </div>

<?php  include("../footer.php"); ?>

