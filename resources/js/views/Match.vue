<template>
    <div id="match">

        <div v-if="loading" class="p-3">Gerando partida...</div>
        
        <div v-else ref="matchInfo" id="match-info" class="d-flex flex-column justify-content-between align-items-between">

            <div v-if="!matchFinished.finished" class="d-flex flex-column justify-content-center align-items-center py-5">
                <h2 class="time"> {{ clock.time }} </h2>
                <h3 class="general-score"> Rodada {{ match.current_round }} </h3>
            </div>

            <div v-else class="d-flex flex-column justify-content-center align-items-center py-5">
                <h2 class="time"> Partida finalizada </h2>
                <h3 class="general-score match-finished"> Tempo de jogo: {{ match.current_time }} </h3>
                <h3 class="general-score"> Rodadas: {{ match.current_round }} </h3>
            </div>

            <div class="d-flex justify-content-center align-items-center">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="mr-2">
                        <span class="current-score"> <strong class="fs-3"> {{ match.total_score }} </strong>  </span>
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <span class="last-score" v-for="matchScore in matchScoresArray" :key="matchScore.data.id">
                                {{ matchScore.data.round_total_score }}
                            </span>
                        </div>
                    </div>

                    <div class="d-flex flex-column justify-content-center align-items-center mr-2">

                        <svg v-if="avatarId == 1" viewBox="0 0 178 178" width="100" height="100"> 
                            <g id="account_pic" data-name="account pic" transform="translate(-0.086 -0.086)">
                                <circle id="Elipse_3" data-name="Elipse 3" cx="89" cy="89" r="89" transform="translate(0.086 0.086)" fill="url(#linear-gradient)"/>
                                <circle id="Elipse_4" data-name="Elipse 4" cx="87.219" cy="87.219" r="87.219" transform="translate(2.053 1.31)" fill="#f5f5f5"/>
                                <path id="Caminho_49" data-name="Caminho 49" d="M454.859,694.753A86.8,86.8,0,0,0,502.8,680.4c-3.214-17.564-15.445-18.565-15.445-18.565H419.907s-11.542.947-15.147,17.1a86.819,86.819,0,0,0,50.1,15.808Z" transform="translate(-365.506 -518.66)" fill="#6c63ff"/>
                                <circle id="Elipse_5" data-name="Elipse 5" cx="42.098" cy="42.098" r="42.098" transform="translate(46.328 44.592)" fill="#333"/>
                                <path id="Caminho_50" data-name="Caminho 50" d="M293.15,476.92h26.974V498.5a13.487,13.487,0,0,1-13.482,13.487h0A13.487,13.487,0,0,1,293.155,498.5V476.92Z" transform="translate(-218.31 -355.165)" opacity="0.1"/>
                                <path id="Caminho_51" data-name="Caminho 51" d="M294.02,473h25.274a.855.855,0,0,1,.855.855V494.58a13.488,13.488,0,0,1-13.495,13.49h0a13.487,13.487,0,0,1-13.487-13.487V473.855A.855.855,0,0,1,294.02,473Z" transform="translate(-218.325 -352.245)" fill="#fdb797"/>
                                <path id="Caminho_52" data-name="Caminho 52" d="M544.34,608.355a38.822,38.822,0,0,0,26.974.074V605.11H544.34Z" transform="translate(-469.452 -476.413)" opacity="0.1"/>
                                <circle id="Elipse_6" data-name="Elipse 6" cx="38.664" cy="38.664" r="38.664" transform="translate(49.762 56.418)" fill="#fdb797"/>
                                <path id="Caminho_53" data-name="Caminho 53" d="M489.49,307.322s16.3,33.076,62.261,13.868l-10.7-16.781L522.078,297.6Z" transform="translate(-428.605 -247.409)" opacity="0.1"/>
                                <path id="Caminho_54" data-name="Caminho 54" d="M489.49,305.407s16.3,33.076,62.261,13.862l-10.7-16.781-18.971-6.809Z" transform="translate(-428.605 -245.979)" fill="#333"/>
                                <path id="Caminho_55" data-name="Caminho 55" d="M486.575,247.171a22.336,22.336,0,0,1,5.537-9c7.605-7.518,20.074-9.1,26.469-17.677a5.006,5.006,0,0,1-2.3,7.059c6.127-.041,13.227-.577,16.691-5.617a11.46,11.46,0,0,1-1.933,12.1c5.43.255,11.233,3.932,11.575,9.357.235,3.615-2.042,7.036-5,9.109s-6.564,3.025-10.1,3.8C517.193,258.583,479.838,268.123,486.575,247.171Z" transform="translate(-425.833 -189.985)" fill="#333"/>
                                <ellipse id="Elipse_7" data-name="Elipse 7" cx="3.597" cy="6.745" rx="3.597" ry="6.745" transform="translate(46.15 88.301)" fill="#fdb797"/>
                                <ellipse id="Elipse_8" data-name="Elipse 8" cx="3.597" cy="6.745" rx="3.597" ry="6.745" transform="translate(123.489 88.301)" fill="#fdb797"/>
                            </g>
                        </svg>

                        <svg v-if="avatarId == 2" viewBox="0 0 132.396 132.396" width="100" height="100">
                            <circle id="Elipse_135" data-name="Elipse 135" cx="66.198" cy="66.198" r="66.198" fill="url(#linear-gradient)"/>
                            <circle id="Elipse_136" data-name="Elipse 136" cx="64.798" cy="64.798" r="64.798" transform="translate(1.399 1.04)" fill="#f5f5f5"/>
                            <path id="Caminho_370" data-name="Caminho 370" d="M541.476,188.56s-7.346,36.192-11.356,34.187c0,0,38.671,33.4,72.818,0,0,0-6.015-25.5-14.7-34.187Z" transform="translate(-500.555 -122.145)" fill="#333"/>
                            <path id="Caminho_371" data-name="Caminho 371" d="M566.635,282.974a64.5,64.5,0,0,0,35.621-10.659c-2.388-13.046-11.476-13.795-11.476-13.795H540.673s-8.568.7-11.253,12.71A64.5,64.5,0,0,0,566.635,282.974Z" transform="translate(-500.254 -152.143)" fill="#6c63ff"/>
                            <circle id="Elipse_137" data-name="Elipse 137" cx="28.726" cy="28.726" r="28.726" transform="translate(36.969 35.684)" fill="#333"/>
                            <path id="Caminho_372" data-name="Caminho 372" d="M366.42,158.88h20.044v16.034a10.019,10.019,0,0,1-10,10.019h0a10.019,10.019,0,0,1-10.019-10.019V158.88Z" transform="translate(-310.818 -68.417)" opacity="0.1"/>
                            <path id="Caminho_373" data-name="Caminho 373" d="M368.351,157.58h16.217a1.914,1.914,0,0,1,1.914,1.914v14.12a10.019,10.019,0,0,1-10,10.019h0a10.019,10.019,0,0,1-10.019-10.019V159.488A1.914,1.914,0,0,1,368.351,157.58Z" transform="translate(-310.836 -67.86)" fill="#be7c5e"/>
                            <path id="Caminho_374" data-name="Caminho 374" d="M575.77,242.1a28.846,28.846,0,0,0,20.044.057V239.7H575.77Z" transform="translate(-520.128 -144.073)" opacity="0.1"/>
                            <circle id="Elipse_138" data-name="Elipse 138" cx="28.726" cy="28.726" r="28.726" transform="translate(36.969 41.916)" fill="#be7c5e"/>
                            <path id="Caminho_375" data-name="Caminho 375" d="M545.3,161.268h54.779s-4.678-22.117-25.385-20.706S545.3,161.268,545.3,161.268Z" transform="translate(-507.063 -101.536)" fill="#333"/>
                            <ellipse id="Elipse_139" data-name="Elipse 139" cx="2.673" cy="5.01" rx="2.673" ry="5.01" transform="translate(34.89 64.41)" fill="#be7c5e"/>
                            <ellipse id="Elipse_140" data-name="Elipse 140" cx="2.673" cy="5.01" rx="2.673" ry="5.01" transform="translate(91.005 64.41)" fill="#be7c5e"/>
                            <path id="Caminho_376" data-name="Caminho 376" d="M545.3,162.568h54.779s-4.678-22.117-25.385-20.706S545.3,162.568,545.3,162.568Z" transform="translate(-507.063 -102.094)" opacity="0.1"/>
                        </svg>

                        <svg v-if="avatarId == 3" viewBox="0 0 132.396 132.396" width="100" height="100">
                            <circle id="Elipse_141" data-name="Elipse 141" cx="66.198" cy="66.198" r="66.198" fill="url(#linear-gradient)"/>
                            <circle id="Elipse_142" data-name="Elipse 142" cx="64.798" cy="64.798" r="64.798" transform="translate(1.525 0.971)" fill="#f5f5f5"/>
                            <path id="Caminho_377" data-name="Caminho 377" d="M842.9,282.459A64.5,64.5,0,0,0,878.52,271.8c-2.393-13.052-11.476-13.8-11.476-13.8h-50.1s-8.568.7-11.253,12.709A64.5,64.5,0,0,0,842.9,282.459Z" transform="translate(-776.518 -151.629)" fill="#6c63ff"/>
                            <circle id="Elipse_143" data-name="Elipse 143" cx="31.28" cy="31.28" r="31.28" transform="translate(34.422 33.125)" fill="#72351c"/>
                            <path id="Caminho_378" data-name="Caminho 378" d="M642.68,158.36h20.044v16.034A10.019,10.019,0,0,1,652.7,184.43h0a10.019,10.019,0,0,1-10.019-10.019V158.36Z" transform="translate(-587.078 -67.903)" opacity="0.1"/>
                            <path id="Caminho_379" data-name="Caminho 379" d="M644.568,157.06h16.217a1.914,1.914,0,0,1,1.914,1.914v14.12a10.019,10.019,0,0,1-10.019,10.019h0a10.019,10.019,0,0,1-10.019-10.019v-14.12a1.914,1.914,0,0,1,1.914-1.914Z" transform="translate(-587.069 -67.345)" fill="#fda57d"/>
                            <path id="Caminho_380" data-name="Caminho 380" d="M852,241.585a28.846,28.846,0,0,0,20.044.057V239.18H852Z" transform="translate(-796.375 -143.559)" opacity="0.1"/>
                            <circle id="Elipse_144" data-name="Elipse 144" cx="28.726" cy="28.726" r="28.726" transform="translate(36.975 41.916)" fill="#fda57d"/>
                            <path id="Caminho_381" data-name="Caminho 381" d="M833.82,144.269s12.1,24.562,46.268,10.282l-7.951-12.47-14.092-5.061Z" transform="translate(-788.579 -99.754)" opacity="0.1"/>
                            <path id="Caminho_382" data-name="Caminho 382" d="M833.82,143.639s12.1,24.562,46.268,10.282l-7.951-12.47-14.092-5.061Z" transform="translate(-788.579 -99.484)" fill="#72351c"/>
                            <path id="Caminho_383" data-name="Caminho 383" d="M833.18,131.287a16.592,16.592,0,0,1,4.113-6.689c5.649-5.586,14.914-6.763,19.667-13.138a3.719,3.719,0,0,1-1.714,5.244c4.57-.029,9.831-.428,12.4-4.176a8.516,8.516,0,0,1-1.434,8.991c4.033.183,8.34,2.919,8.6,6.952a8.031,8.031,0,0,1-3.719,6.769,20.444,20.444,0,0,1-7.5,2.8C855.932,139.758,828.176,146.847,833.18,131.287Z" transform="translate(-788.048 -88.794)" fill="#72351c"/>
                            <path id="Caminho_384" data-name="Caminho 384" d="M876.815,195.89h-.76l-14.817,13.2c-14.28-6.683-24.756,0-24.756,0l-15.537-12.647-1.565.194a28.725,28.725,0,1,0,57.445-.737Zm-28.766,18.25c-5.586,0-10.116-1.142-10.116-2.53s4.53-2.53,10.116-2.53,10.116,1.142,10.116,2.53-4.53,2.53-10.122,2.53Z" transform="translate(-782.388 -124.997)" fill="#72351c"/>
                            <ellipse id="Elipse_145" data-name="Elipse 145" cx="2.673" cy="5.01" rx="2.673" ry="5.01" transform="translate(34.29 65.604)" fill="#fda57d"/>
                            <ellipse id="Elipse_146" data-name="Elipse 146" cx="2.673" cy="5.01" rx="2.673" ry="5.01" transform="translate(91.749 65.604)" fill="#fda57d"/>
                        </svg>

                        <svg v-if="avatarId == 4" viewBox="0 0 132.396 132.396" width="100" height="100">
                            <circle id="Elipse_122" data-name="Elipse 122" cx="66.198" cy="66.198" r="66.198" fill="url(#linear-gradient)"/>
                            <circle id="Elipse_123" data-name="Elipse 123" cx="64.798" cy="64.798" r="64.798" transform="translate(1.399 1.04)" fill="#f5f5f5"/>
                            <path id="Caminho_355" data-name="Caminho 355" d="M298.389,288.644a64.5,64.5,0,0,0,35.621-10.659c-2.388-13.046-11.476-13.795-11.476-13.795h-50.1s-8.568.7-11.253,12.709a64.5,64.5,0,0,0,37.209,11.744Z" transform="translate(-232.009 -157.824)" fill="#6c63ff"/>
                            <circle id="Elipse_124" data-name="Elipse 124" cx="28.726" cy="28.726" r="28.726" transform="translate(36.974 35.684)" fill="#333"/>
                            <path id="Caminho_356" data-name="Caminho 356" d="M98.18,164.57h20.044V180.6A10.019,10.019,0,0,1,108.2,190.623h0A10.019,10.019,0,0,1,98.186,180.6V164.57Z" transform="translate(-42.573 -74.107)" opacity="0.1"/>
                            <path id="Caminho_357" data-name="Caminho 357" d="M100.1,163.27h16.217a1.914,1.914,0,0,1,1.914,1.914V179.3a10.019,10.019,0,0,1-10.019,10.019h0A10.019,10.019,0,0,1,98.19,179.3v-14.12A1.914,1.914,0,0,1,100.1,163.27Z" transform="translate(-42.577 -73.55)" fill="#be7c5e"/>
                            <path id="Caminho_358" data-name="Caminho 358" d="M307.53,247.795a28.846,28.846,0,0,0,20.044.057V245.39H307.53Z" transform="translate(-251.883 -149.763)" opacity="0.1"/>
                            <circle id="Elipse_125" data-name="Elipse 125" cx="28.726" cy="28.726" r="28.726" transform="translate(36.974 41.921)" fill="#be7c5e"/>
                            <path id="Caminho_359" data-name="Caminho 359" d="M274.74,153.966c.337-1.24.76-2.6,1.874-3.25a5.336,5.336,0,0,1,2.987-.383c7.94.434,15.811-1.377,23.534-3.267,4.415-1.08,9.139-2.393,12-5.952s-.868-14.743-5.215-16.062c-2.856-.874-6.169.754-8.877-.526a17.235,17.235,0,0,1-3.13-2.473c-2.131-1.714-4.867-2.4-7.517-3.056-3.1-.765-6.443-1.514-9.385-.286-2.285.948-3.953,2.953-6.118,4.141-4.118,2.285-9.139,1.222-13.858,1.211-1.594,0-3.5.32-4.13,1.782-.428.994-.086,2.125-.04,3.2.137,3.427-2.69,6.095-5.061,8.568s-4.61,6-3.113,9.077c.571,1.171,1.617,2.056,2.211,3.216,1.022,2.011.508,4.438.88,6.66a16.759,16.759,0,0,0,1.868,4.8c1.759,3.427,10.6,21.877,14.657,17.188,1.965-2.285,2.285-8.888,3.079-11.858Q273.026,160.3,274.74,153.966Z" transform="translate(-226.444 -95.166)" fill="#333"/>
                            <ellipse id="Elipse_126" data-name="Elipse 126" cx="2.673" cy="5.01" rx="2.673" ry="5.01" transform="translate(42.589 64.593)" fill="#be7c5e"/>
                        </svg>

                        <svg v-if="avatarId == 5" viewBox="0 0 132.396 132.396" width="100" height="100">
                            <circle id="Elipse_127" data-name="Elipse 127" cx="66.198" cy="66.198" r="66.198" fill="url(#linear-gradient)"/>
                            <circle id="Elipse_128" data-name="Elipse 128" cx="64.798" cy="64.798" r="64.798" transform="translate(1.525 0.977)" fill="#f5f5f5"/>
                            <path id="Caminho_360" data-name="Caminho 360" d="M566.745,540.894a64.5,64.5,0,0,0,35.6-10.659c-2.388-13.046-11.476-13.795-11.476-13.795H540.783s-8.568.7-11.253,12.709A64.5,64.5,0,0,0,566.745,540.894Z" transform="translate(-500.363 -410.063)" fill="#6c63ff"/>
                            <circle id="Elipse_129" data-name="Elipse 129" cx="31.28" cy="31.28" r="31.28" transform="translate(34.416 33.13)" fill="#f55f44"/>
                            <path id="Caminho_361" data-name="Caminho 361" d="M366.53,416.8h20.044v16.034a10.019,10.019,0,0,1-10.019,10.019h0a10.019,10.019,0,0,1-10.019-10.019V416.8Z" transform="translate(-310.928 -326.337)" opacity="0.1"/>
                            <path id="Caminho_362" data-name="Caminho 362" d="M368.448,415.5h16.217a1.914,1.914,0,0,1,1.914,1.914v14.12a10.019,10.019,0,0,1-10.019,10.019h0a10.019,10.019,0,0,1-10.019-10.019v-14.12a1.914,1.914,0,0,1,1.914-1.914Z" transform="translate(-310.933 -325.78)" fill="#fda57d"/>
                            <path id="Caminho_363" data-name="Caminho 363" d="M575.88,500.025a28.846,28.846,0,0,0,20.044.057V497.62H575.88Z" transform="translate(-520.238 -401.993)" opacity="0.1"/>
                            <circle id="Elipse_130" data-name="Elipse 130" cx="28.726" cy="28.726" r="28.726" transform="translate(36.969 41.921)" fill="#fda57d"/>
                            <circle id="Elipse_131" data-name="Elipse 131" cx="11.561" cy="11.561" r="11.561" transform="translate(54.094 21.032)" fill="#f55f44"/>
                            <circle id="Elipse_132" data-name="Elipse 132" cx="7.591" cy="7.591" r="7.591" transform="translate(58.063 13.618)" fill="#f55f44"/>
                            <path id="Caminho_364" data-name="Caminho 364" d="M579.168,387.273a11.561,11.561,0,0,1-6.026-14.783c-.08.16-.16.326-.234.491a11.563,11.563,0,0,0,21.1,9.465c.074-.166.143-.331.211-.5a11.561,11.561,0,0,1-15.052,5.329Z" transform="translate(-518.528 -348.339)" fill="#f55f44"/>
                            <path id="Caminho_365" data-name="Caminho 365" d="M557.67,402.709s12.1,24.562,46.268,10.282l-7.951-12.47L581.9,395.46Z" transform="translate(-512.43 -358.188)" opacity="0.1"/>
                            <path id="Caminho_366" data-name="Caminho 366" d="M557.67,402.069s12.1,24.562,46.268,10.282l-7.951-12.47L581.9,394.82Z" transform="translate(-512.43 -357.914)" fill="#f55f44"/>
                            <path id="Caminho_367" data-name="Caminho 367" d="M574,391.52a142.715,142.715,0,0,1,22.38,0S579.849,393.057,574,391.52Z" transform="translate(-519.432 -356.311)" fill="#333"/>
                            <path id="Caminho_368" data-name="Caminho 368" d="M595.164,353.236a7.609,7.609,0,0,0-1.714.131h.44a7.586,7.586,0,0,1,1.142,15.04,7.586,7.586,0,0,0,.137-15.171Z" transform="translate(-527.771 -340.081)" fill="#f55f44"/>
                            <ellipse id="Elipse_133" data-name="Elipse 133" cx="2.673" cy="5.01" rx="2.673" ry="5.01" transform="translate(34.29 65.609)" fill="#fda57d"/>
                            <ellipse id="Elipse_134" data-name="Elipse 134" cx="2.673" cy="5.01" rx="2.673" ry="5.01" transform="translate(91.748 65.609)" fill="#fda57d"/>
                            <path id="Caminho_369" data-name="Caminho 369" d="M345.22,334.83l5.6-2.89,1.262,4.633-3.433,2.336Z" transform="translate(-301.791 -289.95)" fill="#f55f44"/>
                        </svg>

                        <svg v-if="avatarId == 6" viewBox="0 0 132.396 132.396" width="100" height="100">
                            <circle id="Elipse_153" data-name="Elipse 153" cx="66.198" cy="66.198" r="66.198" fill="url(#linear-gradient)"/>
                            <circle id="Elipse_154" data-name="Elipse 154" cx="64.798" cy="64.798" r="64.798" transform="translate(1.399 1.04)" fill="#f5f5f5"/>
                            <path id="Caminho_392" data-name="Caminho 392" d="M847.214,546.154a64.5,64.5,0,0,0,35.621-10.659C880.448,522.448,871.36,521.7,871.36,521.7H821.253s-8.568.7-11.253,12.709a64.5,64.5,0,0,0,37.214,11.744Z" transform="translate(-780.834 -415.323)" fill="#6c63ff"/>
                            <path id="Caminho_393" data-name="Caminho 393" d="M647,422.06h20.044v16.034a10.019,10.019,0,0,1-10.019,10.019h0A10.019,10.019,0,0,1,647,438.094Z" transform="translate(-591.397 -331.597)" opacity="0.1"/>
                            <path id="Caminho_394" data-name="Caminho 394" d="M648.914,420.76H665.13a1.914,1.914,0,0,1,1.914,1.914v14.12a10.019,10.019,0,0,1-10.019,10.019h0A10.019,10.019,0,0,1,647,436.794v-14.12A1.914,1.914,0,0,1,648.914,420.76Z" transform="translate(-591.398 -331.04)" fill="#fdb797"/>
                            <path id="Caminho_395" data-name="Caminho 395" d="M856.35,505.285a28.846,28.846,0,0,0,20.044.057V502.88H856.35Z" transform="translate(-800.708 -407.253)" opacity="0.1"/>
                            <circle id="Elipse_155" data-name="Elipse 155" cx="28.726" cy="28.726" r="28.726" transform="translate(36.969 41.921)" fill="#fdb797"/>
                            <ellipse id="Elipse_156" data-name="Elipse 156" cx="2.673" cy="5.01" rx="2.673" ry="5.01" transform="translate(34.89 64.41)" fill="#fdb797"/>
                            <ellipse id="Elipse_157" data-name="Elipse 157" cx="2.673" cy="5.01" rx="2.673" ry="5.01" transform="translate(91.006 64.41)" fill="#fdb797"/>
                            <rect id="Retângulo_39" data-name="Retângulo 39" width="12.287" height="6.146" rx="3.073" transform="translate(48.193 70.785)" fill="none" stroke="#333" stroke-miterlimit="10" stroke-width="2"/>
                            <rect id="Retângulo_40" data-name="Retângulo 40" width="12.287" height="6.146" rx="3.073" transform="translate(83.203 76.925) rotate(180)" fill="none" stroke="#333" stroke-miterlimit="10" stroke-width="2"/>
                            <path id="Caminho_396" data-name="Caminho 396" d="M864,459.725s3.9-2.113,11.139,0" transform="translate(-803.988 -388.346)" fill="none" stroke="#333" stroke-miterlimit="10" stroke-width="2"/>
                            <path id="Caminho_397" data-name="Caminho 397" d="M908.72,422.7l7.049,16.377S924.388,428.212,908.72,422.7Z" transform="translate(-823.164 -372.873)" fill="#858585"/>
                            <line id="Linha_8" data-name="Linha 8" y1="9.396" x2="10.522" transform="translate(83.203 64.461)" fill="none" stroke="#333" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                            <path id="Caminho_398" data-name="Caminho 398" d="M832.133,422.7l-7.049,16.377S816.465,428.212,832.133,422.7Z" transform="translate(-786.287 -372.873)" fill="#858585"/>
                            <line id="Linha_9" data-name="Linha 9" x1="10.665" y1="9.396" transform="translate(37.529 64.461)" fill="none" stroke="#333" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                        </svg>

                        <svg v-if="avatarId == 7" viewBox="0 0 132.396 132.396" width="100" height="100">
                            <circle id="Elipse_158" data-name="Elipse 158" cx="66.198" cy="66.198" r="66.198" transform="translate(0 0)" fill="url(#linear-gradient)"/>
                            <circle id="Elipse_159" data-name="Elipse 159" cx="64.798" cy="64.798" r="64.798" transform="translate(1.399 1.04)" fill="#f5f5f5"/>
                            <path id="Caminho_399" data-name="Caminho 399" d="M336.545,681.6c0,23.865-15.571,50.432-34.781,50.432S267,705.462,267,681.6s15.571-35.986,34.781-35.986S336.545,657.737,336.545,681.6Z" transform="translate(-234.503 -609.932)" fill="#fdd835"/>
                            <path id="Caminho_400" data-name="Caminho 400" d="M298.389,793.844a64.5,64.5,0,0,0,35.621-10.659c-2.388-13.047-11.476-13.795-11.476-13.795h-50.1s-8.568.7-11.253,12.709A64.5,64.5,0,0,0,298.389,793.844Z" transform="translate(-232.008 -663.007)" fill="#6c63ff"/>
                            <path id="Caminho_401" data-name="Caminho 401" d="M98.18,669.74h20.044v16.034A10.019,10.019,0,0,1,108.2,695.793h0a10.019,10.019,0,0,1-10.019-10.019V669.74Z" transform="translate(-42.572 -579.277)" opacity="0.1"/>
                            <path id="Caminho_402" data-name="Caminho 402" d="M100.1,668.44h16.217a1.914,1.914,0,0,1,1.914,1.914v14.12a10.019,10.019,0,0,1-10.019,10.019h0A10.019,10.019,0,0,1,98.19,684.474v-14.12A1.914,1.914,0,0,1,100.1,668.44Z" transform="translate(-42.576 -578.72)" fill="#fdb797"/>
                            <path id="Caminho_403" data-name="Caminho 403" d="M307.53,752.965a28.846,28.846,0,0,0,20.044.057V750.56H307.53Z" transform="translate(-251.882 -654.933)" opacity="0.1"/>
                            <circle id="Elipse_160" data-name="Elipse 160" cx="28.726" cy="28.726" r="28.726" transform="translate(36.975 41.921)" fill="#fdb797"/>
                            <ellipse id="Elipse_161" data-name="Elipse 161" cx="2.673" cy="5.01" rx="2.673" ry="5.01" transform="translate(34.896 64.41)" fill="#fdb797"/>
                            <ellipse id="Elipse_162" data-name="Elipse 162" cx="2.673" cy="5.01" rx="2.673" ry="5.01" transform="translate(91.012 64.41)" fill="#fdb797"/>
                            <path id="Caminho_404" data-name="Caminho 404" d="M280.57,667.451s16.24,22.226,53.483,14.635c0,0,4.158-5.061-5.963-20.6S289.784,648.481,280.57,667.451Z" transform="translate(-240.322 -612.386)" opacity="0.1"/>
                            <path id="Caminho_405" data-name="Caminho 405" d="M280.57,666.821s16.24,22.226,53.483,14.635c0,0,4.158-5.061-5.963-20.6S289.784,647.851,280.57,666.821Z" transform="translate(-240.322 -612.116)" fill="#fdd835"/>
                        </svg>

                        <svg v-if="avatarId == 8" viewBox="0 0 132.396 132.396" width="100" height="100">
                            <circle id="Elipse_163" data-name="Elipse 163" cx="66.198" cy="66.198" r="66.198" fill="url(#linear-gradient)"/>
                            <circle id="Elipse_164" data-name="Elipse 164" cx="64.798" cy="64.798" r="64.798" transform="translate(1.531 0.977)" fill="#f5f5f5"/>
                            <path id="Caminho_406" data-name="Caminho 406" d="M609.288,693.471c0,21.558-15.486,32.165-35.6,32.165s-37.22-10.607-37.22-32.165,16.3-39.031,36.409-39.031S609.288,671.9,609.288,693.471Z" transform="translate(-507.31 -621.31)" fill="#333"/>
                            <path id="Caminho_407" data-name="Caminho 407" d="M573.7,807.124a64.5,64.5,0,0,0,35.627-10.659c-2.388-13.047-11.476-13.795-11.476-13.795H547.743s-8.568.7-11.253,12.71A64.5,64.5,0,0,0,573.7,807.124Z" transform="translate(-507.318 -676.293)" fill="#6c63ff"/>
                            <path id="Caminho_408" data-name="Caminho 408" d="M373.477,683h20.044v16.034a10.019,10.019,0,0,1-10.042,10.036h0a10.019,10.019,0,0,1-10.019-10.019V683Z" transform="translate(-317.869 -592.554)" opacity="0.1"/>
                            <path id="Caminho_409" data-name="Caminho 409" d="M375.385,681.726H391.6a1.914,1.914,0,0,1,1.914,1.914v14.12a10.019,10.019,0,0,1-10.036,10.019h0A10.019,10.019,0,0,1,373.46,697.76V683.634a1.914,1.914,0,0,1,1.914-1.914Z" transform="translate(-317.869 -592.005)" fill="#fda57d"/>
                            <path id="Caminho_410" data-name="Caminho 410" d="M582.84,766.255a28.846,28.846,0,0,0,20.044.057V763.85H582.84Z" transform="translate(-527.192 -668.223)" opacity="0.1"/>
                            <circle id="Elipse_165" data-name="Elipse 165" cx="28.726" cy="28.726" r="28.726" transform="translate(36.975 41.916)" fill="#fda57d"/>
                            <path id="Caminho_411" data-name="Caminho 411" d="M542.48,698.493s17.89-2.171,31.417-19.513c0,0,17.89,19.7,30.354,17.525,0,0,7.226-7.591,0-15.177s-12.829-17.165-22.4-15.9-21.323,1.8-26.379,6.323S542.48,698.493,542.48,698.493Z" transform="translate(-509.887 -625.972)" opacity="0.1"/>
                            <path id="Caminho_412" data-name="Caminho 412" d="M542.48,697.863s17.89-2.171,31.417-19.513c0,0,17.89,19.7,30.354,17.525,0,0,7.226-7.591,0-15.177s-12.829-17.165-22.4-15.9-21.3,1.782-26.356,6.352S542.48,697.863,542.48,697.863Z" transform="translate(-509.887 -625.701)" fill="#333"/>
                            <ellipse id="Elipse_166" data-name="Elipse 166" cx="2.673" cy="5.01" rx="2.673" ry="5.01" transform="translate(34.29 65.609)" fill="#fda57d"/>
                            <ellipse id="Elipse_167" data-name="Elipse 167" cx="2.673" cy="5.01" rx="2.673" ry="5.01" transform="translate(91.748 65.609)" fill="#fda57d"/>
                        </svg>

                        <p class="username"> {{ user.name }} </p>
                    </div>
                </div>

                <div class="d-flex justify-content-center align-items-center mr-2">
                    <p>X</p>
                </div>

                <div class="d-flex justify-content-center align-items-center">
                    <div class="d-flex flex-column justify-content-center align-items-center mr-2">
                        
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100" height="100" viewBox="0 0 288 288">
                            <defs>
                                <linearGradient id="linear-gradient" x1="0.5" y1="1" x2="0.5" gradientUnits="objectBoundingBox">
                                <stop offset="0" stop-color="gray" stop-opacity="0.251"/>
                                <stop offset="0.54" stop-color="gray" stop-opacity="0.122"/>
                                <stop offset="1" stop-color="gray" stop-opacity="0.102"/>
                                </linearGradient>
                            </defs>
                            <g id="ghost_primary-color" data-name="ghost primary-color" transform="translate(23.702 23.872)">
                                <circle id="Elipse_3" data-name="Elipse 3" cx="144" cy="144" r="144" transform="translate(-23.702 -23.872)" fill="url(#linear-gradient)"/>
                                <circle id="Elipse_4" data-name="Elipse 4" cx="141.126" cy="141.126" r="141.126" transform="translate(-20.381 -21.752)" fill="#f5f5f5"/>
                                <path id="Caminho_413" data-name="Caminho 413" d="M106.234,0A63.382,63.382,0,0,0,59.32,20.637C46.943,33.992,40.127,52.216,40.127,71.952V158.3l26.008-12.422L86.53,158.565l19.989-12.439L106.469,0ZM80.409,89.571a16.48,16.48,0,0,1-12.291-19.8l32.093,7.512A16.48,16.48,0,0,1,80.409,89.571Z" transform="translate(14 41)" fill="#937fce"/>
                                <path id="Caminho_414" data-name="Caminho 414" d="M313.169,71.952c0-19.736-6.816-37.96-19.193-51.315A63.383,63.383,0,0,0,247.062,0h-.235l-.049,146.126,19.989,12.439,20.395-12.692L313.169,158.3ZM272.891,89.571a16.48,16.48,0,0,1-19.8-12.291l32.093-7.512A16.48,16.48,0,0,1,272.891,89.571Z" transform="translate(-127.536 41)" fill="#6951ae"/>
                                <path id="Caminho_415" data-name="Caminho 415" d="M138.62,236.965a16.48,16.48,0,0,0,19.8-12.291l-32.093-7.512A16.481,16.481,0,0,0,138.62,236.965Z" transform="translate(-44.211 -106.394)" fill="#fff"/>
                                <path id="Caminho_416" data-name="Caminho 416" d="M266.42,224.675a16.48,16.48,0,0,0,32.093-7.512Z" transform="translate(-139.592 -106.395)" fill="#fff"/>
                            </g>
                        </svg>


                        <p class="username"> {{ opponent.name }} </p>
                    </div>

                    <div class="score">
                        <span class="current-score"> <strong class="fs-3"> {{ match.opponent_total_score }} </strong></span>
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <span class="last-score" v-for="matchScore in matchScoresArray" :key="matchScore.data.id">
                                {{ matchScore.data.opponent_score }}
                            </span>
                        </div>

                    </div>
                </div>
            </div>

            <div v-if="!matchFinished.finished" class="d-flex justify-content-center align-items-center py-5">
                <button type="button" class="loss" @click="submitLoss">Não bati</button>
                <button type="button" class="win" @click="submitWin">Bati</button>
            </div>

            <div v-else class="d-flex justify-content-center align-items-center py-5">
                <router-link tag="button" type="submit" class="btn w-100 rounded-pill" :to="{ name: 'home' }">Nova partida</router-link>
            </div>


        </div>

        <div ref="modal" id="modal" v-if="modal.show">
            <PotForm v-if="showPotForm.show" :match="this.match" :matchScore="this.matchScore" :matchScoresArray="this.matchScoresArray" :modal="this.modal" :showPotForm="this.showPotForm" :showLossForm="this.showLossForm" :clock="this.clock" />
            <LossForm v-if="this.showLossForm.show" :match="this.match" :matchScore="this.matchScore" :showPotForm="this.showPotForm" :showLossForm="this.showLossForm" :showOpponentForm="this.showOpponentForm" />
            <WinForm v-if="this.showWinForm.show" :match="this.match" :matchScore="this.matchScore" :matchScoresArray="this.matchScoresArray" :modal="this.modal" :showWinForm="this.showWinForm" :showOpponentForm="this.showOpponentForm" :clock="this.clock" />
            <OpponentForm v-if="showOpponentForm.show" :match="this.match" :user="this.user" :matchScore="this.matchScore" :matchScoresArray="this.matchScoresArray" :modal="this.modal" :showLossForm="this.showLossForm" :showOpponentForm="this.showOpponentForm" :showWinForm="this.showWinForm" :showWin="this.showWin" :showLoss="this.showLoss" :matchFinished="this.matchFinished" :clock="this.clock" />
            <Win v-if="showWin.show" :showWin="this.showWin" :modal="this.modal" />
            <Loss v-if="showLoss.show" :showLoss="this.showLoss" :modal="this.modal" />
            <TimesUp v-if="showTimesUp.show" :showTimesUp="this.showTimesUp" :match="this.match" :user="this.user" :matchScore="this.matchScore" :modal="this.modal" :showWin="this.showWin" :showLoss="this.showLoss" :matchFinished="this.matchFinished" :clock="this.clock" />
        </div>

    </div>
</template>

<script>
import axios from 'axios';
import {eventBus} from "../app"
import PotForm from '../components/PotForm';
import LossForm from '../components/LossForm';
import OpponentForm from '../components/OpponentForm';
import WinForm from '../components/WinForm';
import Win from '../components/Win';
import Loss from '../components/Loss';
import TimesUp from '../components/TimesUp';

export default {
    name: "Match",
    
    props: [
        'user',
    ],

    components: {
        PotForm, LossForm, OpponentForm, WinForm, Win, Loss, TimesUp,
    },

    created() {
        eventBus.$on('fireStartClock', () => {
            this.startClock();
        })

        this.windowHeight = window.innerHeight
    },

    mounted() {
        axios.get('/api/matches/' + this.$route.params.id)
            .then(response => {
                this.match = response.data.data;

                if (this.match.result == 'win' || this.match.result == 'loss' || this.match.result == 'tie') {
                    this.matchFinished.finished = true;
                    
                }
                
                this.matchScore.match_id = response.data.data.id;

                return axios.get('/api/opponents/' + this.match.opponent_id);
            })
            .then(response => {
                this.opponent = response.data.data;

                return axios.get('/api/matchscores/matchscores/' + this.match.id);
            })
            .then(response => {
                this.avatarId = this.user.avatar_id
                this.loading = false;
                this.matchScoresArray = (response.data.data);

                if ( !this.matchFinished.finished ) {
                    this.startClock();

                    this.$nextTick(function() {
                        this.$refs.matchInfo.style.height = this.windowHeight + "px"
                    })

                } else {
                    return;
                }
            })
            .catch(error => {
                this.loading = false;
            });
        
        

    },

    data: function () {
        return {
            loading: true,
            
            modal: {
                'show': false,
            },

            showPotForm: {
                'show': false,
            },

            showLossForm: {
                'show': false,
            },

            showWinForm: {
                'show': false,
            },

            showOpponentForm: {
                'show': false,
            },

            showWin: {
                'show': false,
            },

            showLoss: {
                'show': false,
            },

            showTimesUp: {
                'show': false,
            },

            matchFinished: {
                'finished': false,
            },

            match: null,

            opponent: null,

            matchScoresArray: null,

            matchScore: {
                'match_id': '',
                'user_id': '',
                'round': '',
                'time': '',
                'negative_score': '',
                'additional_score': '',
                'cards_score': '',
                'opponent_score': '',
                'round_total_score': 0,
                'pot': '',
                'got': '',
            },

            clock: {
                'time': '',
                'current_time': '',
                'started': null,
                'running': false,
                'time_began': new Date(),
                'time_stopped': null,
                'stopped_duration': 0,
            },

            windowHeight: null,

            avatarId: null,
        }
    },

    methods: {
        submitLoss: function () {
            this.modal.show = true;
            this.showPotForm.show = true;

            this.$nextTick(function() {
                this.$refs.modal.style.height = "calc(" + this.windowHeight + "px - 8rem)"
                this.$refs.modal.style.width = "calc(100% - 4rem)"
            })

            this.matchScore.match_id = this.match.id;
            this.matchScore.user_id = this.match.user_id;
            this.matchScore.round = this.match.current_round;
        },

        submitWin: function () {
            this.modal.show = true;
            this.showWinForm.show = true;

            this.$nextTick(function() {
                this.$refs.modal.style.height = "calc(" + this.windowHeight + "px - 8rem)"
                this.$refs.modal.style.width = "calc(100% - 4rem)"
            })

            this.matchScore.match_id = this.match.id;
            this.matchScore.user_id = this.match.user_id;
            this.matchScore.round = this.match.current_round;
            this.matchScore.round_total_score = 100;
        },

        startClock: function () {

            if ( this.clock.time_stopped != null ) {
                this.clock.stopped_duration += (new Date() - this.clock.time_stopped);
            }

            this.clock.started = setInterval(this.clockRunning, 500);
            this.clock.running = true;
        },

        clockRunning: function () {

            this.clock.current_time = new Date();

            var time_elapsed = new Date(this.clock.current_time - this.clock.time_began - this.clock.stopped_duration);

            var hour = time_elapsed.getUTCHours();         
            var min = time_elapsed.getUTCMinutes();
            var sec = time_elapsed.getUTCSeconds();

            this.clock.time = (this.clockZeroPrefix(hour, 2) + ":" + this.clockZeroPrefix(min, 2) + ":" + this.clockZeroPrefix(sec, 2));
            
            /* var time_limit_hour = Number(this.match.time_limit.slice(0, 2));
            var time_limit_min = Number(this.match.time_limit.slice(3, 5));
            var time_limit_sec = Number(this.match.time_limit.slice(6, 8));
          
            if ( (hour/3600) + (min/60) + sec == (time_limit_hour/3600) + (time_limit_min/60) + time_limit_sec ) {
                this.stopClock()

                this.modal.show = true;
                this.showTimesUp.show = true;
            } */
            
        },

        clockZeroPrefix(num, digit) {
            var zero = '';
            
            for ( var i = 0; i < digit; i++) {
                zero += '0';
            }
            
            return (zero + num).slice(-digit);
        },

        stopClock: function () {
            this.clock.running = false;
            this.clock.time_stopped = new Date();
            clearInterval(this.clock.started);
        },

    },

    computed: { },

}      
</script>

<style scoped>
* {
    font-size: calc(1.3rem + .6vw)!important;
}

.mr-2 {
    margin-right: 1rem;
}

input {
    background-color: transparent;
    color: white;
    border: none;
    border-bottom: solid 1px white;
    outline: none;
    font-size: 1.8rem;
    line-height: 2.8rem;

    margin: 1.6rem 0 2rem;

    width: 100%;
}

label {
    font-size: 2.6rem;
    font-weight: bold;
    color: white;
}

button {
    color: white;

    width: 100%;
    
    border: none;
    border-radius: .8rem;
    outline: none;
    height: 4.6rem;

    font-size: 1.8rem;
    font-weight: bold;

    margin: 0 1rem;

    cursor: pointer;
}

button.loss {
    background-color: var(--red-color);
}

button.win {
    background-color: var(--green-color);
}


/* === MODAL === */
#modal {
    background-color: var(--primary-color);

    position: absolute;
    top: 0;

    margin: 4rem 2rem;
    
    opacity: .94;

    border-radius: 4rem;

    display: flex;
    align-items: center;
    justify-content: center;
}

.form-area {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: flex-start;

}

@media (min-width: 961px) {
    #modal {
        width: 800px !important;
        padding: 0 4rem;
    }

    #match {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #match-info {
        width: 600px;
        margin: 0 auto;
    }
}
</style>