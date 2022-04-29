<?php require_once("db/conexion_db.php"); 
    $datos = $productos->find();
    class Productos {
        public $id;
        public $nombre; 
        public $precio;  
        public $imagen;  
    }
    $producto=new Productos;
    $listProductos = array();
    foreach ($datos as $dato) {
        $producto=new Productos;
        $producto->id = (string) $dato['_id'];
        $producto->nombre = $dato['nombre'];
        $producto->precio = $dato['precio'];
        $producto->imagen = (string) $dato['imagen'];
        array_push($listProductos,$producto);
    }
    $jsonProd = json_encode($listProductos);
?>

<script type="text/javascript">
document.addEventListener('DOMContentLoaded', () => {

          // Variables
          const baseDeDatos = <?php echo $jsonProd ?>;
          let carrito = [];
          let producto = {};
          const divisa = 'COP';
          const DOMitems = document.querySelector('#items');
          //const DOMcarrito = document.querySelector('#carrito');
          const DOMcontenidotabla = document.querySelector('#contenido-Tabla');
          const DOMtotal = document.querySelector('#total');
          const DOMbotonVaciar = document.querySelector('#boton-vaciar');
          const DOMbotonFacturar = document.querySelector('#boton-facturar');

          // Funciones

          /**
          * Dibuja todos los productos a partir de la base de datos. No confundir con el carrito
          */
          function renderizarProductos() {
              baseDeDatos.forEach((info) => {
                  // Estructura
                  const miNodo = document.createElement('div');
                  miNodo.classList.add('content-box');
                  // Imagen
                  const miNodoImagen = document.createElement('img');
                  //miNodoImagen.classList.add('img-fluid');
                  miNodoImagen.setAttribute('src', info.imagen);
                  // Body
                  const miNodoCardBody = document.createElement('div');
                  miNodoCardBody.classList.add('box');
                  // Titulo
                  const miNodoTitle = document.createElement('h3');
                  //miNodoTitle.classList.add('card-title');
                  miNodoTitle.textContent = info.nombre;
                  // Precio
                  const miNodoPrecio = document.createElement('p');
                  //miNodoPrecio.classList.add('card-text');
                  miNodoPrecio.textContent = `${info.precio} ${divisa}`;
                  // Boton 
                  const miNodoBoton = document.createElement('button');
                  miNodoBoton.classList.add('btn');
                  miNodoBoton.textContent = '+';
                  miNodoBoton.setAttribute('marcador', info.id);
                  miNodoBoton.addEventListener('click', anyadirProductoAlCarrito);
                  // Insertamos
                  miNodoCardBody.appendChild(miNodoImagen);
                  miNodoCardBody.appendChild(miNodoTitle);
                  miNodoCardBody.appendChild(miNodoPrecio);
                  miNodoCardBody.appendChild(miNodoBoton);
                  miNodo.appendChild(miNodoCardBody);
                  DOMitems.appendChild(miNodo);
              });
          }

          /**
          * Evento para añadir un producto al carrito de la compra
          */
          function anyadirProductoAlCarrito(evento) {
              // Anyadimos el Nodo a nuestro carrito
              carrito.push(evento.target.getAttribute('marcador'))
              // Actualizamos el carrito 
              renderizarCarrito();

          }

          /**
          * Dibuja todos los productos guardados en el carrito
          */
          function renderizarCarrito() {
              let count = 0;
              DOMcontenidotabla.innerHTML = "";
              // Quitamos los duplicados
              const carritoSinDuplicados = [...new Set(carrito)];
              // Generamos los Nodos a partir de carrito
              carritoSinDuplicados.forEach((item) => {
                  // Obtenemos el item que necesitamos de la variable base de datos
                  const miItem = baseDeDatos.filter((itemBaseDatos) => {
                      // ¿Coincide las id? Solo puede existir un caso
                      return itemBaseDatos.id === item;
                  });
                  // Cuenta el número de veces que se repite el producto
                  const numeroUnidadesItem = carrito.reduce((total, itemId) => {
                      // ¿Coincide las id? Incremento el contador, en caso contrario no mantengo
                      return itemId === item ? total += 1 : total;
                  }, 0);
                  // Vamos a ir adjuntando elementos a la tabla.
                  count++
                  const fila = document.createElement("tr");
                  fila.setAttribute("id",`fila${count}`);
                  const celdaId = document.createElement("td");
                  celdaId.innerText = item;
                  celdaId.setAttribute('style', 'display: none;');
                  fila.appendChild(celdaId);

                  const celdaNombre = document.createElement("td");
                  celdaNombre.innerText = miItem[0].nombre;
                  fila.appendChild(celdaNombre);

                  const celdaCant = document.createElement("td");
                  celdaCant.innerText = numeroUnidadesItem;
                  fila.appendChild(celdaCant);

                  const celdaPrecio = document.createElement("td");
                  celdaPrecio.innerText = `${miItem[0].precio * numeroUnidadesItem}`;
                  fila.appendChild(celdaPrecio);

                  const miBoton = document.createElement('button');
                  miBoton.classList.add('btn-danger');
                  miBoton.innerHTML = `<i class="fa fa-trash"></i>`;
                  miBoton.style.marginLeft = '1rem';
                  miBoton.dataset.item = item;
                  miBoton.addEventListener('click', borrarItemCarrito);

                  const celdaBoton = document.createElement("td");
                  celdaBoton.appendChild(miBoton);
                  fila.appendChild(celdaBoton);
                  DOMcontenidotabla.appendChild(fila);
              });

             // Renderizamos el precio total en el HTML
                DOMtotal.textContent = `$ ${calcularTotal()}COP`;
                
          }

          /**
          * Evento para borrar un elemento del carrito
          */
          function borrarItemCarrito(evento) {
              // Obtenemos el producto ID que hay en el boton pulsado
              const id = evento.target.dataset.item;
              // Borramos todos los productos
              carrito = carrito.filter((carritoId) => {
                  return carritoId !== id;
              });
              // volvemos a renderizar
              renderizarCarrito();
          }

          /**
           * Calcula el precio total teniendo en cuenta los productos repetidos
           */
          function calcularTotal() {
              // Recorremos el array del carrito 
              return carrito.reduce((total, item) => {
                  // De cada elemento obtenemos su precio
                  const miItem = baseDeDatos.filter((itemBaseDatos) => {
                      return itemBaseDatos.id === item;
                  });
                  // Los sumamos al total
                  return total + miItem[0].precio;
              }, 0).toFixed(2);
          }

          /**
          * Varia el carrito y vuelve a dibujarlo
          */
          function vaciarCarrito() {
              // Limpiamos los productos guardados
              carrito = [];
              // Renderizamos los cambios
              renderizarCarrito();
          }

          function facturarCarrito(){
              let obtenerFila = document.getElementById("fila1");
              let elementoFila = obtenerFila.getElementsByTagName("td");
              let totalFac = 0;
              var producto = new Object();
              producto.id = elementoFila[0].innerHTML;
              producto.cantidad = elementoFila[2].innerHTML;
              producto.precio = elementoFila[3].innerHTML;
              totalFac += Number(elementoFila[3].innerHTML);
              $.ajax({
                method: 'post',
                url: 'control/insertOrder.php',
                data: {productos: producto,
                       total: totalFac},
                success: function(response) {
                console.log(response);
                vaciarCarrito();
                }
            });
          }
          // Eventos
          DOMbotonVaciar.addEventListener('click', vaciarCarrito);
          DOMbotonFacturar.addEventListener('click', facturarCarrito)
          // Inicio
          renderizarProductos();
          renderizarCarrito();
        });
</script>

