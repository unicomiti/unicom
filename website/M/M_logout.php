<!-- Logout -->
<?php
function logout() {
    session_unset();
    session_destroy();
    return "<meta http-equiv='Refresh' content='0; url = index.php'/>";
}
