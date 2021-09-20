<template>

    <div>
        <table class="table">
            <thead>
                <tr>
                <th class="text-center" scope="col">Dice 1</th>
                <th class="text-center" scope="col">Dice 2</th>
                <th class="text-center" scope="col">WINS</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="game in playerGames" :key="game.id"> 
                    <td class="text-center">{{ game.dice1 }}</td>
                    <td class="text-center">{{ game.dice2 }}</td>
                    <td class="text-center">{{ game.seven }}</td>
                </tr>
            </tbody>
        </table>

    </div>

    
    
</template>

<script>

    export default {

        data() {
            return {
                playerGames: [],
                userId: '',
                token: '',
            }
        },

        mounted() {

            this.userId = localStorage.getItem('userid');
            this.token = localStorage.getItem('token');

            if(this.token) {
                    axios.defaults.headers.common = {
                    Authorization: 'Bearer ' + localStorage.getItem('token')
                } 
                axios.get('/api/players/' + this.userId + '/games').then(response => {
                    this.playerGames = response.data.plays;
                    console.log(this.playerGames);
                });

            } else {
            
                axios.get('/api/players/anonymous/games').then(response => {
                    this.playerGames = response.data.plays;
                    console.log(this.playerGames);
                });
            }
            
        },

        methods: {
            reload () {
                axios.get('/api/players/' + this.userId + '/games').then(response => {
                    this.playerGames = response.data.plays;
                    console.log(this.playerGames);
                });
            },

            reloadAnonymous () {
                axios.get('/api/players/anonymous/games').then(response => {
                    this.playerGames = response.data.plays;
                    console.log(this.playerGames);
                });
            },

        }
        
    }

</script>

<style scoped>

</style>