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
                        <td><?= formatDate($transaction['date']) ?></td>
                        <td><?= $transaction['check_number'] ?></td>
                        <td><?= $transaction['description'] ?></td>
                        <td>
                            <?php if ($transaction['amount'] < 0) : ?>
                                <span style="color: red;">
                                    <?= formatDollarAmount($transaction['amount']) ?>
                                </span>
                            <?php elseif ($transaction['amount'] > 0) : ?>
                                <span style="color: green;">
                                    <?= formatDollarAmount($transaction['amount']) ?>
                                </span>
                            <?php else : ?>
                                <span style="color: black;">
                                    <?= formatDollarAmount($transaction['amount']) ?>
                                </span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3">Total Income:</th>
                <td>
                    <!-- YOUR CODE -->
                    <?= formatDollarAmount($totals["total_income"]) ?>
                </td>
            </tr>
            <tr>
                <th colspan="3">Total Expense:</th>
                <td>
                    <!-- YOUR CODE -->
                    <?= formatDollarAmount($totals["total_expense"]) ?>
                </td>
            </tr>
            <tr>
                <th colspan="3">Net Total:</th>
                <td>
                    <!-- YOUR CODE -->
                    <?= formatDollarAmount($totals["net_total"]) ?>
                </td>
            </tr>
        </tfoot>
    </table>
</body>

</html>