const App = {      
  data() {
    return {
      cart: new Map(),
      favourite: new Set(),
      cart_size: 0,
      favourite_size: 0
    }
  },
  methods: {
    addToCart(id) {
      let item = this.cart.get(id);
      this.cart.set(id, (item === undefined) ? 1 : item + 1);
      localStorage.cart = JSON.stringify(Array.from(this.cart.entries()));
      localStorage.cart_size = ++this.cart_size;
    }, 

    addToFavourite(id) {
      if (this.favourite.has(id)) {
        alert("Цей товар вже в обраному");
        return;
      }

      this.favourite.add(id);
      localStorage.favourite = JSON.stringify(Array.from(this.favourite));;
      localStorage.favourite_size = ++this.favourite_size;
    }
  },
  mounted() {
    if (localStorage.cart) {
      this.cart = new Map(JSON.parse(localStorage.cart));
    }
    if (localStorage.favourite) {
      this.favourite = new Set(JSON.parse(localStorage.favourite));
    }
    if (localStorage.cart_size) {
      this.cart_size = localStorage.cart_size;
    }
    if (localStorage.favourite_size) {
      this.favourite_size = localStorage.favourite_size;
    }
  }
}

Vue.createApp(App).mount('#app');