<!DOCTYPE html>
<html>

<head>
    <title>Transactions</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }

        table tr th,
        table tr td {
            padding: 5px;
            border: 1px #eee solid;
        }

        tfoot tr th,
        tfoot tr td {
            font-size: 20px;
        }

        tfoot tr th {
            text-align: right;
        }
    </style>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Check #</th>
                <th>Description</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            <!-- YOUR CODE -->
            <!-- // This syntax can be written in an ALTERNATIVE SYNTAX.
            // foreach ($transactions as $transaction) {
            //     echo "<tr>";
            //     echo "<td>{$transaction[0]}</td>";
            //     echo "<td>{$transaction[1]}</td>";
            //     echo "<td>{$transaction[2]}</td>";
            //     echo "<td>{$transaction[3]}</td>";
            //     echo "</tr>";
            // } -->

            <!-- If the transactions array is not empty, then render the following -->
            <?php if (!empty($transactions)) : ?>
                <!-- /* The ALTERNATIVE SYNTAX (also using Short Echo Tag -> just a php tag with an echo inside it): */ -->
                <?php foreach ($transactions as $transaction) : ?>
                    <tr>
                        <td><?= $transaction[0] ?></td>
                        <td><?= $transaction[1] ?></td>
                        <td><?= $transaction[2] ?></td>
                        <td><?= $transaction[3] ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3">Total Income:</th>
                <td><!-- YOUR CODE --></td>
            </tr>
            <tr>
                <th colspan="3">Total Expense:</th>
                <td><!-- YOUR CODE --></td>
            </tr>
            <tr>
                <th colspan="3">Net Total:</th>
                <td><!-- YOUR CODE --></td>
            </tr>
        </tfoot>
    </table>
</body>

</html>