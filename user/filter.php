<!DOCTYPE html>
<html>
<head>
    <title>shop List</title>
    <!-- include Bootstrap CSS and JavaScript -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>shop List</h1>
        <div class="form-row">
        <div class="form-group col-md-6">
                    <label for="shopname">Name of shop</label>
                    <input type="text" class="form-control" id="shop_name" placeholder="Enter search name">
                </div>
                <div class="form-group col-md-6">
                    <label for="pincode">Pincode</label>
                    <input type="text" class="form-control" id="pincode" placeholder="Enter a pincode">
                </div>
            </div>
        </form>
        <form>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="state">State</label>
                    <select id="state" class="form-control">
                        <option value="">Select a state</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="district">District</label>
                    <select id="district" class="form-control">
                        <option value="">Select a district</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="city">City</label>
                    <select id="city" class="form-control">
                        <option value="">Select a city</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="area">Area</label>
                    <select id="area" class="form-control">
                        <option value="">Select an area</option>
                    </select>
                </div>
            </div>
        <br>
        <button type="button" class="btn btn-primary" id="filter-button">Filter</button>
        <button type="button" class="btn btn-secondary" id="clear-filters-btn">Clear Filters</button>
        <button type="button" class="btn btn-secondary" id="clear-filters-btn">sort</button>
<br>
<br><br><br><h2>Shops</h2><br>
        <div id="table-container"></div>
    </div>

    <script>
        // wait for the document to be ready
        
        $(document).ready(function() {
            // load the initial table
            loadTable();

            // handle the filter button click
            $('#filter-button').click(function() {
                // get the selected dropdown values and search box value
                var state = $('#state').val();
                var district = $('#district').val();
                var city = $('#city').val();
                var area = $('#area').val();
                var pincode = $('#pincode').val();
                var shop_name = $('#shop_name').val();

                // send an AJAX request to fetch the filtered table
                $.ajax({
                    url: 'filter/get_shops.php',
                    type: 'GET',
                    data: {
                        state: state,
                        district: district,
                        city: city,
                        area: area,
                        pincode: pincode,
                        shop_name : shop_name
                    },
                    success: function(data) {
                        // replace the table contents with the new data
                        $('#table-container').html(data);
                    }
                });
            });



            $.ajax({
                url: 'filter/get_states.php',
                    success: function(data) {
                        $('#state').html('<option value="">Select a state</option>' + data);
                }   
            });


            // handle the state dropdown change
            $('#state').change(function() {
                // get the selected state value
                var state = $(this
                ).val();

            // send an AJAX request to fetch the districts for the selected state
            $.ajax({
                url: 'filter/get_districts.php',
                type: 'GET',
                data: {
                    state: state
                },
                success: function(data) {
                    // replace the district dropdown contents with the new options
                    $('#district').html('<option value="">Select a district</option>' + data);
                    // reset the city and area dropdowns
                    $('#city').html('<option value="">Select a city</option>');
                    $('#area').html('<option value="">Select an area</option>');
                }
            });
        });

        // handle the district dropdown change
        $('#district').change(function() {
            // get the selected state and district values
            var state = $('#state').val();
            var district = $(this).val();

            // send an AJAX request to fetch the cities for the selected state and district
            $.ajax({
                url: 'filter/get_cities.php',
                type: 'GET',
                data: {
                    state: state,
                    district: district
                },
                success: function(data) {
                    // replace the city dropdown contents with the new options
                    $('#city').html('<option value="">Select a city</option>' + data);
                    // reset the area dropdown
                    $('#area').html('<option value="">Select an area</option>');
                }
            });
        });

        // handle the city dropdown change
        $('#city').change(function() {
            // get the selected state, district, and city values
            var state = $('#state').val();
            var district = $('#district').val();
            var city = $(this).val();

            // send an AJAX request to fetch the areas for the selected state, district, and city
            $.ajax({
                url: 'filter/get_areas.php',
                type: 'GET',
                data: {
                    state: state,
                    district: district,
                    city: city
                },
                success: function(data) {
                    // replace the area dropdown contents with the new options
                    $('#area').html('<option value="">Select an area</option>' + data);
                }
            });
        });
    });

    function loadTable() {
        // send an AJAX request to fetch the initial table
        $.ajax({
            url: 'filter/get_shops.php',
            type: 'GET',
            success: function(data) {
                // replace the table contents with the new data
                $('#table-container').html(data);
            }
        });
    }
    var clearFiltersBtn = document.getElementById("clear-filters-btn");

    clearFiltersBtn.addEventListener("click", function() {
  // Clear all filter inputs by setting their values to empty strings
  document.getElementById("state").value = "";
  document.getElementById("district").value = "";
  document.getElementById("city").value = "";
  document.getElementById("area").value = "";
  document.getElementById("pincode").value = "";
  document.getElementById("shop_name").value = "";

  // Trigger a new search by calling the search function with no arguments
  loadTable();
});
</script>
</body>
</html>