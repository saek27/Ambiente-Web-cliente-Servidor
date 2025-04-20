/* Copiar toda la base */

CREATE DATABASE IF NOT EXISTS seguro_veterinario;
USE seguro_veterinario;

CREATE TABLE cliente (
    id_cliente INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    apellido VARCHAR(100),
    telefono VARCHAR(20),
    correo VARCHAR(100),
    direccion TEXT,
    password VARCHAR(255) NOT NULL,
    UNIQUE (correo)
);

CREATE TABLE veterinaria (
    id_veterinaria INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    direccion TEXT,
    telefono VARCHAR(20)
);

CREATE TABLE plan (
    id_plan INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    precio_mensual DECIMAL(10, 2),
    cobertura TEXT
);

CREATE TABLE mascota (
    id_mascota INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    raza VARCHAR(100),
    fecha_nacimiento DATE,
    cliente_id INT,
    FOREIGN KEY (cliente_id) REFERENCES cliente(id_cliente)
);

CREATE TABLE poliza (
    id_poliza INT AUTO_INCREMENT PRIMARY KEY,
    fecha_inicio DATE,
    fecha_final DATE,
    estado_pago VARCHAR(50),
    cliente_id INT,
    mascota_id INT,
    plan_id INT,
    FOREIGN KEY (cliente_id) REFERENCES cliente(id_cliente),
    FOREIGN KEY (mascota_id) REFERENCES mascota(id_mascota),
    FOREIGN KEY (plan_id) REFERENCES plan(id_plan)
);

CREATE TABLE servicio_veterinario (
    id_servicio_veterinario INT AUTO_INCREMENT PRIMARY KEY,
    fecha_servicio DATE,
    tipo VARCHAR(100),
    descripcion TEXT,
    costo DECIMAL(10, 2),
    mascota_id INT,
    veterinaria_id INT,
    FOREIGN KEY (mascota_id) REFERENCES mascota(id_mascota),
    FOREIGN KEY (veterinaria_id) REFERENCES veterinaria(id_veterinaria)
);

CREATE TABLE reclamo (
    id_reclamo INT AUTO_INCREMENT PRIMARY KEY,
    fecha_reclamo DATE,
    descripcion TEXT,
    estado VARCHAR(50),
    monto_reembolso DECIMAL(10, 2),
    poliza_id INT,
    servicio_id INT,
    FOREIGN KEY (poliza_id) REFERENCES poliza(id_poliza),
    FOREIGN KEY (servicio_id) REFERENCES servicio_veterinario(id_servicio_veterinario)
);

CREATE TABLE contrataciones (
    id_contratacion INT AUTO_INCREMENT PRIMARY KEY,
    cliente_id INT NOT NULL,
    plan_id INT NOT NULL,
    fecha_contratacion DATE NOT NULL,
    FOREIGN KEY (cliente_id) REFERENCES cliente(id_cliente),
    FOREIGN KEY (plan_id) REFERENCES plan(id_plan)
);

CREATE TABLE metodos_pago (
    id_metodo INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    descripcion TEXT
);

CREATE TABLE transacciones (
    id_transaccion INT AUTO_INCREMENT PRIMARY KEY,
    cliente_id INT NOT NULL,
    plan_id INT NOT NULL,
    monto DECIMAL(10,2) NOT NULL,
    metodo_pago_id INT NOT NULL,
    fecha DATETIME DEFAULT CURRENT_TIMESTAMP,
    estado ENUM('pendiente', 'completado', 'fallido') DEFAULT 'pendiente',
    detalles TEXT,
    FOREIGN KEY (cliente_id) REFERENCES cliente(id_cliente),
    FOREIGN KEY (plan_id) REFERENCES plan(id_plan),
    FOREIGN KEY (metodo_pago_id) REFERENCES metodos_pago(id_metodo)
);



INSERT INTO plan (nombre, precio_mensual, cobertura) VALUES
('Plan Básico', 12000.00, 'Consultas generales, vacunación anual, descuentos en medicamentos.'),
('Plan Premium', 25000.00, 'Consultas ilimitadas, urgencias 24/7, cirugías menores, laboratorios incluidos.'),
('Plan VIP', 40000.00, 'Todo en Plan Premium + rehabilitación, fisioterapia y seguimiento nutricional.');

INSERT INTO metodos_pago (nombre, descripcion) VALUES
('SINPE Móvil', 'Pago mediante transferencia móvil'),
('Tarjeta Crédito/Débito', 'Pago con tarjeta Visa/Mastercard'),
('Pago en un Click', 'Pago rápido con datos guardados');

INSERT INTO veterinaria (nombre, direccion, telefono) VALUES
('Veterinaria La Sabana', 'Calle 42, Sabana, San José', '2222-1155'),
('Veterinaria Guadalupe', 'Centro Comercial El Dorado, Guadalupe', '2245-5100'),
('Veterinaria Pet House', 'Barrio Dent, San José', '2225-9862'),
('Hospital Veterinario San Francisco', 'Calle Blancos, Goicoechea', '2216-5858'),
('Veterinaria Mundo Animal', 'Barrio Escalante, Montes de Oca', '2283-6868'),
('Veterinaria San José', 'Av. Central, San José centro', '2256-1726'),
('Clínica Veterinaria La California', 'Mall San Pedro, San José', '2283-2121'),
('Veterinaria Animal City', 'Curridabat, contiguo a Plaza del Sol', '2272-7272');