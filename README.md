# Iniciar aplicación 

1. Como requerimiento se debe tener instalado la extesion de mongo para php segun su version del mismo

Link --> https://pecl.php.net/package/mongodb

2. Iniciar el mongo por cmd no por mean

C:\Program Files\MongoDB\Server\5.0\bin>mongod

3. realizar estos cambios en la db para facilidad para gestionar utilizaremos mongo compas

link --> https://www.mongodb.com/try/download/compass

Nombre de la base de datos: coursedev
Nombre de documentos: products, orders y bills, parameters, clients

 Ejecutar el siguiente json para products
[
  {
      "nombre": "HTML 5",
      "precio": 50000,
      "imagen": "img/html-page.png"
  },
  {
      "nombre": "CSS3",
      "precio": 20000,
      "imagen": "img/css-page.png"
  },
  {
      "nombre": "JAVASCRIPT",
      "precio": 40000,
      "imagen": "img/js-page.png"
  },
  {
      "nombre": "BOOTSTRAP",
      "precio": 35000,
      "imagen": "img/bootstrap-5-1.svg"
  },
  {
      "nombre": "ANGULAR",
      "precio": 36000,
      "imagen": "img/angular-icon.png"
  }
]

ejecutar el siguiente json para parameters
[
    {
      "nombre":"iva",
      "valor":0.19
    }
]

4. Listo poner a correr la aplicacion en el navegador de 


