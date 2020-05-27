<script src="../js/main.js"></script>
<?php
    require "../db.php";
    class VentaAdmin extends DB{
        function obtenerVentas() {
            $query = $this->connect()->query('SELECT * FROM venta');
            return $query;
        }

        function obtenerVenta($id) {
            $query = $this->connect()->prepare('SELECT * FROM venta WHERE idVenta = :id');
            $query->execute([
                ':id' => $id
            ]);
            return $query;
        }

        function insertarVenta($idUsuario, $fecha, $total) {
            $query = $this->connect()->prepare('INSERT INTO venta (idUsuario, fechaVenta, totalVenta) VALUES (:idUsuario, :fechaVenta, :totalVenta)');
            $query->execute([
                ':idUsuario' => $idUsuario,
                ':fechaVenta' => $fecha,
                ':totalVenta' => $total
            ]);
            return $query;
        }

        function actualizarVenta($idVenta, $idUsuario, $fecha, $total) {
            $query = $this->connect()->prepare('UPDATE venta SET idUsuario = :idUsuario, fechaVenta = :fechaVenta, totalVenta = :totalVenta WHERE idVenta = :idVenta');
            $query->execute([
                ':idUsuario' => $idUsuario,
                ':fechaVenta' => $fecha,
                ':totalVenta' => $total,
                ':idVenta' => $idVenta
            ]);
            return $query;
        }

        function eliminarVenta($id) {
            $query = $this->connect()->prepare('DELETE FROM venta WHERE idVenta = :id');
            $query->execute([
                ':id' => $id
            ]);
            return $query;
        }
    }
    class Venta extends DB{
        function obtenerVentasUsuario($idUsuario) {
            $query = $this->connect()->prepare('SELECT * FROM venta WHERE idUsuario = :idUsuario');
            $query->execute([
                ':idUsuario' => $idUsuario
            ]);
            return $query;
        }

        function obtenerVenta($id) {
            $query = $this->connect()->prepare('SELECT * FROM venta WHERE idVenta = :id');
            $query->execute([
                ':id' => $id
            ]);
            return $query;
        }

        function insertarVenta($idUsuario, $fecha, $total) {
            $query = $this->connect()->prepare('INSERT INTO venta (idUsuario, fechaVenta, totalVenta) VALUES (:idUsuario, :fechaVenta, :totalVenta)');
            $query->execute([
                ':idUsuario' => $idUsuario,
                ':fechaVenta' => $fecha,
                ':totalVenta' => $total
            ]);
            return $query;
        }

        function actualizarVenta($idVenta, $idUsuario, $fecha, $total) {
            $query = $this->connect()->prepare('UPDATE venta SET idUsuario = :idUsuario, fechaVenta = :fechaVenta, totalVenta = :totalVenta WHERE idVenta = :idVenta');
            $query->execute([
                ':idUsuario' => $idUsuario,
                ':fechaVenta' => $fecha,
                ':totalVenta' => $total,
                ':idVenta' => $idVenta
            ]);
            return $query;
        }

        function eliminarVenta($id) {
            $query = $this->connect()->prepare('DELETE FROM venta WHERE idVenta = :id');
            $query->execute([
                ':id' => $id
            ]);
            return $query;
        }
    }
    class ApiVentasAdmin {
        function getAll()
        {
            $total["items"] = array();
            $ventas = new VentaAdmin();
    
            $resultado = $ventas->obtenerVentas();
    
            if($resultado->rowCount() !== 0) //la variable "$row" es = a fila, rowcount es contar las filas
            {
                while ($row = $resultado->fetch(PDO::FETCH_ASSOC)){
                    $item=array
                    (
                        "idVenta" => $row['idVenta'],
                        "idUsuario" => $row['idUsuario'],
                        "fecha" => $row['fechaVenta'],
                        "total" => $row['totalVenta']
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
            $venta = new VentaAdmin();
    
            $resultado = $venta->obtenerVenta($id);
    
            if($resultado->rowCount() !== 0) //la variable "$row" es = a fila, rowcount es contar las filas
            {
                while ($row = $resultado->fetch(PDO::FETCH_ASSOC)){
                    $item=array
                    (
                        "idVenta" => $row['idVenta'],
                        "idUsuario" => $row['idUsuario'],
                        "fecha" => $row['fechaVenta'],
                        "total" => $row['totalVenta']
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
        function post($idUsuario, $fecha, $total) {
            $venta = new VentaAdmin();
    
            $venta->insertarVenta($idUsuario, $fecha, $total);

            return 1;
        }

        function update($idVenta, $idUsuario, $fecha, $total) {
            $venta = new VentaAdmin();
    
            $venta->actualizarVenta($idVenta, $idUsuario, $fecha, $total);

            return 1;
        }

        function delete($id) {
            $venta = new VentaAdmin();
    
            $venta->eliminarVenta($id);

            return 1;
        }
    }
    class ApiVentas {
        function getAll($idUsuario)
        {
            $total["items"] = array();
            $ventas = new Venta();
    
            $resultado = $ventas->obtenerVentasUsuario($idUsuario);
    
            if($resultado->rowCount() !== 0) //la variable "$row" es = a fila, rowcount es contar las filas
            {
                while ($row = $resultado->fetch(PDO::FETCH_ASSOC)){
                    $item=array
                    (
                        "idVenta" => $row['idVenta'],
                        "idUsuario" => $row['idUsuario'],
                        "fecha" => $row['fechaVenta'],
                        "total" => $row['totalVenta']
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
            $venta = new Venta();
    
            $resultado = $venta->obtenerVenta($id);
    
            if($resultado->rowCount() !== 0) //la variable "$row" es = a fila, rowcount es contar las filas
            {
                while ($row = $resultado->fetch(PDO::FETCH_ASSOC)){
                    $item=array
                    (
                        "idVenta" => $row['idVenta'],
                        "idUsuario" => $row['idUsuario'],
                        "fecha" => $row['fechaVenta'],
                        "total" => $row['totalVenta']
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
        function post($idUsuario, $fecha, $total) {
            $venta = new Venta();
    
            $venta->insertarVenta($idUsuario, $fecha, $total);

            return 1;
        }

        function update($idVenta, $idUsuario, $fecha, $total) {
            $venta = new Venta();
    
            $venta->actualizarVenta($idVenta, $idUsuario, $fecha, $total);

            return 1;
        }

        function delete($id) {
            $venta = new Venta();
    
            $venta->eliminarVenta($id);

            return 1;
        }
    }
?>