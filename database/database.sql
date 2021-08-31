CREATE DATABASE tienda_ropa;
use tienda_ropa;

CREATE TABLE usuarios(
id                  int(255) auto_increment not null,
nombre              varchar(100) not null,
apellidos           varchar(255),
email               varchar(255) not null,
password            varchar(255) not null,
rol                 varchar(20),
image               varchar(255),
CONSTRAINT pk_usuarios PRIMARY KEY(id),
CONSTRAINT uq_email UNIQUE(email)
)ENGINE=InnoDb;

INSERT INTO usuarios VALUES(null,'Gabriel','Gutierrez','gabogutz@gmail.com','nsorxb2i','admin',null);

CREATE TABLE categorias(
id                  int(255) auto_increment not null,
nombre              varchar(100) not null,
CONSTRAINT pk_categorias PRIMARY KEY(id),
CONSTRAINT uq_nombre UNIQUE (nombre)
)ENGINE=InnoDb;

CREATE TABLE productos(
id                  int(255) auto_increment not null,
categoria_id        int(255) not null,
nombre              varchar(100) not null,
descripcion         text,
precio              float(100,2) not null,
stock               int(255) not null,
oferta              boolean not null,
fecha               date not null,
image               varchar(100) not null,
CONSTRAINT pk_productos PRIMARY KEY (id),
CONSTRAINT fk_producto_categoria FOREIGN KEY(categoria_id) REFERENCES categorias(id)
)ENGINE=InnoDb;

CREATE TABLE pedidos(
id                  int(255) auto_increment not null,
usuario_id          int(255) not null,
provincia           varchar(255) not null,
localidad           varchar(255) not null,
direccion           varchar(255) not null,
coste               float(100,2) not null,
estado              varchar(20),
fecha               date,
hora                time,
CONSTRAINT pk_pedidos PRIMARY KEY (id),
CONSTRAINT fk_pedido_usuario FOREIGN KEY(usuario_id) REFERENCES usuarios(id)
)ENGINE=InnoDb;

CREATE TABLE lineas_pedidos(
id                  int(255) auto_increment not null,
producto_id         int(255) not null,
pedido_id           int(255) not null,
unidades            int(255) not null,
CONSTRAINT pk_lineas_pedidos PRIMARY KEY (id),
CONSTRAINT fk_linea_pedido_pedido FOREIGN KEY(pedido_id) REFERENCES pedidos(id)
CONSTRAINT fk_linea_pedido_producto FOREIGN KEY(producto_id) REFERENCES productos(id)
)