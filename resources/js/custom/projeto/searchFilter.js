document.querySelectorAll("#activeTable tbody tr").forEach(function (row) {
    row.style.display = "none";
    row.classList.add("hidden");
});
var i = 0;
document.querySelectorAll("#finishedTable tbody tr").forEach(function (row) {
    row.style.display = "none";
    row.classList.add("hidden");
});

document.addEventListener("DOMContentLoaded", function () {
    const projectFilter = document.getElementById("projectFilter");
    const activeTable = document.querySelectorAll("#activeTable tbody tr");
    const finishedTable = document.querySelectorAll("#finishedTable tbody tr");

    const noDataRow = document.getElementsByClassName('noDataRow');
    const headerRow = document.getElementsByClassName('headerRow');

    projectFilter.addEventListener("change", function () {
        const filterValue = this.value.toLowerCase().trim();
        var i = 0;
        var flag = 0;
        var flag1 = 0;
        activeTable.forEach(function (row) {
            var cells = row.getElementsByTagName("td");
            var supervisorId = cells[6].textContent.toLowerCase().trim();

            if (supervisorId == filterValue) {
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
        finishedTable.forEach(function (row) {
            var cells = row.getElementsByTagName("td");
            var supervisorId = cells[6].textContent.toLowerCase().trim();

            if (supervisorId == filterValue) {
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
            if (flag) {
                noDataRow[0].classList.remove('table-cell');
                noDataRow[0].classList.add('hidden');

                headerRow[0].classList.remove('hidden');
            } else {
                noDataRow[0].classList.remove('hidden');
                noDataRow[0].classList.add('table-cell');

                headerRow[0].classList.add('hidden');
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