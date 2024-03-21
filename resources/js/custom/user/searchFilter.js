var i = 0;
document.querySelectorAll("#userTable tbody tr").forEach(function (row) {
    if (i % 2 === 0) {
        row.classList.add('bg-gray-300');
    } else {
        row.classList.add('bg-white');
    }
    i++;
});

document.addEventListener("DOMContentLoaded", function () {
    const filterInput = document.getElementById("userFilter");
    const tableRows = document.querySelectorAll("#userTable tbody tr");

    filterInput.addEventListener("input", function () {
        const filterValue = this.value.toLowerCase().trim();
        var i = 0;
        tableRows.forEach(function (row) {
            const name = row.querySelector("td:first-child").textContent.toLowerCase();
            if (name.includes(filterValue)) {
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