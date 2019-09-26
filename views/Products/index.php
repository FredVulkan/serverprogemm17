<h1>Employees</h1>
<a href="employees/create">add new employee</a>
<table>
    <thead>
        <th>id</th>
        <th>name</th>
        <th>price</th>
        <th>action</th>
    </thead>
    <tbody>
    <?php foreach($result as $product): ?>
    <tr>
        <td><?= $product->id ?></td>
        <td><?= $product->name ?></td>
        <td><?= $product->price ?></td>
        <td>
            <a href="employees/view?id=<?= $product->id ?>">show</a>
            <a href="employees/edit?id=<?= $product->id ?>">edit</a>
            <a href="employees/delete?id=<?= $product->id ?>">delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>