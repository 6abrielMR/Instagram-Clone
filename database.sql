create database if not exists laravel_master;
use laravel_master;

create table if not exists users(
    id                  int(255) auto_increment not null,
    role                varchar(20),
    name                varchar(100),
    surname             varchar(200),
    nick                varchar(100),
    email               varchar(255),
    password            varchar(255),
    image               varchar(255),
    created_at          datetime,
    updated_at          datetime,
    remember_token      varchar(255),
    constraint pk_users primary key(id),
)engine=InnoDb;

insert into users values(null, 'user', 'Gabriel', 'Montes', 'gabrielweb', 'gabriel@gabriel.com', 'pass', null, curtime(), curtime(), null);
insert into users values(null, 'user', 'Juan', 'Lopez', 'juanlopez', 'juan@juan.com', 'pass', null, curtime(), curtime(), null);
insert into users values(null, 'user', 'Manolo', 'Garcia', 'manologarcia', 'manolo@garcia.com', 'pass', null, curtime(), curtime(), null);

create table if not exists images(
    id                  int(255) auto_increment not null,
    user_id             int(255),
    image_path          varchar(255),
    description         text,
    created_at          datetime,
    updated_at          datetime,
    constraint pk_images primary key(id),
    constraint fk_images_users foreign key(user_id) references users(id)
)engine=InnoDb;

insert into images values(null, 1, 'test.jpg', 'descripcion de prueba 1', curtime(), curtime());
insert into images values(null, 1, 'playa.jpg', 'descripcion de prueba 2', curtime(), curtime());
insert into images values(null, 1, 'arena.jpg', 'descripcion de prueba 3', curtime(), curtime());
insert into images values(null, 3, 'familia.jpg', 'descripcion de prueba 4', curtime(), curtime());

create table if not exists comments(
    id                  int(255) auto_increment not null,
    user_id             int(255),
    image_id            int(255),
    content             text,
    created_at          datetime,
    updated_at          datetime,
    constraint pk_comments primary key(id),
    constraint fk_comments_users foreign key(user_id) references users(id),
    constraint fk_comments_images foreign key(image_id) references images(id)
)engine=InnoDb;

insert into comments values(null, 1, 4, 'Buena foto de familia', curtime(), curtime());
insert into comments values(null, 2, 1, 'Buena foto de PLAYA!!', curtime(), curtime());
insert into comments values(null, 2, 4, 'que bueno!!', curtime(), curtime());

create table if not exists likes(
    id                  int(255) auto_increment not null,
    user_id             int(255),
    image_id            int(255),
    created_at          datetime,
    updated_at          datetime,
    constraint pk_likes primary key(id),
    constraint fk_likes_users foreign key(user_id) references users(id),
    constraint fk_likes_images foreign key(image_id) references images(id)
)engine=InnoDb;

insert into likes values(null, 1, 4, curtime(), curtime());
insert into likes values(null, 2, 4, curtime(), curtime());
insert into likes values(null, 3, 1, curtime(), curtime());
insert into likes values(null, 3, 2, curtime(), curtime());
insert into likes values(null, 2, 1, curtime(), curtime());