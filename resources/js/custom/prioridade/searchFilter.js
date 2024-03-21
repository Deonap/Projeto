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

    projectFilter.addEventListener("change", function () {
        const filterValue = this.value.toLowerCase().trim();
        var i = 0;
        activeProjects.forEach(function (row) {
            var cells = row.getElementsByTagName("td");
            var responsaveis_id = cells[5].textContent.toLowerCase()
                .split('\n').map(function (item) {
                    return item.trim();
                }).filter(function (item) {
                    return item !== '';
                });
            if (responsaveis_id.includes(filterValue)) {
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
        var u = 0;
        pendingProjects.forEach(function (row) {
            var cells = row.getElementsByTagName("td");
            var responsaveis_id = cells[5].textContent.toLowerCase()
                .split('\n').map(function (item) {
                    return item.trim();
                }).filter(function (item) {
                    return item !== '';
                });
            if (responsaveis_id.includes(filterValue)) {
                if (u % 2 === 0) {
                    row.classList.remove('bg-white');
                    row.classList.add('bg-gray-300');
                } else {
                    row.classList.remove('bg-gray-300');
                    row.classList.add('bg-white');
                }
                u++;
                row.style.display = "";
                row.classList.remove("hidden");
            } else {
                row.style.display = "none";
                row.classList.add("hidden");
            }
        });
    });
});