# Introducción
Una vez tenemos la API montada, podemos empezar a desarrollar nuestra app de servicio web. Anteriormente, usábamos POSTMAN para testear el funcionamiento de la API, pero una vez terminada la fase de desarrollo ya pasa a fase de producción. 

Ahora comenzaremos a desarrollar nuestro catálogo, para ello, haremos lo siguiente:

## Implementación de la API

En esencia, la estructura del proyecto será idéntica a la de la API, pero con la principal diferencia la cual es que esta vez usaremos las vistas para comunicarnos con la api(usaremos un paquete que ofrece Laravel).


## Aplicación de la API en el proyecto

En los controladores, en lugar de usar funciones, haremos llamadas a la API y devolveremos las respuestas a la vista(las rutas de ambos proyectos deben coincidir).

## INSERTS PARA SQL

INSERT INTO users (name, email, username, email_verified_at, password) VALUES
('Usuario 1', 'usuario1@example.com', 'usuario1', NULL, 'password1'),
('Usuario 2', 'usuario2@example.com', 'usuario2', NULL, 'password2'),
('Usuario 3', 'usuario3@example.com', 'usuario3', NULL, 'password3'),
('Usuario 4', 'usuario4@example.com', 'usuario4', NULL, 'password4'),
('Usuario 5', 'usuario5@example.com', 'usuario5', NULL, 'password5');

INSERT INTO providers (name, company_name, phone) VALUES
('Proveedor 1', 'Empresa 1', 111111111),
('Proveedor 2', 'Empresa 2', 222222222),
('Proveedor 3', 'Empresa 3', 333333333),
('Proveedor 4', 'Empresa 4', 444444444),
('Proveedor 5', 'Empresa 5', 555555555);

INSERT INTO products (name, price, description, category) VALUES
('Producto 1', 10, 'Descripción del producto 1', 'Electrónica'),
('Producto 2', 20, 'Descripción del producto 2', 'Ropa'),
('Producto 3', 30, 'Descripción del producto 3', 'Hogar'),
('Producto 4', 40, 'Descripción del producto 4', 'Alimentos y bebidas'),
('Producto 5', 50, 'Descripción del producto 5', 'Muebles'),
('Producto 6', 60, 'Descripción del producto 6', 'Deportes'),
('Producto 7', 70, 'Descripción del producto 7', 'Juguetes'),
('Producto 8', 80, 'Descripción del producto 8', 'Belleza y cuidado personal'),
('Producto 9', 90, 'Descripción del producto 9', 'Electrónica'),
('Producto 10', 100, 'Descripción del producto 10', 'Ropa'),
('Producto 11', 110, 'Descripción del producto 11', 'Hogar'),
('Producto 12', 120, 'Descripción del producto 12', 'Alimentos y bebidas'),
('Producto 13', 130, 'Descripción del producto 13', 'Muebles'),
('Producto 14', 140, 'Descripción del producto 14', 'Deportes'),
('Producto 15', 150, 'Descripción del producto 15', 'Juguetes');
