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
  const descCheckbox = document.getElementById("flexSwitchCheckDesc");
  const ascCheckbox = document.getElementById("flexSwitchCheckAsc");

  descCheckbox.addEventListener("change", function (event) {
    event.preventDefault();
    if (this.checked) {
      ascCheckbox.checked = false;
      document.getElementById("nameFilterForm").sortName.value = "desc";
      document.getElementById("nameFilterForm").submit();
    } else {
      document.getElementById("nameFilterForm").submit();
    }
  });

  ascCheckbox.addEventListener("change", function (event) {
    event.preventDefault();
    if (this.checked) {
      descCheckbox.checked = false;
      document.getElementById("nameFilterForm").sortName.value = "asc";
      document.getElementById("nameFilterForm").submit();
    } else {
      document.getElementById("nameFilterForm").submit();
    }
  });
});

document.addEventListener("DOMContentLoaded", function () {
  const oldestCheckbox = document.getElementById("flexSwitchCheckOldest");

  oldestCheckbox.addEventListener("change", function () {
    const form = document.getElementById("idFilterForm");
    const url = new URL(window.location.href);
    if (this.checked) {
      url.searchParams.set("sortID", "oldest");
    } else {
      url.searchParams.delete("sortID");
    }
    form.action = url.toString();
    form.submit();
  });
});
