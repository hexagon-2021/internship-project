
CREATE TABLE business (
  id INT(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  username VARCHAR(256) NOT NULL,
  password VARCHAR(256) NOT NULL,
  email VARCHAR(256) NOT NULL,
  company_name VARCHAR(256) NOT NULL,
  company_city VARCHAR(256) NOT NULL,
  company_logo VARCHAR(256),
  phone_number VARCHAR(256) NOT NULL
);

CREATE TABLE PRODUCT (
  id INT(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  business_id INT(11) NOT NULL,
  FOREIGN KEY (business_id) REFERENCES business(id),
  item_offer VARCHAR(256) NOT NULL,
  item_name VARCHAR(256) NOT NULL,
  item_picture VARCHAR(256) NOT NULL,
  item_ingridients VARCHAR(256),
  item_price VARCHAR(256),
  item_categorie VARCHAR(256) NOT NULL, /*TE NDARA ME PRESJE*/ 
  item_views INT(11) NOT NULL,
  item_sale INT(11) NOT NULL,
  date_added VARCHAR(256) NOT NULL
);