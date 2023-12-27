<?php 
//incluir la conexion de base de datos
require "../config/Conexion.php";

class Usuario{


	//implementamos nuestro constructor
public function __construct(){

}


public function verificar($usu_login,$usu_clave){
	$sql="call sp_logeo('usu','$usu_login','$usu_clave');";
   // return $sql;
	return ejecutarConsultaSP($sql);	
}

//metodo para listar permmisos marcados de un usuario especifico
public function listarmarcados($usu_id){	
	$sql="call sp_permisos('$usu_id');";
	//$sql="SELECT * FROM usuario_permiso WHERE idusuario=$usu_id";
	return ejecutarConsultaSP($sql);
}

//listar registros
public function listar(){
	$sql="call  sp_usuarios(0,0)";
	return ejecutarConsultaSP($sql);
}

public function desactivar($usu_id){
	$sql="call sp_actdes_usuario($usu_id,0)";
	return ejecutarConsultaSP($sql);
}
public function activar($usu_id){
	$sql="call sp_actdes_usuario($usu_id,1)";
	return ejecutarConsultaSP($sql);
}

public function mostrar($usu_id){
	$sql="call  sp_usuarios(1,$usu_id)";
	$row=ejecutarConsultaSP($sql);
	//$sql="SELECT * FROM usuario where usu_id=usu_id";
	return $row->fetch_row();
	//ejecutarConsultaSimpleFila($sql));
}

//metodo insertar regiustro
public function insertar($usu_nombre,$usu_cedula,$usu_telefono,$usu_correo,$usu_cargo,$usu_login,$usu_clave,$permisos){
	$sql="call  sp_insertausuario(0,'$usu_nombre','$usu_cedula','$usu_telefono','$usu_correo','$usu_cargo','$usu_login','$usu_clave')";
//	return $sql;
    $row=ejecutarConsultaSP($sql);
	if ($row==false) {
    	return $row;
	}
	else {
		$idusuarionew = $row->fetch_row()[0];
		
		$num_elementos = 0;
		$sw = true;
		while ($num_elementos < count($permisos)) {
			$sql_detalle = "CALL sp_insertapermisos(1, $idusuarionew, $permisos[$num_elementos])";
			ejecutarConsultaSP($sql_detalle) or $sw = false;
			$num_elementos = $num_elementos + 1;
		}
		
		// Devolver verdadero si todos los permisos se insertaron correctamente, de lo contrario, falso
		return $sw;
	}
}

public function editar($usu_id,$usu_nombre,$usu_cedula,$usu_telefono,$usu_correo,$usu_cargo,$usu_login,$usu_clave,$permisos){
	$sql="call  sp_insertausuario($usu_id,'$usu_nombre','$usu_cedula','$usu_telefono','$usu_correo','$usu_cargo','$usu_login','$usu_clave','1')";
	$row=ejecutarConsultaSP($sql);
	 $num_elementos=0;
	 $sw=true;
	 $sql_detalle="CALL sp_insertapermisos(0,$usu_id,$permisos[$num_elementos])";
     //borro permisos 
	 $g=ejecutarConsulta($sql_detalle);
	 while ($num_elementos < count($permisos)) {
        //echo $permisos[$num_elementos];
	 	$sql_detalle="CALL  sp_insertapermisos(1,$usu_id,$permisos[$num_elementos])";
        ejecutarConsulta($sql_detalle) or $sw=false;
	 	$num_elementos=$num_elementos+1;
	 }
	 return $sw;

}

}
?>