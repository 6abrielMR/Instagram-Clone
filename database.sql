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