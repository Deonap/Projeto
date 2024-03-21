const columns = 
[
    document.getElementsByClassName("col1"),
    document.getElementsByClassName("col2"),
    document.getElementsByClassName("col3"),
    document.getElementsByClassName("col4"),
    document.getElementsByClassName("col5"),
    document.getElementsByClassName("col6"),
];

function adjustColumns(config) {
    config.forEach((span, index) => {
        aux(columns[index], span);
    });
}

/*
NOME    CLIENTE  TIPO   OBS  DATA   BTNS
100     0        0      0    0      0
60	    40       0      0    0      0
40	    30       30     0    0      0
20	    19       19     42   0      0
15 	    15       15     35   10     10
*/

function resize(){
    var w = window.innerWidth;
    if (w < 640) {
        adjustColumns([100, 0, 0, 0, 0, 0]);
    } else if (w < 768) {
        adjustColumns([60, 40, 0, 0, 0, 0]);
    } else if (w < 1024) {
        adjustColumns([40, 30, 30, 0, 0, 0]);
    } else if (w < 1280) {
        adjustColumns([20, 19, 19, 42, 0, 0]);
    } else {
        adjustColumns([15, 15, 15, 35, 10, 10]);
    }
}

function aux(col, span){
    for(var i = 0; i < col.length; i++){
        col[i].setAttribute('colspan', span);
    }

}

window.onresize = function () {
    resize();
};

resize();