let productos_venta = [];
let id = 2;
let id2 = 4;
let producto = {};
producto.nombre = "Producto A";
producto.precio = 100;
producto.cantidad = 2;
productos_venta.push(producto);
//productos_venta[id]=producto;
console.log(productos_venta);

let producto2 = {};
producto2.nombre = "Producto B";
producto2.precio = 200;
producto2.cantidad = 1;
//productos_venta.push(producto);

productos_venta[id]=producto;
productos_venta[id2]=producto2;
console.log(productos_venta);

console.log(productos_venta);
async function agregar_producto_temporal() {
    let id=document.getElementById('id_producto_venta');
    let precio=document.getElementById('id_producto_precio');
    let cantidad=document.getElementById('id_producto_cantidad');
    
   const datos = new FormData();
   datos.append('id_producto', id);
   datos.append('precio', precio);
   datos.append('cantidad', cantidad);
   try {
     let respuesta = await fetch(base_url + 'control/VentaController.php?tipo=registrarTemporal', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        json = await respuesta.json();
        if (json.status) {
            if (json.msg == "registrado") {
                alert ("el controlador fue registrado");
                
            }else{
                alert("el mensaje fue actualizado")
            }
            
        }
   } catch (error) {
    console.log("error en agregar producto temporal " + error);
   }
   
}