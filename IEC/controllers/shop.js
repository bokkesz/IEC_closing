const Product = require('../models/product');

exports.getHome = (req, res, nex) => {
  res.render('shop/home', {
    pageTitle: 'All Products',
    path: '/',
  })
}

exports.getProducts = (req, res, next) => {
  Product.fetchAll()
  .then(([rows]) => {
      res.render('shop/product-list', {
        prods: rows,
        pageTitle: 'All Products',
        path: '/products',
      }); 
  })
  .catch(err => console.log(err));
};

exports.getProduct = (req, res, next) => {
  const prodId = req.params.productId;
  Product.findById(prodId)
  .then(([rows]) => {
    console.log(rows)
    res.render('shop/product-detail', {
      product: rows[0],
      pageTitle: rows[0].title,
      path: '/products',
      img: rows[0].imageUrl,
    });
  })
  .catch(err => console.log(err));
  
};

exports.postRegister = (req, res, next) => {
  const name = req.body.name;
  const email = req.body.email;
  const pass = req.body.password;
  const confirmPassword = req.body.passwordConfirm;
  Auth.getEmail(email)
  .then(user => {
    if(user) {
      return res.status(400).render('shop/register', { pageTitle: 'Register', path: '/register', message: 'Email is already in use.', succmessage: 'User registered successfully.' });
    } else {
      if (pass !== confirmPassword) {
        return res.status(400).render('shop/register', { pageTitle: 'Register', path: '/register', message: 'Password do not match', succmessage: 'User registered successfully.' });
        }
   
  Auth.addUser(name, email, pass)
        return res.status(201).render('shop/register', { pageTitle: 'Register', path: '/register', message: 'Email is already in use.', succmessage: 'User registered successfully.' });
    }
  })
  .catch(err => console.log(err))
}

exports.getCart = (req, res, next) => {
  Cart.getCart()
  .then(([rows]) => {
    res.render('shop/cart', {
      path: '/cart',
      pageTitle: 'Your Cart',
      products: rows,
    });
  })
  .catch(err => console.log(err)); 
};

exports.postCart = (req, res, next) => {
  const prodId = req.body.productId;
  const prodName = req.body.productName;
  const prodPrice = req.body.productPrice;
  if (prodId, prodName, prodPrice){
    Cart.addProduct(prodId, prodName, prodPrice);
  } 

  res.redirect('/products');
};

exports.postCartDelete = (req, res, next) => {
  const prodId = req.body.productId;
    Cart.deleteProduct(prodId).catch(err => console.log(err));
    res.redirect('/cart');
  };

exports.getOrders = (req, res, next) => {
  res.render('shop/orders', {
    path: '/orders',
    pageTitle: 'Your Orders',
  });
};

exports.getCheckout = (req, res, next) => {
  res.render('shop/checkout', {
    path: '/checkout',
    pageTitle: 'Checkout',
  });
};
