<?PHP
// "reg_header подключен";
include "reg_function.php";
user_auth ();
?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="js/jquery.placeholder.js"></script>

<?PHP // Здесь была форма авторизации/выхода ?>

<script>
jQuery('input[placeholder], textarea[placeholder]').placeholder();
</script>