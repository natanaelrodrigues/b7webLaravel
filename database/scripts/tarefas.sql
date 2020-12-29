CREATE TABLE tarefas (
  id serial NOT NULL,
	titulo varchar(100),
	resolvido integer default 0
);