<template>
        
                <!-- <div class="row"> -->
                    <div class="col-4 p-3">
                        <div class="card mb-4 shadow-sm">
                            <img v-bind:src="paint.image" :alt="paint.title">

                            <div class="card-body">
                                <p class="card-text">{{ paint.title }} by {{ paint.author }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a :href="viewURL">
                                            <button type="button" class="btn btn-sm btn-outline-secondary" disabled>View</button>
                                        </a>
                                        <a :href="editURL">
                                            <button type="button" class="btn btn-sm btn-outline-secondary" disabled>Edit</button>
                                        </a>
                                        <form @submit.prevent="erasePaint()">
                                            <button type="submit" class="btn btn-sm btn-outline-secondary">Delete</button>
                                        </form>
                                    </div>
                                    <small class="text-muted">Price: {{paint.price}} €</small>
                                </div>
                            </div>
                        </div>
                    </div>                     
                <!-- </div> -->
</template>

<script>
    
    export default {
        props: {
            paint: {
                type: Object,
                required: true
            },
            // store: {
            //     type: String,
            //     required: true,
            // }
        },

        data() {
            return {
            }
        },

        methods: {

            erasePaint() {

                let storeId = this.paint.store_id

                axios.delete('api/stores/' + this.paint.store_id + '/paints/' + this.paint.id).then((response) => {
                    console.log(response);
                }).catch(function (error) { console.log(error.response.data.errors) 
                });

                this.$emit('update-paints', storeId);
            }

        },

        computed: {
            viewURL () {
                return '/api/stores/' + this.paint.store_id + '/paints/' + this.paint.id;
            },
             editURL () {
                return '/api/stores/' + this.paint.store_id + '/paints/' + this.paint.id +'/edit'
            },
        },
    }

</script>

<style>

</style>