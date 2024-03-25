import {resize} from '../mainResizing.js';

const columns =
    [
        document.getElementsByClassName("col1"),
        document.getElementsByClassName("col2"),
        document.getElementsByClassName("col3"),
        document.getElementsByClassName("col4"),
        document.getElementsByClassName("col5")
    ];

function adjustColumns(config) {
    config.forEach((span, index) => {
        aux(columns[index], span);
    });
}

/*
NOME    CLIENTE  TIPO   OBS  DATA
100     0        0      0    0
60	    40       0      0    0
40	    30       30     0    0
20	    19       19     42   0
20 	    20       15     35   10
*/

const weights = [
    [100, 0, 0, 0, 0],
    [60, 40, 0, 0, 0],
    [40, 30, 30, 0, 0],
    [20, 19, 19, 42, 0],
    [20, 20, 15, 35, 10]
];

window.onresize = function () {
    resize(columns, weights);
};

resize(columns, weights);