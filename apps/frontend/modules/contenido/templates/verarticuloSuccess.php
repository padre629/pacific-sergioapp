<!-- archivo ejecutado gracias a -->
<!-- ../actions/actions.class.php:executeVerarticulo -->

<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $articulo->getId() ?></td>
    </tr>
    <tr>
      <th>Titulo:</th>
      <td><?php echo $articulo->getTitulo() ?></td>
    </tr>
    <tr>
      <th>Contenido:</th>
      <td><?php echo $articulo->getContenido() ?></td>
    </tr>
    <tr>
      <th>Creado:</th>
      <td><?php echo $articulo->getCreatedAt() ?></td>
    </tr>
  </tbody>
</table>