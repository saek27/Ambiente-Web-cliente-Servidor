CREATE DATABASE IF NOT EXISTS seguro_veterinario;
USE seguro_veterinario;

CREATE TABLE cliente (
    id_cliente INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    apellido VARCHAR(100),
    telefono VARCHAR(20),
    correo VARCHAR(100),
    direccion TEXT
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

INSERT INTO plan (nombre, precio_mensual, cobertura) VALUES
('Plan Básico', 12000.00, 'Consultas generales, vacunación anual, descuentos en medicamentos.'),
('Plan Premium', 25000.00, 'Consultas ilimitadas, urgencias 24/7, cirugías menores, laboratorios incluidos.'),
('Plan VIP', 40000.00, 'Todo en Plan Premium + rehabilitación, fisioterapia y seguimiento nutricional.');