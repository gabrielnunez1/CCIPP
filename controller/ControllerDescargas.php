<?php
	include_once("../model/EmpresaModel.php");
    if ($_POST['operacion']=="descargar" and $_POST['tipo']=="todoslosusuarios") {
        $sql ="SELECT  UPPER(razon_social),  UPPER(nombre_fantasia),  UPPER(numero_visa),  UPPER(numero_mastercard),  UPPER(numero_amex),  UPPER(numero_terminal),  UPPER(direccion),  UPPER(localidad),  UPPER(provincia),  UPPER(rubro),  UPPER(cuit), UPPER(correo),  UPPER(telefono) FROM empresas";
        $conexion=new Conexion();
        //en esta linea se usa el sql especifico para cada opcion en if
        $resultado = $conexion->consultar($sql);
        $header = "Registro;Codigo;Usos;Evento;Fecha Vencimiento;Usuario Creacion";
        header("Content-Type: application/vnd.ms-excel;");
        header("Content-Disposition: attachment; filename=\"demo.xls\"");
        header("Pragma: no-cache");
        header("Expires: 0");
        $out = fopen("php://output", 'w');
        foreach ($resultado as $data)
        {
            fputcsv($out, $data,"\t");
        }
        fclose($out);
    }
    if ($_POST['operacion']=="descargar" and $_POST['tipo']=="clubdedescuentos") {
        $sql ="SELECT  UPPER(razon_social),  UPPER(nombre_fantasia),  UPPER(numero_visa),  UPPER(numero_mastercard),  UPPER(numero_amex),  UPPER(numero_terminal),  UPPER(direccion),  UPPER(localidad),  UPPER(provincia),  UPPER(rubro),  UPPER(cuit), UPPER(correo),  UPPER(telefono) FROM empresas WHERE numero_socio <> '' ";
    
        $conexion=new Conexion();
    //en esta linea se usa el sql especifico para cada opcion en if
    $resultado = $conexion->consultar($sql);
    $header = "Registro;Codigo;Usos;Evento;Fecha Vencimiento;Usuario Creacion";
    header("Content-Type: application/vnd.ms-excel;");
    header("Content-Disposition: attachment; filename=\"demo.xls\"");
    header("Pragma: no-cache");
    header("Expires: 0");
    $out = fopen("php://output", 'w');
    foreach ($resultado as $data)
    {
        fputcsv($out, $data,"\t");
    }
    fclose($out);
    }
    if ($_POST['operacion']=="descargar" and $_POST['tipo']=="clubdedescuentos") {
        $sql ="SELECT  UPPER(razon_social),  UPPER(nombre_fantasia),  UPPER(numero_visa),  UPPER(numero_mastercard),  UPPER(numero_amex),  UPPER(numero_terminal),  UPPER(direccion),  UPPER(localidad),  UPPER(provincia),  UPPER(rubro),  UPPER(cuit), UPPER(correo),  UPPER(telefono) FROM empresas WHERE numero_socio <> '' ";
    
        $conexion=new Conexion();
        //en esta linea se usa el sql especifico para cada opcion en if
        $resultado = $conexion->consultar($sql);
        $header = "Registro;Codigo;Usos;Evento;Fecha Vencimiento;Usuario Creacion";
        header("Content-Type: application/vnd.ms-excel;");
        header("Content-Disposition: attachment; filename=\"demo.xls\"");
        header("Pragma: no-cache");
        header("Expires: 0");
        $out = fopen("php://output", 'w');
        foreach ($resultado as $data)
        {
            fputcsv($out, $data,"\t");
        }
        fclose($out);
    }
    if ($_POST['operacion']=="descargar" and $_POST['tipo']=="evento") {
        $id_evento=$_POST['id_evento'];
        include_once("../controller/EmpresaEventoController2.php");
        $EmpresaEventoController=new EmpresaEventoController();
        $resultado=$EmpresaEventoController->seleccionarEmpresasDelEvento($id_evento);
        if(isset($resultado)){
            while($MuestraEmpresaEventoController = mysqli_fetch_array($resultado)){
                include_once("../controller/EmpresaController.php");
                $EmpresaController=new EmpresaController();
                $resultadoEmpresaController=$EmpresaController->exportarLaEmpresaDeEstaSesion($MuestraEmpresaEventoController['id_empresa']);
                if(isset($resultadoEmpresaController)){
                    $header = "Registro;Codigo;Usos;Evento;Fecha Vencimiento;Usuario Creacion";
                    header("Content-Type: application/vnd.ms-excel;");
                    header("Content-Disposition: attachment; filename=\"demo.xls\"");
                    header("Pragma: no-cache");
                    header("Expires: 0");
                    $out = fopen("php://output", 'w');
                    foreach ($resultadoEmpresaController as $data)
                    {
                        fputcsv($out, $data,"\t");
                    }
                    fclose($out);
                }
            }
        }
    }
?>
