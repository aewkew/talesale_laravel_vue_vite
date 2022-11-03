import { set } from 'lodash';
import { createStore } from 'vuex'
let cart = window.localStorage.getItem('cart');
let cartCount = window.localStorage.getItem('cartCount');


const store = createStore({
    
    state: {
        cart: cart ? JSON.parse(cart) : [],
        cartCount: cartCount ? parseInt(cartCount) : 0,
    },

    mutations: {
        addToCart(state, item){
           // console.log(item.product_name)
          //  console.log(item.product_price)
            
            // state.cart.push(item);
           // state.cartCount++;
               
           let found = state.cart.find(product => product.id == item.id);
              
          if (found) {
               found.quantity ++;
               found.totalPrice = found.quantity * found.product_price;
              } else {
              state.cart.push(item);  
              set(item, 'quantity', 1);
              set(item, 'totalPrice', item.product_price);
              
             }
         state.cartCount++;
        },
        removeFromCart(state, item) {
            let index = state.cart.indexOf(item);
            if (index > -1) {
                let product = state.cart[index];
                 state.cartCount -= product.quantity;
                 state.cart.splice(index, 1);
            }
        }
      
    },
    saveCart(state) {
        window.localStorage.setItem('cart', JSON.stringify(state.cart));
        window.localStorage.setItem('cartCount', state.cartCount);
    },
    
    
})

export default store;
