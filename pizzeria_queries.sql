DELETE FROM categorias;
DELETE FROM clientes;
DELETE FROM comandes;
DELETE FROM empleados;
DELETE FROM localitat;
DELETE FROM alimentos;
DELETE FROM comandes_has_alimentos;
DELETE FROM tienda;
DELETE FROM provincia;

INSERT INTO provincia (provincia_nombre)
VALUES ('Barcelona');

INSERT INTO localitat (
localitat_nombre,
provincia_provincia_id)
VALUES ('Lesseps', 
(SELECT provincia_id FROM provincia WHERE provincia_nombre = 'Barcelona')
);

INSERT INTO tienda (
tienda_direccion,
tienda_codigo_postal,
localitat_localitat_id)
VALUES ('Mintre 702', 08006,
(SELECT localitat_id FROM localitat WHERE localitat_nombre = 'Lesseps')
);

INSERT INTO empleados (
empleados_nombre,
empleados_apellido,
empleados_nif,
empleados_telefono,
empleados_cargo,
tienda_tienda_id)
VALUES ('Jordi', 'Gonzalez', 'Y5662798Q', 672686995, 'repartidor', (
SELECT tienda_id FROM tienda WHERE tienda_direccion LIKE '%Mintre%')
);

INSERT INTO clientes (
clientes_nombre,
clientes_apellido,
clientes_direccion,
clientes_codigo_postal,
clientes_telefono,
localitat_localitat_id)
VALUES ('Paula', 'Rangel', 'Diagonal 505', 08010, 697813576, (
SELECT localitat_id FROM localitat WHERE localitat_nombre = 'Lesseps')
);

INSERT INTO categorias (
categorias_nombre)
VALUES ('Italian'), ('American'), ('Veggie');

INSERT INTO alimentos (
alimentos_nombre,
alimentos_precio,
alimentos_descripcion,
alimentos_cantidad,
alimentos_img,
categorias_categorias_id)
VALUES (
'Pizza margarita',
10.50,
'pizza napolitana elaborada con tomate, mozzarella, albahaca fresca, sal y aceite',
1,
'img/pizzas/margarita.jpg',
(SELECT categorias_id FROM categorias WHERE categorias_nombre = 'Italian')
),
('Pizza Hawaiana',
9.50,
'pizza que contiene una base de queso fundido y tomate que se aliñan con jamón y piña',
1,
'img/pizzas/hawaiana.jpg',
(SELECT categorias_id FROM categorias WHERE categorias_nombre = 'American')
),
('Coca-Cola',
2.00,
'bebida gaseosa y refrescante, sabor cola',
2,
'img/bebidas/coca.jpg',
(SELECT categorias_id FROM categorias WHERE categorias_nombre = 'American')
),
('Hamburguesa Vegana',
10.50,
'carne de soja, cebolla, tomate, queso',
1,
'img/hamburguesas/vegana.jpg',
(SELECT categorias_id FROM categorias WHERE categorias_nombre = 'American')
);

 INSERT INTO comandes (
 comandes_entrega_domicilio,
 comandes_entrega_tienda,
 comandes_direccion_entrega,
 comandes_hora_entrega,
 comandes_precio_total,
 clientes_clientes_id,
 tienda_tienda_id,
 empleados_empleados_id)
 VALUES (
 1,
 0,
 'Amigo 18 2-2 08021',
 '2021-05-18 22:52:03',
 00.00,
 (SELECT clientes_id FROM clientes WHERE clientes_nombre = 'Paula'),
 (SELECT tienda_id FROM tienda WHERE tienda_direccion = 'Mintre 702'),
 (SELECT empleados_id FROM empleados WHERE empleados_cargo = 'repartidor')
 );

INSERT INTO comandes_has_alimentos (
comandes_comandes_id,
alimentos_alimentos_id)
VALUES (
(SELECT comandes_id FROM comandes WHERE comandes_direccion_entrega = 'Amigo 18 2-2 08021'),
(SELECT alimentos_id FROM alimentos WHERE alimentos_nombre = 'Pizza Hawaiana')
);

