<template>
<div>
    <router-view :user="this.$props.user"></router-view>
</div>

</template>

<script>
import axios from 'axios';

export default {
    name: "App",

    props: [
        'user',
    ],

    created() {
        axios.interceptors.request.use(
            (config) => {
                if (config.method === 'get') {
                    config.url = config.url + '?api_token=' + this.user.api_token;
                } else {
                    config.data = {
                        ...config.data,
                        api_token: this.user.api_token
                    };
                }

                return config;
            }
        )
    },
}

</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap');

* {
    font-family: 'Roboto', sans-serif;
    box-sizing: border-box;
    margin: 0;
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

input {
    border: none;
    border-bottom: solid 1px black;
    outline: none;
    font-size: 1.8rem;
    line-height: 2.8rem;

    margin: 1.6rem 0 2rem;

    width: 100%;
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
</style>