CREATE DATABASE pokemon;
USE pokemon;

CREATE TABLE pokemons (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    type ENUM('Fire', 'Water', 'Grass', 'Electric', 'Psychic', 'Normal', 'Ice', 'Dragon', 'Dark', 'Fairy', 'Fighting', 'Flying', 'Poison', 'Ground', 'Rock', 'Bug', 'Ghost', 'Steel'),
    subtype ENUM('Fire', 'Water', 'Grass', 'Electric', 'Psychic', 'Normal', 'Ice', 'Dragon', 'Dark', 'Fairy', 'Fighting', 'Flying', 'Poison', 'Ground', 'Rock', 'Bug', 'Ghost', 'Steel', '') DEFAULT '',
    region ENUM('Kanto', 'Johto', 'Hoenn', 'Sinnoh', 'Unova', 'Kalos', 'Alola', 'Galar', 'Hisui')
);

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255),
    apellido VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255)
);

CREATE TABLE imagenes_pokemon (
    pokemon_id INT,
    url_imagen VARCHAR(255),
    PRIMARY KEY (pokemon_id),
    FOREIGN KEY (pokemon_id) REFERENCES pokemons(id)
);


INSERT INTO pokemons (name, type, subtype, region) VALUES
('Bulbasaur', 'Grass', 'Poison', 'Kanto'),
('Charmander', 'Fire', '', 'Kanto'),
('Squirtle', 'Water', '', 'Kanto'),
('Pikachu', 'Electric', '', 'Kanto'),
('Jigglypuff', 'Normal', 'Fairy', 'Kanto'),
('Meowth', 'Normal', '', 'Kanto'),
('Psyduck', 'Water', '', 'Kanto'),
('Geodude', 'Rock', 'Ground', 'Kanto'),
('Eevee', 'Normal', '', 'Kanto'),
('Snorlax', 'Normal', '', 'Kanto');

INSERT INTO imagenes_pokemon (pokemon_id, url_imagen) VALUES 
(1, 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/001.png'),
(2, 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/004.png'),
(3, 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/007.png'),
(4, 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/025.png'),
(5, 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/039.png'),
(6, 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/052.png'),
(7, 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/054.png'),
(8, 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/074.png'),
(9, 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/133.png'),
(10, 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/143.png');


SELECT * FROM pokemons;
SELECT * FROM usuarios;