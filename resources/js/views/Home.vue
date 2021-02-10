<template>
    <div id="home" ref="home" class="p-4">

        <div v-if="loading">Carregando...</div>

        <div v-else class="center-page">

            <SelectAvatar v-bind:user="user" id="select-avatar-container"></SelectAvatar>

            <form @submit.prevent="submitForm" id="new-match">

                <div>
                    <div>
                        <label class="form-label fs-3 m-0" for="opponent_name">Nome do adversário</label>
                        <p>Mantenha um padrão nos nomes para criar um histórico de partidas</p>
                        <input type="text" name="opponent_name" class="fs-1 mt-3 form-control" :class="errorClassObject('name')" v-model="form.name" v-on:click="clearErrors('name')" required>
                        <p class="error-message" v-text="errorMessage('name')">Error Message</p>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label fs-3 m-0" for="max_points">Pontuação limite</label>
                        <input type="number" name="max_points" class="fs-1 mt-3 form-control" :class="errorClassObject('max_points')" v-model="form.max_points" v-on:click="clearErrors('max_points')" required>
                        <p class="error-message" v-text="errorMessage('max_points')">Error Message</p>
                    </div>

                    <!-- <div class="container">
                        <label for="time_limit">Tempo limite <span> (hh/mm)</span></label>
                        <p>Este campo é opcional</p>
                        <input type="time" name="time_limit" v-model="form.time_limit">
                    </div> -->
                   
                </div>

                <div class="d-flex justify-content-center mb-4 mt-2">
                    <button class="btn w-100 rounded-pill" type="submit">Nova partida</button>
                </div>
            </form>
        
        </div>

        <div v-if="!loading" id="logout" class="p-4">
            <a href="logout-manual" class="d-flex justify-content-end align-items-center text-decoration-none">

                <svg style="fill: #6951AE;" xmlns="http://www.w3.org/2000/svg" width="28.921" height="30.849" viewBox="0 0 28.921 30.849">
                    <path id="Icon_metro-exit" data-name="Icon metro-exit" d="M25.707,21.208V17.352h-9.64V13.5h9.64V9.64l5.784,5.784ZM23.779,19.28v7.712h-9.64v5.784L2.571,26.992V1.928H23.779v9.64H21.851V3.856H6.427l7.712,3.856V25.064h7.712V19.28Z" transform="translate(-2.571 -1.928)"/>
                </svg>

                <p style="color: #6951AE; margin: 0 0 0 .4rem" class="fs-2">Sair</p>
            </a>
        </div>

    </div>
</template>

<script>
import axios from 'axios';
import mixin from '../mixin.js'
import SelectAvatar from '../components/SelectAvatar'

export default {
    name: 'Home',

    components: { SelectAvatar },

    props: [
        'user',
    ],

    mixins: [mixin],

    data: function () {
        return {
            form: {
                'name': '',
                'opponent_id': '',
                'max_points': '',
                'time_limit': null,
                'current_time': 0,
                'current_round': 1,
                'total_score': 0,
                'opponent_total_score': 0,
                'result': 'playing',
            },

            matches: null,

            profile_infos: {
                'wins': 0,
                'losses': 0,
            },

            errors: null,

            loading: true,

            windowHeight: null,
        }
    },

    created() {
        this.windowHeight = window.innerHeight
    },

    mounted() {
        axios.get('/api/matches')
            .then(response => {

                this.displayMessage();

                this.matches = response.data.data;

                for (let i = 0; i < this.matches.length; i++) {

                    if (this.matches[i].data.result == 'win') {
                        this.profile_infos.wins += 1;
                    } else if (this.matches[i].data.result == 'loss') {
                        this.profile_infos.losses += 1;
                    }
                }

                this.$nextTick(function() {
                    this.$refs.home.style.height = this.windowHeight + "px"
                })

                this.loading = false;
            })
            .catch(errors => {
                this.errors = errors.response.data.errors;
                this.loading = false;
            });


    },

    methods: {
        submitForm: function () {

            axios.post('/api/opponents', this.form)
                .then(response=> {

                    this.form.opponent_id = response.data.data.id;

                    return axios.post('/api/matches', this.form)                        
                })
                .then(response => {
                    this.$router.push(response.data.links.self);
                })
                .catch(errors => {
                    this.errors = errors.response.data.errors;
                })
        },

        errorMessage: function (field) {
            if (this.errors && this.errors[field] && this.errors[field].length > 0 ) {
                return this.errors[field][0];
            }
        },

        clearErrors: function (field) {
            if (this.errors && this.errors[field] && this.errors[field].length > 0 ) {
                return this.errors[field] = null;
            }
        },

        errorClassObject: function (field) {
            return {
                'error-field': this.errors && this.errors[field] && this.errors[field].length > 0
            }
        },

    },
    
}

</script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap');

* {
    font-family: 'Roboto', sans-serif;
    box-sizing: border-box;
    margin: 0;

    font-size: 16px;
}

:root {
    --primary-color: #6951AE;
    --red-color: #FF5B64;
    --dark-color: #190845;
    --green-color: #5ead97;
    --white-color: white;
}

html {
    font-size: 62.5%; /* 1rem = 10px */
}

body {
    background-color: white;
}

#home {
    position: relative;
}

.form-label {
    color: var(--primary-color)
}

button[type=submit] {
    background-color: var(--primary-color);
    color: white;
    font-size: 16px;
}

/* error field  */
#new-match input.error-field {
    border-bottom: solid 1px tomato;
}

input {
    border: none;
    border-bottom: solid 1px var(--dark-color);
    outline: none;
    font-size: 1.8rem;
    line-height: 2.8rem;

    margin: 1.6rem 0 .8rem;

    width: 100%;
}

#new-match .container {
    margin-bottom: 2rem;
}

#new-match .inputs-container p.error-message {
    color: tomato;
}

label {
    font-size: 2.6rem;
    font-weight: bold;
}

button {
    background-color: var(--primary-color);
    color: var(--white-color);
    
    border: none;
    border-radius: .8rem;
    outline: none;
    height: 4.6rem;

    font-size: 1.8rem;
    font-weight: bold;

    margin: 3rem 1rem;

    cursor: pointer;
}

#logout {
    position: absolute;
    bottom: 0;
    right: 0;
    z-index: 0;
}

@media (min-width: 961px) {
    .center-page {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        height: 100%;
    }

    #select-avatar-container {
        width: 50% !important;
        padding: 8rem !important;
        margin: 0 !important;
    }

    #new-match {
        width: 50% !important;
        padding: 8rem 8rem 8rem 0 !important;
        margin: 0 !important;
    }

    #logout {
        position: absolute;
        bottom: 16px;
        right: 32px;
        z-index: 0;
    }
}
</style>