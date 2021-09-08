<template>

    <div class="container">
        
        <form @submit.prevent="newPaint()" class="my-4">
        <!-- @csrf -->
            <div class="col-3">
                <label for="inputDate">Entry Date</label>
                <input type="date" class="form-control" aria-label="job" v-model="paint.entry">
            </div>
            <div class="row my-4 col-12">
                <div class="col my-3">
                    <label for="">Paint Name</label>
                    <input type="text" class="form-control" v-model="paint.title">
                </div>
                <div class="col my-3">
                    <label for="">Author</label>
                    <input type="text" class="form-control" v-model="paint.author">
                </div>
            </div>
            <div class="col-3">
                <label for="">Price</label>
                <input type="number" class="form-control" v-model="paint.price">
            </div>
            <div class="col-12">
                <label for="">Image</label>
                <input type="url" class="form-control" v-model="paint.image">
            </div>
            <div class="col-3">
            <button type="submit" class="btn btn-primary my-4">register</button>
            </div>
        </form>

        <form @submit.prevent="deleteAllPaints">
            <button type="submit" class="btn btn-danger">Delete all Paints</button>
            <small class="mx-2">WARNING: This button will delete all the paints from the selected store (Admin only)</small>
        </form>

    </div>

</template>

<script>

    let defaultPaint = {
        title: '',
        author: '',
        entry: '',
        image: '',
        price: 0
    };
    
    export default {
        data () {
            return {
                paint: Object.assign({}, defaultPaint)
            }
        },
        props: {
            currentStore: String,
        },
        methods: {
            newPaint() {


                axios.post('api/stores/' + this.currentStore + '/paints', this.paint).then((response) => {
                    console.log(response);
                }).catch(function (error) { console.log(error.response.data.errors) 
                });

                console.log(this.paint.title);

                // emit event to update the paints on the main component
                this.$emit('update-paints', this.currentStore);

                // cleaning the form
                this.paint = Object.assign({}, defaultPaint);

            },
            
            deleteAllPaints () {
                axios.post('api/stores/' + this.currentStore + '/paints/delete').then((response) => {
                    console.log(response);
                }).catch(function (error) { console.log(error.response.data.errors) 
                });

                // emit event to update the paints on the main component
                this.$emit('update-paints', this.currentStore);
            },
        }
    }

</script>

<style>

</style>