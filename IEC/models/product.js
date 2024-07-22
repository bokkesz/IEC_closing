const db = require('../util/db');

module.exports = class Product {
  
  static save(title, price, imageUrl, description) {
   return db.execute('INSERT INTO products (title, price, imageUrl, description) VALUES (?, ?, ?, ?);', 
    [title, price, imageUrl, description]);
  }

  static deleteById(id){
    return db.execute(`DELETE FROM products WHERE id = ?;`, [id]);
  }

  static fetchAll() {
    return db.execute('SELECT * FROM products;');
  }

  static findById(id) {
    return db.execute(`SELECT * FROM products WHERE id = ?;`, [id]);
  }

  static updateProduct(title, price, description, imageUrl, id){
    return db.execute("UPDATE products SET title = ?, price = ?, description = ?, imageUrl = ? WHERE id = ?;",
     [title, price, description, imageUrl, id]
    );
  }
    /*07.20 A hiba amiért az updateProduct nem végezte helyesen a dolgát, mert a productId az edit-product.ejs-ben található hidden froms inputból nem jött meg a postEditProduct controllerembe. A hiba oka az volt, hogy rossz paramétert próbált küldeni a formsom  product[0].id helyett product.id volt.
 [
  [
    {
      id: 1,
      title: 'Book',
      price: 10.99,
      description: 'This is an awesome book',
      imageUrl: 'https://img.freepik.com/free-photo/book-composition-with-open-book_23-2147690555.jpg'
    }
  ],
    [
      id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
      title VARCHAR(255) NOT NULL,
      price DOUBLE NOT NULL,
      description TEXT NOT NULL,
      imageUrl VARCHAR(255) NOT NULL
    ]
  ] ilyen formában jött a válasz, és ezt kellett product[0] val tovább bontani, hogy a tömb első (0.-ik elemét használjuk)*/
};
