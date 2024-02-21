create table product
(
    id        int auto_increment,
    sku       varchar(255)                      not null,
    name      varchar(255)                      not null,
    price     float                             not null,
    type      ENUM ('DVD', 'Book', 'Furniture') not null,
    attribute varchar(255)                      not null,
    constraint product_pk
        primary key (id)
);

create unique index product_sku_uindex
    on product (sku);
