<!DOCTYPE html>
<html>
<body>

<form action="country_action.php">
  <label for="country">Select Country</label>
  <select name="country" id="country">
    <option value="">*Please Select*</option>
    <option value="Malaysia">Malaysia</option>
    <option value="Japan">Japan</option>
    <option value="Korea">Korea</option>
    <option value="New Zealand">New Zealand</option>
  </select>
  <br><br>
  
  Age: <select name="day" id="day">
  <?php for($i =1; $i<=31; $i++){ ?>
        <option value="<?php echo $i ?>"><?php echo $i ?></option>
<?php } ?>
    </select>

    <select name="month" id="month"> 
    <?php for($i =1; $i<=12; $i++){ ?>
        <option value="<?php echo $i ?>"><?php echo $i ?></option>
<?php } ?>
    </select>
    </select>


  <select name="year" id="year">
  <?php for($i =2000; $i<=2024; $i++){ ?>
        <option value="<?php echo $i ?>"><?php echo $i ?></option>
<?php } ?>
    </select>
    </select>
    <br><br>
    Gender: 
    <input type="radio" value="Male" name="gender">Male
    <input type="radio" value="Female" name="gender">Female
    <input type="radio" value="Other" name="gender">Other
  <br><br>
  <input type="submit" value="Submit">
</form>




</body>
</html>