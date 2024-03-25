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
55      45       0      0    0      0
35	    35       30     0    0      0
20	    20       20     40   0      0
15 	    15       15     35   10     10
*/

const weights = [
    [100, 0, 0, 0, 0, 0],
    [55, 45, 0, 0, 0, 0],
    [35, 35, 30, 0, 0, 0],
    [20, 20, 20, 40, 0, 0],
    [15, 15, 15, 35, 10, 10]
]

window.onresize = function () {
    resize(columns, weights);
};

resize(columns, weights);