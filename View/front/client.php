<?php ob_start(); ?>



<body>
    <div id="profilePage" class="container  pt-10 ">
        <div class="main-body ">


            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <h4><?php echo $profileClient['email']?></h4>
                                    <p class="text-secondary mb-1">Ponts: <span>50</span></p>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#id</th>
                                        <th>Name</th>
                                        <th>Trip</th>
                                        <th>email</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#20</td>
                                        <td>Yassine</td>
                                        <td>safi - marakkech</td>
                                        <td>admin@yassine.info</td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row gutters-sm">
                    <div class="col-sm-6 mb-3">
                        <div class="card h-100">

                            <form class="m-3">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Name</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1">
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>

                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="card h-100">
                            <form class="m-3">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">new Passowrd</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Confirme Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1">
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>



            </div>
        </div>

    </div>
    </div>


</body>

<?php $contant =  ob_get_clean();
include_once "View\layout.php";


?>