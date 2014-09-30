CREATE TABLE blog_articulo (id BIGSERIAL, titulo VARCHAR(255), contenido TEXT, created_at TIMESTAMP NOT NULL, updated_at TIMESTAMP NOT NULL, PRIMARY KEY(id));
CREATE TABLE blog_comentario (id BIGSERIAL, titulo VARCHAR(255), blog_articulo_id BIGINT, autor VARCHAR(255), contenido TEXT, created_at TIMESTAMP NOT NULL, updated_at TIMESTAMP NOT NULL, PRIMARY KEY(id));
ALTER TABLE blog_comentario ADD CONSTRAINT blog_comentario_blog_articulo_id_blog_articulo_id FOREIGN KEY (blog_articulo_id) REFERENCES blog_articulo(id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;
