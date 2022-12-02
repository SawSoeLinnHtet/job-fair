<?php
  include("../../../vendor/autoload.php");
  use Helpers\Auth;

  Auth::check();
?>
<?php include("../layouts/header.php") ?>

<section class="main-content">
  <div class="overview">
    <div class="title">
      <h2 class="section-title">Overview</h2>
      <select name="date" id="date" class="dropdown">
        <option value="">Today</option>
        <option value="">Lastweek</option>
        <option value="">Yesterday</option>
        <option value="">This Month</option>
        <option value="">Last Month</option>
      </select>
    </div>
    <div class="cards">
      <div class="card card-1">
        <div class="card-data">
          <div class="card-content">
            <h5 class="card-title">
              Total Jobs
            </h5>
            <h1>245</h1>
          </div>
          <i class="ri-briefcase-2-fill card-icon-lg"></i>
        </div>
        <div class="card-stats">
          <span>
            <i class="ri-bar-chart-fill card-icon stat-icon"></i>65%
          </span>
          <span>
            <i class="ri-arrow-up-s-fill card-icon up-arrow"></i>650
          </span>
          <span>
            <i class="ri-arrow-down-s-fill card-icon down-arrow"></i>30
          </span>
        </div>
      </div>
      <div class="card card-2">
        <div class="card-data">
          <div class="card-content">
            <h5 class="card-title">
              Total Users
            </h5>
            <h1>230</h1>
          </div>
          <i class="ri-user-2-fill card-icon-lg"></i>
        </div>
        <div class="card-stats">
          <span>
            <i class="ri-bar-chart-fill card-icon stat-icon"></i>65%
          </span>
          <span>
            <i class="ri-arrow-up-s-fill card-icon up-arrow"></i>43
          </span>
          <span>
            <i class="ri-arrow-down-s-fill card-icon down-arrow"></i>20
          </span>
        </div>
      </div>
      <div class="card card-3">
        <div class="card-data">
          <div class="card-content">
            <h5 class="card-title">
              Total Job Appliers
            </h5>
            <h1>24</h1>
          </div>
          <i class="ri-send-plane-fill card-icon-lg"></i>
        </div>
        <div class="card-stats">
          <span>
            <i class="ri-bar-chart-fill card-icon stat-icon"></i>65%
          </span>
          <span>
            <i class="ri-arrow-up-s-fill card-icon up-arrow"></i>30
          </span>
          <span>
            <i class="ri-arrow-down-s-fill card-icon down-arrow"></i>100
          </span>
        </div>
      </div>
      <div class="card card-4">
        <div class="card-data">
          <div class="card-content">
            <h5 class="card-title">
              Total Companies
            </h5>
            <h1>50</h1>
          </div>
          <i class="ri-community-fill card-icon-lg"></i>
        </div>
        <div class="card-stats">
          <span>
            <i class="ri-bar-chart-fill card-icon stat-icon"></i>65%
          </span>
          <span>
            <i class="ri-arrow-up-s-fill card-icon up-arrow"></i>20
          </span>
          <span>
            <i class="ri-arrow-down-s-fill card-icon down-arrow"></i>40
          </span>
        </div>
      </div>
    </div>
  </div>
  <div class="companies">
    <div class="title">
      <h2 class="section-title">Companies</h2>
      <div class="companies-right-btn">
        <select name="companies" id="companies" class="dropdown company-filter">
          <option>Filter</option>
          <option value="shop">Shop</option>
          <option value="telecom">Telecom</option>
          <option value="wifi">Wifi</option>
          <option value="driver">Drivers</option>
          <option value="editor">Editing</option>
        </select>
        <button class="add">
          <i class="ri-add-fill"></i> Add Company
        </button>
      </div>
    </div>
    <div class="companies-cards">
      <a href="#" class="company-card">
        <div class="img-box-cover">
          <div class="img-box">
            <img src="../../../public/assets/images/company1.png" alt="company1">
          </div>
        </div>
        <p class="job-type">Drivers</p>
      </a>
      <a href="#" class="company-card">
        <div class="img-box-cover">
          <div class="img-box">
            <img src="../../../public/assets/images/company2.png" alt="company2">
          </div>
        </div>
        <p class="job-type">Technician</p>
      </a>
      <a href="#" class="company-card">
        <div class="img-box-cover">
          <div class="img-box">
            <img src="../../../public/assets/images/company3.png" alt="company3">
          </div>
        </div>
        <p class="job-type">Editing</p>
      </a>
      <a href="#" class="company-card">
        <div class="img-box-cover">
          <div class="img-box">
            <img src="../../../public/assets/images/company4.png" alt="company4">
          </div>
        </div>
        <p class="job-type">Constructor</p>
      </a>
      <a href="#" class="company-card">
        <div class="img-box-cover">
          <div class="img-box">
            <img src="../../../public/assets/images/company5.png" alt="company4">
          </div>
        </div>
        <p class="job-type">Freelancer</p>
      </a>
      <a href="#" class="company-card">
        <div class="img-box-cover">
          <div class="img-box">
            <img src="../../../public/assets/images/company6.png" alt="company4">
          </div>
        </div>
        <p class="job-type">Editor</p>
      </a>
      <a href="#" class="company-card">
        <div class="img-box-cover">
          <div class="img-box">
            <img src="../../../public/assets/images/company7.png" alt="company4">
          </div>
        </div>
        <p class="job-type">Constructor</p>
      </a>
    </div>
  </div>
  <div class="recent-users">
    <div class="title">
      <h2 class="section-title">Recent Users</h2>
      <button class="add">
        <i class="ri-add-fill"></i> Add Users
      </button>
    </div>
    <div class="table">
      <table class="table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Last Active</th>
            <th>Gender</th>
            <th>Age</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>John Gordan</td>
            <td>06-11-2022</td>
            <td>Male</td>
            <td>23</td>
            <td class="offline">Offline</td>
            <td>
              <i class="ri-edit-line edit"></i>
              <i class="ri-delete-bin-line delete"></i>
            </td>
          </tr>
          <tr>
            <td>Hinata Kun</td>
            <td>06-11-2022</td>
            <td>Female</td>
            <td>20</td>
            <td class="online">Online</td>
            <td>
              <i class="ri-edit-line edit"></i>
              <i class="ri-delete-bin-line delete"></i>
            </td>
          </tr>
          <tr>
            <td>Renger</td>
            <td>06-11-2022</td>
            <td>Male</td>
            <td>35</td>
            <td class="online">Online</td>
            <td>
              <i class="ri-edit-line edit"></i>
              <i class="ri-delete-bin-line delete"></i>
            </td>
          </tr>
          <tr>
            <td>Shaung Phan Yi</td>
            <td>06-11-2022</td>
            <td>Feale</td>
            <td>23</td>
            <td class="offline">Offline</td>
            <td>
              <i class="ri-edit-line edit"></i>
              <i class="ri-delete-bin-line delete"></i>
            </td>
          </tr>
          <tr>
            <td>Lee Shout Aww</td>
            <td>06-11-2022</td>
            <td>Male</td>
            <td>21</td>
            <td class="online">Online</td>
            <td>
              <i class="ri-edit-line edit"></i>
              <i class="ri-delete-bin-line delete"></i>
            </td>
          </tr>
          <tr>
            <td>Phan Shout Khin</td>
            <td>06-11-2022</td>
            <td>Female</td>
            <td>25</td>
            <td class="online">Online</td>
            <td>
              <i class="ri-edit-line edit"></i>
              <i class="ri-delete-bin-line delete"></i>
            </td>
          </tr>
          <tr>
            <td>Devil Judge</td>
            <td>06-11-2022</td>
            <td>Male</td>
            <td>45</td>
            <td class="online">Online</td>
            <td>
              <i class="ri-edit-line edit"></i>
              <i class="ri-delete-bin-line delete"></i>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</section>

<?php include("../layouts/footer.php") ?>