<script src="../js/main.js"></script>
<?php
    require "../db.php";
    class DetalleAdmin extends DB{
        function obtenerDetalles() {
            $query = $this->connect()->query('SELECT * FROM detallesVenta');
            return $query;
        }

        function obtenerDetalle($id) {
            $query = $this->connect()->prepare('SELECT * FROM detallesVenta WHERE idDetalles = :id');
            $query->execute([
                ':id' => $id
            ]);
            return $query;
        }

        function insertarDetalle($idProducto, $idUsuario, $cantVenta, $fechaVenta, $totalVenta) {
            $query = $this->connect()->prepare('INSERT INTO detallesVenta (idProducto, idUsuario, cantVenta, fechaVenta, totalVenta) VALUES (:idProducto, :idUsuario, :cantVenta, :fechaVenta, :totalVenta)');
            $query->execute([
                ':idProducto' => $idProducto,
                ':idUsuario' => $idUsuario,
                ':cantVenta' => $cantVenta,
                ':fechaVenta' => $fechaVenta,
                ':totalVenta' => $totalVenta
            ]);
            return $query;
        }

        function actualizarDetalle($idDetalles, $idProducto, $idUsuario, $cantVenta, $fechaVenta, $totalVenta) {
            $query = $this->connect()->prepare('UPDATE detallesVenta SET idProducto = :idProducto, idUsuario = :idUsuario, cantVenta = :cantVenta, fechaVenta = :fechaVenta, totalVenta = :totalVenta WHERE idDetalles = :idDetalles');
            $query->execute([
                ':idProducto' => $idProducto,
                ':idUsuario' => $idUsuario,
                ':cantVenta' => $cantVenta,
                ':fechaVenta' => $fechaVenta,
                ':totalVenta' => $totalVenta,
                ':idDetalles' => $idDetalles
            ]);
            return $query;
        }

        function eliminarDetalle($id) {
            $query = $this->connect()->prepare('DELETE FROM detallesVenta WHERE idDetalles = :id');
            $query->execute([
                ':id' => $id
            ]);
            return $query;
        }
    }
    class Detalle extends DB{
        function obtenerDetallesUsuario($idUsuario) {
            $query = $this->connect()->prepare('SELECT * FROM detallesVenta WHERE idUsuario = :idUsuario');
            $query->execute([
                ':idUsuario' => $idUsuario
            ]);
            return $query;
        }
    }
    class ApiDetallesAdmin {
        function getAll()
        {
            $total["items"] = array();
            $detalles = new DetalleAdmin();
    
            $resultado = $detalles->obtenerDetalles();
    
            if($resultado->rowCount() !== 0) //la variable "$row" es = a fila, rowcount es contar las filas
            {
                while ($row = $resultado->fetch(PDO::FETCH_ASSOC)){
                    $item=array
                    (
                        "idDetalles" => $row['idDetalles'],
                        "idProducto" => $row['idProducto'],
                        "idUsuario" => $row['idUsuario'],
                        "cantVenta" => $row['cantVenta'],
                        "fechaVenta" => $row['fechaVenta'],
                        "totalVenta" => $row['totalVenta']
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
        function get($id)
        {
            $total["items"] = array();
            $detalle = new DetalleAdmin();
    
            $resultado = $detalle->obtenerDetalle($id);
    
            if($resultado->rowCount() !== 0) //la variable "$row" es = a fila, rowcount es contar las filas
            {
                while ($row = $resultado->fetch(PDO::FETCH_ASSOC)){
                    $item=array
                    (
                        "idDetalles" => $row['idDetalles'],
                        "idProducto" => $row['idProducto'],
                        "idUsuario" => $row['idUsuario'],
                        "cantVenta" => $row['cantVenta'],
                        "fechaVenta" => $row['fechaVenta'],
                        "totalVenta" => $row['totalVenta']
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
        function post($idProducto, $idUsuario, $cantVenta, $fechaVenta, $totalVenta) {
            $detalle = new DetalleAdmin();
    
            $detalle->insertarDetalle($idProducto, $idUsuario, $cantVenta, $fechaVenta, $totalVenta);

            return 1;
        }

        function update($idDetalles, $idProducto, $idUsuario, $cantVenta, $fechaVenta, $totalVenta) {
            $detalle = new DetalleAdmin();
    
            $detalle->actualizarDetalle($idDetalles, $idProducto, $idUsuario, $cantVenta, $fechaVenta, $totalVenta);

            return 0;
        }

        function delete($id) {
            $detalle = new DetalleAdmin();
    
            $detalle->eliminarDetalle($id);

            return 1;
        }
    }
    class ApiDetalles {
        function getAll($idUsuario)
        {
            $total["items"] = array();
            $detalles = new Detalle();
    
            $resultado = $detalles->obtenerDetallesUsuario($idUsuario);
    
            if($resultado->rowCount() !== 0) //la variable "$row" es = a fila, rowcount es contar las filas
            {
                while ($row = $resultado->fetch(PDO::FETCH_ASSOC)){
                    $item=array
                    (
                        "idDetalles" => $row['idDetalles'],
                        "idProducto" => $row['idProducto'],
                        "idUsuario" => $row['idUsuario'],
                        "cantVenta" => $row['cantVenta'],
                        "fechaVenta" => $row['fechaVenta'],
                        "totalVenta" => $row['totalVenta']
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
    }
?>