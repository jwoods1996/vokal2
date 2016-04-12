drop table if exists posts;

CREATE TABLE posts (
  id integer not null primary key autoincrement,
  image,
  title varchar(40),
  name varchar(40),
  message varchar(40),
  time varchar(40)
);



select * from posts
order by time DESC;