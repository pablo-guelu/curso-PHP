<template>


    <div>
        <header>
            <div>
                <!-- No surplus words or unnecessary actions. - Marcus Aurelius -->
                <nav class="navbar navbar-expand navbar-dark bg-dark">
                    <a class="navbar-brand" href="#"><router-link :to="{name: 'dashboard'}">DicesApp</router-link></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div v-if="!isAuthenticated" class="collapse navbar-collapse" id="navbarsExample02">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <router-link
                                class="nav-link"
                                data-toggle="collapse"
                                :to="{name: 'login'}">
                                Login
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link
                                class="nav-link"
                                data-toggle="collapse"
                                :to="{name: 'register'}">
                                Register
                                </router-link>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            <li>
                                <h4 style="color:white"> Anonymous Player </h4>
                            </li>
                        </ul>
                    </div>

                    <div v-else class="collapse navbar-collapse" id="navbarsExample02">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" @click="logout"> Logout </a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            <li>
                                <h4 style="color:white"> Player: {{ username }} </h4>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>

        <div>
            <router-view></router-view>
        </div>

    </div>
    

</template>

<script>
    export default {
        data () {
            return {
                isAuthenticated: false,
                username: '',
                userId: ''
            }
        },

        watch: {
            $route() {
                //token
                if (localStorage.getItem('token')) {
                    this.isAuthenticated = true;
                } else {
                    this.isAuthenticated = false;
                    // this.$router.push({ name: 'login'});
                }

                //username
                if (localStorage.getItem('username')) {
                    this.username = localStorage.getItem('username')
                } else {
                    this.username = ''
                }
            }
        },

        methods: {
            logout () {

                axios.defaults.headers.common = {
                    Authorization: 'Bearer ' + localStorage.getItem('token')
                };

                axios.post('/api/logout').then(response => {
                    localStorage.removeItem('token');
                    localStorage.removeItem('username');
                    localStorage.removeItem('user');
                    this.$router.push({name: 'login'});
                });
            }
        }

    }
</script>

<style>

</style>