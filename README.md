# Bubbletic

## Proyecto: Emprendar

### Correr el proyecto:

Para correr el proyecto de emprendar localmente:

- Se debe tener instalado Docker.
- Se debe tener instalado el cliente de docker-compose.
- Luego se debe correr el siguiente comando:
~~~
docker-compose -f docker-compose.yml up
~~~

Este comando nos levantará:

- MYSQL: Servidor de base de datos (configuración en el archivo docker-compose.yml).
    - Corre en el **puerdo 5001**.

- PhpMyadmin: Cliente para conectarse a la base de datos mysql (configuración en el archivo docker-compose.yml).
    - Corre en el **PORT 5003**.
    - Se accede mediante: [localhost:5003](http://localhost:5003).

- Server: Servidor wordpress (configuración en el archivo docker-compose.yml).
    - Corre en el **PORT 5002**.
    - Se accede a la web mediante: [localhost:5002](http://localhost:5002).
    - Se accede al admin mediante: [localhost:5002/wp-admin](http://localhost:5002/wp-admin).