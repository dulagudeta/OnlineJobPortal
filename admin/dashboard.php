 <?php include 'header.php'
    ?>
 <div id="dashboard" class="tab-content active">
     <div class="panel-header">
         <h1>Welcome to Admin Dashboard</h1>
     </div>
     <?php
        $number_of_candidates = 0;
        $number_of_companies = 0;
        $number_of_jobs = 0;
        $sql = "SELECT COUNT(*) as count FROM users WHERE role = 'candidate'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $number_of_candidates = $row['count'];
        }
        $sql = "SELECT COUNT(*) as count FROM users WHERE role = 'company'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $number_of_companies = $row['count'];
        }
        $sql = "SELECT COUNT(*) as count FROM jobs";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $number_of_jobs = $row['count'];
        }
        ?>
     <div class="section">
         <a href="manage_candidate.php" onclick="showTab('candidates')"><i class="fa-solid fa-users-line"></i>Total Registered Candidates (<?php echo $number_of_candidates ?>)</a>
         <a href="manage_company.php" onclick="showTab('companies')"><i class="fa-solid fa-table-list"></i>Total Registered Companies (<?php echo $number_of_companies ?>)</a>
         <a href="manage_jobs.php" onclick="showTab('jobs')"><i class="fa-brands fa-readme"></i>Total Posted Jobs (<?php echo $number_of_jobs ?>)</a>
     </div>
     <?php
        function fetchChartData($conn, $query)
        {
            $result = mysqli_query($conn, $query);
            $data = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
            return $data;
        }

        $jobTypesQuery = "SELECT type, COUNT(*) as count FROM jobs GROUP BY type";
        $jobTypesData = fetchChartData($conn, $jobTypesQuery);

        $candidateQuery = "SELECT gender, COUNT(*) as count FROM candidates GROUP BY gender";
        $candidateData = fetchChartData($conn, $candidateQuery);

        $industryQuery = "SELECT industry, COUNT(*) as count FROM company GROUP BY industry";
        $industryData = fetchChartData($conn, $industryQuery);

        $educationQuery = "SELECT education, COUNT(*) as count FROM candidates GROUP BY education";
        $educationData = fetchChartData($conn, $educationQuery);
        ?>

     <div class="section">
         <div class="chart-container">
             <h3>Job Types Distribution</h3>
             <div class="chart-wrapper">
                 <canvas id="jobTypeChart"></canvas>
             </div>
         </div>

         <div class="chart-container">
             <h3>Candidate Demographics</h3>
             <div class="chart-wrapper">
                 <canvas id="candidateChart"></canvas>
             </div>
         </div>
     </div>

     <div class="section">
         <div class="chart-container">
             <h3>Company Industries</h3>
             <div class="chart-wrapper">
                 <canvas id="industryChart"></canvas>
             </div>
         </div>

         <div class="chart-container">
             <h3>Education Level Distribution</h3>
             <div class="chart-wrapper">
                 <canvas id="educationChart"></canvas>
             </div>
         </div>
     </div>


     <div class="panel-header">
         <h1>Recent Activities</h1>
     </div>

     <div class="table-wrapper">
        <table>
         <tr>
             <th>ID</th>
             <th>Activity</th>
             <th>User</th>
             <th>Time</th>
         </tr>
         <?php
            $activities = load_activities($conn);
            if ($activities) {
                foreach ($activities as $activity) {
                    $time_ago = get_time_ago($activity['time']);
                    echo "<tr>
                            <td>{$activity['id']}</td>
                            <td>{$activity['activity']}</td>
                            <td>{$activity['user']}</td>
                            <td>{$time_ago}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No recent activities found.</td></tr>";
            }
            ?>
     </table>
     </div>
 </div>
 <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
 <script>
     const jobTypeLabels = <?php echo json_encode(array_column($jobTypesData, 'job_type')); ?>;
     const jobTypeValues = <?php echo json_encode(array_column($jobTypesData, 'count')); ?>;

     const candidateLabels = <?php echo json_encode(array_column($candidateData, 'gender')); ?>;
     const candidateValues = <?php echo json_encode(array_column($candidateData, 'count')); ?>;

     const industryLabels = <?php echo json_encode(array_column($industryData, 'industry')); ?>;
     const industryValues = <?php echo json_encode(array_column($industryData, 'count')); ?>;

     const educationLabels = <?php echo json_encode(array_column($educationData, 'education_level')); ?>;
     const educationValues = <?php echo json_encode(array_column($educationData, 'count')); ?>;

     const backgroundColors = [
         'rgba(255, 99, 132, 0.7)',
         'rgba(54, 162, 235, 0.7)',
         'rgba(255, 206, 86, 0.7)',
         'rgba(75, 192, 192, 0.7)',
         'rgba(153, 102, 255, 0.7)',
         'rgba(255, 159, 64, 0.7)'
     ];

     document.addEventListener('DOMContentLoaded', function() {
         new Chart(document.getElementById('jobTypeChart'), {
             type: 'pie',
             data: {
                 labels: jobTypeLabels,
                 datasets: [{
                     data: jobTypeValues,
                     backgroundColor: backgroundColors,
                     borderWidth: 1
                 }]
             },
             options: {
                 responsive: true,
                 plugins: {
                     legend: {
                         position: 'right',
                     }
                 }
             }
         });

         new Chart(document.getElementById('candidateChart'), {
             type: 'doughnut',
             data: {
                 labels: candidateLabels,
                 datasets: [{
                     data: candidateValues,
                     backgroundColor: backgroundColors,
                     borderWidth: 1
                 }]
             },
             options: {
                 responsive: true,
                 plugins: {
                     legend: {
                         position: 'right',
                     }
                 }
             }
         });

         new Chart(document.getElementById('industryChart'), {
             type: 'bar',
             data: {
                 labels: industryLabels,
                 datasets: [{
                     label: 'Companies',
                     data: industryValues,
                     backgroundColor: backgroundColors,
                     borderWidth: 1
                 }]
             },
             options: {
                 responsive: true,
                 scales: {
                     y: {
                         beginAtZero: true
                     }
                 }
             }
         });

         new Chart(document.getElementById('educationChart'), {
             type: 'pie',
             data: {
                 labels: educationLabels,
                 datasets: [{
                     data: educationValues,
                     backgroundColor: backgroundColors,
                     borderWidth: 1
                 }]
             },
             options: {
                 responsive: true,
                 plugins: {
                     legend: {
                         position: 'right',
                     }
                 }
             }
         });
     });
 </script>
 <?php include 'footer.php' ?>