CREATE DATABASE maria_salon;

USE maria_salon;

CREATE TABLE admin (
	id_admin INT(10)NOT NULL AUTO_INCREMENT,
	nama_admin VARCHAR(255) NOT NULL,
	username VARCHAR(255) NOT NULL,
	PASSWORD VARCHAR(255) NOT NULL,
	PRIMARY KEY(`id_admin`)
)ENGINE=INNODB DEFAULT CHARSET=latin1;

CREATE TABLE member(
	id_member INT(10) NOT NULL AUTO_INCREMENT,
	nama_member VARCHAR(255) NOT NULL,
	username VARCHAR (255) NOT NULL,
	PASSWORD VARCHAR(255) NOT NULL,
	email VARCHAR (255),
	alamat VARCHAR (255) NOT NULL,
	nomor_handphone  INT(20),
	jenis_kelamin VARCHAR(1) NOT NULL,
	PRIMARY KEY(`id_member`)
 )ENGINE=INNODB DEFAULT CHARSET=latin1;
  

CREATE TABLE product(
	id_product INT (10) NOT NULL AUTO_INCREMENT,
	nama_product VARCHAR (255),
	harga_product VARCHAR (255),
	id_admin INT (10),
	FOREIGN KEY (id_admin) REFERENCES admin(id_admin),
	PRIMARY KEY (`id_product`)
)ENGINE=INNODB DEFAULT CHARSET=latin1;

CREATE TABLE layanan(
	id_layanan INT (10)NOT NULL AUTO_INCREMENT,
	nama_layanan VARCHAR (255),
	harga_layanan VARCHAR (255),
	id_admin INT (10),
	FOREIGN KEY (id_admin) REFERENCES admin(id_admin),
	PRIMARY KEY (`id_layanan`)
)ENGINE=INNODB DEFAULT CHARSET=latin1;

CREATE TABLE detail_booking(
	id_booking INT(10) NOT NULL AUTO_INCREMENT ,
	id_member INT(10) NOT NULL,
	id_layanan INT(10) NOT NULL,
	FOREIGN KEY (id_member) REFERENCES member(id_member),
	FOREIGN KEY (id_layanan) REFERENCES layanan(id_layanan),
	totalHarga_Booking INT(255),
	PRIMARY KEY (`id_booking`)
)ENGINE=INNODB DEFAULT CHARSET=latin1;

CREATE TABLE detail_pembelian(
	id_pembelian INT(11) NOT NULL AUTO_INCREMENT,
	id_member INT(10) NOT NULL,
	FOREIGN KEY (id_member) REFERENCES member(id_member),
	id_product INT(10) NOT NULL,
	FOREIGN KEY (id_product) REFERENCES product(id_product),
	totalHarga_Pembelian INT(255),
	PRIMARY KEY (`id_pembelian`)
)ENGINE=INNODB DEFAULT CHARSET=latin1;
