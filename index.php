<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina web</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="jquery/jquery.js"></script>
    <!-- este es el archivo controlador  -->
    <script type="text/javascript" src="control/control.js"></script>
</head>
<body>
    <!--ENCABEZADO-->
    <header>
        <a href="#init" class="logo">
            <span>COURSE</span>WEB
        </a>
    <input type="checkbox" id="menu-bar">  
    <label for="menu-bar" class="fa fa-bars"></label>    
    <nav class="navbar">
        <a href="#init">Inicio</a>
        <a href="#about">Quienes somos</a>
        <a href="#product">Cursos</a>
        <a href="#contact">Contactanos</a>
    </nav>
    </header>

    <!--INICIO-->
    <section class="init" id="init">
        <div class="content">
            <h3>APLICACIONES <span>WEB</span></h3>
            <P>En la ingeniería de software se denomina aplicación web a aquellas herramientas que los usuarios pueden utilizar accediendo a un servidor web a través de internet o de una intranet mediante un navegador.</P>
        <a href="https://desarrolloweb.com/" target="_blank" rel="noopener noreferrer" class="btn">Mas detalles</a>
        </div>
        <div class="image">
            <img src="img/dev-web.png" alt="">
        </div>
    </section>

    <!--QUIENES SOMOS-->
    <section class="about" id="about">   
        <h1 class="heading">QUIENES SOMOS</h1>
        <div class="content-box">
            <div class="box">
                <div class="user">
                    <img src="img/user_1.png" alt="">
                    <h3>CRISTIAN BAMBAGUE MELENDEZ</h3>
                </div>
                <div class="description">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis facilis illum, in eum hic harum dignissimos sed perferendis suscipit error quo aperiam culpa voluptas dolores minima. Numquam eius repellendus dolorem.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum laboriosam et vitae itaque voluptatum nobis praesentium repudiandae expedita, hic laudantium rem labore quod impedit magnam dolorem eum placeat dolore pariatur.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. A voluptas enim voluptatum possimus perferendis ex quisquam praesentium, aliquam, cumque culpa similique, eos esse accusamus blanditiis? Libero eum animi hic itaque?
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus magnam cum voluptatibus commodi cupiditate porro, a earum assumenda aspernatur repudiandae sequi beatae dolores vitae exercitationem unde eos soluta! Fugiat, illo.
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati dicta veritatis quaerat nam eligendi maiores animi quis officia! Eligendi doloribus nemo eum necessitatibus id veniam neque, nesciunt ea voluptatibus suscipit?
                </div>
            </div>
            <div class="box">
                <div class="user">
                    <img src="img/user_1.png" alt="">
                    <h3>DIEGO FELIPE VELASCO URIBE</h3>
                </div>
                <div class="description">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis facilis illum, in eum hic harum dignissimos sed perferendis suscipit error quo aperiam culpa voluptas dolores minima. Numquam eius repellendus dolorem.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum laboriosam et vitae itaque voluptatum nobis praesentium repudiandae expedita, hic laudantium rem labore quod impedit magnam dolorem eum placeat dolore pariatur.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. A voluptas enim voluptatum possimus perferendis ex quisquam praesentium, aliquam, cumque culpa similique, eos esse accusamus blanditiis? Libero eum animi hic itaque?
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus magnam cum voluptatibus commodi cupiditate porro, a earum assumenda aspernatur repudiandae sequi beatae dolores vitae exercitationem unde eos soluta! Fugiat, illo.
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati dicta veritatis quaerat nam eligendi maiores animi quis officia! Eligendi doloribus nemo eum necessitatibus id veniam neque, nesciunt ea voluptatibus suscipit?
                </div>
            </div>
            <div class="box">
                <div class="user">
                    <img src="img/user_1.png" alt="">
                    <h3>JESUS FELIPE JOJOA</h3>
                </div>
                <div class="description">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis facilis illum, in eum hic harum dignissimos sed perferendis suscipit error quo aperiam culpa voluptas dolores minima. Numquam eius repellendus dolorem.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum laboriosam et vitae itaque voluptatum nobis praesentium repudiandae expedita, hic laudantium rem labore quod impedit magnam dolorem eum placeat dolore pariatur.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. A voluptas enim voluptatum possimus perferendis ex quisquam praesentium, aliquam, cumque culpa similique, eos esse accusamus blanditiis? Libero eum animi hic itaque?
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus magnam cum voluptatibus commodi cupiditate porro, a earum assumenda aspernatur repudiandae sequi beatae dolores vitae exercitationem unde eos soluta! Fugiat, illo.
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati dicta veritatis quaerat nam eligendi maiores animi quis officia! Eligendi doloribus nemo eum necessitatibus id veniam neque, nesciunt ea voluptatibus suscipit?
                </div>
            </div>
        </div>
    </section>
    <section class="product" id="product">
        <?php require_once("control/carpay.php"); ?>
        <h1 class="heading">Cursos</h1>
                <main id="items" class="content-box"></main>
    </section>
    <section class="car-pay" id="car-pay">
        <h2 class="heading">Mi carrito de compras</h2>
        <div class="centrado">
		<strong>Cliente</strong>
		<div class="linea"></div>
	    </div>
                <form>
                    <div class="inputbox">
                        <input type="number" name="identification" id="identification" required>
                        <label for="">Cedula</label>
                    </div>
                    <div class="inputbox">
                        <input type="text" name="name" id="name" required>
                        <label for="">Nombre</label>
                    </div>
                    <div class="inputbox">
                        <input type="email" name="email" id="email" required>
                        <label for="">Email</label>
                    </div>
                    <div class="inputbox">
                        <input type="number" name="phone" id="phone" required>
                        <label for="">Teléfono</label>
                    </div>
                </form>
                <div class="centrado">
		        <strong>Orden Resumida</strong>
		        <div class="linea"></div>
	            </div>
            <div class="content-box">
                <table  class="styled-table" id="tablaproduct">
                    <thead>
                        <tr>
                            <th style="display: none;">id</th>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Opcion</th>
                        </tr>
                    </thead>
                    <tbody id="contenido-Tabla">
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2" class="has-text-right is-size-5">Iva</td>
                            <td colspan="2" class="is-size-5" id="iva"></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="has-text-right is-size-5">Subtotal</td>
                            <td colspan="2" class="is-size-5" id="subtotal"></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="has-text-right is-size-5">Total</td>
                            <td colspan="2" class="is-size-5" id="total"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="content-box">
                <button id="boton-vaciar" class="boton-vaciar"><i class="fa fa-check"></i>&nbsp;Vaciar</button>
                <button id="boton-facturar" class="boton-facturar"><i class="fa fa-check"></i>&nbsp;Facturar</button>
            </div>
    </section>
    <!--CONTACTOS-->
    <section class="contact" id="contact">
        <div class="image">
            <img src="img/dev-cont.png" alt="">
        </div>
        
        <form action="control/control.php">
            <h1 class="heading">Contactanos</h1>
            <div class="inputbox">
                <input type="text" name="name" id="name" required>
                <label for="">Nombre</label>
            </div>
            <div class="inputbox">
                <input type="email" name="email" id="email" required>
                <label for="">Email</label>
            </div>
            <div class="inputbox">
                <input type="number" name="phone" id="phone" required>
                <label for="">Teléfono</label>
            </div>
            <div class="inputbox">
                <textarea name="msg" id="" cols="30" rows="10" id="msg" required></textarea>
                <label for="">Mensaje</label>
            </div>
            <div class="input-file">
                <p><i class="fa-solid fa-file-arrow-up"></i> Adjuntar archivo</p>
                <input type="file" name="file" id="file" class="btn-file">
            </div>
            <input type="submit" class="btn" value="Enviar">
        </form>
    </section>

    <!--PIE DE PAGINA-->
    <div class="footer">
        <div class="content-box">
            <div class="box">
                <h3>noticias</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati illo repellat distinctio veritatis incidunt enim possimus nihil, assumenda architecto numquam aut, totam fugiat animi? Molestias vitae eligendi cumque. Aliquid, autem.</p>
            </div>
            <div class="box">
                <h3>buscanos en</h3>
                <a href="#"><i class="fa-brands fa-facebook"></i> facebook</a>
                <a href="#"><i class="fa-brands fa-instagram"></i> instagram</a>
                <a href="#"><i class="fa-brands fa-github"></i> github</a>
                <a href="#"><i class="fa-brands fa-twitter-square"></i> twitter</a>
            </div>
            <div class="box">
                <h3>mas información</h3>
                <div class="info">
                    <i class="fa-solid fa-phone-flip"></i>
                    <p>1123-12233-444 <br> 123-456-899</p>
                </div>
                <div class="info">
                    <i class="fa-solid fa-envelope"></i>
                    <p>courseweb@gmail.com</p>
                </div>
                <div class="info">
                    <i class="fa-solid fa-location-dot"></i>
                    <p>la cuidad popayán - colombia</p>
                </div>
            </div>
            <h1 class="credit">
                &copy, copyrigth @ 2022 cristian bambague unicomfacauca
            </h1>
        </div>
    </div>
</body>
</html>