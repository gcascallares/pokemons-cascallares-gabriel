create schema pokemonsCascallaresGabriel;
use pokemonsCascallaresGabriel;

create table pokemon(
	nombre varchar(40) not null,
    tipo varchar(400) not null,
    foto varchar(400) not null,
    primary key(nombre));

create table usuario(
	nombre varchar(40) not null,
    clave varchar(40) not null,
    primary key(nombre));

insert into pokemon (nombre, tipo, foto)
	VALUES
    ('charmander', 'https://vignette.wikia.nocookie.net/es.pokemon/images/c/ce/Tipo_fuego.gif/revision/latest?cb=20170114100331', 'https://vignette.wikia.nocookie.net/es.pokemon/images/5/56/Charmander.png/revision/latest?cb=20140207202456'),
    ('pikachu', 'https://vignette.wikia.nocookie.net/es.pokemon/images/1/1b/Tipo_el%C3%A9ctrico.gif/revision/latest?cb=20170114100155', 'https://vignette.wikia.nocookie.net/es.pokemon/images/7/77/Pikachu.png/revision/latest/scale-to-width-down/350?cb=20150621181250'),
    ('bulbasaur', 'https://vignette.wikia.nocookie.net/es.pokemon/images/d/d6/Tipo_planta.gif/revision/latest?cb=20170114100444', 'https://vignette.wikia.nocookie.net/es.pokemon/images/4/43/Bulbasaur.png/revision/latest/scale-to-width-down/350?cb=20170120032346'),
    ('mew','https://vignette.wikia.nocookie.net/es.pokemon/images/1/15/Tipo_ps%C3%ADquico.gif/revision/latest?cb=20170114100445','https://vignette.wikia.nocookie.net/es.pokemon/images/b/bf/Mew.png/revision/latest/scale-to-width-down/350?cb=20160311010530');

insert into usuario (nombre, clave)
	VALUES
    ('usuario1', md5('1234')),
    ('usuario2', md5('0000'));