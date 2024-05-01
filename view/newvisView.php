<?php include ('includes/complements/head.php'); ?>

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
                        <div class="card-header">
                            <h2 class="card-title"><strong>Ingresar los datos para registro de visita</strong></h2>
                            <a class="btn btn-success text-white" href="?view=menus&tipo=visitas">Visitas <i class="fa fa-list text-white"></i></a>
                        </div>

                        <div class="card-body">
                            <div role="form">
                                <div class="row">
                                    <div class="col-9" id="AVISO4">
                                        
                                    </div>
                                    <div class="col-3">
                                        
                                    </div>
                                    
                                </div>
                                <label><strong>Datos de visitante</strong></label>
                                <hr />
                                <!-- /.Campos de Documento de identidad-->
                                <div class="row">
                                    <div class="col-4">
                                        <label for="doc">Documento*</label>
                                        <label id="idd" hidden>0</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" placeholder="N° Doc" id="doc" value="">
                                            <span class="input-group-text btn-success" id="btnVerificar" onclick="verificar()">B</span>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <label>Ciudad*</label>
                                        <select class="form-control" id="ext">
                                            <option selected value="CB">CB</option>
                                            <option value="LP">LP</option>
                                            <option value="sc">sc</option>
                                            <option value="BE">BE</option>
                                            <option value="CH">CH</option>
                                            <option value="TJ">TJ</option>
                                            <option value="PT">PT</option>
                                            <option value="OR">OR</option>
                                            <option value="PD">PD</option>
                                            <option value="EXT">EXT</option>
                                            <option value="OTRO">OTRO</option>
                                        </select>
                                    </div>
                                    <div class="col-2">
                                        <label>Tipo*</label>
                                        <select class="form-control" id="td">
                                            <option selected="selected" value="CI">CI</option>
                                            <option value="Libreta">Libreta</option>
                                            <option value="OTRO">OTRO</option>
                                        </select>
                                    </div>
                                    <div class="col-3">
                                        <label>Numero *</label>
                                        <input type="number" class="form-control" placeholder="Celular" id="ce" value="">
                                    </div>
                                </div>
                                <br/>
                                <!-- /.Campos de Nombres-->
                                <div class="row">
                                    <div class="col-4">
                                        <label>Nombres*</label>
                                        <input type="text" class="form-control" placeholder="Nombres" id="no" value="">
                                    </div>

                                    <div class="col-4">
                                        <label>Apellido 1*</label>
                                        <input type="text" class="form-control" placeholder="Paterno" id="pat" value="">
                                    </div>

                                    <div class="col-4">
                                        <label>Apellido 2*</label>
                                        <input type="text" class="form-control" placeholder="Materno" id="mat" value="">
                                    </div>

                                    
                                </div>
                                <hr/>
                                <label><strong>Datos del vehiculo (Si cuenta) </strong></label>
                                <hr />
                                <!-- /.Campos de VEHICULO-->
                                <div class="row">
                                    <div class="col-4">
                                        <label id="idve" hidden>0</label>
                                        <label for="np">N° Placa*</label>
                                        <input type="number" class="form-control" placeholder="123456" id="np" value="">
                                    </div>

                                    <div class="col-4">
                                        <label for="lp">Serie Placa*</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Letras" id="lp" value="">
                                            <span class="input-group-text btn-primary" id="btnVplaca" onclick="vPlaca()">B</span>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <label for="oc">Ocupantes *</label>
                                        <input type="number" class="form-control" placeholder="Cantidad" id="oc" value="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <label for="tve">Tipo*</label>
                                        <select class="form-control" id="tve">
                                            <option selected="selected" value="s/t">Ninguno</option>
                                            <option data-select2-id="auto">Auto</option>
                                            <option data-select2-id="vagoneta">Vagoneta</option>
                                            <option data-select2-id="camioneta">Camioneta</option>
                                            <option data-select2-id="camion">Camion</option>
                                            <option data-select2-id="moto">Moto</option>
                                            <option data-select2-id="otro">Otro</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <label for="mv">Marca </label>
                                        <input type="text" class="form-control" placeholder="Toyota" id="mv" value="">
                                    </div>
                                    <div class="col-4">
                                        <label for="fot" id="lf">Foto</label>
                                        <input type="file" class="form-control" aria-label="Foto" id="fot" value="">
                                    </div>
                                    
                                </div>
                                <label><strong>Detalles de visita</strong></label>
                                <hr />
                                <!-- /.Campos de visita-->
                                <div class="row">
                                    <div class="col-6">
                                        <label for="tvi">Tipo *</label>
                                        <select class="form-control" id="tvi">
                                            <option selected="selected" data-select2-id="Servicio">Servicio</option>
                                            <option data-select2-id="Luz">Luz</option>
                                            <option data-select2-id="Agua">Agua</option>
                                            <option data-select2-id="Internet">Internet</option>
                                            <option data-select2-id="Jardineria">Jardineria</option>
                                            <option data-select2-id="Mantenimiento">Mantenimiento</option>
                                            <option data-select2-id="Otro">Otro</option>
                                        </select>
                                    </div>

                                    <div class="col-6">
                                        <label for="emp">Empresa *</label>
                                        <select class="form-control" id="emp">
                                            <option selected="selected" data-select2-id="Interno">Interno</option>
                                            <option data-select2-id="Cre">CRE</option>
                                            <option data-select2-id="Saguapac">Saguapac</option>
                                            <option data-select2-id="Tigo">Tigo</option>
                                            <option data-select2-id="Jardineria">Jardineria</option>
                                            <option data-select2-id="Servicio">AXS</option>
                                            <option data-select2-id="Otro">Otro</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label for="fi">Fecha Ingreso*</label>
                                        <input type="date" class="form-control" placeholder="Ingreso" id="fi" value="">
                                    </div>

                                    <div class="col-6">
                                        <label>Hora Ingreso*</label>
                                        <input type="time" class="form-control" placeholder="Ingreso" id="hi" value="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label for="fs">Fecha Salida*</label>
                                        <input type="date" class="form-control" placeholder="Salida" id="fs" value="">
                                    </div>

                                    <div class="col-6">
                                        <label>Hora Salida*</label>
                                        <input type="time" class="form-control" placeholder="Salida" id="hs" value="">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <label>Casa *</label>
                                        <select class="form-control" id="ca">
                                            <option selected="selected" data-select2-id="1">1</option>
                                            <option data-select2-id="2">2</option>
                                            <option data-select2-id="3">3</option>
                                            <option data-select2-id="4">4</option>
                                            <option data-select2-id="5">5</option>
                                            <option data-select2-id="6">6</option>
                                            <option data-select2-id="7">7</option>
                                            <option data-select2-id="8">8</option>
                                            <option data-select2-id="9">9</option>
                                            <option data-select2-id="10">10</option>
                                        </select>
                                    </div>

                                    <div class="col-6">
                                        <label>Bloque *</label>
                                        <select class="form-control" id="bl">
                                            <option selected="selected" data-select2-id="A">A</option>
                                            <option data-select2-id="B">B</option>
                                            <option data-select2-id="C">C</option>
                                            <option data-select2-id="D">D</option>
                                            <option data-select2-id="E">E</option>
                                            <option data-select2-id="F">F</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <br/>
                                <div class="input-group">
                                    <span class="input-group-text">Observaciones</span>
                                    <textarea class="form-control" aria-label="With textarea" id="obs"></textarea>
                                </div>

                                <br>
                                <!-- /.Campo de aceptar los terminos de la visita-->
                                <div class="row">
                                    <div class="col-3"></div>
                                    <!-- /.Boton de registro-->
                                    <div class="col-3 align-self-center">
                                        <button type="button" class="btn btn-primary btn-block"
                                            onclick="visita1()">Registrar</button>
                                    </div>
                                    <div class="col-3 align-self-center">
                                            <a class="btn btn-danger text-white" href="?view=menus&tipo=visitas">Cancelar </a>
                                    </div>
                                    <div class="col-3"></div>
                                    <!-- /.col -->
                                </div>

                                <br />

                                <div id="AVISO3"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="includes/jquery.min.js"></script>
        <script type="text/javascript" src="includes/ajax/newvis.js"></script>
    </div>

    
</body>

</html>