document.querySelectorAll("#activeProjects tbody tr").forEach(function (row) {
    row.style.display = "none";
    row.classList.add("hidden");
});
document.querySelectorAll("#pendingProjects tbody tr").forEach(function (row) {
    row.style.display = "none";
    row.classList.add("hidden");
});

document.addEventListener("DOMContentLoaded", function () {
    const projectFilter = document.getElementById("projectFilter");
    const activeProjects = document.querySelectorAll("#activeProjects tbody tr");
    const pendingProjects = document.querySelectorAll("#pendingProjects tbody tr");

    const noDataRow = document.getElementsByClassName('noDataRow');
    const headerRow = document.getElementsByClassName('headerRow');

    projectFilter.addEventListener("change", function () {
        const filterValue = this.value.toLowerCase().trim();
        var i = 0;
        var flag = 0;
        var flag1 = 0;
        activeProjects.forEach(function (row) {
            var cells = row.getElementsByTagName("td");
            var responsaveis_id = cells[5].textContent.toLowerCase()
                .split('\n').map(function (item) {
                    return item.trim();
                }).filter(function (item) {
                    return item !== '';
                });
            if (responsaveis_id.includes(filterValue)) {
                flag = 1;
                if (i % 2 === 0) {
                    row.classList.remove('bg-white');
                    row.classList.add('bg-gray-300');
                } else {
                    row.classList.remove('bg-gray-300');
                    row.classList.add('bg-white');
                }
                i++;
                row.style.display = "";
                row.classList.remove("hidden");
            } else {
                row.style.display = "none";
                row.classList.add("hidden");
            }
        });

        i = 0;
        pendingProjects.forEach(function (row) {
            var cells = row.getElementsByTagName("td");
            var responsaveis_id = cells[5].textContent.toLowerCase()
                .split('\n').map(function (item) {
                    return item.trim();
                }).filter(function (item) {
                    return item !== '';
                });
            if (responsaveis_id.includes(filterValue)) {
                flag1 = 1;
                if (i % 2 === 0) {
                    row.classList.remove('bg-white');
                    row.classList.add('bg-gray-300');
                } else {
                    row.classList.remove('bg-gray-300');
                    row.classList.add('bg-white');
                }
                i++;
                row.style.display = "";
                row.classList.remove("hidden");
            } else {
                row.style.display = "none";
                row.classList.add("hidden");
            }
        });

        toggleRows(flag, noDataRow[0], headerRow[0]);
        toggleRows(flag1, noDataRow[1], headerRow[1]);
    });
});

function toggleRows(flag, noDataRow, headerRow) {
    if (flag) {
        noDataRow.classList.remove('table-cell');
        noDataRow.classList.add('hidden');

        headerRow.classList.remove('hidden');
    } else {
        noDataRow.classList.remove('hidden');
        noDataRow.classList.add('table-cell');

        headerRow.classList.add('hidden');
    }
}