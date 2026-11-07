CREATE DATABASE IF NOT EXISTS cod_barang;
USE cod_barang;

CREATE TABLE IF NOT EXISTS barang (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    harga INT NOT NULL
);

CREATE TABLE IF NOT EXISTS pembeli (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    nomor_hp VARCHAR(20) NOT NULL,
    alamat VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS kurir (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    nomor_hp VARCHAR(20) NOT NULL
);

INSERT INTO barang (nama, harga) VALUES
('Gergaji', 75000),
('Pulpen', 3000),
('Laptop', 7500000);

INSERT INTO pembeli (nama, nomor_hp, alamat) VALUES
('Muflih', '081234567801', 'Purwokerto'),
('Romi', '081234567802', 'Purbalingga'),
('Anin', '081234567803', 'Banyumas');

INSERT INTO kurir (nama, nomor_hp) VALUES
('Althaaf', '082134567801'),
('Irsyad', '082134567802'),
('Ilhan', '082134567803');
