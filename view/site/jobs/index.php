<?php
$title = "Jobs";
include("../../../vendor/autoload.php");

use Models\Database\JobsTable;
use Models\Database\CategoryTable;
use Models\Database\CompanyTable;
use Models\Database\MYSQL;
use Helpers\Auth;

Auth::check();

$timeAgo = new Westsworld\TimeAgo();

$table = new JobsTable(new MYSQL());
$category = new CategoryTable(new MYSQL());
$company = new CompanyTable(new MYSQL());
$category_limits = $category->getLimit();

if (isset($_GET["cataid"])) {
  $category_name = $category->findById($_GET["cataid"]);
  $jobs = $table->findByCategory($_GET["cataid"]);
} else if (isset($_GET["compid"])) {
  $company_name = $company->findById($_GET["compid"]);
  $jobs = $table->findByCompany($_GET["compid"]);
} else {
  $jobs = $table->getAll();
}
?>
<?php include("../layouts/header.php") ?>

<main>
  <div class="jobs-wrap-container">
    <div class="find-jobs-wrap" id="find-jobs-wrap">
      <div class="search-recent-bar">`
        <div class="input-wrap">
          <input type="text" class="job-search-input" placeholder="Search Jobs" value="<?= $category_name[0]->name ?? $company_name[0]->name ?? "" ?>" />
          <button>
            <i class="ri-search-line"></i>
          </button>
        </div>
        <div class="recent-jobs">
          <?php foreach ($category_limits as $category) : ?>
            <a href="./?cataid=<?= $category->id ?>">
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
        <?php if (count($jobs) !== 0) : ?>
          <div class="jobs-list">
            <?php foreach ($jobs as $job) : ?>
              <div class="job show_job_info" data-id="<?= $job->id ?>">
                <div class="job-logo">
                  <img src="../../../public/assets/images/companies/<?= $job->company_image ?? "default.png" ?>" alt="company image">
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
                      <span><?= $timeAgo->inWordsFromStrings($job->created_at) ?></span>/
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
        <?php else : ?>
          <div class="alert-box">
            <div class="alert alert-warning">
              There is nothing right now! Please Come Back Later!
            </div>
          </div>
        <?php endif ?>
      </div>
    </div>
    <div id="job-info">
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
          <p>Description</p>
          <span id="job_description"></span>
          <!-- <span id="job_description">
          </span> -->
          <p>Minimum Requirement</p>
          <span id="job_requirement">
          </span>
        </div>
        <div class="job-about">
          <!-- Minimum Requirement -->
          <p>Responsibilities</p>
          <span id="job_responsibility"></span>
          <a href="#">
            <p>Read More<i class="ri-arrow-down-s-fill"></i></p>
          </a>
        </div>
        <div class="job-apply">
          <a href="../apply/form.php" class="apply-btn">Apply</a>
          <button class="message-btn">
            <i class="ri-message-3-fill"></i>
          </button>
        </div>
      </div>
    </div>
  </div>
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>
  $(document).ready(function() {
    $(".show_job_info").on("click", function(e) {
      console.log("hello");
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

            console.log(job_detail)
            var image = job_detail.company_image == null ? "default.png" : job_detail.company_image

            console.log(job_detail);

            var src = "../../../public/assets/images/companies/" + image
            var apply_route = "../apply/form.php?job_id=" + job_detail.id
            $("#company_logo").attr("src", src)
            $("#job_name").text(job_detail.name)
            $("#salary").text(job_detail.salary)
            $("#company_address").text(job_detail.company_address)
            $("#gender").text(job_detail.gender)
            $("#job_type").text(job_detail.job_type_name)
            $("#close_date").text(job_detail.close_date)
            $("#job_location").text(job_detail.address)
            $("#job_requirement").html(job_detail.requirements)
            $("#job_description").html(job_detail.description)
            $("#job_responsibility").html(job_detail.responsibility)
            $(".apply-btn").attr("href", apply_route)
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
    find_jobs_wrap.classList.toggle("find-jobs-wrap-65")
    job_info.classList.add("show")
    console.log("hello");
  }

  function closeInfo() {
    find_jobs_wrap.classList.remove("find-jobs-wrap-65")
    job_info.classList.remove("show")
  }
</script>

<?php include("../layouts/footer.php") ?>