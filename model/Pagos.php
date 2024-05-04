<?php
//Incluimos la concexion a la base de datos.
require "../config/Conexion.php";

Class Pago
{
    public function __contruct()
    {   
    }
    
     
    public function insertar($idprestamo,$usuario,$fecha,$cuota)
    {
        $sql="INSERT INTO pagos (idprestamo,usuario,fecha,cuota) 
              VALUES('$idprestamo','$usuario','$fecha','$cuota')";
        return ejecutarConsulta($sql);
    }
    
   
    public function editar($idpago,$idprestamo,$usuario,$fecha,$cuota)
    {
        $sql="UPDATE pagos SET idprestamo='$idprestamo',
                               usuario='$usuario',
                               fecha='$fecha',
                               cuota='$cuota' 
                         WHERE idpago='$idpago'";
        return ejectuarConsulta($sql);
    }
    
    
    public function eliminar($idpago)
    {
        $sql="DELETE FROM pagos WHERE idpago='$idpago'";
        return ejecutarConsulta($sql);
    }
    
    
    public function mostrar($idpago)
    {
        $sql="SELECT c.nombre AS cliente,g.usuario,g.fecha,g.cuota FROM pagos g INNER JOIN prestamos p ON g.idprestamo=p.idprestamo INNER JOIN clientes c ON p.idcliente=c.idcliente";
        return ejectuarConsultaSimpleFila($sql);
    }
    
    
    public function listar()
    {
        $sql="SELECT g.idpago,c.nombre AS cliente,g.usuario,g.fecha,g.cuota FROM pagos g INNER JOIN prestamos p ON g.idprestamo=p.idprestamo INNER JOIN clientes c ON p.idcliente=c.idcliente";
        return ejecutarConsulta($sql);
    }
}
?>