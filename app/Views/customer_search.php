<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Search Customer</title>
  <!-- Bootstrap 5 CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  

<style>

    #suggestionsList {
      position: absolute;
      top: 100%;
      left: 0;
      right: 0;
      z-index: 1050;
      display: none;
    }
    .backpad{
        background-color:lightgrey;
        padding:3px;
    }
  </style>
</head>
<body>

<div class="container my-4">
 
  <div class="card p-3 shadow-sm mb-4">
    <div class="d-flex align-items-center">
      
      <div 
        class="rounded-circle bg-secondary text-white me-3 d-flex align-items-center justify-content-center" 
        style="width: 50px; height: 50px; font-weight: bold;"
      >
        <span id="fl_name">DN</span>
      </div>
     
      <div>
        <h5 class="mb-1" id="u_name">Demo Name</h5>
        <div>
          <span class="text-muted me-3 backpad" id="u_email">demo@gmail.com</span>
          <span class="text-muted backpad" id="u_mobile" >+91 80178 07045</span>
        </div>
      </div>
      
      <div class="ms-auto d-flex align-items-center">
      
        <button class="btn btn-link text-muted me-2">
          <i class="bi bi-three-dots-vertical"></i>
        </button>
        <div class="input-group">
    
      <span class="input-group-text circle" id="w">W</span>
      
      <textarea 
        class="form-control" 
        id="searchInput" 
        placeholder="Walkin Customer" 
        rows="1" 
        style="resize: none;"
      ></textarea><ul class="list-group" id="suggestionsList"></ul>
      
      <button class="btn btn-outline-secondary" type="button" id="searchBtn">
        <i class="bi bi-search"></i>
      </button>
      
      
    </div>

    
        &nbsp;&nbsp;
    <button 
          class="btn btn-primary" 
          data-bs-toggle="modal" 
          data-bs-target="#addCustomerModal"
        >
          <i class="bi bi-plus"></i>
        </button>
      </div>
    </div>
    
    <div class="d-flex justify-content-between mt-2">
      <a href="#" class="text-decoration-none">View More</a>
      <a href="#" class="text-decoration-none">
        View Purchase History <i class="bi bi-arrow-up-right"></i>
      </a>
    </div>
  </div>

  
</div>


<!-- Add Customer Modal -->
<div class="modal fade" id="addCustomerModal" tabindex="-1" aria-labelledby="addCustomerModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addCustomerModalLabel">Add New Customer</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Nav Tabs -->
        <ul class="nav nav-tabs" id="customerTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="true">Contact</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="address-tab" data-bs-toggle="tab" data-bs-target="#address" type="button" role="tab" aria-controls="address" aria-selected="false">Address</button>
          </li>
        </ul>
        <!-- Tab Content -->
        <div class="tab-content mt-3" id="customerTabContent">
          <!-- Contact Tab -->
          <div class="tab-pane fade show active" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <form id="contactForm">
              <div class="row mb-3">
                <div class="col-md-6">
                  <label for="full_name" class="form-label">Full Name</label>
                  <input type="text" class="form-control" name="full_name" id="full_name" required>
                </div>
                <div class="col-md-6">
                  <label for="phone_number" class="form-label">Phone Number</label>
                  <input type="text" class="form-control" name="phone_number" id="phone_number">
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-6">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" name="email" id="email">
                </div>
                <div class="col-md-6">
                  <label for="tax_class" class="form-label">Tax Class</label>
                  <input type="text" class="form-control" name="tax_class" id="tax_class">
                </div>
              </div>
              <div class="mb-3">
                <label for="heard_about_us" class="form-label">Heard About Us</label>
                <input type="text" class="form-control" name="heard_about_us" id="heard_about_us">
              </div>
              <button type="button" class="btn btn-primary text-center" id="saveContactBtn">Save</button>
            </form>
          </div>
          <!-- Address Tab -->
          <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
            <form id="addressForm">
              <!-- Hidden field for customer_id from Contact Tab -->
              <input type="hidden" name="customer_id" id="customer_id">
              <div class="row mb-3">
                <div class="col-md-8">
                  <label for="street_address" class="form-label">Street Address</label>
                  <input type="text" class="form-control" name="street_address" id="street_address">
                </div>
                <div class="col-md-4">
                  <label for="house_no" class="form-label">House/Apartment/Floor No.</label>
                  <input type="text" class="form-control" name="house_no" id="house_no">
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-4">
                  <label for="postcode" class="form-label">Postcode</label>
                  <input type="text" class="form-control" name="postcode" id="postcode">
                </div>
                <div class="col-md-4">
                  <label for="city" class="form-label">City</label>
                  <input type="text" class="form-control" name="city" id="city">
                </div>
                <div class="col-md-4">
                  <label for="state" class="form-label">State</label>
                  <input type="text" class="form-control" name="state" id="state">
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-6">
                  <label for="country" class="form-label">Country</label>
                  <input type="text" class="form-control" name="country" id="country">
                </div>
                <div class="col-md-6">
                  <label for="organization" class="form-label">Organization</label>
                  <input type="text" class="form-control" name="organization" id="organization">
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-6">
                  <label for="network" class="form-label">Network</label>
                  <input type="text" class="form-control" name="network" id="network">
                </div>
              </div>
              <button type="button" class="btn btn-primary" id="saveAddressBtn">Save</button>
            </form>
          </div>
        </div>
      </div> <!-- modal-body -->
    </div>
  </div>
</div>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  $(document).ready(function() {
    // Trigger search on keyup and when search button is clicked
    $("#searchInput").on("keyup", function(e) {
      if(e.key === "Enter") {
        fetchSuggestions();
      } else {
        fetchSuggestions();
      }
      $('#w').hide();
    });

    $("#searchInput").on("blur", function(){
        $(this).animate({ width: '250px' }, 300);
        $('#w').show();
    });

    $("#searchInput").on("focus", function(e) {
        $(this).animate({ width: '500px' }, 300);
        $('#w').hide();
    });

    $("#searchBtn").on("click", function(){
        $('#searchInput').focus();
        $("#searchInput").animate({ width: '500px' }, 300);

    });

    function fetchSuggestions() {
      var query = $("#searchInput").val().trim();
      if (!query) {
        $("#suggestionsList").hide();
        return;
      }
      $.get("<?= base_url('customer/searchSuggestions') ?>", { q: query }, function(data) {
        $("#suggestionsList").empty();
        if (data.length > 0) {
          $.each(data, function(i, customer) {
            var li = $("<li>", { "class": "list-group-item" });
            li.html(
              '<div>' +
                '<div class="fw-bold">' + customer.full_name + '</div>' +
                '<div>Mob: ' + (customer.phone_number ? customer.phone_number : "") + '</div>' +
                '<div class="text-info">' + (customer.email ? customer.email : "") + '</div>' +
              '</div>'
            );
            li.on("click", function() {
              $("#u_name").html(customer.full_name);
              $("#u_mobile").html(customer.phone_number);
              $("#u_email").html(customer.email);

                const initials = trim_initial(customer.full_name);
                $('#fl_name').html(initials); 


              $("#searchInput").val('');
              $("#suggestionsList").hide();
            });
            $("#suggestionsList").append(li);
          });
          $("#suggestionsList").show();
        } else {
          $("#suggestionsList").hide();
        }
      });
    }

    function trim_initial(full_name){
        
        let fullName = full_name.trim();

        // Split into words
        let nameParts = fullName.split(/\s+/); 

        // Take the first letter of the first word
        let firstInitial = nameParts[0][0].toUpperCase(); // "S"

        // Take the first letter of the last word (if it exists)
        let lastInitial = "";
        if (nameParts.length > 1) {
        lastInitial = nameParts[nameParts.length - 1][0].toUpperCase(); // "G"
        }

        
        let initials = firstInitial + lastInitial; 

        return initials;
    }

    // Save Contact
    $("#saveContactBtn").on("click", function(e) {
      e.preventDefault(); // Prevent default form submission
      const formData = new FormData(document.getElementById("contactForm"));

      $.ajax({
        url: "<?= base_url('customer/storeContact') ?>",
        method: "POST",
        data: formData,
        processData: false,
        contentType: false,
        dataType: "json",
        success: function(resp) {
          if (resp.status === "success") {
            // Store the new customer_id in the hidden field of the address form
            $("#customer_id").val(resp.customer_id);

            // Switch to the address tab
            const addressTabBtn = document.getElementById("address-tab");
            new bootstrap.Tab(addressTabBtn).show();
          } else {
            alert("Error saving contact info");
          }
        },
        error: function(err) {
          console.error(err);
        }
      });
    });

    // Save Address
    $("#saveAddressBtn").on("click", function(e) {
      e.preventDefault(); // Prevent default form submission
      const formData = new FormData(document.getElementById("addressForm"));

      $.ajax({
        url: "<?= base_url('customer/storeAddress') ?>",
        method: "POST",
        data: formData,
        processData: false,
        contentType: false,
        dataType: "json",
        success: function(resp) {
          if (resp.status === "success") {
            // Close modal
            const modalEl = document.getElementById("addCustomerModal");
            const modal = bootstrap.Modal.getInstance(modalEl);
            modal.hide();

            // Optionally update search input with new name
            const full_name = $("#full_name").val();
            const phone_number = $("#phone_number").val();
            const email = $("#email").val();

            $("#u_name").html(full_name);
              $("#u_mobile").html(phone_number);
              $("#u_email").html(email);

                const initials = trim_initial(full_name);
                $('#fl_name').html(initials);

            $("#searchInput").val('');

            // Reset forms if needed
            $("#contactForm")[0].reset();
            $("#addressForm")[0].reset();
          } else {
            alert("Error saving address info");
          }
        },
        error: function(err) {
          console.error(err);
        }
      });
    });

    $('#addCustomerModal').on('shown.bs.modal', function () {
    new bootstrap.Tab(document.getElementById('contact-tab')).show();
    });
    
  });
</script>

</body>
</html>
