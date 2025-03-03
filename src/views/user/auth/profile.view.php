<?php
include __DIR__ . '/../components/header.php';
$user = $data['user'];
?>
<div class="container my-5">
    <div class="row">
        <?php include_once __DIR__ . '/profile-side-bar.view.php'; ?>
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Your Profile : Piko</h4>
                            <hr>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <form method="post" action="/profile/store">
                                <!-- Profile Picture -->
                                <div class="d-flex justify-content-center">
                                    <img id="profilePic" src="<?= $user['image'] ?>" alt="Profile Picture"
                                        class="img-thumbnail" width="300">
                                </div>
                                <br>
                                <!-- Styled File Input -->
                                <div class="d-flex justify-content-center mb-5">
                                    <div class="custom-file" style="width: 50%;">
                                        <input type="file" id="profileImage" class="custom-file-input">
                                        <label class="custom-file-label" for="profileImage">Choose file</label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="firstname" class="col-4 col-form-label">First Name</label>
                                    <div class="col-8">
                                        <input id="firstname" name="firstname" placeholder="FirstName : piko"
                                            value="<?= $user['firstname'] ?? "none" ?>" class="form-control here"
                                            required="required" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lastname" class="col-4 col-form-label">Last Name</label>
                                    <div class="col-8">
                                        <input id="lastname" name="lastname" placeholder="LastName : storm"
                                            value="<?= $user['lastname'] ?? "none" ?>" class="form-control here"
                                            type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="age" class="col-4 col-form-label">Age</label>
                                    <div class="col-8">
                                        <input id="age" name="age" placeholder="Age: 10" class="form-control here"
                                            value="<?= (int) $user['age'] ?>" type="number">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="gender" class="col-4 col-form-label">Gender</label>
                                    <div class="col-8">
                                        <input id="gender" name="gender" placeholder="Gender: male or female"
                                            value="<?= $user['gender'] ?? "none" ?>" class="form-control here"
                                            type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="username" class="col-4 col-form-label">Username</label>
                                    <div class="col-8">
                                        <input id="username" name="username" placeholder="UserName: pikocute"
                                            value="<?= $user['username'] ?? "none" ?>" class="form-control here"
                                            type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-4 col-form-label">Email</label>
                                    <div class="col-8">
                                        <input id="email" name="email"
                                            placeholder="Email: thesecretorganization@gmail.com"
                                            value="<?= $user['email'] ?? "none" ?>" class="form-control here"
                                            type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="new-password" class="col-4 col-form-label">New Password</label>
                                    <div class="col-8">
                                        <input id="new-password" name="new-password"
                                            placeholder="New Password: password" class="form-control here" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="role" class="col-4 col-form-label">Role</label>
                                    <label for="role-data"
                                        class="col-4 col-form-label"><?= $user['role_name'] ?></label>
                                </div>
                                <div class="form-group row">
                                    <label for="create-date" class="col-4 col-form-label">Create Date</label>
                                    <label for="create-date-data"
                                        class="col-4 col-form-label"><?= $user['created_at'] ?></label>
                                </div>

                                <div class="form-group row">
                                    <div class="offset-4 col-8">
                                        <button name="submit" type="submit" class="btn btn-primary">Update My
                                            Profile</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include __DIR__ . '/../components/footer.php';
?>