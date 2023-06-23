import { createApp } from 'vue';
import axios from 'axios';
import qs from 'qs';

const app = createApp({
    data() {
        return {
            weight: 0.0,
            carrier: '',
            price: null
        };
    },
    methods: {
        calculatePrice() {
            const requestData = {
                weight: this.weight,
                carrier: this.carrier
            };

            axios.post('/api/shipping', qs.stringify(requestData), {
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            })
                .then((response) => {
                    this.price = response.data.price;
                })
                .catch((error) => {
                    console.error(error);
                });
        }
    }
});

app.mount('#app');
