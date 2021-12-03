
CREATE DATABASE IF NOT EXISTS tickets;

create table tbl_commtickets
(userid int primary key auto_increment,
email varchar(50),
company varchar(70),
contact varchar(30),
phone varchar(15),
comm_desc varchar(1000)
);

INSERT INTO `tbl_commtickets`(`userid`, `email`, `company`, `contact`, `phone`, `comm_desc`) VALUES (1,'iamspeed@gmail.com','Lintakoon Inc.','phone','201-454-5454','the face on walter white when hank is killed');
