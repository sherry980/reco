<?php
if(!mysql_connect("localhost","root","flage340"))
{
     die('oops connection problem ! --> '.mysql_error());
}
if(!mysql_select_db("logintest"))
{
     die('oops database selection problem ! --> '.mysql_error());
}
?>