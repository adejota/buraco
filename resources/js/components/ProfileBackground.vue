<template>
    <div class="profile-background">

        <div class="profile-infos">
            <div class="profile">
                <svg id="profile_pic" data-name="profile pic" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="150" height="150" viewBox="0 0 117 117">
                    <defs>
                        <linearGradient id="linear-gradient" x1="0.5" y1="1" x2="0.5" gradientUnits="objectBoundingBox">
                        <stop offset="0" stop-color="gray" stop-opacity="0.251"/>
                        <stop offset="0.54" stop-color="gray" stop-opacity="0.122"/>
                        <stop offset="1" stop-color="gray" stop-opacity="0.102"/>
                        </linearGradient>
                    </defs>
                    <g id="Grupo_16" data-name="Grupo 16" opacity="0.5">
                        <circle id="Elipse_3" data-name="Elipse 3" cx="58.5" cy="58.5" r="58.5" fill="url(#linear-gradient)"/>
                    </g>
                    <circle id="Elipse_4" data-name="Elipse 4" cx="57.215" cy="57.215" r="57.215" transform="translate(1.346 0.859)" fill="#f5f5f5"/>
                    <path id="Caminho_49" data-name="Caminho 49" d="M437.625,683.43a56.94,56.94,0,0,0,31.45-9.412c-2.108-11.522-10.132-12.179-10.132-12.179H414.7s-7.571.621-9.936,11.221A56.952,56.952,0,0,0,437.625,683.43Z" transform="translate(-379.01 -567.915)" fill="#6c63ff"/>
                    <circle id="Elipse_5" data-name="Elipse 5" cx="27.616" cy="27.616" r="27.616" transform="translate(30.391 29.252)" fill="#333"/>
                    <path id="Caminho_50" data-name="Caminho 50" d="M293.15,476.92h17.7v14.156A8.848,8.848,0,0,1,302,499.924h0a8.848,8.848,0,0,1-8.848-8.848V476.92Z" transform="translate(-244.056 -397.049)" opacity="0.1"/>
                    <path id="Caminho_51" data-name="Caminho 51" d="M293.728,473h16.58a.561.561,0,0,1,.561.561v13.6a8.848,8.848,0,0,1-8.853,8.849h0a8.848,8.848,0,0,1-8.848-8.848v-13.6A.561.561,0,0,1,293.728,473Z" transform="translate(-244.072 -393.786)" fill="#fdb797"/>
                    <path id="Caminho_52" data-name="Caminho 52" d="M544.34,607.239a25.467,25.467,0,0,0,17.7.049V605.11h-17.7Z" transform="translate(-495.214 -520.686)" opacity="0.1"/>
                    <circle id="Elipse_6" data-name="Elipse 6" cx="25.364" cy="25.364" r="25.364" transform="translate(32.644 37.01)" fill="#fdb797"/>
                    <path id="Caminho_53" data-name="Caminho 53" d="M489.49,303.977s10.69,21.7,40.843,9.1l-7.02-11.008L510.868,297.6Z" transform="translate(-449.55 -264.675)" opacity="0.1"/>
                    <path id="Caminho_54" data-name="Caminho 54" d="M489.49,302.061s10.69,21.7,40.843,9.094l-7.02-11.008-12.445-4.466Z" transform="translate(-449.55 -263.077)" fill="#333"/>
                    <path id="Caminho_55" data-name="Caminho 55" d="M486.3,237.992a14.652,14.652,0,0,1,3.632-5.907c4.989-4.932,13.168-5.972,17.363-11.6a3.284,3.284,0,0,1-1.507,4.631c4.019-.027,8.677-.378,10.949-3.684a7.518,7.518,0,0,1-1.268,7.938c3.562.167,7.369,2.579,7.593,6.138a7.1,7.1,0,0,1-3.281,5.975,18.177,18.177,0,0,1-6.625,2.5C506.383,245.479,481.878,251.737,486.3,237.992Z" transform="translate(-446.451 -200.479)" fill="#333"/>
                    <ellipse id="Elipse_7" data-name="Elipse 7" cx="2.36" cy="4.425" rx="2.36" ry="4.425" transform="translate(30.274 57.925)" fill="#fdb797"/>
                    <ellipse id="Elipse_8" data-name="Elipse 8" cx="2.36" cy="4.425" rx="2.36" ry="4.425" transform="translate(81.008 57.925)" fill="#fdb797"/>
                </svg>
                <h1> {{ user.name }} </h1>
                <router-link tag="p" :to="{ name: 'edit-profile' }"><p>Editar perfil</p></router-link>
            </div>
        </div>
        
        <div class="history-infos">
            <div class="info">
                <img src="../../../public/images/gamepad.svg" alt="Gamepad">
                <div>
                    <p> {{ matches.length }} </p>
                    <p>Partidas iniciadas</p>
                </div>
            </div>

            <div class="info">
                <img src="../../../public/images/trophy.svg" alt="Troféu">
                <div>
                    <p> {{ profile_infos.wins }} </p>
                    <p>Vitórias</p>
                </div>
            </div>

            <div class="info">
                <img src="../../../public/images/broken-heart.svg" alt="Coração partido">
                <div>
                    <p> {{ profile_infos.losses }}</p>
                    <p>Derrotas</p>
                </div>
            </div>

            <div class="info">
                <img src="../../../public/images/clock.svg" alt="Relógio">
                <div>
                    <p>80</p>
                    <p>Tempo total</p>
                </div>
            </div>
        </div>
    </div>
</template>