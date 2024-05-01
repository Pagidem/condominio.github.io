<?php include('includes/complements/head.php');?>
<body>
    <div class="wrapper">

    <nav class="navbar navbar-light bg-warning">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
            <img src="includes/logo-login.png" alt="" width="40" height="30" class="d-inline-block align-text-top">
                <label hidden="true" id="v-idu" ><?php include('model/usuarioModel.php'); $usu = new Usuario(); echo $usu->uNum();?></label>    
                <strong class="text-white">Bienvenido <label id="v-usuario" class="text-black" val="">Usuario </label><i id="v-estado" class="nav-icon fas fa-circle text-success "> </i></strong>
            </a> 

            <a href="?view=logout" class="nav-link active">
                <i class="btn btn-danger fa fa-sign-out-alt"></i>
            </a>
            
        </div>
    </nav>

    
    
    


        <div class="container">
            <div class="row">

                <div class="col-md-12 align-self-center">
                    <div class="card card-primary">
                        <div class="card-header ">
                            <h2 class="card-title"><strong>Visitas registradas a la fecha</strong></h2>
                            <a class="btn btn-warning text-white" href="?view=menus&tipo=newv1">Nueva <i class="fa fa-registered text-white"></i></a>
                        </div>
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        <div class="card-body ">
                            <hr/>
                            <table id="tblVisitas" class="table table-primary">
                                <thead>
                                    <tr class="table-success">
                                        <th>N°</th>
                                        <th>Visitante</th>
                                        <th>Vehiculo</th>
                                        <th>Casa</th>
                                        <th>Ingreso</th>
                                        <th>Estado</th>
                                        <th>Detalles</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                                <div id="AVISO2"></div>
                            </table>

                            <!-- Modal -->
                            <div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="miModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="miModalLabel">Detalles de la visita</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Aquí se cargarán los datos -->
                                    <!-- /.Campos de Documento de identidad-->
                                <div class="row">
                                    <div class="col-6">
                                        <label for="doc">Documento*</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="N° Doc" id="doc" value="">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <label>Tipo*</label>
                                        <input type="text" class="form-control" id="td">
                                    </div>
                                    <div class="col-4">
                                    </div>
                                </div>
                                <br/>
                                <!-- /.Campos de Nombres-->
                                <div class="row">
                                    <div class="col-6">
                                        <label>Nombre Completo</label>
                                        <input type="text" class="form-control" placeholder="Nombres" id="nombres" value="">
                                    </div>

                                    <div class="col-6">
                                        <label>Celular</label>
                                        <input type="text" class="form-control" placeholder="Celular" id="celular" value="">
                                    </div>

                                    
                                </div>
                                <hr />
                                <!-- /.Campos de VEHICULO-->
                                <div class="row">
                                    <div class="col-4">
                                        <label for="np">N° Placa</label>
                                        <input type="number" class="form-control" placeholder="123456" id="placa" value="">
                                    </div>
                                    <div class="col-4">
                                        <label for="oc">Ocupantes </label>
                                        <input type="number" class="form-control" placeholder="Cantidad" id="ocupantes" value="">
                                    </div>
                                    <div class="col-4">
                                        <label for="tipovehiculo">Tipo</label>
                                        <input type="number" class="form-control" placeholder="Cantidad" id="tipovehiculo" value="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label for="foto" id="foto">Foto</label>
                                        <img src="" alt="" id="foto" class="form-control">
                                    </div>
                                    <div class="col-6">
                                        <label for="empresa">Empresa *</label>
                                        <input type="text" id="empresa" value="" class="form-control">
                                    </div>
                                </div>
                                <!-- /.Campos de visita-->
                                <div class="row">
                                    <div class="col-6">
                                        <label for="tipovisita">Tipo *</label>
                                        <input type="text" id="tipovisita" value="" class="form-control">
                                    </div>
                                    <div class="col-6">
                                        <label for="ingreso">Ingreso</label>
                                        <input type="text" class="form-control" placeholder="Ingreso" id="ingreso" value="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label for="salida">Salida</label>
                                        <input type="text" class="form-control" placeholder="Salida" id="salida" value="">
                                    </div>

                                    <div class="col-6">
                                        <label for="casa">Casa </label>
                                        <input type="text" class="form-control" placeholder="casa" id="casa" value="">
                                    </div>
                                </div>
                                
                                <br/>
                                <div class="input-group">
                                    <span class="input-group-text">Observaciones</span>
                                    <textarea class="form-control" aria-label="With textarea" id="observaciones"></textarea>
                                </div>

                                <br>
                                
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <!-- Puedes agregar más botones si es necesario -->
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    <script src="includes/jquery.min.js"></script>
    
    <script type="text/javascript" src="includes/ajax/inicio.js"></script>
    <script type="text/javascript" src="includes/ajax/activo.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </div>
</body>
</html>