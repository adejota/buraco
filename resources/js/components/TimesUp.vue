<template>
    <div id="times-up">
        
        <div class="title-container">
            <h1>O tempo acabou!</h1>
        </div>

        
        <div class="actions-container">
            <p>Deseja finalizar a partida agora?</p>

            <div class="buttons-container">
                <button @click="submitMatchFinished">Finalizar</button>
                <button @click="submitContinueRound">Continuar rodada</button>
            </div>
        </div>
        

    </div>
</template>

<script>
import axios from 'axios';

export default {

    name: "TimesUp",
    
    props: [
        'user', 'showTimesUp', 'match', 'matchScore', 'modal', 'showLoss', 'showWin', 'matchFinished', 'clock',
    ],

    data: function () {
        return {
            error: null,
        }
    },

    methods: {
        submitMatchFinished: function (){
            this.matchFinished.finished = true;
            this.match.current_time = this.clock.time;
            
            if ( this.match.total_score > this.match.opponent_total_score) {
                this.match.result = 'win';
                axios.patch('/api/matches/' + this.matchScore.match_id, this.match)
                    .then(response => {
                        return;
                    })
                    .catch(errors => {
                        this.errors = errors.response.data.errors;
                    })
                this.showTimesUp.show = false;
                this.showWin.show = true;
            } else if (this.match.total_score < this.match.opponent_total_score) {
                this.match.result = 'loss';
                axios.patch('/api/matches/' + this.matchScore.match_id, this.match)
                    .then(response => {
                        return;
                    })
                    .catch(errors => {
                        this.errors = errors.response.data.errors;
                    })
                this.showLoss.show = true;
                this.showTimesUp.show = false;
            } else {
                this.match.result = 'tie';
                axios.patch('/api/matches/' + this.matchScore.match_id, this.match)
                    .then(response => {
                        return;
                    })
                    .catch(errors => {
                        this.errors = errors.response.data.errors;
                    })
                this.modal.show = false;
            }
        },

        submitContinueRound: function () {
            this.match.current_time = this.clock.time;

            this.modal.show = false;
            this.showTimesUp.show = false;
        },
    },
}         
</script>

<style scoped>
#times-up {   
    width: 100%;
    height: 100%;

    display: grid;
    grid-template-columns: repeat(8, 1fr);
    grid-template-rows: repeat(8, 1fr);

}

.title-container {
    grid-column-start: 2;
    grid-column-end: 8;

    grid-row-start: 4;
    grid-row-end: 5;

    display: flex;
    justify-content: center;
    align-items: center;
}

h1 {
    font-size: 6rem;
    color: white;
}

.actions-container {
    grid-column-start: 2;
    grid-column-end: 8;

    grid-row-start: 6;
    grid-row-end: 8;

    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.buttons-container {
    width: 80%;

    display: flex;
    justify-content: space-between;
    align-items: center;

    margin-top: 2rem;
}

p {
    color: white;
    font-size: 2rem;
}

button {
    background-color: white;
    color: var(--primary-color);

    width: 40%;

    margin: 0;
}
</style>