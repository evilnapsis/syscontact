<?php
/**
* @author evilnapsis
* @brief Eliminar un usuario
**/
$p = ContactData::getById($_GET["id"]);
$p->del();
Core::redir("./?view=messages");
?>