import { resize } from '../mainResizing.js';

const columns =
    [
        document.getElementsByClassName("col1"),
        document.getElementsByClassName("col2"),
        document.getElementsByClassName("col3"),
        document.getElementsByClassName("col4"),
        document.getElementsByClassName("col5"),
        document.getElementsByClassName("col6"),
        document.getElementsByClassName("col7"),
        document.getElementsByClassName("col8"),
    ];

/*
11 2 3 44 55
NOME    CLIENTE  TIPO   OBS     TEMPO_INV      TEMPO_PREV  DATA   BTNS
55      45       0      0       0              0           0       0
35      35       30     0       0              0           0       0
20	    20       20     40      0              0           0       0
15	    15       15     35      10             10          0       0
12 	    12       12     12      12             12          12      16
*/

const weights = [
    [55, 45, 0, 0, 0, 0, 0, 0],
    [35, 35, 30, 0, 0, 0, 0, 0],
    [20, 20, 20, 40, 0, 0, 0, 0],
    [15, 15, 15, 35, 10, 10, 0, 0],
    [12, 12, 12, 12, 12, 12, 12, 16]
]

window.onresize = function () {
    resize(columns, weights);
};

resize(columns, weights);