


<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-8">
        <div class="row">

          <!-- Sales Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div>

              <div class="card-body">
                <h5 class="card-title">Demandes <span></span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-cart"></i>
                  </div>
                  <div class="ps-3">
                    <h6 id="pro">31</h6>
                    <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Sales Card -->

          <!-- Revenue Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card revenue-card">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div>

              <div class="card-body">
                <h5 class="card-title">Products <span></span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-currency-dollar"></i>
                  </div>
                  <div class="ps-3">
                    <h6 id="dem">8</h6>
                    <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Revenue Card -->

          <!-- Customers Card -->
          <div class="col-xxl-4 col-xl-12">

            <div class="card info-card customers-card">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div>

              <div class="card-body">
                <h5 class="card-title">Fornisseurs <span>| This Year</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6 id="nber">5</h6>
                    <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>

                  </div>
                </div>

              </div>
            </div>

          </div><!-- End Customers Card -->

          <!-- Reports -->
          <div class="col-12">
            <div class="card">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div>

              <div class="card-body">
                <h5 class="card-title">Reports <span>/Today</span></h5>

                <!-- Line Chart -->
                <div id="reportsChart"></div>

                <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
  

                <script>
                  function fetchDataFromApi() {
  // Replace 'your-api-endpoint' with the actual API endpoint URL
  const apiUrl = '/api/home'; // Assuming the API endpoint is at /api/home

  // Send a GET request to the API using fetch
  fetch(apiUrl)
    .then(response => {
      if (!response.ok) {
        // Handle non-OK responses (e.g., 404 Not Found, 500 Internal Server Error)
        throw new Error('Network response was not ok');
      }
      // Parse the response as JSON
      return response.json();
    })
    .then(data => {
      // Handle the data returned from the API
      console.log('Data from API demandes:', data);
      const nomberfornisseur = document.getElementById('nber')

        const ProductsData = data
        for (let index = 0; index < ProductsData.length; index++) {
          const element = ProductsData[index];
          console.log(element['id'])
          const NumberProduct = ProductsData.length;
          console.log('hiiiiiii',ProductsData)
          const pro = document.getElementById('pro')
          pro.textContent = 33;
          nomberfornisseur.textContent = ProductsData['nomber']

        }
        console.log('ndehhhhhhhm',ProductsData.length)

        console.log('nomber',ProductsData['nomber'])
        nomberfornisseur.textContent = ProductsData['nomber']


      // You can process the data here, e.g., update the UI
      // Example: document.getElementById('result').textContent = data.someValue;

    })
    .catch(error => {
      // Handle any errors that occurred during the request
      console.error('Error:', error);

      // You can display an error message or handle the error in your application
    });
}

// Call the function to fetch data when needed
fetchDataFromApi();




function demandes() {
  // Replace 'your-api-endpoint' with the actual API endpoint URL
  const apiUrl = '/api/product'; // Assuming the API endpoint is at /api/home

  // Send a GET request to the API using fetch
  fetch(apiUrl)
    .then(response => {
      if (!response.ok) {
        // Handle non-OK responses (e.g., 404 Not Found, 500 Internal Server Error)
        throw new Error('Network response was not ok');
      }
      // Parse the response as JSON
      return response.json();
    })
    .then(data => {
      // Handle the data returned from the API
      console.log('Data from API:', data);
        const demandes = data
        for (let index = 0; index < demandes.length; index++) {
          const element = demandes[index];
          console.log(element['id'])
          const NumberDemandes = demandes.length;
          const pro = document.getElementById('dem')
        
          pro.textContent = NumberDemandes;
          
        }
      // You can process the data here, e.g., update the UI
      // Example: document.getElementById('result').textContent = data.someValue;

    })
    .catch(error => {
      // Handle any errors that occurred during the request
      console.error('Error:', error);

      // You can display an error message or handle the error in your application
    });
}
demandes()








function archiveApi() {
  // Replace 'your-api-endpoint' with the actual API endpoint URL
  const apiUrl = 'api/archive'; // Assuming the API endpoint is at /api/home

  // Send a GET request to the API using fetch
  fetch(apiUrl)
    .then(response => {
      if (!response.ok) {
        // Handle non-OK responses (e.g., 404 Not Found, 500 Internal Server Error)
        throw new Error('Network response was not ok');
      }
      // Parse the response as JSON
      return response.json();
    })
    .then(data => {
      // Handle the data returned from the API
      console.log('Archive from API:', data);

      const archive = data;
      console.log(archive)
      const arch = document.getElementById('archive');

      let content = ''; // Initialize an empty string to store HTML content

      for (let index = 0; index < archive.length; index++) {
        const element = archive[index];
        console.log(element['id']);
        const createdAtString = element['created_at'];

// Create a Date object from the date string
       const createdAtDate = new Date(createdAtString);
       const year = createdAtDate.getFullYear();
const month = String(createdAtDate.getMonth() + 1).padStart(2, '0'); // Adding 1 because months are zero-based
const day = String(createdAtDate.getDate()).padStart(2, '0');

// Create the formatted date string in "Y-m-d" format
const formattedCreatedAt = `${year}/${month}/${day}`;
        // Create HTML content for each item in the archive
        content += `
          <div class='activity-item d-flex'>
            <div class='activite-label ms-2 me-3'> <span class="badge badge-info">${ formattedCreatedAt }</span></div>
            <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
            <div class='activity-content'>
              <a href="#" class="fw-bold text-dark"> ${element['title']}</a>
            </div>
          </div>`;
      }

      // Set the HTML content to the 'pro' element
      // arch.innerHTML = content;

      // Update the 'archive' element with the number of items in the archive
      arch.innerHTML = content;

      // You can process the data here, e.g., update the UI
      // Example: document.getElementById('result').textContent = data.someValue;

    })
    .catch(error => {
      // Handle any errors that occurred during the request
      console.error('Error:', error);

      // You can display an error message or handle the error in your application
    });
}

archiveApi()
                </script>
<script>
const xValues = ["Réfuser", "Accepter", "Traiter"];
const yValues = [55, 69, 53];
const barColors = ["red", "green","blue","orange","brown"];

new Chart("myChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Demandes 2023"
    }
  }
});
</script>

                <!-- End Line Chart -->

              </div>

            </div>
          </div><!-- End Reports -->

          <!-- Recent Sales -->
          <div class="col-12">
            <div class="card recent-sales overflow-auto">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div>

              
              

            </div>
          </div><!-- End Recent Sales -->

          <!-- Top Selling -->
          <div class="col-12">
            <div class="card top-selling overflow-auto">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div>

              

            </div>
          </div><!-- End Top Selling -->

        </div>
      </div><!-- End Left side columns -->

      <!-- Right side columns -->
      <div class="col-lg-4">

        <!-- Recent Activity -->
        <div class="card">
          <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
              <li class="dropdown-header text-start">
                <h6>Filter</h6>
              </li>

              <li><a class="dropdown-item" href="#">Today</a></li>
              <li><a class="dropdown-item" href="#">This Month</a></li>
              <li><a class="dropdown-item" href="#">This Year</a></li>
            </ul>
          </div>

          <div class="card-body">
            <h5 class="card-title">Recent Activity <span>| Today</span></h5>

            <div id="archive">

             <!-- End activity item-->

              
          

             

            </div>

          </div>
        </div><!-- End Recent Activity -->

        <!-- Budget Report -->
        <div class="card">
          <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
              <li class="dropdown-header text-start">
                <h6>Filter</h6>
              </li>

              <li><a class="dropdown-item" href="#">Today</a></li>
              <li><a class="dropdown-item" href="#">This Month</a></li>
              <li><a class="dropdown-item" href="#">This Year</a></li>
            </ul>
          </div>

          {{-- <div class="card-body pb-0">
            <h5 class="card-title">Budget Report <span>| This Month</span></h5>

            <div id="budgetChart" style="min-height: 400px;" class="echart"></div>

   

          </div> --}}
        </div><!-- End Budget Report -->

        <!-- Website Traffic -->
        <div class="card">
          <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
              <li class="dropdown-header text-start">
                <h6>Filter</h6>
              </li>

              <li><a class="dropdown-item" href="#">Today</a></li>
              <li><a class="dropdown-item" href="#">This Month</a></li>
              <li><a class="dropdown-item" href="#">This Year</a></li>
            </ul>
          </div>

          {{-- <div class="card-body pb-0">
            <h5 class="card-title">Website Traffic <span>| Today</span></h5>

            <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

       

          </div> --}}
        </div><!-- End Website Traffic -->

        <!-- News & Updates Traffic -->
        <div class="card">
          <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
              <li class="dropdown-header text-start">
                <h6>Filter</h6>
              </li>

              <li><a class="dropdown-item" href="#">Today</a></li>
              <li><a class="dropdown-item" href="#">This Month</a></li>
              <li><a class="dropdown-item" href="#">This Year</a></li>
            </ul>
          </div>
  @php
      $user = Auth::id(); // Get the authenticated user
          $user = \App\Models\Profile::find($user);
  @endphp
         <x-profilemini :user='$user'>
         </x-profilemini>
        </div><!-- End News & Updates -->

      </div><!-- End Right side columns -->

    </div>
  </section>

</main><!-- End #main -->