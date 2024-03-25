import { resize } from '../mainResizing.js';

const columns =
    [
        [
            document.getElementsByClassName("col1"),
            document.getElementsByClassName("col2"),
            document.getElementsByClassName("col3"),
            document.getElementsByClassName("col4"),
            document.getElementsByClassName("col5"),
            document.getElementsByClassName("col6"),
            document.getElementsByClassName("col7"),
            document.getElementsByClassName("col8"),
        ],
        [
            document.getElementsByClassName("col1_2"),
            document.getElementsByClassName("col2_2"),
            document.getElementsByClassName("col3_2"),
            document.getElementsByClassName("col4_2"),
            document.getElementsByClassName("col5_2"),
            document.getElementsByClassName("col6_2")
        ]
    ];

/*
1       1        2      3       4              4           5      5
NOME    CLIENTE  TIPO   OBS     TEMPO_INV      TEMPO_PREV  DATA   BTNS
55      45       0      0       0              0           0       0
35      35       30     0       0              0           0       0
20	    20       20     40      0              0           0       0
15	    15       15     35      10             10          0       0
12 	    12       12     12      12             12          12      16
*/

/*
1       1        2      3    4      5
NOME    CLIENTE  TIPO   OBS  DATA   BTNS
100     0        0      0    0      0
55      45       0      0    0      0
35	    35       30     0    0      0
20	    20       20     40   0      0
15 	    15       15     35   10     10
*/

const weights =
    [
        [
            [55, 45, 0, 0, 0, 0, 0, 0],
            [35, 35, 30, 0, 0, 0, 0, 0],
            [20, 20, 20, 40, 0, 0, 0, 0],
            [15, 15, 15, 35, 10, 10, 0, 0],
            [12, 12, 12, 16, 12, 12, 12, 12]
        ],
        [
            [55, 45, 0, 0, 0, 0],
            [35, 35, 30, 0, 0, 0],
            [20, 20, 20, 40, 0, 0],
            [15, 15, 15, 40, 15, 0],
            [15, 15, 15, 35, 10, 10]
        ]
    ];


window.onresize = function () {
    resize(columns[0], weights[0]);
    resize(columns[1], weights[1]);
};

resize(columns[0], weights[0]);
resize(columns[1], weights[1]);