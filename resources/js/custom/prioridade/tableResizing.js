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
            document.getElementsByClassName("col8")
        ];

/*
1       1       1        2      3       4              4           5
PRIO    NOME    CLIENTE  TIPO   OBS     TEMPO_INV      TEMPO_PREV  DATA   
10      50      40       0      0       0              0           0
10      35      35       20     0       0              0           0
10      20	    20       15     35      0              0           0
10      15	    15       10     30      10             10          0
10      12 	    12       12     18      12             12          12
*/

const weights =
    [
        [25, 40, 35, 0, 0, 0, 0, 0],
        [15, 28, 33, 20, 0, 0, 0, 0],
        [15, 18, 17, 15, 35, 0, 0, 0],
        [10, 15, 15, 10, 30, 10, 10, 0],
        [10, 12, 12, 12, 18, 12, 12, 12]
    ];


window.onresize = function () {
    resize(columns, weights);
};

resize(columns, weights);