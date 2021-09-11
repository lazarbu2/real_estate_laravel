<style>
    .masthead {
        /*height: 100vh;*/
        min-height: 500px;
        background-image: url('/uploads/h.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        margin-top: -25px;
    }
</style>
<header class="masthead">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12 text-center">

                <section class="search-sec" style="margin-top: 150px;">
                    <h1 class="font-weight-light">Nadjite nekretninu za sebe</h1>
                    <div class="container justify-content-center">
                        <form action="{{route('welcomeSearch')}}" method="get">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <?php

                                        $mysqli = new mysqli('localhost', 'root', '', 'zavrsni');
                                        mysqli_set_charset($mysqli,"utf8");
                                        $result_location = $mysqli->query("select * from location");
                                        $result_transaction = $mysqli->query("select * from transaction");
                                        $result_type = $mysqli->query("select * from property_type");
                                        $result_structure = $mysqli->query("select * from structure");
                                        ?>

                                        <div class="col-lg-2 col-md-3 col-sm-12 p-0">
                                            <select class="form-control" name="usluga1" id="usluga">

                                                <?php
                                                while($rows = $result_transaction->fetch_assoc()){
                                                    $name = $rows['name'];
                                                    $id = $rows ['id'];
                                                    echo "<option value='$id'>$name</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-1 col-md-3 col-sm-12 p-0">
                                            <select class="form-control" name="tip1" id="tip">
                                                <?php
                                                while($rows = $result_type->fetch_assoc()){
                                                    $name = $rows['type'];
                                                    $id = $rows ['id'];
                                                    echo "<option value='$id'>$name</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>

                                            <div class="col-lg-2 col-md-3 col-sm-12 p-0">
                                                <select class="form-control" name="struktura1">

                                                    <?php
                                                    while($rows = $result_structure->fetch_assoc()){
                                                        $name = $rows['name'];
                                                        $id = $rows ['id'];
                                                        echo "<option value='$id'>$name</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="col-lg-2 col-md-3 col-sm-12 p-0">
                                                <select class="form-control" name="lokacija1" id="lokacija">

                                                    <?php
                                                    while($rows = $result_location->fetch_assoc()){
                                                        $name = $rows['name'];
                                                        $id = $rows ['id'];
                                                        echo "<option value='$id'>$name</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>



                                        <div class="col-lg-1 col-md-3 col-sm-12 p-0">
                                            <input type="text" class="form-control" name="minPovrsina1" placeholder="min m²">
                                        </div>

                                        <div class="col-lg-1 col-md-3 col-sm-12 p-0">
                                            <input type="text" class="form-control" name="maxCena1" placeholder="max €">
                                        </div>

                                            <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                                <input type="text" class="form-control" name="adresa1" placeholder="Unesite adresu nekretnine">
                                            </div>

                                    </div>
                                </div>
                            </div>
                            @csrf
                            <div class="row">
                                <div class="col-lg-12 col-md-3 col-sm-12 p-0 mt-2">
                                    <button type="submit" class="btn btn-success" style="width: 1110px;">Pretraži</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>
</header>
