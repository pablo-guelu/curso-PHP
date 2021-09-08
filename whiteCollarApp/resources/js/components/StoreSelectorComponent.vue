<template>

<div class="input-group m-3">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">Select Store</label>
  </div>
  <select id="storeId" class="custom-select" @change="selectorChanged()" v-model="storeId">
    <option selected @change="selectorChanged()">Choose...</option>
    <option v-for="store in stores" :key="store.id" :value="store.id" @change="selectorChanged()"> {{store.name}} </option>
  </select>
</div>
        
               
</template>

<script>
    
    export default {
         data() {
            return {
                storeId: '1',
            }
        },
        props: {
            stores: {
                type: Object,
                required:true,
            },
            defaultStore: {
                type: String,
            }
        },
        methods: {
            selectorChanged () {
                let val = document.getElementById('storeId').value;
                // console.log(val);
                this.storeId = val;
                this.$emit('select-store', this.storeId);
                
            },
        },

        mounted () {

            // Getting the store id from the URL parameter passed from the selected a store on '/stores' to display its paints
            let thisUrl = window.location.href;
            let url = new URL(thisUrl);

            // if thre's a url parameter that indicates the stoe id, it assigns that value. Else, it shows the first store by default.
            let storeDefaultId = (url.searchParams.get('id')) ? url.searchParams.get('id') : this.storeId;
            
            console.log(storeDefaultId);

            // update the property storeID globally (in case the store id comes from a url param). 
            this.storeId = storeDefaultId;

            this.$emit('update:storeId', this.storeId);
        }
    }

</script>

<style>

</style>