CREATE DATABASE `biblioteca-codeigniter4`;

CREATE TABLE books (
    id MEDIUMINT NOT NULL AUTO_INCREMENT,
    name varchar(100) NOT NULL,
	edition varchar(100) NOT NULL,
	publication_date DATE NOT NULL,
	created_at DATE NOT NULL,
	updated_at DATE NOT NULL,
	deleted_at DATE NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE authors (
    id MEDIUMINT NOT NULL AUTO_INCREMENT,
    name varchar(100) NOT NULL,
    lastname varchar(100) NOT NULL,
    country varchar(100) NOT NULL,
	register_date DATE NOT NULL,
    created_at DATE NOT NULL,
	updated_at DATE NOT NULL,
	deleted_at DATE NOT NULL,
    PRIMARY KEY (id)
);

# Muchos autores pueden tener muchos libros, mientras que muchos libros pueden tener muchos autores
# Tabla intermedia para guardar la relacion MUCHOS a MUCHOS entre libros y autores
CREATE TABLE books_authors (
    id MEDIUMINT NOT NULL AUTO_INCREMENT,
    book_id MEDIUMINT,
    author_id MEDIUMINT,
    created_at DATE NOT NULL,
	updated_at DATE NOT NULL,
	deleted_at DATE NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (book_id) 
		REFERENCES books(id) 
		ON DELETE CASCADE,
    FOREIGN KEY (author_id) 
		REFERENCES authors(id) 
        ON DELETE CASCADE
);