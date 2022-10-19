# ContactList
Manejo de una lista de contacto, que permita agregar nuevos contactos (nombre, apellido, email), listar los contactos y eliminar un contacto.
## Recomendación
* La API tiene que seguir las buenas prácticas de arquitectura en capa para separar el acceso a los datos.
* Bonus 1 : Agregar reglas de validación para no permitir de ingresar a datos vacio
* Bonus 2: Permitir agregar uno o varios números de teléfono a cada contacto
* La API se llama desde una herramienta como Postman

## Arquitectura-Patrones utilizados
Desarrollo basado en en DDD (Domain Driven Design). El código fuete se encuentra en la carpeta
<b>ContactList</b> ruta <code>app/api/src/ContactList/</code> https://github.com/jvelez0333/ContactList/tree/master/app/api/src/ContactList


# Pasos para subir App mediante docker-compose

### 1| Descarga de códigos fuentes y subiendo contenedores
 * REQUISITO: Tener instalado docker
 * Descargar el codigo del repositorio <code> git clone https://github.com/jvelez0333/ContactList.git </code>
 * Entrar a la carpeta <code>contactlist]</code>
 * Ejecutar <code> docker-compose -p contactlist -f scripts/docker/docker-compose.yml</code>

### 2| Configuración Base de datos
Se utiliza ORM [ Doctrine ]  de Symfony 
 * Conectarse al servidor MariaDb <p>user: root</p> <p>password: 1234</p>
 * Crear base de datos <code>create database db_contacts;</code>
 * Crear tablas contact y typesContact, con su respectiva relación. 
    <hr>
    <p><b>Tabla contact</b></p>
    <p><code>CREATE TABLE contact (id VARCHAR(50) NOT NULL, first_name VARCHAR(300) NOT NULL, last_name VARCHAR(300) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;</code></p>
    <hr>
   <p><b>Tabla typesContact</b></p>
   <p><code>CREATE TABLE typesContact (id VARCHAR(255) NOT NULL, contact_id VARCHAR(50) DEFAULT NULL, type VARCHAR(100) NOT NULL, value VARCHAR(300) NOT NULL, description VARCHAR(300) NOT NULL, INDEX IDX_527C748E7A1254A (contact_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;</code></p>
    <hr>
   <p><b>Relación entre tablas</b></p>
   <p><code>ALTER TABLE typesContact ADD CONSTRAINT FK_527C748E7A1254A FOREIGN KEY (contact_id) REFERENCES contact (id);</code></p>
### 3| EndPoints
Se utiliza sistema de  enrutamiento [ Symfony ]
* <code>GET</code> http://localhost/contacts/ 
* <code>POST</code> http://localhost/contacts/ 
