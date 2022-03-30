document.addEventListener('DOMContentLoaded', () => {
          // Variables
          const baseDeDatos = [
              {
                  id: 1,
                  nombre: 'HTML 5',
                  precio: 36000,
                  imagen: 'img/html-page.png'
              },
              {
                  id: 2,
                  nombre: 'CSS3',
                  precio: 36000,
                  imagen: 'img/css-page.png'
              },
              {
                  id: 3,
                  nombre: 'JAVASCRIPT',
                  precio: 36000,
                  imagen: 'img/js-page.png'
              },
              {
                  id: 4,
                  nombre: 'BOOTSTRAP',
                  precio: 36000,
                  imagen: 'img/bootstrap-5-1.svg'
              },
              {
                  id: 5,
                  nombre: 'ANGULAR',
                  precio: 36000,
                  imagen: 'img/angular-icon.png'
              }
          ];

          let carrito = [];
          const divisa = 'COP';
          const DOMitems = document.querySelector('#items');
          const DOMcarrito = document.querySelector('#carrito');
          const DOMtotal = document.querySelector('#total');
          const DOMbotonVaciar = document.querySelector('#boton-vaciar');

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
              // Vaciamos todo el html
              DOMcarrito.textContent = '';
              // Quitamos los duplicados
              const carritoSinDuplicados = [...new Set(carrito)];
              // Generamos los Nodos a partir de carrito
              carritoSinDuplicados.forEach((item) => {
                  // Obtenemos el item que necesitamos de la variable base de datos
                  const miItem = baseDeDatos.filter((itemBaseDatos) => {
                      // ¿Coincide las id? Solo puede existir un caso
                      return itemBaseDatos.id === parseInt(item);
                  });
                  // Cuenta el número de veces que se repite el producto
                  const numeroUnidadesItem = carrito.reduce((total, itemId) => {
                      // ¿Coincide las id? Incremento el contador, en caso contrario no mantengo
                      return itemId === item ? total += 1 : total;
                  }, 0);
                  // Creamos el nodo del item del carrito
                  const miNodo = document.createElement('li');
                  //miNodo.classList.add('list-group-item', 'text-right', 'mx-2');
                  miNodo.textContent = `${numeroUnidadesItem} x ${miItem[0].nombre} - ${miItem[0].precio}${divisa}`;
                  // Boton de borrar
                  const miBoton = document.createElement('button');
                  miBoton.classList.add('btn');
                  miBoton.textContent = 'X';
                  miBoton.style.marginLeft = '1rem';
                  miBoton.dataset.item = item;
                  miBoton.addEventListener('click', borrarItemCarrito);
                  // Mezclamos nodos
                  miNodo.appendChild(miBoton);
                  DOMcarrito.appendChild(miNodo);
              });
             // Renderizamos el precio total en el HTML
             DOMtotal.textContent = calcularTotal();
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
                      return itemBaseDatos.id === parseInt(item);
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

          // Eventos
          DOMbotonVaciar.addEventListener('click', vaciarCarrito);

          // Inicio
          renderizarProductos();
          renderizarCarrito();
        });