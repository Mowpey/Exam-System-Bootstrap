<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Application Records</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
    <script src="main-script.js"></script>
    <style>
      .sticky-id {
        position: sticky;
        left: 0;
        z-index: 2;
      }

      .sticky-name {
        position: sticky;
        left: 1.55rem;
        z-index: 2;
      }

      .delete-column {
        display: none;
      }

      #header {
        margin-top: 4.5rem;
      }
    </style>
  </head>
  <body>

    <?php include_once('first-connection.php'); ?>
    <?php include('fetching-data.php');?>
    <?php include('fetch-scores.php')?>
    
  

    <nav class="navbar bg-body-tertiary fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"></a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="offcanvas"
          data-bs-target="#offcanvasNavbar"
          aria-controls="offcanvasNavbar"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div
          class="offcanvas offcanvas-end"
          tabindex="-1"
          id="offcanvasNavbar"
          aria-labelledby="offcanvasNavbarLabel"
        >
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Filters</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="offcanvas"
              aria-label="Close"
            ></button>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
              <!-- Name -->
              <li class="nav-item mb-3">
                <span class="fw-bold">Name</span>
                <ul class="list-group mt-2">
                  <!-- Added mt-2 (margin-top) class here -->
                  <li class="list-group-item">
                    <input
                      class="form-check-input me-1"
                      type="radio"
                      name="sortName"
                      value="asc"
                      id="firstNameRadio"
                    />
                    <label class="form-check-label" for="firstNameRadio"
                      >Sort Name (A-Z)</label
                    >
                  </li>
                  <li class="list-group-item">
                    <input
                      class="form-check-input me-1"
                      type="radio"
                      name="sortName"
                      value="desc"
                      id="secondNameRadio"
                    />
                    <label class="form-check-label" for="secondNameRadio"
                      >Sort Name (Z-A)</label
                    >
                  </li>
                </ul>
              </li>

              <!-- ID -->
              <li class="nav-item mb-3">
                <span class="fw-bold">ID</span>
                <ul class="list-group mt-2">
                  <!-- Added mt-2 (margin-top) class here -->
                  <li class="list-group-item">
                    <input
                      class="form-check-input me-1"
                      type="radio"
                      name="sortID"
                      value="oldest"
                      id="firstIDRadio"
                    />
                    <label class="form-check-label" for="firstIDRadio"
                      >Oldest ID <i class="bi bi-arrow-down"></i
                    ></label>
                  </li>
                  <li class="list-group-item">
                    <input
                      class="form-check-input me-1"
                      type="radio"
                      name="sortID"
                      value="newest"
                      id="secondIDRadio"
                    />
                    <label class="form-check-label" for="secondIDRadio"
                      >Newest ID <i class="bi bi-arrow-up"></i
                    ></label>
                  </li>
                </ul>
              </li>

              <!-- Province -->
              <li class="nav-item mb-3">
                <span class="fw-bold">Province</span>
                <ul class="list-group mt-2">
                  <!-- Added mt-2 (margin-top) class here -->
                  <li class="list-group-item">
                    <input
                      class="form-check-input me-1"
                      type="radio"
                      name="sortProvince"
                      value="asc"
                      id="firstProvinceRadio"
                    />
                    <label class="form-check-label" for="firstProvinceRadio"
                      >Sort Province (A-Z)</label
                    >
                  </li>
                  <li class="list-group-item">
                    <input
                      class="form-check-input me-1"
                      type="radio"
                      name="sortProvince"
                      value="desc"
                      id="secondProvinceRadio"
                    />
                    <label class="form-check-label" for="secondProvinceRadio"
                      >Sort Province (Z-A)</label
                    >
                  </li>
                </ul>
              </li>

              <!-- Date of Examination -->
              <li class="nav-item mb-3">
                <span class="fw-bold">Date of Examination</span>
                <ul class="list-group mt-2">
                  <!-- Added mt-2 (margin-top) class here -->
                  <li class="list-group-item">
                    <input
                      class="form-check-input me-1"
                      type="radio"
                      name="sortDate"
                      value="oldest"
                      id="firstDateRadio"
                    />
                    <label class="form-check-label" for="firstDateRadio"
                      >Oldest Date <i class="bi bi-arrow-down"></i
                    ></label>
                  </li>
                  <li class="list-group-item">
                    <input
                      class="form-check-input me-1"
                      type="radio"
                      name="sortDate"
                      value="newest"
                      id="secondDateRadio"
                    />
                    <label class="form-check-label" for="secondDateRadio"
                      >Newest Date <i class="bi bi-arrow-up"></i
                    ></label>
                  </li>
                </ul>
              </li>

              <!-- Score -->
              <li class="nav-item mb-3">
                <span class="fw-bold">Score</span>
                <ul class="list-group mt-2">
                  <!-- Added mt-2 (margin-top) class here -->
                  <li class="list-group-item">
                    <input
                      class="form-check-input me-1"
                      type="radio"
                      name="sortScore"
                      value="lowest"
                      id="firstScoreRadio"
                    />
                    <label class="form-check-label" for="firstScoreRadio"
                      >Lowest Total Score <i class="bi bi-arrow-down"></i
                    ></label>
                  </li>
                  <li class="list-group-item">
                    <input
                      class="form-check-input me-1"
                      type="radio"
                      name="sortScore"
                      value="highest"
                      id="secondScoreRadio"
                    />
                    <label class="form-check-label" for="secondScoreRadio"
                      >Highest Total Score <i class="bi bi-arrow-up"></i
                    ></label>
                  </li>
                </ul>
              </li>

              <!-- Status -->
              <li class="nav-item mb-3">
                <span class="fw-bold">Status</span>
                <ul class="list-group mt-2">
                  <!-- Added mt-2 (margin-top) class here -->
                  <li class="list-group-item">
                    <input
                      class="form-check-input me-1"
                      type="radio"
                      name="sortStatus"
                      value="passed"
                      id="passedRadio"
                    />
                    <label class="form-check-label" for="passedRadio"
                      >Passed</label
                    >
                  </li>
                  <li class="list-group-item">
                    <input
                      class="form-check-input me-1"
                      type="radio"
                      name="sortStatus"
                      value="failed"
                      id="failedRadio"
                    />
                    <label class="form-check-label" for="failedRadio"
                      >Failed</label
                    >
                  </li>
                  <li class="list-group-item">
                    <input
                      class="form-check-input me-1"
                      type="radio"
                      name="sortStatus"
                      value="pending"
                      id="pendingRadio"
                    />
                    <label class="form-check-label" for="pendingRadio"
                      >Pending</label
                    >
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
    <div class="container" id="header">
      <h1>Applicant Records</h1>
    </div>
    <div class="container my-3">
      <div class="d-flex justify-content-between">
        <form class="d-flex" role="search">
          <input
            class="form-control me-2"
            type="search"
            placeholder="Search"
            aria-label="Search"
          />
        </form>
        <div >
          <button type="button" class="btn btn-primary mx-1">Add</button>
          <button type="button" class="btn btn-info">Edit</button>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr class="table-primary">
              <th scope="col" class="delete-column"></th>
              <th scope="col" class="sticky-id">ID</th>
              <th scope="col" class="sticky-name">Name</th>
              <th scope="col">Sex</th>
              <th scope="col">Province</th>
              <th scope="col">Date of Examination</th>
              <th scope="col">Exam Venue</th>
              <th scope="col">Date of Notification</th>
              <th scope="col" colspan="4" class="text-center">Score</th>
              <th scope="col">Proctor</th>
              <th scope="col">Status</th>
              <th scope="col">Email</th>
              <th scope="col">Contact Number</th>
              <th scope="col">Attached Form</th>
            </tr>
            <tr class="text-center table-primary">
              <th scope="col" class="sticky-id"></th>
              <th scope="col" class="sticky-name"></th>

              <th scope="col"></th>
              <th scope="col"></th>
              <th scope="col"></th>
              <th scope="col"></th>
              <th scope="col"></th>
              <th scope="col" class="delete-column"></th>
              <th scope="col" class="align-top">Part 1</th>
              <th scope="col" class="align-top">Part 2</th>
              <th scope="col" class="align-top">Part 3</th>
              <th scope="col" class="align-top">Total Score</th>
              <th scope="col"></th>
              <th scope="col"></th>
              <th scope="col"></th>
              <th scope="col"></th>
              <th scope="col"></th>
            </tr>
          </thead>

        <tbody id="applicant-table-body">
            <?php if (!empty($applicant_detail)): ?>
                <?php foreach ($applicant_detail as $applicant): ?>
                <tr>
                    <td class="delete-column">
                        <button type="button" class="btn btn-danger">Delete</button>
                    </td>
                    <td class="sticky-id"><?= htmlspecialchars($applicant['applicantID']) ?></td>
                    <td class="sticky-name"><?= htmlspecialchars($applicant['name']) ?></td>
                    <td><?= htmlspecialchars($applicant['sex']) ?></td>
                    <td><?= htmlspecialchars($applicant['province']) ?></td>
                    <td><?= htmlspecialchars($applicant['date_of_examination']) ?></td>
                    <td><?= htmlspecialchars($applicant['exam_venue']) ?></td>
                    <td><?= htmlspecialchars($applicant['date_of_notification']) ?></td>
                      <?php if (isset($scores[$applicant['applicantID']])): ?>
                          <?php $score = $scores[$applicant['applicantID']]; ?>
                          <td><?= htmlspecialchars($score['score1']) ?></td>
                          <td><?= htmlspecialchars($score['score2']) ?></td>
                          <td><?= htmlspecialchars($score['score3']) ?></td>
                          <td><?= htmlspecialchars($score['total']) ?></td>
                      <?php else: ?>
                          <td colspan="4">No scores found</td>
                      <?php endif; ?>
                    <td><?= htmlspecialchars($applicant['proctor']) ?></td>
                    <td><?= htmlspecialchars($applicant['status']) ?></td>
                    <td><a href="mailto:<?= htmlspecialchars($applicant['email_address']) ?>"><?= htmlspecialchars($applicant['email_address']) ?></a></td>
                    <td><?= htmlspecialchars($applicant['contact_number']) ?></td>
                    <td><a target="_blank"   href="applicant-form.php?id=<?= $applicant['applicantID'] ?>">Download File</a></td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="17">No records found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
        </table>
      </div>
      <button type="button" class="btn btn-success">Save</button>
    </div>
    
  </body>
</html>
