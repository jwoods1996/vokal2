drop table if exists posts;

CREATE TABLE posts (
  id INTEGER NOT NULL PRIMARY KEY autoincrement,
  image TEXT NOT NULL,
  title TEXT NOT NULL,
  name TEXT NOT NULL,
  message TEXT NOT NULL,
  time DATE NOT NULL,
  commentsAmount INTEGER
);

drop table if exists comments;

CREATE TABLE comments (
  postid INTEGER NOT NULL REFERENCES posts(id),
  commentid INTEGER NOT NULL PRIMARY KEY autoincrement,
  name TEXT NOT NULL,
  message TEXT NOT NULL
);

SELECT * FROM posts
ORDER BY time DESC;