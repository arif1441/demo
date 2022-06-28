<?php
/*
Plugin name:Wp_Boots
*Plugin URI:https//googel.com
*Description: add appointment feature
*Author:Muhammad Arif
*Author URI:https//googel.com
*Version:2.0 
*/
if(!defined('ABSPATH')){
    header("Location: /wordpress");
    die();
}
register_activation_hook(__file__, 'Wp_Boots_activation');

function Wp_Boots_activation(){
       global $wpdb, $table_perfix;
       $wp_emp =  $table_perfix.'wp_emp';
       $q ="CREATE TABLE IF NOT EXISTS `$wp_emp` (`ID` INT NOT NULL AUTO_INCREMENT , `Name`
       VARCHAR(50) NOT NULL , `Email` VARCHAR(100) NOT NULL , `Status` BOOLEAN NOT NULL ,
       PRIMARY KEY (`ID`)) ENGINE = InnoDB;";
       $wpdb->query($q);

       $q = "INSERT INTO `$wp_emp` (`Name`, `Email`, `Status`) VALUES( 
        'Arif', 'ariffarooq7078@gmail.com', 1);";
         $wpdb->query($q);
}

 
register_deactivation_hook(__file__, 'Wp_Boots_deactivation');
function Wp_Boots_deactivation(){

    global $wpdb, $table_perfix;
    $wp_emp =  $table_perfix.'wp_emp';
    $q = "DROP TABLE `$wp_emp`";
    $wpdb->query($q);
}

add_shortcode('my-sc', 'my_sc_func');
function my_sc_func(){
    return 'Arif'; 
}
