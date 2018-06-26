// these functions work on all pages!

// scroll to div
function scrollToId () {
    
    var $target;
    var $distance;

    $('.js-scrollToId').on('click', function(e){

        e.preventDefault();
        $target = $(this).attr('js-target');
        $distance = $($target).offset().top;

        $('html, body').animate({
            scrollTop: $distance
        }, 1000);

    })
}

function activeModal () {

    var $target;
    $('.js-activeModal').on('click', function(){

        $target = $(this).attr('js-target');

        $($target).addClass('c-modal--active');
    });

    $('.js-closeModal').on('click', function(){

        $('.c-modal').removeClass('c-modal--active');
    })
}

// cart function
function cartManager(){

    

    class productObj{

        constructor(productId, image, total, price ){

            this.productId = productId;
            this.image = image;
            this.total = total;
            this.price = price;
        }

        get productInitElement () {

            return `<div class="cart__product" js-productId="${this.productId}">
                    <img title="remove from cart" class="cart__image" src="${this.image}"><span class="cart__product-total">${this.total}</span>
                    </div>`;
        }

        get productTotalElement () {

            return cart.element.find(`.cart__product[js-productId = '${this.productId}']`).find('.cart__product-total');

        }

        get productElement () {

            return cart.element.find(`.cart__product[js-productId = '${this.productId}']`);
        }

        productAppendTo ( target ) {

            target.append(this.productInitElement);
            this.setRemoveOnclick();
        }

        productDestroy () {

            this.productElement.remove();

        }

        productUpdateTotal ( increase ) {

            if( increase ) {

                this.total++;
                
            }else{

                this.total--;

            }

            this.productTotalElement.html(this.total);

            
        }

        setRemoveOnclick ( ) {

            this.productElement.on( "click", () => {

                cart.removeProduct(this.productId);

            } )

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

        }

        get total(){

            return this.products.length;
        }

        get totalPrice () {

            let price = 0;

            this.products.forEach( function ( product ) {
                console.log(product.price, product.total);
                price = price + product.price*product.total;
            })
                        

            return price;
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
            this.cartPriceElement.html(`£${price}`);
        }

        show () {

            this.emptyCheck();
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
                    this.products[i].productUpdateTotal(true);
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

            this.updatePrice();


        }

        removeProduct (productId) {

            let length = this.total;

            for ( let i = 0; i < length; i++) {

                let currentProduct = this.products[i];

                // find the item in the cart
                if ( currentProduct.productId == productId) {

                    // if the item number more than 1, decrease it
                    if ( currentProduct.total > 1 ) {

                        currentProduct.productUpdateTotal(false);

                    }else{

                        // else, destroy it!
                        cart.products.splice( i ,1 );
                        currentProduct.productDestroy();


                    }

                }

            }

            this.updatePrice();
            this.emptyCheck();

        }



    }
    // end cart obj

    let cartElement = $('.js-cart');
    let cart__leftElement = $('.js-cart .cart__left');
    let cart__demoElement = cartElement.find('.cart__demo');


    let cart = new cartObj(cartElement);

    $('.js-productAdd').on('click', function(){

        // let product = {};
              
        let image = $(this).parent().closest('.products__card').find("img").attr('src');
        let productId = $(this).parent().closest('.products__card').attr("js-productId");
        let total = 1;
        let price = parseInt($(this).parent().closest('.products__card').find("[js-product-price]").attr('js-product-price'));


        // create a new product and add it to cart
        cart.addProduct( productId, image, total, price);
        cart.show();

    })

    $(' .js-cart-close').on( 'click', function () {

        cart.hide();
    })

    $('.cart-show').on( 'click', function () {

        cart.show();
    })
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



