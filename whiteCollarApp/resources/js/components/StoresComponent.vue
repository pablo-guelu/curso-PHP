<template>
	    
    <div role="main">

        <section class="jumbotron">
            <h1>WhiteCollar Stores</h1>
            <h4>(create new store)</h4>
            <store-form-component
            @update-stores="getStores">
            </store-form-component>
        </section>

        <div class="row album p-5 bg-light">
            <store-card-component v-for="store in stores" 
                :store="store" 
                :key="store.id"
                @update-stores="getStores">
            </store-card-component>
         </div>
        
    </div>

</template>

<script>

    import StoreCardComponent from './StoreCardComponent';
    import StoreFormComponent from './StoreFormComponent';

    export default {
        components: {
            StoreCardComponent,
            StoreFormComponent,
        },
        data () {
            return {
                stores: [],
            }
        },

        mounted () {
            axios.get('/api/stores').then( (response) => {
                this.stores = response.data;
            });
        },

        methods: {
            getStores () {
                axios.get('/api/stores').then( (response) => {
                this.stores = response.data;
            });
            }
        },
    }

</script>

<style>

</style>