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

function resize(){
    var w = window.innerWidth;
    if (w < 640) {
        adjustColumns([6, 0, 0, 0, 0, 0]);
    } else if (w < 768) {
        adjustColumns([4, 2, 0, 0, 0, 0]);
    } else if (w < 1024) {
        adjustColumns([3, 2, 1, 0, 0, 0]);
    } else if (w < 1280) {
        adjustColumns([2, 1, 1, 2, 0, 0]);
    } else {
        adjustColumns([1, 1, 1, 1, 1, 1]);
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