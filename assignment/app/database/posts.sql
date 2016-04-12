drop table if exists posts;

CREATE TABLE posts (
  id integer not null primary key autoincrement,
  image,
  name varchar(40),
  message varchar(40),
  time varchar(40)
);

insert into posts(id, image, name, message, time) values ('1', 'http://rockstartemplate.com/blogheaders/bannerdesign1.jpg', 'Example name', '3', '2016-04-12T09:27:41+00:00');
insert into posts(id, image, name, message, time) values ('2', 'http://rockstartemplate.com/blogheaders/bannerdesign1.jpg', 'Example name', '2', '2016-04-12T09:28:41+00:00');
insert into posts(id, image, name, message, time) values ('3', 'http://rockstartemplate.com/blogheaders/bannerdesign1.jpg', 'Example name', '4', '2016-04-12T09:26:41+00:00');
insert into posts(id, image, name, message, time) values ('4', 'http://rockstartemplate.com/blogheaders/bannerdesign1.jpg', 'Example name', '1', '2016-04-12T09:30:41+00:00');


select * from posts
order by time DESC;