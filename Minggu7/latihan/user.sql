create database pemweb_modul_7;

use pemweb_modul_7;

create table `user`(
    `id` int(11) not null auto_increment,
    `username` varchar(100),
    `password` varchar(100),
    primary key (`id`)
);