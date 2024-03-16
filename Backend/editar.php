<?php         
    /*Nombre del servidor, por defecto es localhost cuando se trabaja de forma local*/
    $servidor="localhost";
    /*Nombre deeñ usuario, por fecto es root cuando se trabaj de forma local*/
    $nombre="root";
    /*contraseña, por defecto es vacio*/
    $pass="";
    /*Nombre de la base de datos con el cual se quiere trabajar*/
    $nombreBD="smt";

    /*Realizamos la conexion con los datos requeridos, servidor, usuario, contraseña y base de datos*/
    $conexion = new mysqli($servidor,$nombre,$pass,$nombreBD);

    $id=$_GET['id'];

    /*Se realizar un consulta SQL , para realizar una busqueda en una tabla
    la sintaxis es la misma sintaxis que se usa en sql server para realizar una consulta en una tabla
    */
    $sql="SELECT * FROM backend WHERE idLinea='$id'";
    /**mandamos la consulta  y la conexion para realizar dicha actualizacion
         * Aqui recien se realiza la actualizacion de datos, en la linea anterior solo
         * es una cadena tomando la sintaxis de una consulta SQL
    */
    $query=mysqli_query($conexion,$sql);

    /**Retorna un array que corresponde a la fila obtenida por la consulta
     * y lo guardamos en una variable de nombre $row, esta variable row
     * 
     */
    $row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--TITULO DE LA PAGINA-->
        <title>Modificar</title>

        <!--INDEXANDO UN ARCHIVO DE TIPO CSS PARA DAR ESTILO A LA PAGINA-->
        <link rel="stylesheet"  href="css/bootstrap.css">

        <!--agregando un icon para la pagina web-->
        <link rel="shortcut icon" href="img/ABB.png">

        <!--INDEXANDO dos archivos de tipo javascript para sarle funcionalidad a la página-->
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/crud.js"></script>
    </head>

    <body>
    <body>


<div class="container mb-6">
    
<form action="./actualizar.php" method="POST">
        <!--h1: representa un titulo en la pagina web-->
        <h1>Registro de Produccion Backend SMT</h1>
        
        
    <input type="hidden" name="idHorario" value="<?php echo $idHorario ?>">
        
       

<!--select: es para agrupar un conjunto de opciones a elegir,-->


</div>
        <div class="row">
            <div class="col-md-3 col-sm-12 mb-3">
                <label>Fecha</label>
                <!--Creando un elemento de tipo fecha, con este elemento se podrá seleccionar
                        una fecha-->
                <input class="form-control border border-dark border-2 rounded-0 input-height" type="date" name="fecha" id="fecha" value="<?php echo date('Y-m-d'); ?>" >
                </input>
            </div>

            <div class="col-md-3 col-sm-12 mb-3">
                <label>Turno</label>
                <input class="form-control border border-dark border-2 rounded-0 input-height" type="text" name="turno" id="turno"<?php if($row['turno']=="turno1"){echo"selected";}?>>
            </div>

            <div class="col-md-3 col-sm-12 mb-3">
                <label>Empleado</label>
                <input class="form-control border border-dark border-2 rounded-0 input-height" type="text" name="empleado" id="empleado" >
            </div>

            <div class="col-md-3 col-sm-12 mb-3">
                <label>Hora</label>
                <input class="form-control border border-dark border-2 rounded-0 input-height" type="time" name="hora" id="hora">
            </div>

            <div class="col-md-3 col-sm-12 mb-3">
                <label>Comcode</label>
                <select id='opciones' onchange='cambioOpciones();' class="form-select border border-dark border-2 rounded-0 input-height" name="comcode">
                    <option value='0'>Selecciona Comcode</option>
                    <option value='7000159880A'>7000159880A</option>
                    <option value='150023373'> 150023373</option>
                    <option value='150031303'> 150031303</option>
                    <option value='150021625'> 150021625</option>
                    <option value='150023373'> 150023373</option>
                    <option value='150021625'> 150021625</option>
                    <option value='150034771'> 150034771</option>
                </select>
            </div>
        
        </div>

        <div class="row">
            <div class="col-md-3 col-sm-12 mb-3">
                <label>Modelo</label>
                <!--input tipo text, sirve para ingresar un valor y luego poder usarlo en javascript o enviarlo al servidor-->
                <input type='text'  class="form-control border border-dark border-2 rounded-0 input-height" onchange='cambioOpciones();' id='modelo' name='modelo'  />
            </div>

            <div class="col-md-3 col-sm-12 mb-3">
                <label>Cantidad</label>
                <input type='number' class="form-control border border-dark border-2 rounded-0 input-height" id='cantidad' name='cantidad' onchange="cal()" onkeyup="cal()" />
            </div>

            <div class="col-md-3 col-sm-12 mb-3">
                <label>Proceso Realizado</label>
                <!--<input type='text' class="form-control border border-dark border-2 rounded-0 input-height" id='rate' readonly="readonly" name='rate' />-->
                <select class="form-control border border-dark border-2 rounded-0 input-height" id="ProcRe" name="ProcRe">
                <!-- Un select pueden tener uno o mas opciones-->
                <!--option es un elemento que forma parte de un select-->
                <!--El value indica el valor que contiene un option-->
                <option value=""></option>
                
                <option value="Quimico">Quimico</option>
                <option value="Router">Router</option>
                <option value="Programacion">Programacion</option>
                <option value="Programacion2">Programacion2</option>
                <option value="InCircuit">InCircuit</option>
                <option value="Retrabajo">Retrabajo</option>
                <option value="Foam">Foam</option>
            </select><!--cierre del select-->
            </div>

            <div class="col-md-3 col-sm-12 mb-3">
                <label>Material Para:</label>
                <!--<input type='text' class="form-control border border-dark border-2 rounded-0 input-height" id="sum" name='eficiencia' readonly="readonly" onchange="cal()" onkeyup="cal()" />-->
                <select class="form-control border border-dark border-2 rounded-0 input-height" id="MatPara" name="MatPara">
                <!-- Un select pueden tener uno o mas opciones-->
                <!--option es un elemento que forma parte de un select-->
                <!--El value indica el valor que contiene un option-->
                <option value=""></option>
                <option value="Linea">Linea</option><!--Ejm: option tiene el valor de PAL0-->
                <option value="Quimico">Quimico</option>
                <option value="Router">Router</option>
                <option value="Programacion">Programacion</option>
                <option value="Programacion2">Programacion2</option>
                <option value="InCircuit">InCircuit</option>
                <option value="Retrabajo">Retrabajo</option>
                <option value="Foam">Foam</option>
            </select><!--cierre del select-->
            </div>
        </div>


     

        </div>
        <img class="imglogo" src="img/LogOmniOn.png" alt="OmniOnPower" width="150px"></img>
    </form><!--cierre del form-->



    
   
    </div>
    
</div>

    
      
           
        </div>
     
   
            
            <div class="grid-container">
                <div> 
                    <h5>Fecha</h5>
                        <!--Creando un elemento de tipo fecha, con este elemento se podrá seleccionar
                        una fecha-->
                        <input type="date" name="fecha" value="<?php echo $row['fecha']  ?>">
                    </input>
                </div>

                <!--En cada select se desea seleccionar la opcion segun el dato que se envio para lo
                cual a travez de un condicion if se comprueba si es dato coincide con el valor del opcion
                si coincide esa opcion sera seleciconada, y si no concide no sera seleccionada
                -->
                <div>
                    <h5>Turno</h5>
                        <select id="turno" name="turno">
                            <option value="turno1" <?php if($row['turno']=="turno1"){echo"selected";}?>>1</option>
                            <option value="turno2" <?php if($row['turno']=="turno2"){echo"selected";}?>>2</option>
                            <option value="turno3" <?php if($row['turno']=="turno3"){echo"selected";}?>>3</option>
                        </select>
                </div>
                            
                <!--En cada select se desea seleccionar la opcion segun el dato que se envio para lo
                cual a travez de un condicion if se comprueba si es dato coincide con el valor del opcion
                si coincide esa opcion sera seleciconada, y si no concide no sera seleccionada
                -->               
                <div>
                    <h5>Hora</h5>
                    <select id="Hora" name="hora">
                        <option value="hora1" <?php if($row['hora']=="hora1"){echo"selected";}?>>1</option>
                        <option value="hora2" <?php if($row['hora']=="hora2"){echo"selected";}?>>2</option>
                        <option value="hora3" <?php if($row['hora']=="hora3"){echo"selected";}?>>3</option>
                        <option value="hora4" <?php if($row['hora']=="hora4"){echo"selected";}?>>4</option>
                        <option value="hora5" <?php if($row['hora']=="hora5"){echo"selected";}?>>5</option>
                        <option value="hora6" <?php if($row['hora']=="hora6"){echo"selected";}?>>6</option>
                        <option value="hora7" <?php if($row['hora']=="hora7"){echo"selected";}?>>7</option>
                        <option value="hora8" <?php if($row['hora']=="hora8"){echo"selected";}?>>8</option>
                    </select>
                </div>

                <div>
                    <h5>Comcode</h5> 
                    <select id='opciones' onchange='cambioOpciones();' name="comcode">
                        <option value='0' <?php if($row['comcode']=="0"){echo"selected";}?>>Selecciona Comcode</option>
                        <option value='1' <?php if($row['comcode']=="1"){echo"selected";}?>>150023373</option>
                        <option value='2' <?php if($row['comcode']=="2"){echo"selected";}?>>150021625</option>
                        <option value='3' <?php if($row['comcode']=="3"){echo"selected";}?>>Opción 3</option>
                        <option value='4' <?php if($row['comcode']=="4"){echo"selected";}?>>Empresa D</option>
                    </select>          
                </div>

                <!-- inputs donde se mostrara el id de la opción -->
                <div>
                    <h5>Modelo</h5> 
                    <!--input tipo text, sirve para ingresar un valor y luego poder usarlo en javascript o enviarlo al servidor-->
                    <input type='text' id='modelo' name='modelo' value="<?php echo $row['modelo']  ?>"/>
                </div>

                <div>
                    <h5>Rate</h5> 
                    <input type='text' id='rate' name='rate' value="<?php echo $row['rate']  ?>"/>
                </div>

                <div>
                    <h5>Cantidad</h5>
                    <input type='text' name='cantidad' value="<?php echo $row['cantidad']  ?>"/>
                </div>

                <div>
                    <h5>Eficiencia</h5> 
                    <input type='text'  name='eficiencia' value="<?php echo $row['eficiencia']  ?>"/>
                </div>
            </div>

            <div class="operaciones">
                <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
            </div>   
    </form><!--cierre del form-->
    </body>
</html>