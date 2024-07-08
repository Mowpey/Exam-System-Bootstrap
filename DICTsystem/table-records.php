<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Application Records</title>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
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
        .delete-column,
        .sticky-id,
        .sticky-name {
          position: sticky;
          z-index: 2;
        }

        @media (min-width: 768px) {
          .delete-column {
            left: 0;

          }

          .sticky-id {
            left: 6.7rem;
          }

          .sticky-name {
            left: 8.1rem;
            font-weight: 700;
          }
        }

        @media (max-width: 767px) {
          .delete-column,
          .sticky-id,
          .sticky-name {
            left: unset; 
          }

          .delete-column {
            left:0;
          }

          .sticky-id {
            left: 3.55rem; 
          }

          .sticky-name {
            left: 5rem; 
            font-weight: 700;
          }
        }

        #header {
          margin-top: 4.5rem;
        }
        .score {
          text-align: right;
        }

        .invisible {
          opacity: 0;
          pointer-events:none;
        }
    </style>

  </head>
  <body>
<<<<<<< Updated upstream

=======
    <!-- Includes the necessary PHP files so the code could function-->
>>>>>>> Stashed changes
    <?php include_once('first-connection.php'); ?>
    <?php include('fetch-scores.php');?>
    <?php include('filter-search.php');?>
   
<<<<<<< Updated upstream

=======
    <!-- All the Filters are applied here in the nav bar-->
>>>>>>> Stashed changes
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
            <form id="nameFilterForm" action="" method="GET">
              <div class="mb-3">
                <span class="fw-bold">Name</span>
                <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDesc" name="sortName" value="desc" <?php echo isset($_GET['sortName']) && $_GET['sortName'] === 'desc' ? 'checked' : ''; ?>>
                  <label class="form-check-label" for="flexSwitchCheckDesc">Sort Name (Z to A) <i class="bi bi-arrow-down"></i></label>
                </div>
                <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckAsc" name="sortName" value="asc" <?php echo isset($_GET['sortName']) && $_GET['sortName'] === 'asc' ? 'checked' : ''; ?>>
                  <label class="form-check-label" for="flexSwitchCheckAsc">Sort Name (A to Z) <i class="bi bi-arrow-up"></i></label>
                </div>
              </div>
            </form>

              <form id="idFilterForm" action="" method="GET">
                  <div class="mb-3">
                    <span class="fw-bold">ID</span>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckOldest" name="sortID" value="oldest" <?php echo isset($_GET['sortID']) && $_GET['sortID'] === 'oldest' ? 'checked' : ''; ?>>
                      <label class="form-check-label" for="flexSwitchCheckOldest">Oldest ID <i class="bi bi-arrow-down"></i></label>
                    </div>
                  </div>
              </form>

            <span class = "d-block fw-bold">Date of Examination</span>
            <input type="text" name="datefilter_examination" value="" />

            <span class = "d-block fw-bold">Date of Notification</span>
            <input type="text" name="datefilter_notification" value="" />

<<<<<<< Updated upstream
=======
            <span class= "d-block fw-bold" >Status</span>
              <form id="statusForm">
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="Passed" id="flexCheckPassed" name="status[]"
                            <?php echo (isset($_GET['status']) && in_array('Passed', $_GET['status'])) ? 'checked' : ''; ?>>
                      <label class="form-check-label" for="flexCheckPassed">
                          Passed
                      </label>
                  </div>

                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="Failed" id="flexCheckFailed" name="status[]"
                            <?php echo (isset($_GET['status']) && in_array('Failed', $_GET['status'])) ? 'checked' : ''; ?>>
                      <label class="form-check-label" for="flexCheckFailed">
                          Failed
                      </label>
                  </div>

                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="Pending" id="flexCheckPending" name="status[]"
                            <?php echo (isset($_GET['status']) && in_array('Pending', $_GET['status'])) ? 'checked' : ''; ?>>
                      <label class="form-check-label" for="flexCheckPending">
                          Pending
                      </label>
                  </div>
              </form>


>>>>>>> Stashed changes

            </div>
          </div>
        </div>
      </nav>

<<<<<<< Updated upstream
    <div class="container" id="header">
      <h1>Applicant Records</h1>
    </div>
=======
    <!-- Here is the title of the table-->
    <div class="container" id="header">
      <h1>Applicant Records</h1>
    </div>
    <!-- This is the part of the search function-->
>>>>>>> Stashed changes
    <div class="container my-3">
      <div class="d-flex justify-content-between">
        <form class="d-flex" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
              <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        <div >
          <button type="button" class="btn btn-primary mx-1"><i class="bi bi-plus-lg"></i></button>
        </div>
      </div>
    </div>
<<<<<<< Updated upstream
=======

    <!-- These are the code for the table as it displays to the screen-->
>>>>>>> Stashed changes
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
                  <th scope="col" class="delete-column"></th>
                  <th scope="col" class="sticky-id"></th>
                  <th scope="col" class="sticky-name"></th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                  <th scope="col"></th>
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
                <?php if (!empty($applicant_record)): ?>
                  <?php foreach ($applicant_record as $applicant): ?>
                    <tr>
                      <td class="delete-column">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                          <button class="btn btn-danger" type="button"><i class="bi bi-trash"></i></button>
                          <button class="btn btn-secondary" type="button"><i class="bi bi-pencil-square text-white"></i></button>
                        </div>
                      </td>
                      <td class="sticky-id"><?= htmlspecialchars($applicant['applicantID']) ?></td>
                      <td class="sticky-name"><?= htmlspecialchars($applicant['name']) ?></td>
                      <td><?= htmlspecialchars($applicant['sex']) ?></td>
                      <td><?= htmlspecialchars($applicant['province']) ?></td>
                      <td><?= htmlspecialchars((new DateTime($applicant['date_of_examination']))->format('M d Y')) ?></td>
                      <td><?= htmlspecialchars($applicant['exam_venue']) ?></td>
                      <td><?= htmlspecialchars((new DateTime($applicant['date_of_notification']))->format('M d Y')) ?></td>
                      
                      <?php if (isset($scores[$applicant['applicantID']])): ?>
                        <?php $score = $scores[$applicant['applicantID']]; ?>
                        <td class="score"><?= htmlspecialchars($score['score1']) ?></td>
                        <td class="score"><?= htmlspecialchars($score['score2']) ?></td>
                        <td class="score"><?= htmlspecialchars($score['score3']) ?></td>
                        <td class="score"><?= htmlspecialchars($score['total']) ?></td>
                      <?php else: ?>
                        <td colspan="4">No scores found</td>
                      <?php endif; ?>
                      
                      <td><?= htmlspecialchars($applicant['proctor']) ?></td>
                      <td><?= htmlspecialchars($applicant['status']) ?></td>
                      <td><a href="mailto:<?= htmlspecialchars($applicant['email_address']) ?>"><?= htmlspecialchars($applicant['email_address']) ?></a></td>
                      <td><?= htmlspecialchars($applicant['contact_number']) ?></td>
                      <td><a target="_blank" href="applicant-form.php?id=<?= $applicant['applicantID'] ?>">attachment</a></td>
                    </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                     <td class="delete-column">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                              <button class="btn btn-danger invisible" type="button" disabled><i class="bi bi-trash"></i></button>
                              <button class="btn btn-secondary invisible" type="button" disabled><i class="bi bi-pencil-square text-white"></i></button>
                        </div>
                      </td>
                  <td colspan="16" class="text-center">No records found.</td>
             </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
      <button type="button" class="btn btn-success float-end my-2">Save</button>
    </div>
    
  </body>
</html>
