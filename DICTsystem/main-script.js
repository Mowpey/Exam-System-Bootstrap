//All Filters
document.addEventListener("DOMContentLoaded", function () {
  // Colors the passed,failed and pending cell
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
  // hotdog ni ken malaki
  //Sorting ID and Name
  const descCheckbox = document.getElementById("flexSwitchCheckDesc");
  const ascCheckbox = document.getElementById("flexSwitchCheckAsc");
  const oldestCheckbox = document.getElementById("flexSwitchCheckOldest");

  function handleFilterChange(event, param, value) {
    event.preventDefault();
    const url = new URL(window.location.href);

    if (event.target.checked) {
      url.searchParams.set(param, value);
      if (param === "sortName") {
        oldestCheckbox.checked = false;
        url.searchParams.delete("sortID");
      } else if (param === "sortID") {
        descCheckbox.checked = false;
        ascCheckbox.checked = false;
        url.searchParams.delete("sortName");
      }
    } else {
      url.searchParams.delete(param);
    }

    window.location.href = url.toString();
  }

  descCheckbox.addEventListener("change", function (event) {
    if (this.checked) ascCheckbox.checked = false;
    handleFilterChange(event, "sortName", "desc");
  });

  ascCheckbox.addEventListener("change", function (event) {
    if (this.checked) descCheckbox.checked = false;
    handleFilterChange(event, "sortName", "asc");
  });

  oldestCheckbox.addEventListener("change", function (event) {
    handleFilterChange(event, "sortID", "oldest");
  });

  //Gets the input from date pickers
  function initializeDatePicker(inputName) {
    $(`input[name="${inputName}"]`).daterangepicker({
      autoUpdateInput: false,
      locale: {
        cancelLabel: "Clear",
      },
      ranges: {
        Today: [moment(), moment()],
        "Last 7 Days": [moment().subtract(6, "days"), moment()],
        "Last 30 Days": [moment().subtract(29, "days"), moment()],
        "Last Month": [
          moment().subtract(1, "month").startOf("month"),
          moment().subtract(1, "month").endOf("month"),
        ],
      },
    });

    $(`input[name="${inputName}"]`).on(
      "apply.daterangepicker",
      function (ev, picker) {
        $(this).val(
          picker.startDate.format("MM/DD/YYYY") +
            " - " +
            picker.endDate.format("MM/DD/YYYY")
        );
        updateDateFilter(inputName, picker.startDate, picker.endDate);
      }
    );

    $(`input[name="${inputName}"]`).on(
      "cancel.daterangepicker",
      function (ev, picker) {
        $(this).val("");
        clearDateFilter(inputName);
      }
    );

    $(`input[name="${inputName}"]`).keypress(function (e) {
      if (e.which == 13) {
        if ($(this).val().trim() === "") {
          clearDateFilter(inputName);
        } else {
          let dates = $(this).val().split("-");
          if (dates.length === 2) {
            let startDate = moment(dates[0].trim(), "MM/DD/YYYY");
            let endDate = moment(dates[1].trim(), "MM/DD/YYYY");
            if (startDate.isValid() && endDate.isValid()) {
              updateDateFilter(inputName, startDate, endDate);
            }
          }
        }
      }
    });

    const urlParams = new URLSearchParams(window.location.search);
    const startDate = urlParams.get(`start_date_${inputName.split("_")[1]}`);
    const endDate = urlParams.get(`end_date_${inputName.split("_")[1]}`);
    if (startDate && endDate) {
      $(`input[name="${inputName}"]`).val(
        moment(startDate).format("MM/DD/YYYY") +
          " - " +
          moment(endDate).format("MM/DD/YYYY")
      );
    }
  }

  function updateDateFilter(inputName, startDate, endDate) {
    const url = new URL(window.location.href);
    url.searchParams.set(
      `start_date_${inputName.split("_")[1]}`,
      startDate.format("YYYY-MM-DD")
    );
    url.searchParams.set(
      `end_date_${inputName.split("_")[1]}`,
      endDate.format("YYYY-MM-DD")
    );

    history.pushState({}, "", url.toString());
  }

  //Clears date picker
  function clearDateFilter(inputName) {
    const url = new URL(window.location.href);
    url.searchParams.delete(`start_date_${inputName.split("_")[1]}`);
    url.searchParams.delete(`end_date_${inputName.split("_")[1]}`);

    history.pushState({}, "", url.toString());
  }

  initializeDatePicker("datefilter_examination");
  initializeDatePicker("datefilter_notification");

  //selects a status checkbox
  const statusForm = document.getElementById("statusForm");
  statusForm.addEventListener("change", function (event) {
    event.preventDefault();

    const formData = new FormData(statusForm);
    const url = new URL(window.location.href);

    url.searchParams.delete("status[]");

    for (let [key, value] of formData.entries()) {
      if (key === "status[]") {
        url.searchParams.append(key, value);
      }
    }

    if (!formData.getAll("status[]").length) {
      url.searchParams.delete("status[]");
    }

    history.pushState({}, "", url.toString());
  });

  //shows the dropdown items and execute the dropdown functions
  const examVenueClearBtn = document.getElementById("examVenueClearBtn");
  const examVenueDropdown = document.getElementById("examVenueDropdown");
  const dropdownItems = document.querySelectorAll(".dropdown-item");

  if (examVenueClearBtn && examVenueDropdown) {
    examVenueClearBtn.addEventListener("click", function (event) {
      event.preventDefault();
      examVenueDropdown.textContent = "Select an Exam Venue";

      const url = new URL(window.location.href);
      url.searchParams.delete("exam_venue");
      history.pushState({}, "", url.toString());
    });

    dropdownItems.forEach((item) => {
      item.addEventListener("click", function (event) {
        event.preventDefault();
        const selectedVenue = this.getAttribute("data-value");
        examVenueDropdown.textContent = selectedVenue;

        const url = new URL(window.location.href);
        url.searchParams.set("exam_venue", selectedVenue);
        history.pushState({}, "", url.toString());
      });
    });
  }

  //Gets the selected dropdown option
  const urlParams = new URLSearchParams(window.location.search);
  const examVenue = urlParams.get("exam_venue");
  if (examVenue && examVenueDropdown) {
    examVenueDropdown.textContent = examVenue;
  }

  //Clears the status filters
  const statusClearBtn = document.getElementById("statusClearBtn");

  if (statusClearBtn && statusForm) {
    statusClearBtn.addEventListener("click", function (event) {
      event.preventDefault();

      statusForm
        .querySelectorAll('input[type="checkbox"]')
        .forEach((checkbox) => {
          checkbox.checked = false;
        });

      const url = new URL(window.location.href);
      url.searchParams.delete("status[]");
      history.pushState({}, "", url.toString());
    });
  }
});

//Automatically refreshes the page
document.addEventListener("DOMContentLoaded", function () {
  // Add event listener to the offcanvas hide event
  document
    .querySelector("#offcanvasNavbar")
    .addEventListener("hidden.bs.offcanvas", function () {
      window.location.reload(); // Reload the page immediately
    });

  // Add event listener to the close button (X mark)
  document.querySelectorAll(".btn-close").forEach((btn) => {
    btn.addEventListener("click", function () {
      window.location.reload(); // Reload the page
    });
  });
});
