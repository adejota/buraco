<template>
    <div id="pot-form" class="w-100 h-100 d-flex flex-column justify-content-center align-items-center p-4">
        
        <div class="d-flex justify-content-between align-items-center">
            <h1> {{matchScore.round_total_score}} </h1>
        </div>

        <div class="w-100 mt-5">

            <svg class="close-button" @click="close" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" x="0" y="0" viewBox="0 0 365.696 365.696" style="enable-background:new 0 0 512 512" xml:space="preserve"><g><path xmlns="http://www.w3.org/2000/svg" d="m243.1875 182.859375 113.132812-113.132813c12.5-12.5 12.5-32.765624 0-45.246093l-15.082031-15.082031c-12.503906-12.503907-32.769531-12.503907-45.25 0l-113.128906 113.128906-113.132813-113.152344c-12.5-12.5-32.765624-12.5-45.246093 0l-15.105469 15.082031c-12.5 12.503907-12.5 32.769531 0 45.25l113.152344 113.152344-113.128906 113.128906c-12.503907 12.503907-12.503907 32.769531 0 45.25l15.082031 15.082031c12.5 12.5 32.765625 12.5 45.246093 0l113.132813-113.132812 113.128906 113.132812c12.503907 12.5 32.769531 12.5 45.25 0l15.082031-15.082031c12.5-12.503906 12.5-32.769531 0-45.25zm0 0" fill="#ffffff" data-original="#000000" style="" class=""/></g></svg>


            <label class="mb-3">Pegou o morto?</label>
            <div class="w-100 d-flex justify-content-between align-items-center">
                <button @click="submitNo">Não</button>
                <button @click="submitYes">Sim</button>
            </div>
        </div>
    </div>
</template>

<script>
import {eventBus} from "../app"

export default {
    name: "PotForm",
    
    props: [
        'matchScore', 'matchScoresArray', 'match', 'modal', 'showPotForm', 'showLossForm',
    ],

    components: { },

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
            windowHeight: window.innerHeight,
        }
    },

    methods: {
        submitNo: function () {
            this.matchScore.pot = 'no';
            this.matchScore.got = 'no';
            this.showPotForm.show = false;
            this.showLossForm.show = true;
            this.matchScore.round_total_score = -100;
        },

        submitYes: function () {
            this.matchScore.pot = 'yes';
            this.matchScore.got = 'no';
            this.showPotForm.show = false;
            this.showLossForm.show = true;
            this.matchScore.round_total_score = 0;
        },

        close: function () {
            this.modal.show = false;
            this.showPotForm.show = false;

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

h1 {
    font-size: 6rem;
    color: white;
}

button {
    background-color: white;
    color: var(--primary-color);

    width: 45%;
    margin: 0;
}

.close-button {
    color: white;
    width: 2rem;

    position: absolute;
    top: 2.6rem;
    right: 3rem;

    cursor: pointer;
}
</style>