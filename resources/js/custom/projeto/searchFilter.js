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

    projectFilter.addEventListener("change", function () {
        const filterValue = this.value.toLowerCase().trim();
        var i = 0;
        activeTable.forEach(function (row) {
            var cells = row.getElementsByTagName("td");
            var supervisorId = cells[6].textContent.toLowerCase().trim();

            if (supervisorId == filterValue) {
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
    });

    projectFilter.addEventListener("change", function () {
        const filterValue = this.value.toLowerCase().trim();
        var i = 0;
        finishedTable.forEach(function (row) {
            var cells = row.getElementsByTagName("td");
            var supervisorId = cells[6].textContent.toLowerCase().trim();

            if (supervisorId == filterValue) {
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
    });
});