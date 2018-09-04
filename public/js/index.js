
// cart function
function cartManager(){


    class productObj{

        constructor(productId, image, total, price ){

            this.productId = productId;
            this.image = image;
            this.total = parseInt(total);
            this.price = price;
        }

        get productInitElement () {

            return `<div class="cart__product" js-productId="${this.productId}">
                    <a href="product?id=${this.productId}" class="cart__product-link">
                    <img title="more details" class="cart__image" src="${this.image}"><span class="cart__product-total">${this.total}</span>
                    <span class="cart__product-increase js-productAdd" js-image="${this.image}" js-productId="${this.productId}" js-total="${this.total}" js-price="${this.price}"><i class="fas fa-plus"></i></span><span class="cart__product-decrease js-productRemove" js-productId='${this.productId}''><i class="fas fa-minus"></i></span>
                    </a>
                    </div>`;
        }

        get productTotalElement () {

            return cart.element.find(`.cart__product[js-productId = '${this.productId}']`).find('.cart__product-total');

        }

        get checkoutProductTotalElement () {

            return cart.element.find(`.js-checkoutProduct[js-productId='${this.productId}']`).find('.js-productTotal');
        }

        get productElement () {

            return cart.element.find(`.cart__product[js-productId = '${this.productId}']`);
        }

        get checkoutProductElement () {

            return cart.element.find(`.js-checkoutProduct[js-productId='${this.productId}']`);
        }

        productAppendTo ( target ) {

            // update the html on layout
            target.append(this.productInitElement);
            this.setFunctionsOnclick();
        }

        productDestroy () {

            // update html on layout
            this.productElement.remove(); // for cart-box layout
            this.checkoutProductElement.remove();// for checkout-page layout

        }

        productUpdateTotal ( increase, numb) {

            if( increase ) {

                this.total = this.total + parseInt(numb);
                
            }else{

                this.total = this.total - parseInt(numb);

            }

            // update html on layout
            this.productTotalElement.html(this.total); // for cart-box layout 
            this.checkoutProductTotalElement.html(this.total); // for checkout-page layout


            
        }

        setFunctionsOnclick ( ) {

            this.productElement.find('.js-productRemove').on( "click", function(event){

                let productId = $(this).attr('js-productId');
                event.preventDefault();
                event.stopPropagation();
                cart.removeProduct(productId);

            } )

            this.productElement.find('.js-productAdd').on('click', function(event){

                event.preventDefault();
                event.stopPropagation();
                let image = $(this).attr('js-image');
                let productId = $(this).attr('js-productId');
                let total = $(this).attr('js-total');
                let price = $(this).attr('js-price');

                // create a new product and add it to cart
                cart.addProduct( productId, image, total, price);
                cart.show();

            })

        }


    }
    // end product obj

    class cartObj {

        constructor(element) {

            this.element = element;
            this.products = [];
            this.productBoxElement = this.element.find('.cart__left');
            this.cartDemoElement = this.element.find( '.cart__demo');
            this.cartPriceElement = this.element.find( '.cart__price');
            this.checkoutCartPriceElement = this.element.find( '.js-checkoutCartTotalPrice'); // on checkout-page
            this.checkoutCartTotalElement = this.element.find( '.js-checkoutCartTotal'); // on checkout-page
            this.checkoutCartEndPriceElement = this.element.find( '.js-checkoutCartEndPrice'); // on checkout-page
            this.shippingCost = parseInt(this.element.find('.js-shippingCost').attr('js-shippingCost')) || 0;


        }

        get total(){ // use this for loop througth products-array

            return this.products.length;
        }

        get productsNumber() { // use this to show how many products on the cart

            let number = 0;

            this.products.forEach( function ( product ) {
                number = number + product.total;
            })
                        

            return number;

        }

        get totalPrice () { // use this to show the total price of all products

            let price = 0;

            this.products.forEach( function ( product ) {
                price = price + product.price*product.total;
            })
                        

            return price;
        }

        get endPrice () {

            let endPrice = 0;
            endPrice = this.totalPrice + this.shippingCost;

            return endPrice;
        }

        push () { 

            let cartjson = {
                products: cart.products,

            };

            cartjson = JSON.stringify(cartjson);

            $.ajax({
                url: 'cart.php',
                type: 'POST',
                data: {
                    action: "push",
                    cart: cartjson,
                },
                success: function (data ) {
                    
                }
            }).done(function(cart) {

                // console.log(JSON.parse(cart));
            });
        }

        pull () {

            $.ajax({
                url: 'cart.php',
                type: 'POST',
                data: {

                    action: "pull",
                },
            }).done(function(data) {


                if ( data) {

                    let pulledCart = JSON.parse(data);
                    // console.log(pulledCart);
                    let length = pulledCart.products.length;
                    // console.log(cart);
                    for (let i = 0; i< length; i++) {
                        let product = pulledCart.products[i];
                        let productId = product.productId;
                        let image = product.image;
                        let total = product.total;
                        let price = product.price;
                        let newProduct = new productObj(productId, image, total, price);
                        cart.products.push(newProduct);
                        // console.log(newProduct);


                    }
                        // console.log(cart);

                    cart.initProduct();

                } else {

                    console.log('nodata');
                }
            });

        }


        emptyCheck ( ) {

            let element = this.cartDemoElement;

            if ( !this.total ) {

                element.show();

            }else{

                element.hide();
            }

        }

        updatePrice () {

            let price = this.totalPrice;
            let productsNumber = this.productsNumber;
            let endPrice = this.endPrice;

            // update html of the cart-box layout
            this.cartPriceElement.html(`£${price}`);

            // update html on the checkout-page
            this.checkoutCartPriceElement.html(`${price}`);
            this.checkoutCartTotalElement.html(`${productsNumber}`);
            this.checkoutCartEndPriceElement.html(`${endPrice}`);
        }

        show () {

            this.emptyCheck();
            this.updatePrice();
            this.element.slideDown();

        }

        hide () {

            this.element.slideUp();
        }

        addProduct (productId, image, total, price) {

            let length = this.total;
            let exited = false;

            for ( let i = 0; i < length; i++) {

                if ( this.products[i].productId == productId) {

                    // if the item is exited in the cart, simply increase it total
                    this.products[i].productUpdateTotal(true , 1);
                    exited = true;
                    break;

                }

            }

            // if the item is not exited yet, create a new product object, push it in the cart arry, display it on the cart-box
            if ( !exited ) {

                // create new product
                let newproduct = new productObj ( productId, image, total, price);

                // push it to cart array
                cart.products.push(newproduct);

                // append it on the cart-box
                newproduct.productAppendTo(this.productBoxElement);


            }

            this.push();
            this.show();

        }

        removeProduct (productId) {

            let length = this.total;

            for ( let i = 0; i < length; i++) {

                let currentProduct = this.products[i];

                // find the item in the cart
                if ( currentProduct.productId == productId) {

                    // if the item number more than 1, decrease it
                    if ( currentProduct.total > 1 ) {

                        currentProduct.productUpdateTotal(false, 1);

                    }else{

                        // else, destroy it!
                        cart.products.splice( i ,1 );
                        currentProduct.productDestroy();


                    }

                }

            }

            this.push();
            this.show();
        }

        initProduct () {

            let length = this.total;

            for ( let i = 0; i < length; i++) {

                let currentProduct = this.products[i];
                currentProduct.productAppendTo(cart__leftElement);
                currentProduct.productTotalElement.html(currentProduct.total);

            }

            this.show();
        }



    }
    // end cart obj

    
    let cartElement = $('.js-cart');
    let cart__leftElement = $('.js-cart .cart__left');
    let cart__demoElement = cartElement.find('.cart__demo');

    let cart = new cartObj(cartElement);
    // console.log(cart);
    cart.pull();


    $('.js-productAdd').on('click', function(){

        // let product = {};
              
        let image = $(this).attr('js-image');
        let productId = $(this).attr('js-productId');
        let total = $(this).attr('js-total');
        let price = $(this).attr('js-price');

        // create a new product and add it to cart
        cart.addProduct( productId, image, total, price);
        cart.show();

    })

    // set close-function for the cart-box
    $(' .js-cart-close').on( 'click', function () {

        cart.hide();
    })

    // set show-function for the small-cart-icon on the bottom of page
    $('.cart-show').on( 'click', function () {

        cart.show();
    })

    // set remove-product-function for products on checkout-page
    $('.js-checkoutProductRemove').on( "click", function(event){

        // console.log('remove');
        let productId = $(this).attr('js-productId');
        event.preventDefault();
        event.stopPropagation();
        cart.removeProduct(productId);

    } )
    // cart.removeProduct('2');
}


// Invoke functions after all document are loaded
$(document).ready(function(){

    scrollToId();
    activeModal();

    $('.slick-slider').slick({
        centerMode: true,
        infinite:true,
        centerPadding: '60px',
        slidesToShow: 3,
        arrows:false,
        focusOnSelect:true,
        responsive: [
        {
          breakpoint: 768,
          settings: {
            arrows: false,
            centerMode: true,
            centerPadding: '40px',
            slidesToShow: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            arrows: false,
            centerMode: true,
            centerPadding: '40px',
            slidesToShow: 1
          }
        }
        ]
    });


    cartManager();
    

})





// these functions only work on index.php
