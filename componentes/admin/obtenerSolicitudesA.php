<?php    
    include '../../conexion.php'; 
    session_start();   
    //$sql='SELECT * from ticket LEFT JOIN ubicacion on ticket.id_Ubi = ubicacion.id_Ubi LEFT JOIN personal on ticket.id_Per = personal.id_Per';
    $sql='SELECT prestamo.*, usuario.codigo_u, usuario.nombre_u from prestamo LEFT JOIN usuario on prestamo.codigo_u = usuario.codigo_u WHERE estado=1 AND fecha_fin is NULL';
    $gsent=$pdo->prepare($sql);
    $gsent->execute();
    $resultado = $gsent->fetchAll();
    $gsent->closeCursor();
    $gsent=null;
    $pdo=null;
?>
<?php foreach($resultado as $dato): ?>
    <tr>
        <td>
            <form method="post" name="forma<?php echo ($dato['id_pres']); ?>" id="form<?php echo ($dato['id_pres']); ?>" action="ver_prestamo.php">
                <div style="cursor:pointer" class="checkUsuario"><input type="hidden" name="id_pres" value=<?php echo ($dato['id_pres']); ?>><?php echo ($dato['id_pres']); ?></div>
            </form>
        </td>
        <td>
            <form method="post" name="forma<?php echo ($dato['codigo_u']); ?>" id="form<?php echo ($dato['codigo_u']); ?>" action="ver_usuario.php">
                <div style="cursor:pointer" class="checkUsuario"><input type="hidden" name="cod" value=<?php echo ($dato['codigo_u']); ?>><?php echo ($dato['codigo_u']); ?></div>
            </form>
            
        </td>
        <td><?php echo ($dato["nombre_u"]); ?></td>
        <td><?php echo date('Y-m-d', strtotime($dato["fecha_pres"])); ?></td>
        <td><?php echo date('H:i', strtotime($dato["fecha_pres"])); ?></td>
        <td class="c-acciones">
            <a href="#" class="finish"><i class="fas fa-check-circle m-1" style="color:#2E8BC0;"></i></a>
        </td>
    </tr>
<?php endforeach?>