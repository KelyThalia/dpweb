```php
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de Peluches - Kely</title>
    <!-- Bootstrap CSS -->
    <link href="<?= BASE_URL ?>programacion_aplicaciones/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body {
            background: linear-gradient(135deg, #fff9f9, #f0f8ff);
            font-family: 'Segoe UI', sans-serif;
            padding-top: 20px;
        }

        .header-section {
            text-align: center;
            margin-bottom: 30px;
        }

        .header-section h1 {
            color: #ff6b9d;
            font-weight: bold;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
        }

        .header-section p {
            color: #666;
            max-width: 600px;
            margin: 0 auto;
        }

        .product-card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
        }

        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 25px rgba(255, 107, 157, 0.3);
        }

        .product-img {
            height: 200px;
            object-fit: cover;
            background-color: #f8f9fa;
        }

        .product-name {
            font-weight: bold;
            color: #333;
            font-size: 1.1rem;
        }

        .product-category {
            font-size: 0.85rem;
            color: #ff6b9d;
            font-weight: 600;
        }

        .product-price {
            font-size: 1.25rem;
            color: #ff6b9d;
            font-weight: bold;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-color: #ff6b9d;
            border-radius: 50%;
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .carousel-indicators [data-bs-target] {
            background-color: #ff6b9d;
            opacity: 0.6;
        }

        .carousel-indicators .active {
            opacity: 1;
        }

        .footer-text {
            text-align: center;
            margin-top: 40px;
            color: #888;
            font-size: 0.9rem;
        }
    </style>
</head>

<body>

    <div class="container">
        <!-- Encabezado -->
        <div class="header-section">
            <h1><i class="bi bi-bear me-2"></i>Peluches Kely</h1>
            <p>Descubre nuestros peluches más adorables. ¡Perfectos para regalar o consentirte!</p>
        </div>

        <!-- Carrusel de productos -->
        <div id="productosCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <!-- Se llenarán con JS -->
            </div>

            <div class="carousel-inner" id="carousel-content">
                <!-- Contenido dinámico -->
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#productosCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#productosCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>

        <div class="footer-text">
            <p>🧸 ¡Cada peluche viene con amor y mucha ternura! 🧸</p>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="<?= BASE_URL ?>programacion_aplicaciones/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
        const base_url = '<?= BASE_URL ?>';

        // Cargar productos desde el controlador
        async function cargarProductosCarrusel() {
            try {
                const respuesta = await fetch(base_url + 'control/ProductoController.php?tipo=mostrar_productos');
                const productos = await respuesta.json();

                if (!Array.isArray(productos) || productos.length === 0) {
                    document.getElementById('carousel-content').innerHTML = `
                        <div class="carousel-item active">
                            <div class="d-flex justify-content-center align-items-center" style="height: 300px;">
                                <p class="text-muted">No hay productos disponibles.</p>
                            </div>
                        </div>
                    `;
                    return;
                }

                let indicatorsHTML = '';
                let itemsHTML = '';

                productos.forEach((producto, index) => {
                    const activo = index === 0 ? 'active' : '';
                    
                    // Indicadores (puntos inferiores)
                    indicatorsHTML += `<button type="button" data-bs-target="#productosCarousel" data-bs-slide-to="${index}" class="${activo}" aria-label="Slide ${index + 1}"></button>`;
                    
                    // Imagen por defecto si no hay
                    const imagen = producto.imagen 
                        ? base_url + producto.imagen 
                        : 'https://placehold.co/300x200/ffebee/ff6b9d?text=Sin+Imagen';

                    // Items del carrusel
                    itemsHTML += `
                        <div class="carousel-item ${activo}">
                            <div class="row justify-content-center">
                                <div class="col-lg-4 col-md-6 mb-4">
                                    <div class="card product-card h-100">
                                        <img src="${imagen}" class="card-img-top product-img" alt="${producto.nombre}">
                                        <div class="card-body text-center">
                                            <div class="product-category">${producto.categoria || 'Sin categoría'}</div>
                                            <h5 class="product-name">${producto.nombre}</h5>
                                            <p class="text-muted">${producto.detalle || ''}</p>
                                            <div class="product-price">S/. ${parseFloat(producto.precio).toFixed(2)}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                });

                document.querySelector('.carousel-indicators').innerHTML = indicatorsHTML;
                document.getElementById('carousel-content').innerHTML = itemsHTML;

            } catch (error) {
                console.error('Error al cargar productos:', error);
                document.getElementById('carousel-content').innerHTML = `
                    <div class="carousel-item active">
                        <div class="d-flex justify-content-center align-items-center" style="height: 300px;">
                            <p class="text-danger">Error al cargar los productos.</p>
                        </div>
                    </div>
                `;
            }
        }

        // Cargar al iniciar
        document.addEventListener('DOMContentLoaded', cargarProductosCarrusel);
    </script>
</body>

</html>