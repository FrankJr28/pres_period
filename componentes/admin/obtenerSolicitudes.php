<?php    
    
    include '../../conexion.php'; 
    session_start();   
    //$sql='SELECT * from ticket LEFT JOIN ubicacion on ticket.id_Ubi = ubicacion.id_Ubi LEFT JOIN personal on ticket.id_Per = personal.id_Per';
    $sql='SELECT prestamo.*, usuario.codigo_u, usuario.nombre_u, docente.nombre_doc, docente.app_doc from prestamo 
    LEFT JOIN usuario on prestamo.codigo_u = usuario.codigo_u 
    LEFT JOIN docente on prestamo.id_doc = docente.id_doc
    WHERE estado=0 AND aprob_doc=1';
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
        <td><?php echo ($dato["nombre_doc"].' '.$dato["app_doc"]); ?></td>
        <td><?php echo date('Y-m-d', strtotime($dato["fecha_pres"])); ?></td>
        <td><?php echo date('H:i', strtotime($dato["fecha_pres"])); ?></td>
        <td class="c-acciones">
            <a href="#" class="acept"><i class="far fa-thumbs-up m-1" style="color:green;"></i></a>
            <a href="#" class="delete"><i class="fas fa-times-circle m-1" style="color:red;"></i></a>
            
        </td>
    </tr>
<?php endforeach?>