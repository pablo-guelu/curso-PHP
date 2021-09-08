<template>
        
    <!-- <div class="row"> -->
        <div class="col-4 p-3">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <h4 class="card-text">Store name: {{ store.name }}</h4>
                    <p class="card-text">Store capacity: {{ store.paints_capacity }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a :href="paintRef">
                                <button type="button" class="btn btn-sm btn-outline-secondary">View Paints</button>
                            </a>
                            <a :href="editURL">
                                <button type="button" class="btn btn-sm btn-outline-secondary" disabled>Edit</button>
                            </a>
                            <form @submit.prevent="deleteStore()">
                                <button type="submit" class="btn btn-sm btn-outline-secondary">Delete</button>
                            </form>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>                     
    <!-- </div> -->
</template>

<script>
    
    export default {

        props: {
            store: {
                type: Object,
                required: true
            }
        },

        data() {
            return {
            }
        },

        computed: {
            paintRef () {
                return '/paints?id=' + this.store.id
            },

            editURL () {
                return '/api/stores/' + this.store.id
            },
        },

        methods: {

            deleteStore() {

                // let storeId = this.store.id

                axios.delete('api/stores/' + this.store.id).then((response) => {
                    console.log(response);
                }).catch(function (error) { console.log(error.response.data.errors) 
                });

                this.$emit('update-stores');
            
            },
        },
    }

</script>

<style>

</style>