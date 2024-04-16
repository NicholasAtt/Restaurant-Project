Create table Cliente(
	email varchar(40),
	nome varchar(25),
	cognome varchar(25),
	indirizzo varchar (50),
	telefono int,
	data_registrazione datetime,
	amministratore boolean,
	password varchar(256),
	Primary key (email)
);
INSERT INTO `cliente` (`email`, `nome`, `cognome`, `indirizzo`, `telefono`, `data_registrazione`, `amministratore`, `password`) VALUES ('test@test.it', 'Test', 'Test', 'Via Test', '333333333', '2022-02-21 20:41:56', '1', '7c4a8d09ca3762af61e59520943dc26494f8941b');


Create table Ordine(
	id_ordine int AUTO_INCREMENT,
	data_ordine datetime,
	prezzo_b float(6,2),
	prezzo_s float(6,2),
	prezzo_pp float(6,2),
	fattura  boolean,
	Primary key(id_ordine)
);


Create table Compone( 
	email varchar(40) not null, 
	id_ordine int not null, 
	primary key(email,id_ordine), 
	foreign key(email) references Cliente(email) on delete cascade on update cascade, 
	foreign key(id_ordine) references Ordine(id_ordine) on delete cascade on update cascade 
);


Create table Stuzzichini(
	id_stuzzichini int AUTO_INCREMENT,
	nome varchar(30),
	prezzo float(4,2),
	Primary key (id_stuzzichini)
);
INSERT INTO `stuzzichini` (`id_stuzzichini`, `nome`, `prezzo`) VALUES (NULL, 'Patatine fritte', '2'), (NULL, 'Fritto misto', '5');


Create table Bevande(
	id_bevande int AUTO_INCREMENT,
	nome varchar(30),
	prezzo float(4,2),
	Primary key (id_bevande)
);
INSERT INTO `bevande` (`id_bevande`, `nome`, `prezzo`) VALUES (NULL, 'Acqua', '1'), (NULL, 'Coca cola', '2');


Create table Ordine_p(
	id_ordine_p int AUTO_INCREMENT,
	maxi boolean,
	Primary key (id_ordine_p)
);

Create table Pizze_pizzoli(
	id_pizze_pizzoli int AUTO_INCREMENT,
	nome varchar(30),
	prezzo_classic float(4,2),
	prezzo_maxi float(4,2),
	Primary key (id_pizze_pizzoli)
);
INSERT INTO `pizze_pizzoli` (`id_pizze_pizzoli`, `nome`, `prezzo_classic`, `prezzo_maxi`) VALUES (NULL, 'Margherita', '5', '10'), (NULL, 'Capricciosa', '7', '14');


Create table Ingredienti(
	id_ingredienti int AUTO_INCREMENT,
	nome varchar(30),
	prezzo float(4,2),
	Primary key (id_ingredienti)
);

INSERT INTO `ingredienti` (`id_ingredienti`, `nome`, `prezzo`) VALUES (NULL, 'prosciutto', '1'), (NULL, 'Mozzarella', '2');

Create table Fatture(
	numero int AUTO_INCREMENT,
	data datetime,
	Primary key (numero)
);

Create table Contiene_s( 
	id_ordine int not null, 
	id_stuzzichini int not null, 
	quantita int,
	primary key(id_ordine, id_stuzzichini), 
	foreign key(id_stuzzichini) references Stuzzichini(id_stuzzichini) on delete cascade on update cascade, 
	foreign key(id_ordine) references Ordine(id_ordine) on delete cascade on update cascade 
);

Create table Contiene_b( 
	id_ordine int not null, 
	id_bevande int not null, 
	quantita int,
	primary key(id_ordine, id_bevande), 
	foreign key(id_bevande) references Bevande(id_bevande) on delete cascade on update cascade, 
	foreign key(id_ordine) references Ordine(id_ordine) on delete cascade on update cascade 
);

Create table Contiene_p( 
	id_ordine int not null, 
	id_ordine_p int not null, 
	quantita int,
	primary key(id_ordine, id_ordine_p), 
	foreign key(id_ordine_p) references Ordine_p(id_ordine_p) on delete cascade on update cascade, 
	foreign key(id_ordine) references Ordine(id_ordine) on delete cascade on update cascade 
);

Create table Ha( 
	id_ordine_p int not null, 
	id_pizze_pizzoli int not null, 
	primary key(id_ordine_p, id_pizze_pizzoli), 
	foreign key(id_ordine_p) references Ordine_p(id_ordine_p) on delete cascade on update cascade, 
	foreign key(id_pizze_pizzoli) references Pizze_pizzoli(id_pizze_pizzoli) on delete cascade on update cascade 
);

Create table Composte( 
	id_pizze_pizzoli int not null, 
	id_ingredienti int not null, 
	primary key(id_pizze_pizzoli, id_ingredienti), 
	foreign key(id_pizze_pizzoli) references Pizze_pizzoli(id_pizze_pizzoli) on delete cascade on update cascade, 
	foreign key(id_ingredienti) references Ingredienti(id_ingredienti) on delete cascade on update cascade 
);

Create table Farcisce( 
	id_ordine_p int not null, 
	id_ingredienti int not null, 
	aggiunte boolean,
	primary key(id_ordine_p, id_ingredienti), 
	foreign key(id_ordine_p) references Ordine_p(id_ordine_p) on delete cascade on update cascade, 
	foreign key(id_ingredienti) references Ingredienti(id_ingredienti) on delete cascade on update cascade 
);

Create table Emette( 
	id_ordine int not null, 
	numero int not null, 
	primary key(id_ordine, numero), 
	foreign key(id_ordine) references Ordine(id_ordine) on delete cascade on update cascade, 
	foreign key(numero) references Fatture(numero) on delete cascade on update cascade 
);
