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