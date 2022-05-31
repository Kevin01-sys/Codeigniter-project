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
</head>
<body>
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

    <div class="col-md-8 col-md-offset-2">
        <div id="communesServer">
            <v-server-table url="<?php echo base_url(); ?>index.php/lists/communes" :columns="columns" :options="options"/>
        </div>
    </div>
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