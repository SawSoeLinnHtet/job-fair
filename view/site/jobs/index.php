<?php include("../layouts/header.php") ?>

<main>
  <div class="jobs-wrap-container">
    <div class="find-jobs-wrap" id="find-jobs-wrap">
      <div class="search-recent-bar">
        <div class="input-wrap">
          <input type="text" class="job-search-input" placeholder="Search Jobs" />
          <button>
            <i class="ri-search-line"></i>
          </button>
        </div>
        <div class="recent-jobs">
          <a href="#">
            <span>UX Designer</span>
          </a>
          <a href="#">
            <span>UX Designer</span>
          </a>
          <a href="#">
            <span>UX Designer</span>
          </a>
          <a href="#">
            <span>UX Designer</span>
          </a>
          <a href="#">
            <span>UX Designer</span>
          </a>
          <a href="#">
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
          <div class="job" onclick="showJobInfo()">
            <div class="job-logo">
              <img src="../../../public/assets/images/ananda.png" alt="">
            </div>
            <div class="job-description">
              <div class="job-text-small">
                <h5 class="company-name">
                  Ananda BroadBand
                </h5>
                <p class="position">
                  White Hacker
                </p>
                <p class="location-view">
                  <span><i class="ri-map-pin-line"></i>Location</span>
                  <span><i class="ri-eye-line"></i>Views</span>
                </p>
                <p class="post-info">
                  <span>Today</span>/
                  <span>Full-time</span>/
                  <span>3 applied</span>
                </p>
              </div>
              <div class="position-info">
                <p class="bookmark-info">
                  <a href="">
                    <span>
                      <i class="ri-bookmark-3-line"></i>
                    </span>
                  </a>
                  <a href="">
                    <span>
                      <i class="ri-information-fill"></i>
                    </span>
                  </a>
                </p>
                <p class="team">
                  <span>Team</span>
                </p>
                <p class="which-team">
                  <span>Networking</span>
                </p>
                <p class="salary">
                  <span class="fee">$1000k<span class="time">/year</span></span>
                </p>
              </div>
            </div>
          </div>
          <div class="job" onclick="showJobInfo()">
            <div class="job-logo">
              <img src="../../../public/assets/images/ananda.png" alt="">
            </div>
            <div class="job-description">
              <div class="job-text-small">
                <h5 class="company-name">
                  Ananda BroadBand
                </h5>
                <p class="position">
                  White Hacker
                </p>
                <p class="location-view">
                  <span><i class="ri-map-pin-line"></i>Location</span>
                  <span><i class="ri-eye-line"></i>Views</span>
                </p>
                <p class="post-info">
                  <span>Today</span>/
                  <span>Full-time</span>/
                  <span>3 applied</span>
                </p>
              </div>
              <div class="position-info">
                <p class="bookmark-info">
                  <a href="">
                    <span>
                      <i class="ri-bookmark-3-line"></i>
                    </span>
                  </a>
                  <a href="">
                    <span>
                      <i class="ri-information-fill"></i>
                    </span>
                  </a>
                </p>
                <p class="team">
                  <span>Team</span>
                </p>
                <p class="which-team">
                  <span>Networking</span>
                </p>
                <p class="salary">
                  <span class="fee">$1000k<span class="time">/year</span></span>
                </p>
              </div>
            </div>
          </div>
          <div class="job" onclick="showJobInfo()">
            <div class="job-logo">
              <img src="../../../public/assets/images/ananda.png" alt="">
            </div>
            <div class="job-description">
              <div class="job-text-small">
                <h5 class="company-name">
                  Ananda BroadBand
                </h5>
                <p class="position">
                  White Hacker
                </p>
                <p class="location-view">
                  <span><i class="ri-map-pin-line"></i>Location</span>
                  <span><i class="ri-eye-line"></i>Views</span>
                </p>
                <p class="post-info">
                  <span>Today</span>/
                  <span>Full-time</span>/
                  <span>3 applied</span>
                </p>
              </div>
              <div class="position-info">
                <p class="bookmark-info">
                  <a href="">
                    <span>
                      <i class="ri-bookmark-3-line"></i>
                    </span>
                  </a>
                  <a href="">
                    <span>
                      <i class="ri-information-fill"></i>
                    </span>
                  </a>
                </p>
                <p class="team">
                  <span>Team</span>
                </p>
                <p class="which-team">
                  <span>Networking</span>
                </p>
                <p class="salary">
                  <span class="fee">$1000k<span class="time">/year</span></span>
                </p>
              </div>
            </div>
          </div>
          <div class="job" onclick="showJobInfo()">
            <div class="job-logo">
              <img src="../../../public/assets/images/ananda.png" alt="">
            </div>
            <div class="job-description">
              <div class="job-text-small">
                <h5 class="company-name">
                  Ananda BroadBand
                </h5>
                <p class="position">
                  White Hacker
                </p>
                <p class="location-view">
                  <span><i class="ri-map-pin-line"></i>Location</span>
                  <span><i class="ri-eye-line"></i>Views</span>
                </p>
                <p class="post-info">
                  <span>Today</span>/
                  <span>Full-time</span>/
                  <span>3 applied</span>
                </p>
              </div>
              <div class="position-info">
                <p class="bookmark-info">
                  <a href="">
                    <span>
                      <i class="ri-bookmark-3-line"></i>
                    </span>
                  </a>
                  <a href="">
                    <span>
                      <i class="ri-information-fill"></i>
                    </span>
                  </a>
                </p>
                <p class="team">
                  <span>Team</span>
                </p>
                <p class="which-team">
                  <span>Networking</span>
                </p>
                <p class="salary">
                  <span class="fee">$1000k<span class="time">/year</span></span>
                </p>
              </div>
            </div>
          </div>
          <div class="job" onclick="showJobInfo()">
            <div class="job-logo">
              <img src="../../../public/assets/images/ananda.png" alt="">
            </div>
            <div class="job-description">
              <div class="job-text-small">
                <h5 class="company-name">
                  Ananda BroadBand
                </h5>
                <p class="position">
                  White Hacker
                </p>
                <p class="location-view">
                  <span><i class="ri-map-pin-line"></i>Location</span>
                  <span><i class="ri-eye-line"></i>Views</span>
                </p>
                <p class="post-info">
                  <span>Today</span>/
                  <span>Full-time</span>/
                  <span>3 applied</span>
                </p>
              </div>
              <div class="position-info">
                <p class="bookmark-info">
                  <a href="">
                    <span>
                      <i class="ri-bookmark-3-line"></i>
                    </span>
                  </a>
                  <a href="">
                    <span>
                      <i class="ri-information-fill"></i>
                    </span>
                  </a>
                </p>
                <p class="team">
                  <span>Team</span>
                </p>
                <p class="which-team">
                  <span>Networking</span>
                </p>
                <p class="salary">
                  <span class="fee">$1000k<span class="time">/year</span></span>
                </p>
              </div>
            </div>
          </div>
          <div class="job" onclick="showJobInfo()">
            <div class="job-logo">
              <img src="../../../public/assets/images/ananda.png" alt="">
            </div>
            <div class="job-description">
              <div class="job-text-small">
                <h5 class="company-name">
                  Ananda BroadBand
                </h5>
                <p class="position">
                  White Hacker
                </p>
                <p class="location-view">
                  <span><i class="ri-map-pin-line"></i>Location</span>
                  <span><i class="ri-eye-line"></i>Views</span>
                </p>
                <p class="post-info">
                  <span>Today</span>/
                  <span>Full-time</span>/
                  <span>3 applied</span>
                </p>
              </div>
              <div class="position-info">
                <p class="bookmark-info">
                  <a href="">
                    <span>
                      <i class="ri-bookmark-3-line"></i>
                    </span>
                  </a>
                  <a href="">
                    <span>
                      <i class="ri-information-fill"></i>
                    </span>
                  </a>
                </p>
                <p class="team">
                  <span>Team</span>
                </p>
                <p class="which-team">
                  <span>Networking</span>
                </p>
                <p class="salary">
                  <span class="fee">$1000k<span class="time">/year</span></span>
                </p>
              </div>
            </div>
          </div>
          <div class="job" onclick="showJobInfo()">
            <div class="job-logo">
              <img src="../../../public/assets/images/ananda.png" alt="">
            </div>
            <div class="job-description">
              <div class="job-text-small">
                <h5 class="company-name">
                  Ananda BroadBand
                </h5>
                <p class="position">
                  White Hacker
                </p>
                <p class="location-view">
                  <span><i class="ri-map-pin-line"></i>Location</span>
                  <span><i class="ri-eye-line"></i>Views</span>
                </p>
                <p class="post-info">
                  <span>Today</span>/
                  <span>Full-time</span>/
                  <span>3 applied</span>
                </p>
              </div>
              <div class="position-info">
                <p class="bookmark-info">
                  <a href="">
                    <span>
                      <i class="ri-bookmark-3-line"></i>
                    </span>
                  </a>
                  <a href="">
                    <span>
                      <i class="ri-information-fill"></i>
                    </span>
                  </a>
                </p>
                <p class="team">
                  <span>Team</span>
                </p>
                <p class="which-team">
                  <span>Networking</span>
                </p>
                <p class="salary">
                  <span class="fee">$1000k<span class="time">/year</span></span>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="job-info">
      <button class="closeBtn" onclick="closeInfo()">
        <i class="ri-close-circle-fill"></i>
      </button>
      <div class="info-container">
        <div class="company-info-logo">
          <img src="../../../public/assets/images/ananda.png" alt="employee-logo">
          <h4>White Hacker, Mini</h4>
          <p>CompanyName, Location</p>
        </div>
        <div class="job-text">
          <!-- Minimum Requirement -->
          <p>Minimum Requirement</p>
          <ul>
            <li>
              Fluent in reading, writing, and speaking English.
            </li>
            <li>
              Minimum of 2 years of professional experience working in a modern laboratory setting.
            </li>
            <li>
              Knowledge and understanding of the best international lab safety and practices.
            </li>
            <li>
              Candidate must possess strong attention-to-detail and organizational skills.
            </li>
            <li>
              Skills: Candidate must be team-orientated and collaborative, with strong interpersonal skills.
            </li>
          </ul>
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
          <p>Minimum Requirement</p>
          <span>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta delectus temporibus quod corrupti debitis beatae quasi, nesciunt excepturi ullam optio ipsa dignissimos est consectetur repellendus. Laboriosam ipsum ratione nam cum.
          </span>
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

<?php include("../layouts/footer.php") ?>