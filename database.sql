

Create database phones;

Create table phone_info
(
  id              int(4)      AUTO_INCREMENT     PRIMARY KEY,
  name            varchar(50)          not null,
  image           varchar(100)         not null,
  price           double(10,2)         not null,
  subject         varchar(10)
);

insert into phone_info values(1,"Samsung Galaxy A73 5G","images/samsung/A73.png",267.00,"samsung");
insert into phone_info values(2,"Samsung Galaxy -A52","images/samsung/Samsung Galaxy -A52.png",259.00,"samsung");
insert into phone_info values(3,"Samsung S21 Plus","images/samsung/SAMSUNG S21 Plus.png",129.99,"samsung");
insert into phone_info values(4,"Samsung Galaxy A22 Black","images/samsung/Samsung Galaxy A22 Black.png",129.97,"samsung");
insert into phone_info values(5,"Samsung Galaxy Fold 3","images/samsung/Samsung Galaxy Fold 3.png",1199.00,"samsung");
insert into phone_info values(6,"Samsung S21 Ultra","images/samsung/SAMSUNG S21 Ultra.png",776.00,"samsung");
insert into phone_info values(7,"Samsung Galaxy A52s ","images/samsung/Samsung Galaxy A52s .png",329.00,"samsung");
insert into phone_info values(8,"Samsung Galaxy S21","images/samsung/Samsung Galaxy S21.png",484.00,"samsung");

insert into phone_info values(9,"Nokia 9 PureView","images/nokia/Nokia 9 PureView.png",689.00,"Nokia");
insert into phone_info values(10,"Nokia 8.3 5G","images/nokia/Nokia 8.3 5G.png",899.00,"Nokia");
insert into phone_info values(11,"Nokia 6.1","images/nokia/Nokia 6.1.png",219.99,"Nokia");
insert into phone_info values(12,"Nokia 7.2","images/nokia/Nokia 7.2.png",270.00,"Nokia");
insert into phone_info values(13,"Nokia G10","images/nokia/Nokia G10.png",184.00,"Nokia");
insert into phone_info values(14,"Nokia XR20 5G","images/nokia/Nokia XR20 5G .png",549.99,"Nokia");
insert into phone_info values(15,"Nokia 7 Plus","images/nokia/Nokia 7 Plus.png",499.00,"Nokia");

insert into phone_info values(16,"I Phone 12","images/apple/iphone 12.png",699.00,"Apple");
insert into phone_info values(17,"I Phone 11","images/apple/iphone 11.png",549.00,"Apple");
insert into phone_info values(18,"I Phone 13 pro max","images/apple/iphone 13 pro max.png",1099.00,"Apple");
insert into phone_info values(19,"I Phone 13 Mini","images/apple/iphone 13 mini.png",749.00,"Apple");
insert into phone_info values(20,"I Phone 13 Pro","images/apple/iphone 13 pro.png",1099.00,"Apple");
insert into phone_info values(21,"I Phone X","images/apple/iphone x.png",599.00,"Apple");
insert into phone_info values(22,"I Phone SE","images/apple/iphone se.png",419.00,"Apple");
insert into phone_info values(23,"I Phone XR","images/apple/iphone xr.png",699.00,"Apple");

insert into phone_info values(24,"Huawei Nova 9 ","images/huawei/Huawei Nova.png",380.00,"Huawei");
insert into phone_info values(25,"Huawei Nova 8","images/huawei/Huawei Nova8.png",260.00,"Huawei");
insert into phone_info values(26,"Huawei Y9a","images/huawei/Huawei Y9a.png",650.00,"Huawei");
insert into phone_info values(27,"Huawei P50 Pro","images/huawei/HUAWEI P50 Pro.png",799.00,"Huawei");
insert into phone_info values(28,"Huawei P40","images/huawei/Huawei P40.png",550.00,"Huawei");
insert into phone_info values(29,"Huawei Mate 30 Pro","images/huawei/HUAWEI Mate 30 Pro.png",344.00,"Huawei");
insert into phone_info values(30,"Huawei Y5p","images/huawei/Huawei Y5p.png",368.99,"Huawei");








