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
NOME    EMAIL   STATUS  TIPO    BTNS
100     0       0       0       0
45      55      0       0       0
33      42      25      0       0
22      28      17      33      0
20      15      15      30      10
*/

function resize(w = window.innerWidth){
    if (w < 640) {
        adjustColumns([100, 0, 0, 0, 0]);
    } else if (w < 768) {
        adjustColumns([45, 55, 0, 0, 0]);
    } else if (w < 1024) {
        adjustColumns([33, 42, 25, 0, 0]);
    } else if (w < 1280) {
        adjustColumns([22, 28, 17, 33, 0]);
    } else {
        adjustColumns([20, 25, 15, 30, 10]);
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