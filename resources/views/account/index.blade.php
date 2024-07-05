@extends("layouts.index")

@section('styles')
    <link href="{{asset("app/css/account.css")}}" rel="stylesheet">
@endsection

@section("content")
<section class="py-3 py-md-5 py-xl-8 my-5">
    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQtbEsykx-0fhTred6UwHDYtMFd2UgTJCG4gaklT1dx4suRO4_n5LJr4Gg28kquSX5fpNo&usqp=CAU" alt="Admin"
                                     class="rounded-circle p-1 bg-warning" width="110">
                                <div class="mt-3">
                                    <?php
                                        if(isset($userInfo)) {
                                            echo "<h4>". htmlspecialchars($userInfo['firstName']) . " " . htmlspecialchars($userInfo['lastName']) ."</h4>";
                                            echo "<p class='text-secondary mb-1'>". htmlspecialchars($userInfo['email'])."</p>";
                                            echo "<p class='text-muted font-size-sm'>". htmlspecialchars($userInfo['address'])."</p>";
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="list-group list-group-flush text-center mt-4">
                                <a href="#" class="list-group-item list-group-item-action border-0 " onclick="showProfileDetails()">Profile Informaton</a>
                                <a href="#" class="list-group-item list-group-item-action border-0" onclick="showOrderDetails()">Orders</a>
                                <a href="/logout" class="list-group-item list-group-item-action border-0">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div id="orderDetails" class="order_card">
                        <?php
                        if (isset($orderInfo)) {
                            $isFirst = true; // Flag to track the first element
                            foreach ($orderInfo['orders'] as $row) {
                                // Apply margin only from the second element onwards
                                $marginStyle = $isFirst ? '' : 'margin-top: 10px;';
                                $isFirst = false;

                                echo "<div class='card' style='" . $marginStyle . "'>";
                                echo "<div class='card-body'>";
                                echo "<div class='profile-info'>";
                                echo "<h5>Order Information</h5>";
                                echo "<p><strong>OrderId:</strong> " . htmlspecialchars($row['id']) . "</p>";
                                echo "<p><strong>Event Name:</strong> " . htmlspecialchars($row['eventName']) . "</p>";
                                echo "<p><strong>Quantity:</strong> " . htmlspecialchars($row['quantity']) . "</p>";
                                echo "<p><strong>Price:</strong> " . htmlspecialchars($row['price']) . "</p>";
                                echo "<p><strong>Organization Location:</strong> " . htmlspecialchars($row['eventAddress']) . "</p>";
                                echo "<p><strong>Status:</strong> " . htmlspecialchars($row['status']) . "</p>";
                                echo "<a class='btn btn-primary' href='/order-detail/" . htmlspecialchars($row['id']) . "'>Details</a>";
                                echo "</div>";
                                echo "</div>";
                                echo "</div>";
                            }
                        }
                        ?>
                    </div>

                    <div id="profileDetails" class="card" style="display: none;">
                        <div class="card-body">
                            <div class="profile-info">
                                <h5>Profile Information</h5>
                                <?php
                                if (isset($userInfo)) {
                                    echo "<p><strong>Name:</strong> " . htmlspecialchars($userInfo['firstName']) . " " . htmlspecialchars($userInfo['lastName']) . "</p>";
                                    echo "<p><strong>Email Address:</strong> " . htmlspecialchars($userInfo['email']) . "</p>";
                                    echo "<p><strong>Date of Birth:</strong> " . htmlspecialchars($userInfo['dateOfBirth']) . "</p>";
                                    echo "<p><strong>Address:</strong> " . htmlspecialchars($userInfo['address']) . "</p>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                    <div id="addressBook" class="card" style="display: none;">
                        <div class="card-body">
                            <h5>Address Book</h5>
                            <button class="add_address_button" onclick="showAddAddressModal()">Add Address</button>

                            <div id="addressList">

                            </div>
                        </div>
                    </div>

                    <div id="addAddressModal" class="modal">
                        <div class="modal-content">
                            <span class="close" onclick="closeAddAddressModal()">&times;</span>
                            <h2>Add Address</h2>
                            <form id="addAddressForm" onsubmit="saveAddress(event)">

                                <div class="col-12 d-flex main_flex_div">
                                    <div class="col-4 d-flex flex-column inner_flex_div">
                                        <label for="name">Name:</label>
                                        <input type="text" id="name" required><br>
                                    </div>
                                    <div class="col-4 d-flex flex-column inner_flex_div">
                                        <label for="mobile">Mobile No.:</label>
                                        <input type="tel" id="mobile" required pattern="[0-9]{10}">
                                    </div>
                                    <div class="col-4 d-flex flex-column inner_flex_div">
                                        <label for="pincode">Pin code:</label>
                                        <input type="text" id="pincode" required><br>

                                    </div>
                                </div>


                                <div class="col-12 d-flex main_flex_div">

                                    <div class="col-4 d-flex flex-column inner_flex_div">
                                        <label for="locality">Locality:</label>
                                        <input type="text" id="locality" required><br>
                                    </div>

                                    <div class="col-4 d-flex flex-column inner_flex_div">
                                        <label for="city">City/District/Town:</label>
                                        <input type="text" id="city" required><br>

                                    </div>

                                    <div class="col-4 d-flex flex-column inner_flex_div">
                                        <label for="state">State:</label>
                                        <select id="state" required>
                                            <option value="">Select a state</option>
                                            <option value="State 1">State 1</option>
                                            <option value="State 2">State 2</option>
                                            <option value="State 3">State 3</option>
                                        </select><br>
                                    </div>

                                </div>

                                <div class="col-12 d-flex main_flex_div">
                                    <div class="col-12 d-flex flex-column inner_flex_div">
                                        <label for="address">Address:</label>
                                        <textarea id="address" required></textarea><br>
                                    </div>

                                </div>


                                <div class="col-12 d-flex main_flex_div">
                                    <div class="col-6 d-flex flex-column inner_flex_div">
                                        <label for="landmark">Landmark (Optional):</label>
                                        <input type="text" id="landmark"><br>

                                    </div>
                                    <div class="col-6 d-flex flex-column inner_flex_div">
                                        <label for="alternatePhone">Alternate Phone (Optional):</label>
                                        <input type="tel" id="alternatePhone" pattern="[0-9]{10}"><br>
                                    </div>


                                </div>

                                <div class="col-12 d-flex button_div">
                                    <button type="submit">Save</button>
                                    <button type="button" onclick="closeAddAddressModal()">Cancel</button>
                                </div>


                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</section>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

<script>

    function showAddAddressModal() {
        const modal = document.getElementById('addAddressModal');
        modal.style.display = 'block';
        isFormVisible = true;
    }

    function closeAddAddressModal() {
        const modal = document.getElementById('addAddressModal');
        modal.style.display = 'none';
        isFormVisible = false;
    }

    function showProfileDetails() {
        hideAllSections();
        document.getElementById('profileDetails').style.display = 'block';
        setActiveLink(0);
    }

    function showOrderDetails() {
        hideAllSections();
        document.getElementById('orderDetails').style.display = 'block';
        setActiveLink(1);
    }

    function showAddressBook() {
        hideAllSections();
        document.getElementById('addressBook').style.display = 'block';
        setActiveLink(2);
    }

    function hideAllSections() {
        document.getElementById('orderDetails').style.display = 'none';
        document.getElementById('profileDetails').style.display = 'none';
        document.getElementById('addressBook').style.display = 'none';
    }

    function setActiveLink(index) {
        document.querySelector('.list-group-item.active').classList.remove('active');
        document.querySelectorAll('.list-group-item')[index].classList.add('active');
    }

    showProfileDetails();
</script>
