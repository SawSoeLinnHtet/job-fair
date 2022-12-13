<?php
include("../../../vendor/autoload.php");
include("../../../App/_classes/Helpers/DateTime.php");

use Models\Database\JobsTable;
use Models\Database\CategoryTable;
use Models\Database\MYSQL;
use Helpers\Auth;

$session_user = Auth::check();

$table = new JobsTable(new MYSQL());
$category = new CategoryTable(new MYSQL());

$category_limits = $category->getLimit();

if (isset($_GET["id"])) {
  $category_name = $category->findById($_GET["id"]);
  $jobs = $table->findByCategory($_GET["id"]);
} else {
  $jobs = $table->getAll();
}
?>
<?php include("../layouts/header.php") ?>

<main>
  <div class="jobs-wrap-container">
    <div class="find-jobs-wrap" id="find-jobs-wrap">
      <div class="search-recent-bar">
        <div class="input-wrap">
          <input type="text" class="job-search-input" placeholder="Search Jobs" value="<?= $category_name[0]->name ?? "" ?>" />
          <button>
            <i class="ri-search-line"></i>
          </button>
        </div>
        <div class="recent-jobs">
          <?php foreach ($category_limits as $category) : ?>
            <a href="./?id=<?= $category->id ?>">
              <span>
                <?= $category->name ?>
              </span>
            </a>
          <?php endforeach ?>
          <a href="../category/">
            <span>...</span>
          </a>
        </div>
      </div>
      <div class="jobs-wrap">
        <div class="jobs-option">
          <div class="options">
            <span>Jobs For You</span>
            <span class="active-option">Popular</span>
          </div>
          <div class="select-options">
            <span>Sort: </span>
            <div>
              <select name="time-option">
                <option value="newest">
                  Newest
                </option>
                <option value="newest">
                  Last Day
                </option>
                <option value="newest">
                  This Week
                </option>
                <option value="newest">
                  Last
                </option>
              </select>
            </div>
          </div>
        </div>
        <div class="jobs-list">
          <?php foreach ($jobs as $job) : ?>
            <div class="job show_job_info" data-id="<?= $job->id ?>">
              <div class="job-logo">
                <img src="../../../public/assets/images/companies/<?= $job->company_image ?? "company.png" ?>" alt="company image">
              </div>
              <div class="job-description">
                <div class="job-text-small">
                  <h5 class="company-name">
                    <?= $job->company_name ?>
                  </h5>
                  <p class="position">
                    <?= $job->name ?>
                  </p>
                  <p class="location-view">
                    <span><i class="ri-map-pin-line"></i><?= $job->address ?></span>
                    <span><i class="ri-eye-line"></i>view</span>
                  </p>
                  <p class="post-info">
                    <span><?= time_elapsed_string($job->created_at) ?></span>/
                    <span><?= $job->job_type_name ?></span>/
                    <span>3 applied</span>
                  </p>
                </div>
                <div class="position-info">
                  <div class="related-info">
                    <span class="team">
                      Team
                    </span>
                    <span class="team-name">
                      Developer
                    </span>
                    <span class="salary">
                      <?= $job->salary ?>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach ?>
        </div>
      </div>
    </div>
    <div id="job-info">
      <a id="bookmark" class="bookmark">
        <i class="ri-bookmark-3-fill"></i>
      </a>
      <button class="closeBtn" onclick="closeInfo()">
        <i class="ri-close-fill"></i>
      </button>
      <div class="info-container">
        <div class="company-info-logo">
          <img id="company_logo" alt="employee-logo">
          <h4 id="job_name"></h4>
          <p id="job_location"></p>
        </div>
        <div class="job-text">
          <p>
            Salary - <span id="salary" class="salary"></span>
          </p>
          <p>
            Company Address - <span id="company_address"></span>
          </p>
          <p>
            Open To - <span id="gender"></span>
          </p>
          <p>
            Job Type - <span id="job_type"></span>
          </p>
          <p>
            Close On - <span id="close_date"></span>
          </p>
          <!-- Minimum Requirement -->
          <p>Minimum Requirement</p>
          <span id="job_requirement">

          </span>
          <!-- Preferred Qualification -->
          <p>Preferred Qualification</p>
          <ul>
            <li>
              Fluent in reading, writing, and speaking English.
            </li>
            <li>
              Minimum of 2 years of professional experience working in a modern laboratory setting.
            </li>
          </ul>
        </div>
        <div class="job-about">
          <!-- Minimum Requirement -->
          <p>Description</p>
          <span id="job_description"></span>
          <a href="#">
            <p>Read More<i class="ri-arrow-down-s-fill"></i></p>
          </a>
        </div>
        <div class="job-apply">
          <button class="apply-btn">Apply</button>
          <button class="message-btn">
            <i class="ri-message-3-fill"></i>
          </button>
        </div>
      </div>
    </div>
  </div>
</main>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script>
  $(document).ready(function() {
    $(".show_job_info").on("click", function(e) {
      e.preventDefault()
      var job_id = $(this).data("id")

      $.ajax({
        url: "../../../App/controllers/jobs/detail.php",
        type: "GET",
        data: {
          "job_id": job_id
        },
        success: function(response) {
          var data = JSON.parse(response);

          if (data.status == 1) {
            var job_detail = data.data[0];
            var image = job_detail.company_image == null ? "company.png" : job_detail.company_image

            console.log(job_detail);


            var href = "../../../App/controllers/bookmarks/create.php?user_id=<?= $session_user->id ?>&&job_id=" + job_detail.id
            var src = "../../../public/assets/images/companies/" + image

            $("#bookmark").attr("href", href)
            $("#company_logo").attr("src", src)
            $("#job_name").text(job_detail.name)
            $("#salary").text(job_detail.salary)
            $("#company_address").text(job_detail.company_address)
            $("#gender").text(job_detail.gender)
            $("#job_type").text(job_detail.job_type_name)
            $("#close_date").text(job_detail.close_date)
            $("#job_location").text(job_detail.address)
            $("#job_requirement").text(job_detail.requirements)
            $("#job_description").text(job_detail.description)

            showJobInfo();
          }
        },
        error: function(error) {

        }
      })
    })
  });
  var find_jobs_wrap = document.getElementById("find-jobs-wrap")
  var job_info = document.getElementById("job-info")
  var jobs_wrap = document.getElementById("jobs-wrap")

  function showJobInfo() {
    find_jobs_wrap.classList.add("find-jobs-wrap-65")
    job_info.classList.add("show")
  }

  function closeInfo() {
    find_jobs_wrap.classList.remove("find-jobs-wrap-65")
    job_info.classList.remove("show")
  }
  window.onclick = (e) => {
    if (e.target == jobs_wrap) {
      job_info.style.display = "none"
      console.log("hi")
    }
  }
</script>

<?php include("../layouts/footer.php") ?>