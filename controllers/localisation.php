<?php

if (isset($_GET['translate_to'])) {
    localisation::create_localisation_for($_GET['translate_to']);
} else {
    localisation::handler();
}


