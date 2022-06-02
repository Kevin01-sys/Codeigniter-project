<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Vue version 2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <script src="https://unpkg.com/vue@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue-tables-2-premium@2.3.6/dist/vue-tables-2.min.js" integrity="sha256-V7nxQJDft6LBIbUZjfvl09AfcZXkiQkHp7neIrYHSfA=" crossorigin="anonymous"></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"> -->
    <!-- JavaScript Bundle with Popper -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script> -->
</head>
<body>
    <input type="hidden" id="base_url" value="<?php echo base_url(); ?>">
    <!-- <a href="<?php echo base_url(); ?>index.php/Lists/people" type="button" class="btn btn-danger">Revisar</a> -->
    <div id="peopleClient">
        <v-client-table :data="tableData" :columns="columns" :options="options"></v-client-table>
    </div>
    <!-- <div class="col-md-8 col-md-offset-2">
        <div id="peopleServer">
            <v-server-table url="<?php echo base_url(); ?>index.php/Lists/people" :columns="columns" :options="options"/>
        </div>
    </div> -->
    <div class="col-md-8 col-md-offset-2">
        <div id="peopleServer">
            <v-server-table :columns="columns" :options="options"/>
        </div>
    </div>

<!--     <div class="col-md-8 col-md-offset-2">
        <div id="communesServer">
            <v-server-table url="<?php echo base_url(); ?>index.php/lists/communes" :columns="columns" :options="options"/>
        </div>
    </div> -->

    <div class="col-md-8 col-md-offset-2">
        <!-- Start: Vue-Table -->
        <div id="communesServer">
            <v-server-table ref="dt_datos" :columns="dt_datos.columns" :options="dt_datos.options"/>
                <!-- buttons -->
                <div slot="buttons" slot-scope="props">
                    <div class="col-md-12  m-0 p-0">
                        <?php $variable = "{{ props.row.id }}" ?>
                        <!-- <button  type="button" class="btn btn-primary btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">test</button> -->
                        <button @click="delete_row(props)" class="btn btn-block dropdown-item pl-2 pr-2 pt-0 pb-0 text-2" >
                            <i class="fa fa-trash pr-1"></i>
                            <?php echo $variable ?>
                        </button>
                        <?php echo '<td><a href="'.base_url('index.php/lists/deleteCommune/'.$variable).'" type="button" class="btn btn-danger">'.base_url('index.php/lists/deleteCommune/'.$variable).'</a></td>' ?>
                    </div>
                </div>
                <!-- identificadores -->
                <div slot="identificadores" slot-scope="props">
                        <div class="col-md-12  m-0 p-0">
                        <small class="sub-td">
                            <strong>Identificador general: </strong>
                            {{ props.row.id }}
                            <br>
                            <strong>Identificador de provincia: </strong>
                            {{ props.row.provincia_id }}
                            <br>
                            <strong>Identificador de region: </strong>
                            {{props.row.region_id}}
                        </small>
                        </div>
                    </div>
                </div>
            </v-server-table>
        </div>
        <!-- End: Vue-Table -->
    <!-- <div class="col-md-8 col-md-offset-2">
        <div id="people">
        <v-server-table url="https://api.github.com/users/matfish2/repos" :columns="columns" :options="options">
        </v-server-table>
        </div>
    </div> -->
    <!-- Vue version 2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
    <script src="<?php echo base_url(); ?>static/js/vue_2/table_vue2.js" type="module"></script>
</body>
</html>