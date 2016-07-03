<?php

require_once '../ds/MyPDO.php';

class ClienteDao extends MyPDO {    
    
    ////Metodo Registro Cliente
    public function RegistrarCliente($paterno,$materno,$nombre,$dni,$ciudad,$direccion,$telefono,$email) {
        $estado = 'hola';
        try {
            $stm = $this->pdo->prepare("call usp_cliente(?,?,?,?,?,?,?,?)");
            $stm->bindParam(1, $paterno);
            $stm->bindParam(2, $materno);
            $stm->bindParam(3, $nombre);
            $stm->bindParam(4, $dni);
            $stm->bindParam(5, $ciudad);
            $stm->bindParam(6, $direccion);
            $stm->bindParam(7, $telefono);
            $stm->bindParam(8, $email);
            
            // llamar al procedimiento almacenado
            $stm->execute();
            $estado = $stm->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            throw $e;
        }
        return $estado;
    }

    public function consultarCliene($dni) {
        $rec = null;
        try {
            
            $query = "SELECT chr_cliecodigo,
                            vch_cliepaterno,
                            vch_cliematerno,
                            vch_clienombre,
                            chr_cliedni,
                            vch_clieciudad,
                            vch_cliedireccion,
                            vch_clietelefono,
                            vch_clieemail
                        FROM cliente
                        WHERE chr_cliedni=?";
				
            $stm = $this->pdo->prepare($query);
            $stm->bindParam(1, $dni);
            $stm->execute();
            $rec = $stm->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            throw $e;
        }
        return $rec;
    }     
    
}




?>
