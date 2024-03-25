import { resize } from '../mainResizing.js';

const columns =
    [
        document.getElementsByClassName("col1"),
        document.getElementsByClassName("col2"),
        document.getElementsByClassName("col3"),
        document.getElementsByClassName("col4"),
        document.getElementsByClassName("col5"),
        document.getElementsByClassName("col6"),
    ];

/*
NOME    CLIENTE  TIPO   OBS  DATA   BTNS
100     0        0      0    0      0
60	    40       0      0    0      0
40	    30       30     0    0      0
20	    19       19     42   0      0
15 	    15       15     35   10     10
*/

const weights = [
    [100, 0, 0, 0, 0, 0],
    [60, 40, 0, 0, 0, 0],
    [40, 30, 30, 0, 0, 0],
    [20, 19, 19, 42, 0, 0],
    [15, 15, 15, 35, 10, 10]
]

window.onresize = function () {
    resize(columns, weights);
};

resize(columns, weights);