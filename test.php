<form action="curl.php" method="POST">
    <p><input name="amount" placeholder="amount"></p>
    <p><input name="phone" placeholder="phone" /></p>
    <input type="hidden" name="pay">
    <p><input type="submit"></p>
</form>
<p>Query</p>
<form action="curl.php" method="POST">
    <p><input name="phone" placeholder="phone"></p>
    <input type="hidden" name="check">
    <p><input type="submit"></p>
</form>