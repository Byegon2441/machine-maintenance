<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <tr>
            <td>Item Type</td>
            <td>Item</td>
            <td>Add/Remove Item</td>
        </tr>
        <tr>
            <td><input type='text' value='Fruit >'></td>
            <td><input type='text' value='Apple'></td>
            <td><input type='button' class='AddNew' value='Add new item'></td>
        </tr>
    </table>
    <script>
    $('.AddNew').click(function() {
        var row = $(this).closest('tr').clone();
        row.find('input').val('');
        $(this).closest('tr').after(row);
        $('input[type="button"]', row).removeClass('AddNew')
            .addClass('RemoveRow').val('Remove item');
    });

    $('table').on('click', '.RemoveRow', function() {
        $(this).closest('tr').remove();
    });
    </script>
</body>

</html>