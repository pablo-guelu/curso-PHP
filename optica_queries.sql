DELETE FROM provedores;
DELETE FROM marcas_gafas;
DELETE FROM gafas;
DELETE FROM clientes;
DELETE FROM empleados;
DELETE FROM ordenes;
DELETE FROM ordenes_has_gafas;

INSERT INTO provedores (
provedores_nombre,
provedores_telefono,
provedores_web,
provedores_nif,
provedores_direccion)
VALUES ('IMPORTACIONES GLOBAL GLASS', 697484572, 'igg.net', 'Y987453T', 'calle Provenza 500, 08025, Barcelona, España');

INSERT INTO marcas_gafas (
marcas_gafas_nombre, 
provedores_provedores_id)
VALUES ('nautica', (SELECT provedores_id FROM provedores WHERE provedores_nombre LIKE '%GLOBAL%'));

INSERT INTO gafas (
gafas_graduacion_der,
gafas_graduacion_izq,
gafas_muntura,
gafas_color,
gafas_color_vidre,ordenes_has_gafas
gafas_precio,
marcas_gafas_marcas_gafas_id) 
VALUES (0.25, 0.50, 'pasta', 'azul', 'transparente', 105.45, (SELECT marcas_gafas_id FROM marcas_gafas WHERE marcas_gafas_nombre = 'nautica'));

INSERT INTO clientes (
clientes_nombre,
clientes_direccion,
clientes_telefono,
clientes_correo)
VALUES ('Casemiro Lugo', 'Calle Zaragoza 101', 8720660, 'case@gmail.com');

INSERT INTO empleados (
empleados_nombre)
VALUES ('Juan Perez');

INSERT INTO ordenes (
clientes_clientes_id,
empleados_empleados_id)
VALUES (
(SELECT clientes_id FROM clientes WHERE clientes_nombre LIKE '%Casemiro%'), 
(SELECT empleados_id FROM empleados WHERE empleados_nombre LIKE '%Juan%')
);

INSERT INTO ordenes_has_gafas (
ordenes_orden_id,
gafas_gafas_id)
VALUES (
(SELECT orden_id FROM ordenes WHERE clientes_clientes_id = (SELECT clientes_id FROM clientes WHERE clientes_nombre LIKE '%Casemiro%')),
(SELECT gafas_id FROM gafas WHERE gafas_color = 'azul')
);
