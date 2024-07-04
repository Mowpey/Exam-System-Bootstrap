document.addEventListener("DOMContentLoaded", function () {
  const statusCells = document.querySelectorAll(
    ".table.table-hover tbody tr td:nth-last-of-type(4)"
  );

  statusCells.forEach((statusCell) => {
    const status = statusCell.textContent.trim();

    if (status === "Passed") {
      statusCell.classList.add("table-success");
    } else if (status === "Failed") {
      statusCell.classList.add("table-danger");
    } else if (status === "Pending") {
      statusCell.classList.add("table-info");
    }
  });
});

document.addEventListener("DOMContentLoaded", function () {
  const editButton = document.querySelector(".btn-info");
  const deleteColumnCells = document.querySelectorAll(".delete-column");

  editButton.addEventListener("click", function () {
    deleteColumnCells.forEach((cell) => {
      if (cell.style.display === "none" || cell.style.display === "") {
        cell.style.display = "table-cell";
      } else {
        cell.style.display = "none";
      }
    });
  });
});
