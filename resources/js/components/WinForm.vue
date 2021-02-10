<template>
    <div id="win-form" class="w-100 h-100 d-flex flex-column justify-content-center align-items-center p-4">
        
        <div class="d-flex justify-content-between align-items-center">
            <h1> {{matchScore.round_total_score}} </h1>
        </div>

        <div class="w-100 mt-3 d-flex flex-column justify-content-between align-items-start">

            <svg class="close-button" @click="close" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" x="0" y="0" viewBox="0 0 365.696 365.696" style="enable-background:new 0 0 512 512" xml:space="preserve"><g><path xmlns="http://www.w3.org/2000/svg" d="m243.1875 182.859375 113.132812-113.132813c12.5-12.5 12.5-32.765624 0-45.246093l-15.082031-15.082031c-12.503906-12.503907-32.769531-12.503907-45.25 0l-113.128906 113.128906-113.132813-113.152344c-12.5-12.5-32.765624-12.5-45.246093 0l-15.105469 15.082031c-12.5 12.503907-12.5 32.769531 0 45.25l113.152344 113.152344-113.128906 113.128906c-12.503907 12.503907-12.503907 32.769531 0 45.25l15.082031 15.082031c12.5 12.5 32.765625 12.5 45.246093 0l113.132813-113.132812 113.128906 113.132812c12.503907 12.5 32.769531 12.5 45.25 0l15.082031-15.082031c12.5-12.503906 12.5-32.769531 0-45.25zm0 0" fill="#ffffff" data-original="#000000" style="" class=""/></g></svg>

            <label for="additional_score">Pontos de saída</label>
            <input type="number" v-model.number="matchScore.additional_score">

            <label for="cards_score">Pontos das cartas</label>
            <input type="number" v-model.number="matchScore.cards_score">

            <div class="w-100 mt-2 d-flex justify-content-center align-items-center">
                <button @click="submit">Somar</button>
            </div>
        </div>
    </div>
</template>

<script>
import {eventBus} from "../app"

export default {
    name: "WinForm",
    
    props: [
        'matchScore', 'match', 'matchScoresArray', 'modal', 'showWinForm', 'showOpponentForm', 'clock',
    ],

    mounted() {
        this.$nextTick(() => {
            window.addEventListener('resize', this.onResize);
        })
    },

    beforeDestroy() { 
        window.removeEventListener('resize', this.onResize); 
    },

    data: function () {
        return {
            windowHeight: null,
        }
    },

    methods: {
        submit: function () {

            if ( this.additional_score == '' ) {
                return
            } else if ( this.cards_score == '' ) {
                return
            } else {
                this.matchScore.pot = 'yes';
                this.matchScore.got = 'yes';
                this.matchScore.negative_score = 0;
                this.showWinForm.show = false;
                this.matchScore.round_total_score += this.matchScore.additional_score + this.matchScore.cards_score;
                this.showOpponentForm.show = true;
            }

        },

        close: function () {
            this.modal.show = false;
            this.showWinForm.show = false;

            this.matchScore.round_total_score = 0;
            this.matchScore.negative_score = '';
            this.matchScore.additional_score = '';
            this.matchScore.cards_score = '';
            this.matchScore.opponent_score = '';
            this.matchScore.pot = '';
            this.matchScore.got = '';

            eventBus.$emit('fireStartClock');
        },

        onResize() {
            this.windowHeight = window.innerHeight
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

.close-button {
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