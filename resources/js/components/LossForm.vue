<template>
    <div id="loss-form" class="w-100 h-100 d-flex flex-column justify-content-center align-items-center p-4">
        
        <div class="d-flex justify-content-between align-items-center">
            <h1> {{matchScore.round_total_score}} </h1>
        </div>

        <div class="w-100 mt-3 d-flex flex-column justify-content-between align-items-start">

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

            <label for="negative_score">Pontos negativos</label>
            <input type="number" :class="errorClassObject('negative_score')" v-on:click="clearErrors('name')" v-model.number="matchScore.negative_score" required>
            <p class="error-message" v-if="error">Insira apenas números negativos ou 0</p>

            <label for="additional_score">Pontos de saída</label>
            <input type="number" v-model.number="matchScore.additional_score" required>

            <label for="cards_score">Pontos das cartas</label>
            <input type="number" v-model.number="matchScore.cards_score" required>

            <div class="w-100 mt-2 d-flex justify-content-center align-items-center">
                <button @click="submit">Somar</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "LossForm",
    
    props: [
        'matchScore', 'match', 'showPotForm', 'showLossForm', 'showOpponentForm',
    ],

    data: function () {
        return {
            error: null,
        }
    },

    methods: {
        submit: function () {

            if ( this.matchScore.negative_score.length == '' || this.matchScore.negative_score > 0) {
                this.error = 'Insira apenas números negativos ou 0'
            } else if ( this.additional_score == '' ) {
                return
            } else if ( this.cards_score == '' ) {
                return
            } else {
                this.showLossForm.show = false;
                this.matchScore.round_total_score += this.matchScore.negative_score + this.matchScore.additional_score + this.matchScore.cards_score;
                this.showOpponentForm.show = true;
            }

        },

        goBack: function () {
            this.matchScore.round_total_score = 0;
            this.matchScore.pot = '';
            this.showLossForm.show = false;
            this.showPotForm.show = true;
        },

        clearErrors: function () {
            if (this.error != null) {
                return this.error = null;
            }
        },

        errorClassObject: function () {
            return {
                'error-field': this.error != null,
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