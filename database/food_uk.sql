# ----------
#script file to create database
# ----------
CREATE DATABASE food_uk;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


# ----------
#Table structure for table users
# ----------
CREATE TABLE users (
    id int(11) NOT NULL AUTO_INCREMENT,
    name varchar(45) DEFAULT NULL,
    email varchar(45) NOT NULL,
    password varchar(255) NOT NULL,
    phone varchar(20) DEFAULT NULL,
    created_at datetime DEFAULT NULL,
    updated_at datetime DEFAULT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


# ----------
#Table structure for table categories
# ----------
CREATE TABLE categories (
    id int(11) NOT NULL AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    created_at datetime DEFAULT NULL,
    updated_at datetime DEFAULT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


# ----------
#Table structure for table products
# ----------
CREATE TABLE products (

    id int(11) NOT NULL AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    image varchar(255) NOT NULL,
    description text NOT NULL,
    price int(11) NOT NULL,
    created_at datetime DEFAULT NULL,
    updated_at datetime DEFAULT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

# ----------
#Table structure for table orders
# ----------
CREATE TABLE orders (

    id int(11) NOT NULL AUTO_INCREMENT,
    content text NOT NULL,
    total int(11) NOT NULL,
    buyer varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    address text NOT NULL,
    zipcode int(11) NOT NULL,
    phone int(11) NOT NULL,
    created_at datetime DEFAULT NULL,
    updated_at datetime DEFAULT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


# ----------
#Table structure for table relationships
# ----------
CREATE TABLE category_product (
    id int(11) NOT NULL AUTO_INCREMENT,
    category_id int(11) UNSIGNED NOT NULL,
    product_id int(11) UNSIGNED NOT NULL, 
    created_at datetime DEFAULT NULL,
    updated_at datetime DEFAULT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


#----------
#insert users into employee table
#----------
INSERT INTO users (name, email, password, phone, created_at, updated_at) VALUES
('admin', 'admin@gmail.com', SHA1('123456789'), 0978161514, NOW(), NOW()),
('quyk', 'quyk@gmail.com', SHA1('123456789'), 0978161514, NOW(), NOW());


#----------
#insert categories
#----------
INSERT INTO categories (name, created_at, updated_at) VALUES
('orders', NOW(), NOW()),
('cooking', NOW(), NOW()),
('kitchen', NOW(), NOW()),
('drinks', NOW(), NOW()),
('other', NOW(), NOW());


#----------
#insert products
#----------
INSERT INTO products (name, image, description, price,  created_at, updated_at) VALUES
('4 Curry Recipe Kits Subscription (free delivery)', 'https://cdn.shopify.com/s/files/1/0194/6555/products/hi_res_Boom_Box_large.jpg?v=1529066353', 'You can cancel or amend your subscription at any time. Choose from our range of 6 award winning curry kits. Each curry recipe kit serves 2-3 people and contains all the building blocks you need to create a restaurant beating curry. All our recipes contain only natural ingredients, are gluten free and vegan friendly. Simply combine at home with your own fresh ingredients.',14, NOW(), NOW()),
('10 Curry Recipe Kits Subscription (free delivery)', 'https://cdn.shopify.com/s/files/1/0194/6555/products/Group_product_shot_NOTS_1200_large.png?v=1529065907', 'You can cancel or amend your subscription at any time. Choose from our range of 6 award winning curry kits. Each curry recipe kit serves 2-3 people and contains all the building blocks you need to create a restaurant beating curry. All our recipes contain only natural ingredients, are gluten free and vegan friendly. Simply combine at home with your own fresh ingredients.',30, NOW(), NOW())


#----------
#insert relationship category - product
#----------
INSERT INTO category_product (category_id, product_id, created_at, updated_at) VALUES
(1, 2, NOW(), NOW()),
(1, 3, NOW(), NOW()),
(1, 4, NOW(), NOW()),
(2, 1, NOW(), NOW()),
(2, 5, NOW(), NOW()),
(2, 6, NOW(), NOW()),
(2, 7, NOW(), NOW()),
(3, 2, NOW(), NOW()),
(3, 4, NOW(), NOW()),
(4, 6, NOW(), NOW()),
(4, 8, NOW(), NOW()),
(4, 1, NOW(), NOW()),
(4, 3, NOW(), NOW()),
(4, 5, NOW(), NOW()),
(5, 7, NOW(), NOW()),
(5, 2, NOW(), NOW()),
(5, 4, NOW(), NOW()),
(6, 6, NOW(), NOW()),
(5, 8, NOW(), NOW()),
(5, 1, NOW(), NOW()),
(5, 3, NOW(), NOW());
