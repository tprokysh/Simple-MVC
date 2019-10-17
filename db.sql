create table if not exists users
(
    id       serial       not null
        constraint table_name_pk
            primary key,
    login    varchar(255) not null,
    password char(60)     not null,
    mail     varchar(255)
);

insert into users(login, password, mail) values ('admin', '$2y$10$Jo1ASJ86sTJoYkMKKnfnE.tOI.Dzh8wL5kEvGz8CpDqkckXOQga52', 'admin@admin.ua');

create table if not exists posts
(
    id      serial       not null
        constraint posts_pkey
            primary key,
    title   varchar(255) not null,
    content text         not null,
    date    varchar(255) not null,
    user_id integer      not null
        constraint posts_users_id_fk
            references users
);