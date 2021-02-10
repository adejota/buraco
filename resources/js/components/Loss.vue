<template>
    <div id="loss" class="w-100 h-100 d-flex justify-content-center align-items-center p-4">
        
        <svg class="close-button" @click="close" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" x="0" y="0" viewBox="0 0 365.696 365.696" style="enable-background:new 0 0 512 512" xml:space="preserve"><g><path xmlns="http://www.w3.org/2000/svg" d="m243.1875 182.859375 113.132812-113.132813c12.5-12.5 12.5-32.765624 0-45.246093l-15.082031-15.082031c-12.503906-12.503907-32.769531-12.503907-45.25 0l-113.128906 113.128906-113.132813-113.152344c-12.5-12.5-32.765624-12.5-45.246093 0l-15.105469 15.082031c-12.5 12.503907-12.5 32.769531 0 45.25l113.152344 113.152344-113.128906 113.128906c-12.503907 12.503907-12.503907 32.769531 0 45.25l15.082031 15.082031c12.5 12.5 32.765625 12.5 45.246093 0l113.132813-113.132812 113.128906 113.132812c12.503907 12.5 32.769531 12.5 45.25 0l15.082031-15.082031c12.5-12.503906 12.5-32.769531 0-45.25zm0 0" fill="#ffffff" data-original="#000000" style="" class=""/></g></svg>
        
        <h1>Você perdeu!</h1>

    </div>
</template>

<script>
export default {
    name: "Loss",
    
    props: [
        'modal', 'showLoss'
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

        close: function () {
            this.modal.show = false;
            this.showLoss.show = false;
        },
    },
}         
</script>

<style scoped>
#loss {
    display: flex;
    justify-content: center;
    align-items: center;
}

h1 {
    font-size: 6rem;
    color: white;
    text-align: center;
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