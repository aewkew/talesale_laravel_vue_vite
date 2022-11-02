import { set } from 'lodash';
import { createStore } from 'vuex'

const store = createStore({
    state: {
        cart: [],
        cartCount: 0,
    },
    mutations: {
        addToCart(state, item){
            let found =state.cart.find(product=> product.id ==item.id)
            if (found) {
                found.quantity ++;
                found.product_price = found.quantity * found.product_price;
            }else {
                state.cart.push(item.id);
                Vue.set(item, 'quantity', 1);
                Vue.set(item, product_price)
            }
            state.cartCount++;
        }
       
    }
})

export default store;
