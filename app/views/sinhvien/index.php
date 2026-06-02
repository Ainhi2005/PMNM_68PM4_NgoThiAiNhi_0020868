<style>
    table, th, td {
        text-align: center;
        border: 1px solid black;
        border-collapse: collapse;
    }
    th, td {
        padding: 10px;
    }
    th {
        background-color: #456fc8;
        color: white;
    }
</style>

<h1><?php echo $title ?></h1>
<table style="width:100%">
    <tr>
        <th>id</th>
        <th>Ho va ten</th>
        <th>Gioi tinh</th>
        <th>mssv</th>
    </tr>
    <?php foreach ($sinhvien as $sv) { ?> 
        <tr>
            <td> <?php echo $sv['id']; ?> </td>
            <td> <?php echo $sv['sinhvien']; ?> </td>
            <td> <?php echo $sv['giotinh']; ?> </td>
            <td> <?php echo $sv['mssv']; ?> </td>
        </tr>
    <?php } ?>
</table>