<template>
    <div id="loss-form" class="w-100 h-100 d-flex flex-column justify-content-center align-items-center p-4">
        
        <div class="d-flex justify-content-between align-items-center">
            <h1> {{matchScore.round_total_score}} </h1>
        </div>

        <div class="w-100 mt-5">

            <svg class="back-button" @click="goBack" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" x="0" y="0" viewBox="0 0 447.243 447.243" style="enable-background:new 0 0 512 512" xml:space="preserve"><g>
                <g xmlns="http://www.w3.org/2000/svg">
                    <g>
                        <path d="M420.361,192.229c-1.83-0.297-3.682-0.434-5.535-0.41H99.305l6.88-3.2c6.725-3.183,12.843-7.515,18.08-12.8l88.48-88.48    c11.653-11.124,13.611-29.019,4.64-42.4c-10.441-14.259-30.464-17.355-44.724-6.914c-1.152,0.844-2.247,1.764-3.276,2.754    l-160,160C-3.119,213.269-3.13,233.53,9.36,246.034c0.008,0.008,0.017,0.017,0.025,0.025l160,160    c12.514,12.479,32.775,12.451,45.255-0.063c0.982-0.985,1.899-2.033,2.745-3.137c8.971-13.381,7.013-31.276-4.64-42.4    l-88.32-88.64c-4.695-4.7-10.093-8.641-16-11.68l-9.6-4.32h314.24c16.347,0.607,30.689-10.812,33.76-26.88    C449.654,211.494,437.806,195.059,420.361,192.229z" fill="#ffffff" data-original="#000000" style="" class=""/>
                    </g>
                </g>
                <g xmlns="http://www.w3.org/2000/svg">
                </g>
                <g xmlns="http://www.w3.org/2000/svg">
                </g>
                <g xmlns="http://www.w3.org/2000/svg">
                </g>
                <g xmlns="http://www.w3.org/2000/svg">
                </g>
                <g xmlns="http://www.w3.org/2000/svg">
                </g>
                <g xmlns="http://www.w3.org/2000/svg">
                </g>
                <g xmlns="http://www.w3.org/2000/svg">
                </g>
                <g xmlns="http://www.w3.org/2000/svg">
                </g>
                <g xmlns="http://www.w3.org/2000/svg">
                </g>
                <g xmlns="http://www.w3.org/2000/svg">
                </g>
                <g xmlns="http://www.w3.org/2000/svg">
                </g>
                <g xmlns="http://www.w3.org/2000/svg">
                </g>
                <g xmlns="http://www.w3.org/2000/svg">
                </g>
                <g xmlns="http://www.w3.org/2000/svg">
                </g>
                <g xmlns="http://www.w3.org/2000/svg"> </g> </g>
            </svg>

            <label for="opponent_score">Quantos pontos seu adversário fez?</label>
            <input type="number" name="opponent_score" v-model.number="matchScore.opponent_score">

            <div class="button-container">
                <button @click="submit">Finalizar</button>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import {eventBus} from "../app"

export default {
    name: "OpponentForm",
    
    props: [
        'user', 'match', 'matchScore', 'matchScoresArray', 'modal', 'showLossForm', 'showOpponentForm', 'showWinForm', 'showLoss', 'showWin', 'matchFinished', 'clock',
    ],

    data: function () {
        return {
            errors: null,

            updateMatch: {
                'name': this.user.name,
                'opponent_id': this.match.opponent_id,
                'max_points': this.match.max_points,
                'time_limit': this.match.time_limit,
                'current_time': this.clock.time,
                'current_round': this.match.current_round + 1,
                'total_score': this.match.total_score + this.matchScore.round_total_score,
                'opponent_total_score': '',
                'result': this.match.result,
            },
        }
    },

    methods: {
        submit: function () {

            if ( this.matchScore.opponent_score.length < 1) {
                return
            } else {
                this.matchScore.time = this.clock.time;
                axios.post('/api/matchscores', this.matchScore)
                    .then(response => {

                        this.updateMatch.opponent_total_score = response.data.data.opponent_score + this.match.opponent_total_score;

                        return axios.patch('/api/matches/' + this.matchScore.match_id, this.updateMatch)
                    })
                    .then(response => {
                        this.match.total_score = this.updateMatch.total_score;
                        this.match.opponent_total_score = this.updateMatch.opponent_total_score;

                        this.matchScoresArray.unshift({
                                data: {
                                    'round_total_score': this.matchScore.round_total_score,
                                    'opponent_score': this.matchScore.opponent_score,
                                    'time': this.matchScore.time,
                                }
                            })
                        
                        /* --- win case --- */
                        if ( this.match.total_score >= this.match.opponent_total_score && this.match.total_score >= this.match.max_points) {
                            this.showOpponentForm.show = false;
                            this.showWin.show = true;

                            this.matchFinished.finished = true;

                            this.match.current_round = this.match.current_round;
                            this.updateMatch.current_round = this.match.current_round;

                            this.updateMatch.result = 'win';
                            this.match.result = 'win';

                            axios.patch('/api/matches/' + this.matchScore.match_id, this.updateMatch)
                                .then(response => {
                                    return;
                                })
                                .catch(errors => {
                                    this.errors = errors.response.data.errors;
                                })

                        /* --- loss case --- */
                        } else if ( this.match.opponent_total_score >= this.match.total_score && this.match.opponent_total_score >= this.match.max_points) {
                            this.showOpponentForm.show = false;
                            this.showLoss.show = true;

                            this.matchFinished.finished = true;

                            this.match.current_round = this.match.current_round;
                            this.updateMatch.current_round = this.match.current_round;

                            this.updateMatch.result = 'loss';
                            this.match.result = 'loss';
                            axios.patch('/api/matches/' + this.matchScore.match_id, this.updateMatch)
                                .then(response => {
                                    return;
                                })
                                .catch(errors => {
                                    this.errors = errors.response.data.errors;
                                })

                        /* --- still playing case --- */
                        } else {
                            this.match.result = 'playing';
                            this.match.current_round = this.updateMatch.current_round;

                            this.matchScore.round_total_score = 0;
                            this.matchScore.negative_score = '';
                            this.matchScore.additional_score = '';
                            this.matchScore.cards_score = '';
                            this.matchScore.opponent_score = '';
                            this.matchScore.pot = '';
                            this.matchScore.got = '';
                            this.showOpponentForm.show = false;
                            this.modal.show = false;

                            eventBus.$emit('fireStartClock');
                        }
                        
                    })
                    .catch(errors => {
                        this.errors = errors.response.data.errors;
                    })
            }

            
        },

        goBack: function () {
            
            if ( this.matchScore.pot == 'no') {
                this.matchScore.round_total_score = -100;
            } else {
                this.matchScore.round_total_score = 0;
            }
            
            this.showOpponentForm.show = false;

            if ( this.matchScore.got == 'no' ) {
                this.showLossForm.show = true;
            } else {
                this.showWinForm.show = true;
                this.matchScore.round_total_score = 100;
            }
        },

        
    },
}         
</script>

<style scoped>
label {
    color: white;
    font-size: 2rem !important;
}

input {
    border-bottom: solid 1px var(--white-color);
    background: var(--primary-color);
    color: var(--white-color);
    width: 100%;

    margin-bottom: 3rem;
}

input.error-field {
    border-bottom: solid 1px tomato;
    margin-bottom: 1rem;
}

h1 {
    font-size: 6rem;
    color: white;
}

button {
    background-color: white;
    color: var(--primary-color);

    width: 100%;
    margin: 0;

    outline: none;
}

.back-button {
    color: white;
    width: 2rem;

    position: absolute;
    top: 2.6rem;
    right: 3rem;

    cursor: pointer;
}

.error-message {
    font-size: 1.4rem;

    margin-bottom: 2rem;

    color: #fc9da2;
}
</style>