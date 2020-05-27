<script src="../js/main.js"></script>
<?php
    include_once "./db.php";
    class Login extends DB{
        function obtenerUsuario($emailUsuario, $contraUsuario)
        {
            $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE (emailUsuario >= :emailUsuario AND contraUsuario <= :contraUsuario)');
            $query->execute([
                ':emailUsuario' => $emailUsuario,
                ':contraUsuario' => $contraUsuario
            ]);
            return $query;
        }
    }
    class Register extends DB{
        function insertarUsuario($nombre, $email, $tel, $contra)
        {
            $query = $this->connect()->prepare('INSERT INTO usuarios (nombreUsuario, emailUsuario, telUsuario, contraUsuario) VALUES (:nombreUsuario, :emailUsuario, :telUsuario, :contraUsuario)');
            $query->execute([
                ':nombreUsuario' => $nombre,
                ':emailUsuario' => $email,
                ':telUsuario' => $tel,
                ':contraUsuario' => $contra
            ]);
            return $query;
        }
    }
    class Admin extends DB {
        function obtenerUsuarios()
        {
            $query = $this->connect()->query('SELECT * FROM usuarios');
            return $query;
        }
        function actualizarUsuario($id, $nombre, $email, $tel, $contra)
        {
            $query = $this->connect()->prepare('UPDATE usuarios SET nombreUsuario = :nombreUsuario, emailUsuario = :emailUsuario, telUsuario = :telUsuario, contraUsuario = :contraUsuario WHERE idUsuario = :idUsuario');
            $query->execute([
                ':nombreUsuario' => $nombre,
                ':emailUsuario' => $email,
                ':telUsuario' => $tel,
                ':contraUsuario' => $contra,
                ':idUsuario' => $id
            ]);
            return $query;
        }
        function eliminarUsuario($id)
        {
            $query = $this->connect()->prepare('DELETE FROM usuarios WHERE idUsuario = :idUsuario');
            $query->execute([
                ':idUsuario' => $id
            ]);
            return $query;
        }
    }
    class ApiUsuarios {
        function get($correo, $contraseña)
        {
            $total["items"] = array();
            $usuario = new Login();
    
            $resultado = $usuario->obtenerUsuario($correo, $contraseña);
    
            if($resultado->rowCount() !== 0) //la variable "$row" es = a fila, rowcount es contar las filas
            {
    
                while ($row = $resultado->fetch(PDO::FETCH_ASSOC)){
                    $item=array
                    (
                        "auth" => true,
                        "isAdmin" => $row['isAdmin'],
                        "nombreUsuario" => $row['nombreUsuario'],
                        "idUsuario" => $row['idUsuario']
                    );
                    array_push($total["items"], $item);
                }
                
            }
            else
            {
                echo "<script>message('noencontrado')</script>";
            }
            return $total;
        }
        function post($nombre, $correo, $tel, $contraseña)
        {
            $total["items"] = array();
            $usuario = new Register();
    
            $usuario->insertarUsuario($nombre, $correo, $tel, $contraseña);
    
            
            return 1;
        }
        function getAll()
        {
            $total["items"] = array();
            $usuario = new Admin();
    
            $resultado = $usuario->obtenerUsuarios();

            if($resultado->rowCount() !== 0) //la variable "$row" es = a fila, rowcount es contar las filas
            {
    
                while ($row = $resultado->fetch(PDO::FETCH_ASSOC)){
                    $item=array
                    (
                        "_id" => $row['idUsuario'],
                        "nombre" => $row['nombreUsuario'],
                        "email" => $row['emailUsuario'],
                        "tel" => $row['telUsuario'],
                        "contra" => $row['contraUsuario']
                    );
                    array_push($total["items"], $item);
                }
                
            }
            else
            {
                echo "<script>message('noencontrado')</script>";
            }
            return $total;
        }
        function update($id, $nombre, $correo, $tel, $contraseña)
        {
            $total["items"] = array();
            $usuario = new Admin();
    
            $usuario->actualizarUsuario($id, $nombre, $correo, $tel, $contraseña);

            return 1;
        }
        function delete($id)
        {
            $total["items"] = array();
            $usuario = new Admin();
    
            $usuario->eliminarUsuario($id);

            return 1;
        }
    }
?>