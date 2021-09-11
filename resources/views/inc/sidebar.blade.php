<div class="container">
    <form action="{{route('sidebarSearch')}}" method="get">
    <div class="row">
        <div class="col-md-12 bg-secondary">
            <div class="filter-sidebar">
                <div class="row card-body py-2 mb-3 bg-dark text-white">
                    <h4><i class="fa fa-home"></i> Pretraga</h4>
                </div>
                <?php

                $mysqli = new mysqli('localhost', 'root', '', 'zavrsni');
                mysqli_set_charset($mysqli,"utf8");
                $result_location = $mysqli->query("select * from location");
                $result_transaction = $mysqli->query("select * from transaction");
                $result_type = $mysqli->query("select * from property_type");
                $result_structure = $mysqli->query("select * from structure");
                ?>
                <div class="form-group">
                    <div class="form-text text-white">Usluga</div>
                    <select class="form-control" name="usluga" id="usluga">
                        <?php
                        while($rows = $result_transaction->fetch_assoc()){
                            $name = $rows['name'];
                            $id = $rows ['id'];
                            echo "<option value='$id'>$name</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <div class="form-text text-white">Tip nekretnine</div>
                    <select class="form-control" name="tip" id="tip">
                        <?php
                        while($rows = $result_type->fetch_assoc()){
                            $name = $rows['type'];
                            $id = $rows ['id'];
                            echo "<option value='$id'>$name</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <div class="form-text text-white">Struktura</div>
                    <select class="form-control" name="struktura" id="struktura">
                        <?php
                        while($rows = $result_structure->fetch_assoc()){
                            $name = $rows['name'];
                            $id = $rows ['id'];
                            echo "<option value='$id'>$name</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <div class="form-text text-white">Lokacija</div>
                    <select class="form-control" name="lokacija" id="lokacija">
                        <?php
                        while($rows = $result_location->fetch_assoc()){
                            $name = $rows['name'];
                            $id = $rows ['id'];
                            echo "<option value='$id'>$name</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-6">
                            <label class="text-white">Min površina</label>
                            <input type="text" class="form-control" name="minPovrsina" placeholder="m²">
                        </div>
                        <div class="col-6">
                            <label class="text-white">Max cena</label>
                            <input type="text" class="form-control" name="maxCena" placeholder="€">
                        </div>
                    </div>
                </div>

                <div>
                    <div class="row">
                        <div class="col-12">
                            <label class="text-white">Adresa</label>
                            <input type="text" class="form-control" name="adresa" placeholder="Unesite adresu">
                        </div>
                    </div>
                </div>



                    @csrf
                <hr>
                <button type="submit" class="btn btn-success" style="margin-left: 10px;">Pretraži</button>
                <button type="reset" class="btn btn-primary" style="margin-left: 50px;">Resetuj</button>
                <hr>
            </div>
        </div>
    </div>
    </form>
</div>

