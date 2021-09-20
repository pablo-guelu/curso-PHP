<template>
  <div class="container-fluid">

      <div class="row">
            
            <main role="main" class="col-md-8 ml-sm-auto pt-3 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                    <h1 class="h2">Roll the Dices</h1>
                </div>

                <div class="my-4" id="" height="380px">
                    <dices-component @dices-rolled="addPlay" ></dices-component>
                </div>

                <h2>Ranking</h2>
                <ranking-component ref="ranking"></ranking-component>

                <div class="container my-5 text-center">
                    <button @click="deleteGame" type="button" class="btn btn-danger">Delete Game</button>
                </div>
                

            </main>

            <div id="statistics-frame" class="col-md-4 ml-sm-auto pt-3 px-4">
                <h1 class="h2 pb-2">Statistics {{username}}</h1>
                <statistics-component ref="statistics"></statistics-component>
            </div>

      </div>
    </div>
</template>

<script>
import DicesComponent from './DicesComponent.vue'
import StatisticsComponent from './StatisticsComponent.vue';
import RankingComponent from './RankingComponent.vue';

export default {

    data () {
        return {
            username: '',
            userId: '',
            token: '',
            isAdmin: '',
        };
    },

    components: { 

        DicesComponent,
        StatisticsComponent,
        RankingComponent
    },

    mounted() {

        this.username = localStorage.getItem('username');
        this.userId = localStorage.getItem('userid');
        this.token = localStorage.getItem('token');
        this.isAdmin = localStorage.getItem('isAdmin');

         axios.defaults.headers.common = {
                Authorization: 'Bearer ' + localStorage.getItem('token')
            } 
    },

    methods: {

        addPlay() {
            
            let dice1 = document.querySelector('#die-1').dataset.roll;
            let dice2 = document.querySelector('#die-2').dataset.roll;

            if(this.token) {

                axios.defaults.headers.common = {
                    Authorization: 'Bearer ' + this.token
                }
                axios.post('api/players/' + this.userId + '/games', {dice1, dice2}).then( response => {
                    console.log(response);
                });

                // Using template refs to reload the statistics and ranking components:
                // https://v3.vuejs.org/guide/component-template-refs.html
                this.$refs.statistics.reload();
                this.$refs.ranking.reload();

            } else {

                axios.post('api/players/anonymous/games', {dice1, dice2}).then( response => {
                    console.log(response);
                });

                this.$refs.statistics.reloadAnonymous();
            }            
            
        },

        deleteGame () {

            if(this.token) {

                axios.defaults.headers.common = {
                    Authorization: 'Bearer ' + this.token
                }
                axios.delete('api/players/' + this.userId + '/games').then( response => {
                    console.log(response);
                });

                // Using template refs to reload the statistics and ranking components:
                // https://v3.vuejs.org/guide/component-template-refs.html
                this.$refs.statistics.reload();
                this.$refs.ranking.reload();

            } else {
                alert('You are an anonymous player, you need to register');
            }
            
        }
    }

}
</script>

<style scoped>

    #statistics-frame {
        border-right: 1px solid rgb(187, 187, 187);
    }

</style>