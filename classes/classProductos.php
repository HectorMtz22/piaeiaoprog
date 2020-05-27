<script src="../js/main.js"></script>
<?php
    require "../db.php";
    class Producto extends DB{
        function obtenerProductos() {
            $query = $this->connect()->query('SELECT * FROM productos');
            return $query;
        }

        function obtenerProducto($id) {
            $query = $this->connect()->prepare('SELECT * FROM productos WHERE idProducto = :id');
            $query->execute([
                ':id' => $id
            ]);
            return $query;
        }

        function insertarProducto($nombre, $tipo, $desc, $precio) {
            $query = $this->connect()->prepare('INSERT INTO productos (nombreProducto, tipoProducto, descProducto, precioProducto) VALUES (:nombreProducto, :tipoProducto, :descProducto, :precioProducto)');
            $query->execute([
                ':nombreProducto' => $nombre,
                ':tipoProducto' => $tipo,
                ':descProducto' => $desc,
                ':precioProducto' => $precio
            ]);
            return $query;
        }

        function actualizarProducto($id, $nombre, $tipo, $desc, $precio) {
            $query = $this->connect()->prepare('UPDATE productos SET nombreProducto = :nombreProducto, tipoProducto = :tipoProducto, descProducto = :descProducto, precioProducto = :precioProducto WHERE idProducto = :idProducto');
            $query->execute([
                ':nombreProducto' => $nombre,
                ':tipoProducto' => $tipo,
                ':descProducto' => $desc,
                ':precioProducto' => $precio,
                ':idProducto' => $id
            ]);
            return $query;
        }

        function eliminarProducto($id) {
            $query = $this->connect()->prepare('DELETE FROM productos WHERE idProducto = :id');
            $query->execute([
                ':id' => $id
            ]);
            return $query;
        }
    }
    class ApiProductos {
        function getAll()
        {
            $total["items"] = array();
            $producto = new Producto();
    
            $resultado = $producto->obtenerProductos();
    
            if($resultado->rowCount() !== 0) //la variable "$row" es = a fila, rowcount es contar las filas
            {
                while ($row = $resultado->fetch(PDO::FETCH_ASSOC)){
                    $item=array
                    (
                        "_id" => $row['idProducto'],
                        "nombre" => $row['nombreProducto'],
                        "tipo" => $row['tipoProducto'],
                        "desc" => $row['descProducto'],
                        "precio" => $row['precioProducto']
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
            $producto = new Producto();
    
            $resultado = $producto->obtenerProducto($id);
    
            if($resultado->rowCount() !== 0) //la variable "$row" es = a fila, rowcount es contar las filas
            {
                while ($row = $resultado->fetch(PDO::FETCH_ASSOC)){
                    $item=array
                    (
                        "_id" => $row['idProducto'],
                        "nombre" => $row['nombreProducto'],
                        "tipo" => $row['tipoProducto'],
                        "desc" => $row['descProducto'],
                        "precio" => $row['precioProducto']
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
        function post($nombre, $tipo, $desc, $precio) {
            $total["items"] = array();
            $producto = new Producto();
    
            $producto->insertarProducto($nombre, $tipo, $desc, $precio);

            return 1;
        }

        function update($id, $nombre, $tipo, $desc, $precio) {
            $total["items"] = array();
            $producto = new Producto();
    
            $producto->actualizarProducto($id, $nombre, $tipo, $desc, $precio);

            return 1;
        }

        function delete($id) {
            $total["items"] = array();
            $producto = new Producto();
    
            $producto->eliminarProducto($id);

            return 1;
        }
    }
?>