<?php 
    include 'dbcon.php';
    session_start();
    $user_id = $_SESSION['user_id'];

    $sql = "SELECT tbl_userinfo.user_id, tbl_userinfo.firstname, tbl_userinfo.middlename, tbl_userinfo.lastname, tbl_userinfo.suffix, tbl_userinfo.gender, tbl_userinfo.birthday, tbl_contactinfo.email, tbl_contactinfo.contact_num, tbl_enrollment.grade, tbl_enrollment.program, tbl_enrollment.lrn,
    tbl_contactinfo.street, tbl_contactinfo.barangay, tbl_contactinfo.city, tbl_usercredentials.username, tbl_usercredentials.password
    FROM tbl_userinfo
    JOIN tbl_usercredentials ON tbl_userinfo.user_id = tbl_usercredentials.userinfo_id
    JOIN tbl_contactinfo ON tbl_userinfo.user_id = tbl_contactinfo.userinfo_id
    JOIN tbl_enrollment ON tbl_userinfo.user_id = tbl_enrollment.userinfo_id
    WHERE tbl_userinfo.user_id = $user_id LIMIT 1";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
    } else {
        // Handle the query execution error here
        echo "Error: " . mysqli_error($conn);
        // You can also redirect the user to an error page or display a custom error message
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">


    <title>Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        body {
            margin: 0;
            padding-top: 40px;
            color: #2e323c;
            background: #f5f6fa;
            position: relative;
            height: 100%;
        }

        .account-settings .user-profile {
            margin: 0 0 1rem 0;
            padding-bottom: 1rem;
            text-align: center;
        }

        .account-settings .user-profile .user-avatar {
            margin: 0 0 1rem 0;
        }

        .account-settings .user-profile .user-avatar img {
            width: 90px;
            height: 90px;
            -webkit-border-radius: 100px;
            -moz-border-radius: 100px;
            border-radius: 100px;
        }

        .account-settings .user-profile h5.user-name {
            margin: 0 0 0.5rem 0;
        }

        .account-settings .user-profile h6.user-email {
            margin: 0;
            font-size: 0.8rem;
            font-weight: 400;
            color: #9fa8b9;
        }

        .account-settings .about {
            margin: 2rem 0 0 0;
            text-align: center;
        }

        .account-settings .about h5 {
            margin: 0 0 15px 0;
            color: #007ae1;
        }

        .account-settings .about p {
            font-size: 0.825rem;
        }

        .form-control {
            border: 1px solid #cfd1d8;
            -webkit-border-radius: 2px;
            -moz-border-radius: 2px;
            border-radius: 2px;
            font-size: .825rem;
            background: #ffffff;
            color: #2e323c;
        }

        .card {
            background: #ffffff;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            border: 0;
            margin-bottom: 1rem;
        }
    </style>
</head>
<div class="container">
<form action="profile_update.php" method="POST">
    <div class="row gutters">
        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
            <div class="card h-100">
                <div class="card-body">
                    <div class="account-settings">
                        <div class="user-profile">
                            <div class="user-avatar">
                                <label for="profilePicture">
                                    <img id="profileImage" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Maxwell Admin">
                                </label>
                                <input type="file" class="form-control-file" id="profilePicture" style="display: none;">
                            </div>
                            <div class="form-group">
                            <h5 class="user-name"><?php echo $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname'] . ' ' . $row['suffix']; ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h6 class="mb-2 text-primary">Personal Details</h6>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="fullName">First Name</label>
                                <input type="text" class="form-control" id="fullName" name="firstname"  placeholder="<?php echo $row['firstname']?>">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="fullName">Middle Name</label>
                                <input type="text" class="form-control" id="fullName" name="middlename" placeholder="<?php echo $row['middlename']?>">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="fullName">Last Name</label>
                                <input type="text" class="form-control" id="fullName" name="lastname"  placeholder="<?php echo $row['lastname']?>">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="fullName">Suffix Name</label>
                                <input type="text" class="form-control" id="fullName" name="suffixname" placeholder="<?php echo $row['suffix']?>">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="website">Gender</label>
                                <input type="text" class="form-control" id="website" name="gender"  placeholder="<?php echo $row['gender']?>">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="website">Birthdate</label>
                                <input type="date" class="form-control" id="website" name="birthday"  placeholder="<?php echo $row['birthday']?>">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="eMail">Email</label>
                                <input type="email" class="form-control" id="eMail" name="email"  placeholder="<?php echo $row['email']?>">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="number" class="form-control" id="phone" name="contact_number"  placeholder="<?php echo $row['contact_num']?>">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="website">Grade</label>
                                <input type="text" class="form-control" id="website" name="grade"  placeholder="<?php echo $row['grade']?>">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="website">Strand</label>
                                <input type="text" class="form-control" id="website" name="strand"  placeholder="<?php echo $row['program']?>">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="website">LRN</label>
                                <input type="number" class="form-control" id="website" name="lrn"  placeholder="<?php echo $row['lrn']?>">
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h6 class="mb-2 text-primary">User Account</h6>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="fullName">Username</label>
                                <input type="text" class="form-control" id="fullName" name="username"  placeholder="<?php echo $row['username']?>">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="fullName">Password</label>
                                <input type="password" class="form-control" id="fullName" name="password"  placeholder="Enter your password here">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="fullName">Confirm Password</label>
                                <input type="text" class="form-control" id="fullName" name="cfpassword"  placeholder="Confirm password">
                            </div>
                        </div>
                    </div>
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h6 class="mt-3 mb-2 text-primary">Address</h6>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="Street">Street</label>
                                <input type="text" class="form-control" id="Street" name="street"  placeholder="<?php echo $row['street']?>">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="ciTy">Barangay</label>
                                <input type="text" class="form-control" id="ciTy" name="barangay"  placeholder="<?php echo $row['barangay']?>">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="sTate">City</label>
                                <input type="text" class="form-control" id="sTate" name="city"  placeholder="<?php echo $row['city']?>">
                            </div>
                        </div>
                    </div>
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="text-right">
                                <button type="button" id="submit" name="submit" class="btn btn-secondary" onclick="window.history.back();">Cancel</button>
                                <button type="submit" id="submit" name="btnUpdate" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    document.getElementById("profileImage").addEventListener("click", function() {
        document.getElementById("profilePicture").click();
    });
</script>

</body>
</html>
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#profilePicture').on('change', function () {
                var file = this.files[0];
                var reader = new FileReader();
                reader.onloadend = function () {
                    $('#profileImage').attr('src', reader.result);
                }
                if (file) {
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
</body>

</html>
