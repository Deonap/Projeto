import { loadConfigFromFile } from 'vite';
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
NOME    EMAIL   STATUS  TIPO    BTNS
100     0       0       0       0
45      55      0       0       0
33      42      25      0       0
22      28      17      33      0
20      15      15      30      10
*/

const weights = [
    [100, 0, 0, 0, 0],
    [45, 55, 0, 0, 0],
    [33, 42, 25, 0, 0],
    [22, 28, 17, 33, 0],
    [20, 20, 15, 25, 10]
];

window.onresize = function () {
    resize(columns, weights);
};

resize(columns, weights);