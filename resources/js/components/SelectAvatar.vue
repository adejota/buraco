<template>
<div class="select-profile-avatar">
    <div @click="openSelector" class="position-relative d-flex justify-content-center aligm-items-center mt-3 mb-5">
        <svg v-if="avatarId == 1" class="w-50" viewBox="0 0 178 178"> 
            <g id="account_pic" data-name="account pic" transform="translate(-0.086 -0.086)">
                <g id="Grupo_16" data-name="Grupo 16" opacity="0.5">
                <circle id="Elipse_3" data-name="Elipse 3" cx="89" cy="89" r="89" transform="translate(0.086 0.086)" fill="url(#linear-gradient)"/>
                </g>
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

        <svg v-if="avatarId == 2" class="w-50" viewBox="0 0 132.396 132.396">
            <g id="Grupo_55" data-name="Grupo 55" opacity="0.5">
                <circle id="Elipse_135" data-name="Elipse 135" cx="66.198" cy="66.198" r="66.198" fill="url(#linear-gradient)"/>
            </g>
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

        <svg v-if="avatarId == 3" class="w-50" viewBox="0 0 132.396 132.396">
            <g id="Grupo_56" data-name="Grupo 56" opacity="0.5">
                <circle id="Elipse_141" data-name="Elipse 141" cx="66.198" cy="66.198" r="66.198" fill="url(#linear-gradient)"/>
            </g>
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

        <svg v-if="avatarId == 4" class="w-50" viewBox="0 0 132.396 132.396">
            <g id="Grupo_53" data-name="Grupo 53" opacity="0.5">
                <circle id="Elipse_122" data-name="Elipse 122" cx="66.198" cy="66.198" r="66.198" fill="url(#linear-gradient)"/>
            </g>
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

        <svg v-if="avatarId == 5" class="w-50" viewBox="0 0 132.396 132.396">
            <g id="Grupo_54" data-name="Grupo 54" opacity="0.5">
                <circle id="Elipse_127" data-name="Elipse 127" cx="66.198" cy="66.198" r="66.198" fill="url(#linear-gradient)"/>
            </g>
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

        <svg v-if="avatarId == 6" class="w-50" viewBox="0 0 132.396 132.396">
            <g id="Grupo_58" data-name="Grupo 58" opacity="0.5">
                <circle id="Elipse_153" data-name="Elipse 153" cx="66.198" cy="66.198" r="66.198" fill="url(#linear-gradient)"/>
            </g>
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

        <svg v-if="avatarId == 7" class="w-50" viewBox="0 0 132.396 132.396">
            <g id="Grupo_59" data-name="Grupo 59" opacity="0.5">
                <circle id="Elipse_158" data-name="Elipse 158" cx="66.198" cy="66.198" r="66.198" transform="translate(0 0)" fill="url(#linear-gradient)"/>
            </g>
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

        <svg v-if="avatarId == 8" class="w-50" viewBox="0 0 132.396 132.396">
            <g id="Grupo_60" data-name="Grupo 60" opacity="0.5">
                <circle id="Elipse_163" data-name="Elipse 163" cx="66.198" cy="66.198" r="66.198" fill="url(#linear-gradient)"/>
            </g>
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

        <div class="position-absolute w-50 h-100">
            <div id="edit-avatar" class="rounded-circle d-flex justify-content-center align-items-center">
                <svg style="fill: white;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 27.004 27.004">
                    <path id="Icon_material-edit" data-name="Icon material-edit" d="M4.5,25.875V31.5h5.625l16.59-16.59L21.09,9.285ZM31.065,10.56a1.494,1.494,0,0,0,0-2.115l-3.51-3.51a1.494,1.494,0,0,0-2.115,0L22.695,7.68l5.625,5.625,2.745-2.745Z" transform="translate(-4.5 -4.496)"/>
                </svg>
            </div>
        </div>
    </div>

    <div v-if="showSelector" id="modal-selector">

        <div @click="selectAvatar" id="1" :class="{ 'avatar-selected': avatarSelectedId === 1 }" class="w-100">
            <svg class="w-100" viewBox="0 0 178 178" pointer-events="none"> 
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
        </div>
        
        <div @click="selectAvatar" id="2" :class="{ 'avatar-selected': avatarSelectedId === 2 }" class="w-100">
            <svg class="w-100" viewBox="0 0 132.396 132.396" pointer-events="none">
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
        </div>

        <div @click="selectAvatar" id="3" :class="{ 'avatar-selected': avatarSelectedId === 3}" class="w-100">
            <svg class="w-100" viewBox="0 0 132.396 132.396" pointer-events="none">
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
        </div>

        <div @click="selectAvatar" id="4" :class="{ 'avatar-selected': avatarSelectedId === 4 }" class="w-100">
            <svg class="w-100" viewBox="0 0 132.396 132.396" pointer-events="none">
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
        </div>

        <div @click="selectAvatar" id="5" :class="{ 'avatar-selected': avatarSelectedId === 5}" class="w-100">
            <svg class="w-100" viewBox="0 0 132.396 132.396" pointer-events="none">
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
        </div>

        <div @click="selectAvatar" id="6" :class="{ 'avatar-selected': avatarSelectedId === 6 }" class="w-100">
            <svg class="w-100" viewBox="0 0 132.396 132.396" pointer-events="none">
                <g id="Grupo_58" data-name="Grupo 58" opacity="0.5">
                    <circle id="Elipse_153" data-name="Elipse 153" cx="66.198" cy="66.198" r="66.198" fill="url(#linear-gradient)"/>
                </g>
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
        </div>
    
        <div @click="selectAvatar" id="7" :class="{ 'avatar-selected': avatarSelectedId === 7 }" class="w-100">
            <svg class="w-100" viewBox="0 0 132.396 132.396" pointer-events="none">
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
        </div>

        <div @click="selectAvatar" id="8" :class="{ 'avatar-selected': avatarSelectedId === 8 }" class="w-100">
            <svg class="w-100" viewBox="0 0 132.396 132.396" pointer-events="none">
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
        </div>

        <!-- <div @click="replaceAvatar" id="replace-avatar" class="w-100 d-flex justify-content-center align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="6rem" height="6rem" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path xmlns="http://www.w3.org/2000/svg" d="m235.605469 203.519531v25.742188c0 8.175781 1.632812 15.035156 4.855469 20.378906 4.445312 7.375 11.742187 11.601563 20.027343 11.601563 8.117188 0 16.183594-3.953126 23.972657-11.742188l85.023437-85.023438c18.667969-18.667968 18.667969-49.042968 0-67.710937l-85.023437-85.023437c-7.789063-7.792969-15.855469-11.742188-23.972657-11.742188-12.386719 0-24.882812 9.890625-24.882812 31.980469v23.378906c-120.710938 7.128906-220.640625 99.765625-235.492188 221.050781-.832031 6.773438 3.019531 13.257813 9.367188 15.769532 1.796875.710937 3.667969 1.054687 5.515625 1.054687 4.679687 0 9.21875-2.191406 12.109375-6.140625 39.835937-54.429688 103.796875-86.925781 171.09375-86.925781 12.46875 0 25.007812 1.125 37.40625 3.351562zm0 0" fill="#5ead97" data-original="#000000" style="" class=""/><path xmlns="http://www.w3.org/2000/svg" d="m438.253906 219.820312c-6.347656-2.515624-13.589844-.421874-17.625 5.089844-39.832031 54.425782-103.792968 86.921875-171.089844 86.921875-12.46875 0-25.007812-1.125-37.40625-3.351562v-25.742188c0-22.089843-12.5-31.980469-24.882812-31.980469-8.117188 0-16.183594 3.953126-23.976562 11.746094l-85.023438 85.019532c-18.664062 18.667968-18.664062 49.042968.003906 67.714843l85.019532 85.019531c7.792968 7.792969 15.859374 11.742188 23.976562 11.742188 12.382812 0 24.882812-9.890625 24.882812-31.980469v-23.378906c120.714844-7.128906 220.640626-99.765625 235.492188-221.046875.832031-6.777344-3.019531-13.261719-9.371094-15.773438zm0 0" fill="#5ead97" data-original="#000000" style="" class=""/></g></svg>
        </div> -->

        <button @click="replaceAvatar">
            Ok
        </button>
        
    </div>

    
</div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'SelectAvatar',

    props: [
        'user',
    ],

    mounted() {       
        this.avatarId = this.user.avatar_id
        this.avatarSelectedId = this.user.avatar_id
    },

    data: function () {
        return {
            showSelector: false,

            avatarId: null,
            avatarSelectedId: null,
        }
    },

    methods: {
        openSelector: function () {
            this.showSelector = !this.showSelector;
            this.avatarSelectedId = this.user.avatar_id
        },

        selectAvatar: function (e) {
            this.avatarSelectedId = Number(e.target.id);
        },

        replaceAvatar: function () {

            this.user.avatar_id = this.avatarSelectedId;
            this.avatarId = this.avatarSelectedId;
            this.showSelector = !this.showSelector;
            
            axios.patch('/api/user/' + this.user.id, this.user)
                .then(response => {
                })
                .catch(errors => {
                    this.errors = errors.response.data.errors;
                })
        },
    },
}
</script>

<style scoped>
#edit-avatar {
    background-color: var(--primary-color);
    width: 4rem;
    height: 4rem;
    
    position: absolute;
    bottom: 0;
    right: 0;
}

#edit-avatar svg {
    width: 2rem;
}

#modal-selector {
    position: absolute;
    z-index: 1000;

    background-color: white;
    width: 92%;

    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-template-rows: repeat(3, 1fr);
    column-gap: 1rem;
    row-gap: 1rem;
}

.avatar-selected {
    border: 2px solid var(--primary-color);
    border-radius: 50%;
    box-shadow: 1px 1px 2px 3px #9b85dd63;
}

#replace-avatar {
    width: 100%;
    height: 100%;
    border-radius: 50%;
    background-color: #f5f5f5;
}

#replace-avatar p {
    font-size: 5rem;
}

@media (min-width: 961px) {
    #modal-selector {
        position: fixed;
        z-index: 1000;

        padding: 8rem !important;

        top: 0;
        left: 0;
        width: 50%;
        height: 100%;

        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-template-rows: repeat(3, 1fr);
        column-gap: 1rem;
        row-gap: 1rem;
    }

    #edit-avatar {
        width: 7rem;
        height: 7rem;
        
        position: absolute;
        bottom: 0;
        right: 2rem;
    }

    #edit-avatar svg {
        width: 2rem;
    }
    
}

</style>