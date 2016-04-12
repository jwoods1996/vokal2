drop table if exists posts;

CREATE TABLE posts (
  image,
  name varchar(40),
  message varchar(40)
);

insert into posts(image, name, message) values ('http://rockstartemplate.com/blogheaders/bannerdesign1.jpg', 'Example name', 'Example message');