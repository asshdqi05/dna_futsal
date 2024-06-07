/*
SQLyog Ultimate v12.09 (32 bit)
MySQL - 10.4.8-MariaDB : Database - dnafutsal
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dnafutsal` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `dnafutsal`;

/*Table structure for table `detail_sewa` */

DROP TABLE IF EXISTS `detail_sewa`;

CREATE TABLE `detail_sewa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sewa` char(10) DEFAULT NULL,
  `id_penyewa` char(10) DEFAULT NULL,
  `nama_penyewa` varchar(128) DEFAULT NULL,
  `status_penyewa` varchar(50) DEFAULT NULL,
  `tanggal_sewa` date DEFAULT NULL,
  `hari_sewa` varchar(20) DEFAULT NULL,
  `jam_awal` time DEFAULT NULL,
  `jam_akhir` time DEFAULT NULL,
  `jumlah_bayar` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4;

/*Data for the table `detail_sewa` */

insert  into `detail_sewa`(`id`,`id_sewa`,`id_penyewa`,`nama_penyewa`,`status_penyewa`,`tanggal_sewa`,`hari_sewa`,`jam_awal`,`jam_akhir`,`jumlah_bayar`) values (52,'SW-0000001','PEN-000004','Raziv','Nonmember','2020-08-31','Senin','15:00:00','16:00:00',80000);
insert  into `detail_sewa`(`id`,`id_sewa`,`id_penyewa`,`nama_penyewa`,`status_penyewa`,`tanggal_sewa`,`hari_sewa`,`jam_awal`,`jam_akhir`,`jumlah_bayar`) values (57,'SW-0000002','PEN-000008','Dio','Nonmember','0000-00-00','Senin','17:00:00','19:00:00',240000);
insert  into `detail_sewa`(`id`,`id_sewa`,`id_penyewa`,`nama_penyewa`,`status_penyewa`,`tanggal_sewa`,`hari_sewa`,`jam_awal`,`jam_akhir`,`jumlah_bayar`) values (58,'SW-0000003','PEN-000008','Dio','Nonmember','0000-00-00','Senin','20:00:00','21:00:00',120000);
insert  into `detail_sewa`(`id`,`id_sewa`,`id_penyewa`,`nama_penyewa`,`status_penyewa`,`tanggal_sewa`,`hari_sewa`,`jam_awal`,`jam_akhir`,`jumlah_bayar`) values (59,'SW-0000004','PEN-000008','Dio','Member','2020-08-25','Selasa','20:00:00','22:00:00',240000);

/*Table structure for table `jadwal_lapangan` */

DROP TABLE IF EXISTS `jadwal_lapangan`;

CREATE TABLE `jadwal_lapangan` (
  `id_jadwal` int(11) NOT NULL AUTO_INCREMENT,
  `id_sewa` char(10) DEFAULT NULL,
  `id_penyewa` char(10) DEFAULT NULL,
  `nama_penyewa` varchar(128) DEFAULT NULL,
  `status_penyewa` varchar(20) DEFAULT NULL,
  `tanggal_sewa` date DEFAULT NULL,
  `hari_sewa` varchar(20) DEFAULT NULL,
  `jam_awal` time DEFAULT NULL,
  `jam_akhir` time DEFAULT NULL,
  `biaya_sewa` double DEFAULT NULL,
  PRIMARY KEY (`id_jadwal`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4;

/*Data for the table `jadwal_lapangan` */

insert  into `jadwal_lapangan`(`id_jadwal`,`id_sewa`,`id_penyewa`,`nama_penyewa`,`status_penyewa`,`tanggal_sewa`,`hari_sewa`,`jam_awal`,`jam_akhir`,`biaya_sewa`) values (56,'SW-0000001','PEN-000004','Raziv','Nonmember','2020-08-31','Senin','15:00:00','16:00:00',80000);
insert  into `jadwal_lapangan`(`id_jadwal`,`id_sewa`,`id_penyewa`,`nama_penyewa`,`status_penyewa`,`tanggal_sewa`,`hari_sewa`,`jam_awal`,`jam_akhir`,`biaya_sewa`) values (59,'SW-0000003','PEN-000008','Dio','Member','0000-00-00','Senin','20:00:00','21:00:00',120000);
insert  into `jadwal_lapangan`(`id_jadwal`,`id_sewa`,`id_penyewa`,`nama_penyewa`,`status_penyewa`,`tanggal_sewa`,`hari_sewa`,`jam_awal`,`jam_akhir`,`biaya_sewa`) values (60,'SW-0000004','PEN-000008','Dio','Member','2020-08-25','Selasa','20:00:00','22:00:00',240000);

/*Table structure for table `jam_lapangan` */

DROP TABLE IF EXISTS `jam_lapangan`;

CREATE TABLE `jam_lapangan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jam` time DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `detail` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

/*Data for the table `jam_lapangan` */

insert  into `jam_lapangan`(`id`,`jam`,`harga`,`detail`) values (1,'08:00:00',80000,'08:00 - 09:00');
insert  into `jam_lapangan`(`id`,`jam`,`harga`,`detail`) values (2,'09:00:00',80000,'09:00 - 10:00');
insert  into `jam_lapangan`(`id`,`jam`,`harga`,`detail`) values (3,'10:00:00',80000,'10:00 - 11:00');
insert  into `jam_lapangan`(`id`,`jam`,`harga`,`detail`) values (4,'11:00:00',80000,'11:00 - 12:00');
insert  into `jam_lapangan`(`id`,`jam`,`harga`,`detail`) values (5,'12:00:00',80000,'12:00 - 13:00');
insert  into `jam_lapangan`(`id`,`jam`,`harga`,`detail`) values (6,'13:00:00',80000,'13:00 - 14:00');
insert  into `jam_lapangan`(`id`,`jam`,`harga`,`detail`) values (7,'14:00:00',80000,'14:00 - 15:00');
insert  into `jam_lapangan`(`id`,`jam`,`harga`,`detail`) values (8,'15:00:00',80000,'15:00 - 16:00');
insert  into `jam_lapangan`(`id`,`jam`,`harga`,`detail`) values (9,'16:00:00',80000,'16:00 - 17:00');
insert  into `jam_lapangan`(`id`,`jam`,`harga`,`detail`) values (10,'17:00:00',80000,'17:00 - 18:00');
insert  into `jam_lapangan`(`id`,`jam`,`harga`,`detail`) values (11,'18:00:00',120000,'18:00 - 19:00');
insert  into `jam_lapangan`(`id`,`jam`,`harga`,`detail`) values (12,'19:00:00',120000,'19:00 - 20:00');
insert  into `jam_lapangan`(`id`,`jam`,`harga`,`detail`) values (13,'20:00:00',120000,'20:00 - 21:00');
insert  into `jam_lapangan`(`id`,`jam`,`harga`,`detail`) values (14,'21:00:00',120000,'21:00 - 22:00');
insert  into `jam_lapangan`(`id`,`jam`,`harga`,`detail`) values (15,'22:00:00',120000,'22:00 - 23:00');
insert  into `jam_lapangan`(`id`,`jam`,`harga`,`detail`) values (16,'23:00:00',120000,'23:00 - 00:00');

/*Table structure for table `lapangan` */

DROP TABLE IF EXISTS `lapangan`;

CREATE TABLE `lapangan` (
  `id_lapangan` char(10) NOT NULL,
  `nama_lapangan` varchar(20) DEFAULT NULL,
  `deskripsi_lapangan` text DEFAULT NULL,
  `foto_lapangan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_lapangan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `lapangan` */

insert  into `lapangan`(`id_lapangan`,`nama_lapangan`,`deskripsi_lapangan`,`foto_lapangan`) values ('LP-0000001','Lapangan 1','Lapangan ini terbuat dari bahan vinyl yang nyaman untuk digunakan bermain futsal','LAPANGAN_DNA_22.jpg');

/*Table structure for table `level_user` */

DROP TABLE IF EXISTS `level_user`;

CREATE TABLE `level_user` (
  `id` int(1) NOT NULL,
  `level` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `level_user` */

insert  into `level_user`(`id`,`level`) values (1,'Admin');
insert  into `level_user`(`id`,`level`) values (2,'Pimpinan');
insert  into `level_user`(`id`,`level`) values (3,'Operator');

/*Table structure for table `pembayaran_penyewaan` */

DROP TABLE IF EXISTS `pembayaran_penyewaan`;

CREATE TABLE `pembayaran_penyewaan` (
  `no_transaksi` char(10) NOT NULL,
  `tanggal_bayar` date DEFAULT NULL,
  `sewa_id` char(10) DEFAULT NULL,
  `nama_penyewa` varchar(128) DEFAULT NULL,
  `status_penyewa` varchar(50) DEFAULT NULL,
  `jumlah_bayar` double DEFAULT NULL,
  `bukti_pembayaran` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`no_transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `pembayaran_penyewaan` */

insert  into `pembayaran_penyewaan`(`no_transaksi`,`tanggal_bayar`,`sewa_id`,`nama_penyewa`,`status_penyewa`,`jumlah_bayar`,`bukti_pembayaran`) values ('TR-0000001','2020-08-25','SW-0000001','Raziv','Nonmember',80000,'struk34.jpg');
insert  into `pembayaran_penyewaan`(`no_transaksi`,`tanggal_bayar`,`sewa_id`,`nama_penyewa`,`status_penyewa`,`jumlah_bayar`,`bukti_pembayaran`) values ('TR-0000002','2020-08-25','SW-0000002','Dio','Nonmember',240000,'struk36.jpg');
insert  into `pembayaran_penyewaan`(`no_transaksi`,`tanggal_bayar`,`sewa_id`,`nama_penyewa`,`status_penyewa`,`jumlah_bayar`,`bukti_pembayaran`) values ('TR-0000003','2020-08-25','SW-0000003','Dio','Nonmember',120000,'struk37.jpg');
insert  into `pembayaran_penyewaan`(`no_transaksi`,`tanggal_bayar`,`sewa_id`,`nama_penyewa`,`status_penyewa`,`jumlah_bayar`,`bukti_pembayaran`) values ('TR-0000004','2020-08-25','SW-0000004','Dio','Member',240000,'struk38.jpg');

/*Table structure for table `penyewa` */

DROP TABLE IF EXISTS `penyewa`;

CREATE TABLE `penyewa` (
  `id_penyewa` char(10) NOT NULL,
  `nama_penyewa` varchar(50) DEFAULT NULL,
  `alamat_penyewa` varchar(50) DEFAULT NULL,
  `nohp_penyewa` varchar(15) DEFAULT NULL,
  `email_penyewa` varchar(30) DEFAULT NULL,
  `username_penyewa` varchar(20) DEFAULT NULL,
  `password_penyewa` varchar(256) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `aktif` int(1) DEFAULT NULL,
  `tanggal_daftar` int(11) DEFAULT NULL,
  `foto` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id_penyewa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `penyewa` */

insert  into `penyewa`(`id_penyewa`,`nama_penyewa`,`alamat_penyewa`,`nohp_penyewa`,`email_penyewa`,`username_penyewa`,`password_penyewa`,`status`,`aktif`,`tanggal_daftar`,`foto`) values ('PEN-000001','Triseptyovan','Belimbing','0628217287','yovan@gmail.com','yovan','$2y$10$iWvhHvTxJnr1HevzSxI23uJB7plnRo7ExTXFVHtZW8F.jVObamDUa','Member',1,1589966649,'default.jpg');
insert  into `penyewa`(`id_penyewa`,`nama_penyewa`,`alamat_penyewa`,`nohp_penyewa`,`email_penyewa`,`username_penyewa`,`password_penyewa`,`status`,`aktif`,`tanggal_daftar`,`foto`) values ('PEN-000002','aldi','padang','10923923','aldi@gmail.com','aldi','$2y$10$iWvhHvTxJnr1HevzSxI23uJB7plnRo7ExTXFVHtZW8F.jVObamDUa','Nonmember',1,1589966649,'default.jpg');
insert  into `penyewa`(`id_penyewa`,`nama_penyewa`,`alamat_penyewa`,`nohp_penyewa`,`email_penyewa`,`username_penyewa`,`password_penyewa`,`status`,`aktif`,`tanggal_daftar`,`foto`) values ('PEN-000003','ade','padang','089723','adeputrananda12@gmail.com','ade','$2y$10$Zb0hkAW8bp/sAjEQDXbn9evF7EkG66F/Kq9aMsSlp6nIcKn.PlIkq','Nonmember',1,1591260382,'default.jpg');
insert  into `penyewa`(`id_penyewa`,`nama_penyewa`,`alamat_penyewa`,`nohp_penyewa`,`email_penyewa`,`username_penyewa`,`password_penyewa`,`status`,`aktif`,`tanggal_daftar`,`foto`) values ('PEN-000004','Raziv','padang','08123','raziv05@gmail.com','raziv','$2y$10$ZEij7EB2/v0zVNkJW6k0zeV2Eu2Y32Ej.LP9jSpT6XJ0lOFY4WS3y','Nonmember',1,1591260545,'default.jpg');
insert  into `penyewa`(`id_penyewa`,`nama_penyewa`,`alamat_penyewa`,`nohp_penyewa`,`email_penyewa`,`username_penyewa`,`password_penyewa`,`status`,`aktif`,`tanggal_daftar`,`foto`) values ('PEN-000005','Febri','padang','08123','febri@gmail.com','febri','$2y$10$ZEij7EB2/v0zVNkJW6k0zeV2Eu2Y32Ej.LP9jSpT6XJ0lOFY4WS3y','Nonmember',1,1591260545,'default.jpg');
insert  into `penyewa`(`id_penyewa`,`nama_penyewa`,`alamat_penyewa`,`nohp_penyewa`,`email_penyewa`,`username_penyewa`,`password_penyewa`,`status`,`aktif`,`tanggal_daftar`,`foto`) values ('PEN-000006','Rony','padang','08123','rony@gmail.com','rony','$2y$10$ZEij7EB2/v0zVNkJW6k0zeV2Eu2Y32Ej.LP9jSpT6XJ0lOFY4WS3y','Nonmember',1,1591260545,'default.jpg');
insert  into `penyewa`(`id_penyewa`,`nama_penyewa`,`alamat_penyewa`,`nohp_penyewa`,`email_penyewa`,`username_penyewa`,`password_penyewa`,`status`,`aktif`,`tanggal_daftar`,`foto`) values ('PEN-000007','Orlan do','padang','08123','orlan@gmail.com','orlan','$2y$10$ZEij7EB2/v0zVNkJW6k0zeV2Eu2Y32Ej.LP9jSpT6XJ0lOFY4WS3y','Nonmember',1,1591260545,'default.jpg');
insert  into `penyewa`(`id_penyewa`,`nama_penyewa`,`alamat_penyewa`,`nohp_penyewa`,`email_penyewa`,`username_penyewa`,`password_penyewa`,`status`,`aktif`,`tanggal_daftar`,`foto`) values ('PEN-000008','Dio','padang','08123','dio@gmail.com','dio','$2y$10$ZEij7EB2/v0zVNkJW6k0zeV2Eu2Y32Ej.LP9jSpT6XJ0lOFY4WS3y','Member',1,1591260545,'default.jpg');
insert  into `penyewa`(`id_penyewa`,`nama_penyewa`,`alamat_penyewa`,`nohp_penyewa`,`email_penyewa`,`username_penyewa`,`password_penyewa`,`status`,`aktif`,`tanggal_daftar`,`foto`) values ('PEN-000009','Heru','padang','08123','heru@gmail.com','heru','$2y$10$ZEij7EB2/v0zVNkJW6k0zeV2Eu2Y32Ej.LP9jSpT6XJ0lOFY4WS3y','Nonmember',1,1591260545,'default.jpg');

/*Table structure for table `sewa_lapangan` */

DROP TABLE IF EXISTS `sewa_lapangan`;

CREATE TABLE `sewa_lapangan` (
  `id_sewa` char(10) NOT NULL,
  `penyewa_id` char(10) DEFAULT NULL,
  `penyewa_nama` varchar(128) DEFAULT NULL,
  `penyewa_status` char(20) DEFAULT NULL,
  `tanggal_sewa` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_sewa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `sewa_lapangan` */

insert  into `sewa_lapangan`(`id_sewa`,`penyewa_id`,`penyewa_nama`,`penyewa_status`,`tanggal_sewa`,`status`) values ('SW-0000001','PEN-000004','Raziv','Nonmember','2020-08-31','Dikonfirmasi');
insert  into `sewa_lapangan`(`id_sewa`,`penyewa_id`,`penyewa_nama`,`penyewa_status`,`tanggal_sewa`,`status`) values ('SW-0000002','PEN-000008','Dio','Nonmember','0000-00-00','Dikonfirmasi(Pendaftaran Member)');
insert  into `sewa_lapangan`(`id_sewa`,`penyewa_id`,`penyewa_nama`,`penyewa_status`,`tanggal_sewa`,`status`) values ('SW-0000003','PEN-000008','Dio','Nonmember','0000-00-00','Dikonfirmasi(Pendaftaran Member)');
insert  into `sewa_lapangan`(`id_sewa`,`penyewa_id`,`penyewa_nama`,`penyewa_status`,`tanggal_sewa`,`status`) values ('SW-0000004','PEN-000008','Dio','Member','2020-08-25','Dikonfirmasi');

/*Table structure for table `temp_sewa` */

DROP TABLE IF EXISTS `temp_sewa`;

CREATE TABLE `temp_sewa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `hari` varchar(20) DEFAULT NULL,
  `jam` varchar(30) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

/*Data for the table `temp_sewa` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id_user` char(10) NOT NULL,
  `nama_user` varchar(50) DEFAULT NULL,
  `username_user` varchar(30) DEFAULT NULL,
  `password_user` varchar(70) DEFAULT NULL,
  `level_user` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `user` */

insert  into `user`(`id_user`,`nama_user`,`username_user`,`password_user`,`level_user`) values ('USER-00001','Syafiq','admin','202cb962ac59075b964b07152d234b70',1);
insert  into `user`(`id_user`,`nama_user`,`username_user`,`password_user`,`level_user`) values ('USER-00002','Yusril','pimpinan','202cb962ac59075b964b07152d234b70',2);
insert  into `user`(`id_user`,`nama_user`,`username_user`,`password_user`,`level_user`) values ('USER-00003','Yusra','operator','202cb962ac59075b964b07152d234b70',3);

/*Table structure for table `user_token` */

DROP TABLE IF EXISTS `user_token`;

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(128) DEFAULT NULL,
  `token` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user_token` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
