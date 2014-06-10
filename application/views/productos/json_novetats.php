<?php 
$this->output->set_header('Conctent-Type: application/json; charset=utf-8');
echo "{Novetats:",json_encode($json), "}";
