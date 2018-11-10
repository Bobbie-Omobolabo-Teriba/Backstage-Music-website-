<?php
function set_header($mainHeading, $subHeading = "", $showLogin = true)
{
    echo '<header><link rel="icon" type="image/png" href="dkit.png"><div id="dkit_main_heading">' . $mainHeading . '</div>' .
    '<div id="dkit_sub_heading">' . $subHeading . '</div>' .
    '<div id="dkit_header_image_container">' . '<a href="members_area.php"><img src="dkit.png" alt="Go to Homepage" title="Go to Homepage"></a>' .
    '</div> <!-- dkit_header_image_container -->' . '<div id="dkit_header_user_name_container">';
    if (isset($_SESSION["user_name"]))
    {
        echo "<a href='user_profile.php' alt='Change User Profile' title='Change User Profile'>" . $_SESSION["user_name"] . "</a>";
    }
    else if ($showLogin)
    {
        echo "<a href='login.php'>Login/Registration</a>";
    }
    echo '</div> <!-- dkit_header_user_name_container -->' . '<div id="dkit_header_logout_container">';
    if (isset($_SESSION["user_id"]))
    {
        echo "<a href='logout_transaction.php'>Logout</a>";
    }
    echo '</div> <!-- dkit_header_logout_container --></header>';
    /* Main menu */
    echo "<div id='dkit_main_menu'><nav class='dkit_horizontal dkit_menu'><ul><li><a href='home.php'>Home</a></li><li><a href='about_us.php'>About Us</a></li><li><a href='members_area.php'>Members Area</a></li></ul></nav></div>";
}
?>