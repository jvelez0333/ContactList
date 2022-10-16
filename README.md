# ContactList
Manejo de una lista de contacto, que permita agregar nuevos contactos (nombre, apellido, email), listar los contactos y eliminar un contacto.
## Recomendación
* La API tiene que seguir las buenas prácticas de arquitectura en capa para separar el acceso a los datos.
* Bonus 1 : Agregar reglas de validación para no permitir de ingresar a datos vacio
* Bonus 2: Permitir agregar uno o varios números de teléfono a cada contacto
* La API se llama desde una herramienta como Postman
# Pasos para subir App mediante docker-compose
 * REQUISITO: Tener instalado docker
 * Descargar el codigo del repositorio <code>git clone https://github.com/jvelez0333/ContactList.git</code>
 * Entrar a la carpeta *contactlist*
 * Ejecutar <code>docker-compose -p contactlist -f scripts/docker/docker-compose.yml</code> 