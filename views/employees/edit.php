<form action="/employees/update?id=<?=$employee->id?>" method="post">
    <label for="fname">First Name:</label>
    <input type="text" name="fname" id="fname" value="<?=$employee->fname?>"/>
    <br>
    <label for="lname">Last Name:</label>
    <input type="text" name="lname" id="lname" value="<?=$employee->lname?>"/>
    <br>
    <label for="phone">Phone:</label>
    <input type="number" name="phone" id="phone" value="<?=$employee->phone?>"/>
    <br>
    <label for="bday">Birthday:</label>
    <input type="date" name="bday" id="bday" value="<?=$employee->bday?>"/>
    <br>
    <input type="submit"/>
</form>