

<template>
	    
    <div role="main">

        <div class="container">
            <!-- <store-selector-component :stores="stores" @change="getPaints"></store-selector-component> -->
            <store-selector-component  :defaultStore="selectedStore"  :stores="stores" @select-store="getPaints" v-on:update:storeId="getPaints"></store-selector-component>
        </div>

        <section class="jumbotron">
            <h1>Register Paint</h1>            
            <form-component :currentStore="selectedStore"
            @update-paints="getPaints">
            </form-component>
        </section>

        <div class="row album p-5 bg-light">
            <card-component v-for="paint in paints"
            :paint="paint"
            :key="paint.id"
            @update-paints="getPaints">
            </card-component>
        </div>
        
    </div>

</template>

<script>

    import CardComponent from './CardComponent';
    import FormComponent from './FormComponent';
    import StoreSelectorComponent from './StoreSelectorComponent';

    export default {
        components: {
            CardComponent,
            FormComponent,
            StoreSelectorComponent
        },
        data () {
            return {
                paints: [],
                stores: [],
                selectedStore: '1',
            }
        },
        methods: {

            getPaints(storeID) {
                console.log(storeID);
                this.selectedStore = storeID;
                let paintsURL = '/api/stores/'+ storeID + '/paints';
                axios.get(paintsURL).then( (response) => {
                this.paints = response.data;
            });

            },

            addPaint() {
                
            },

        },

        mounted () {
            axios.get('/api/stores').then( (response) => {
                this.stores = response.data;
            });
        },
    }


</script>

<style>

</style>