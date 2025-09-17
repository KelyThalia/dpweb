# Lista de Tareas para Arreglar Errores en el Código

## Archivos a Corregir

### 1. view/users.php
- [ ] Agregar espacio en <?= BASE_URL?> para que sea <?= BASE_URL ?>

### 2. model/views_model.php
- [ ] Corregir "Pruducts" a "Products" en la lista blanca

### 3. view/include/fooder.php
- [ ] Renombrar archivo a footer.php
- [ ] Actualizar include en view/plantilla.php

### 4. control/UsuarioController.php
- [ ] Corregir $provincia = "" a $provincia == "" en registrar y actualizar
- [ ] Usar $arrResponse consistentemente en iniciar_sesion
- [ ] Agregar caso para "ver_usuarios"
- [ ] Corregir $eliminar a $usuario en eliminar

### 5. model/UsuarioModel.php
- [ ] Corregir tabla "personas" a "persona" en eliminar
- [ ] Agregar WHERE id='$id_persona' en actualizar
- [ ] Corregir "buscarPesonaPorNroIdentidad" a "buscarPersonaPorNroIdentidad"

### 6. view/function/user.js
- [ ] Corregir template literals en view_users()
- [ ] Corregir onclick en eliminar: usuario.id y función Eliminar
- [ ] Corregir datos.append en Eliminar
- [ ] Corregir frm_edit_user a document.getElementById
- [ ] Corregir jsn.msg a json.msg
- [ ] Cambiar alert a Swal.fire en varias funciones

## Pruebas
- [ ] Probar login
- [ ] Probar lista de usuarios
- [ ] Probar registro de usuario
- [ ] Probar actualización de usuario
- [ ] Probar eliminación de usuario
