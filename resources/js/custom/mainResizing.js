function adjustColumns(columns, weights) {
    weights.forEach((span, index) => {
        aux(columns[index], span);
    });
}

export function resize(columns, weights) {
    var w = window.innerWidth;
    if (w < 640) {
        adjustColumns(columns, weights[0]);
    } else if (w < 768) {
        adjustColumns(columns, weights[1]);
    } else if (w < 1024) {
        adjustColumns(columns, weights[2]);
    } else if (w < 1280) {
        adjustColumns(columns, weights[3]);
    } else {
        adjustColumns(columns, weights[4]);
    }
}

function aux(col, span) {
    for (var i = 0; i < col.length; i++) {
        col[i].setAttribute('colspan', span);
    }
}
