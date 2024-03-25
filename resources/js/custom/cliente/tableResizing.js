import { resize } from '../mainResizing.js';

const columns =
    [
        document.getElementsByClassName("col1"),
        document.getElementsByClassName("col2"),
        document.getElementsByClassName("col3"),
        document.getElementsByClassName("col4"),
        document.getElementsByClassName("col5")
    ];

/*
NOME    EMAIL   TELEMOVEL   MORADA  BTNS
100     0       0           0       0

*/

const weights = [
    [100, 0, 0, 0, 0],
    [45, 55, 0, 0, 0],
    [33, 42, 25, 0, 0],
    [22, 28, 17, 33, 0],
    [20, 25, 15, 30, 10]
]


window.onresize = function () {
    resize(columns, weights);
};

resize(columns, weights);