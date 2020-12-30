CREATE TABLE users (
  id serial NOT NULL,
	name varchar(100),
	email varchar(200) not null,
	password varchar(100) not null,
	remember_token varchar(100) null,
	active integer default 1,
	primary key (id)
);