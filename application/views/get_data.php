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
    <link rel="shortcut icon" href="#">
    <!-- Vue version 2 -->
    <script src="https://unpkg.com/vue@2"></script>
    <!-- Vue version 3 -->
    <!-- <script src="https://unpkg.com/vue@3"></script> -->
</head>
<body>
    <div id="app">
        <!-- Form -->
        <div>
            <?php echo form_open('users/addUser'); ?>
            <div>
                <div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Run</label>
					<div class="col-sm-8"><input id="run" name="run" type="text" class="form-control" autofocus></div>
				</div>
				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Nombres</label>
					<div class="col-sm-8"><input id="nombre" name="nombre" type="text" class="form-control"  autofocus></div>
				</div>
				<div class="form-group">
					<label for="apellidos" class="col-sm-2 control-label">Hobby</label>
					<div class="col-sm-8"><input id="hobby" name="hobby" type="text" class="form-control" ></div>
				</div>
                <button type="submit">Guardar</button>
            </div>
            <?php echo form_close(); ?>
        </div>
        <div>
            <button id="idGetData" name="nameGetData" @click="post_json_data">{{ name }}</button>
            <input type="hidden" id="base_url" value="<?php echo base_url(); ?>">
            <ul id="example-1">
                <li v-for="item in data">
                    {{ data }}
                </li>
            </ul>
        </div>
    </div>
    <!-- file on which JavaScript tests will be performed -->
    <!-- Vue version 2 -->
    <script src="<?php echo base_url(); ?>static/js/vue_2/fetch_vue2.js" type="module"></script>
    <!-- Vue version 3 -->
    <!-- <script src="static/js/vue_3/fetch_vue3.js" type="module"></script> -->
</body>
</html>