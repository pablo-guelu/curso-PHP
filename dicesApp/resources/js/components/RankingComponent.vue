<template>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Player</th>
                <th class="text-center">Wins Ratio</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(player, index) in rankingPlayers" :key="index.id">
                <td>
                    <strong> {{ parseInt(index) + 1 }} </strong> 
                </td>
                <td>
                    {{ player.name }}
                </td>
                <td class="text-center">
                    {{ player.winning_percentage }} %
                </td>
            
            </tr>          
        </tbody>
        </table>
    </div>
  
</template>

<script>
export default {

        data() {
            return {
                rankingPlayers: [],
            }
        },

        mounted() {
            // axios.defaults.headers.common = {
            //     Authorization: 'Bearer ' + localStorage.getItem('token')
            // } 
            axios.get('/api/players/ranking').then(response => {
                this.rankingPlayers = response.data.ranking;

                console.log(response);

                console.log(this.rankingPlayers);
            });
            
        },

        methods: {
            reload () {
                axios.get('/api/players/ranking').then(response => {
                    this.rankingPlayers = response.data.ranking;
                });
            }
        }


        
    }
</script>

<style>

</style>