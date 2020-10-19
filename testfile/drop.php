<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>The select multiple attribute</h1>

<p>The multiple attribute specifies that multiple options can be selected at once:</p>

<form id="form1" name="form1" method="get" action="dd.php">
      <table width="300" border="1">
        <tr>
          <td><label>Multiple Selection </label>&nbsp;</td>
          <td><select name="select2[]" size="3" multiple="multiple" tabindex="1">
            <option value="11">eleven</option>
            <option value="12">twelve</option>
            <option value="13">thirette</option>
            <option value="14">fourteen</option>
            <option value="15">fifteen</option>
            <option value="16">sixteen</option>
            <option value="17">seventeen</option>
            <option value="18">eighteen</option>
            <option value="19">nineteen</option>
            <option value="20">twenty</option>
          </select>
          </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input type="submit" name="Submit" value="Submit" tabindex="2" /></td>
        </tr>
      </table>
    </form>
</body>
</html>