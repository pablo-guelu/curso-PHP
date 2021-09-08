<template>
        <form @submit.prevent="newStore()" class="my-4">
        <!-- @csrf -->
            <div class="col my-3">
                <label for="">Store Name</label>
                <input type="text" class="form-control" v-model="store.name">
            </div>
            <div class="col-3">
                <label for="">Store Capacity (25 minimum)</label>
                <input type="number" class="form-control" v-model="store.paints_capacity">
            </div>
            <div class="col-3">
                <button type="submit" class="btn btn-primary my-4">create</button>
            </div>
        </form>
</template>

<script>

    let defaultStore = {
        name: '',
        paints_capacity: 0,
    };
    
    export default {
        data () {
            return {
                store: Object.assign({}, defaultStore)
            }
        },
        props: {},
        methods: {
            newStore() {
                axios.post('api/stores/', this.store).then((response) => {
                    console.log(response);
                }).catch(function (error) { console.log(error.response.data.errors) 
                });

                console.log(this.store.name);

                this.$emit('update-stores');

                // this.$emit('add', this.paint);
                this.store = Object.assign({}, defaultStore);
            },       
        }
    }

</script>

<style>

</style>