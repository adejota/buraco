<template>
    <div id="edit-profile">
        <div class="profile-infos">
            <div class="profile">
                <img src="../../../public/images/profile-avatar.svg" alt="avatar" class="profile-pic">
                <router-link tag="p" :to="{ name: 'edit-profile' }"><p>Novo avatar</p></router-link>
            </div>
        </div>

        <div class="edit-profile-avatar">
            <div class="profile-avatar">
                <img src="../../../public/images/profile-avatar-2.svg" alt="avatar">
            </div>

            <div class="profile-avatar">
                <img src="../../../public/images/profile-avatar-3.svg" alt="avatar">
            </div>

            <div class="profile-avatar">
                <img src="../../../public/images/profile-avatar-4.svg" alt="avatar">
            </div>

            <div class="profile-avatar">
                <img src="../../../public/images/profile-avatar-5.svg" alt="avatar">
            </div>

            <div class="profile-avatar">
                <img src="../../../public/images/profile-avatar-6.svg" alt="avatar">
            </div>

            <div class="profile-avatar">
                <img src="../../../public/images/profile-avatar-7.svg" alt="avatar">
            </div>
        </div>

        <form action="#" id="edit-profile-form">
            <label for="name">Nome completo</label>
            <input type="text" name="name">

            <label for="username">Usuário</label>
            <input type="text" name="username">

            <label for="password">Senha</label>
            <input type="password" name="password">

            <label for="password-repeat">Repetir Senha</label>
            <input type="password" name="password-repeat">

            <div class="button-container">
                <a href="#"><button>Salvar</button></a>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
        }
    },
    components: { },
}
</script>

<style scoped>
#edit-profile {
    width: 100vw;
    height: 100vh;

    display: grid;
    grid-template-columns: repeat(12, 1fr);
    grid-template-rows: repeat(12, 1fr);
}

.profile-infos {
    background-color: var(--primary-color);

    height: 100vh;

    display: grid;
    grid-template-columns: repeat(15, 1fr);
    grid-template-rows: repeat(12, 1fr);

    border-radius: 0;

    grid-column-start: 1;
    grid-column-end: 15;
}

.history-infos {
    opacity: 0;
}

#edit-profile-form {
    display: flex;
    flex-direction: column;
    justify-content: center;

    grid-column-start: 6;
    grid-column-end: 12;

    grid-row-start: 1;
    grid-row-end: 13;

    padding: 6rem;

    z-index: 1000;
}


#edit-profile-form label {
    color: var(--white-color);
}

#edit-profile-form input {
    border-bottom: solid 1px var(--white-color);
    background: var(--primary-color);
    color: var(--white-color);
}

#edit-profile-form label span {
    font-size: 1.2rem;
}

#edit-profile-form .button-container {
    display: flex;
    justify-content: center;
    align-items: center;
}

#edit-profile-form .button-container a {
    width: 100%;
}

#edit-profile-form .button-container button {
    width: 100%;
    background-color: white;
    color: var(--primary-color);
}

.edit-profile-avatar {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    grid-template-rows: 1fr 1fr;

    grid-column-start: 2;
    grid-column-end: 4;
    grid-row-start: 7;
    grid-row-end: 11;
    opacity: 1;

    z-index: 1000;
}

.profile-avatar {
    height: 8rem;
    display: flex;
    justify-content: center;
    align-items: center;
}

.profile-avatar img {
    height: 100%;
}

.profile-avatar:hover {
    transform: translateY(-8%);
    cursor: pointer;
}


</style>