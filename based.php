<?php
  
    class BaseDeDatos
    {
        private $con;
        public function __construct()
        {
            $this->con = new PDO('mysql:host=localhost;dbname=bd','root','');
        }
        

        public function ingreso($usr,$pass)
        {
            $sql = $this->con->prepare("SELECT * FROM cuenta WHERE BINARY cuenta.user = '" . $usr. "' and BINARY password = '" . $pass ."'" );
            $sql->execute();
            $res = $sql->fetchAll();

            if (count($res) > 0)
            {
                foreach ($res as $dato)

                    return $dato['id'];

                
            }
            return -1;
        }

       public function consulta($id)
        {
            $sql = $this->con->prepare("SELECT * FROM cuenta where cuenta.id = " . $id );
            $sql->execute();
            $res = $sql->fetchAll();
            $arreglo = array();
            foreach ($res as $dato)
            {
                $obj = new Persona();
                $obj->nombre = $dato['nombre'];
                
         	array_push($arreglo, $obj);
            }
            return $arreglo;
        }


 



       }
        
    