@extends('mcsp.master')
@section('title')
<title>Create New User</title>
@endsection
@section('content')

<div class="main-content">
                    <div class="container-fluid">
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header"><h3>Add New User</h3></div>
                                    <div class="card-body">
                                        <form class="forms-sample" method="post" action="{{ route('user.store')}}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleInputName1">Full Name</label>
                                                <input type="text" name="name"class="form-control" id="exampleInputName1" placeholder="Name" required>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail3">Email address</label>
                                                        <input type="email" name="email" class="form-control" id="exampleInputEmail3" placeholder="Email">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleSelectGender">Gender</label>
                                                        <select class="form-control" name="gender" id="exampleSelectGender">
                                                            <option>Male</option>
                                                            <option>Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword4">Password</label>
                                                        <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                                                        <span id="password_match"></span>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword4">Confirm Password</label>
                                                        <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Confirm Password" required>
                                                        <span id="password_match"></span>
                                                    </div>
                                                </div>

                                            </div>
                                            
                                            
                                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                            <button class="btn btn-light">Cancel</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                        

                        
                    </div>
                </div>

<script>
        document.addEventListener("DOMContentLoaded", function() {
            var passwordInput = document.getElementById("password");
            var confirmInput = document.getElementById("confirm_password");
            var matchMessage = document.getElementById("password_match");

            function checkPassword() {
                var password = passwordInput.value;
                var confirm = confirmInput.value;

                if (password === confirm) {
                    matchMessage.innerHTML = "Passwords match!";
                    matchMessage.style.color = "green";
                } else {
                    matchMessage.innerHTML = "Passwords do not match!";
                    matchMessage.style.color = "red";
                }
            }

            passwordInput.addEventListener("input", checkPassword);
            confirmInput.addEventListener("input", checkPassword);
        });
</script>

@endsection