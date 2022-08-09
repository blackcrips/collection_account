<?php
require_once('./includes/autoloadclasses.inc.php');
require_once('./adminheader.php');
?>



<div class="dashboard-parent-information">

    <div class="dashboard-information" id="dashboard-information">
        <div class="dashboard-view-users">
            <diiv class="dashboard-view-users-text" id="dashboard-view-users-text">
                &#8592; View users
            </diiv>
        </div>
        <?php foreach ($getTotal->getTotal() as $key) : ?>
            <div class="child-header">
                <div class="total-data"><label>TOTAL SALES DISBURSED</label> <span id="total-sales"><?php echo number_format($key['outstandingBalance']) ?></span></div>
                <div class="total-data"><label>TOTAL SALES COLLECTED</label> <span id="sales-collected"><?php echo number_format($key['totalAmountPaid']) ?></span></div>
                <div class="total-data"><label>TOTAL WAITING PAYMENT</label> <span id="waiting-payment"><?php echo number_format($key['endBalance']) ?></span></div>
                <div><label>TOTAL PROCESSED CLIENT</label> <span id="processed-client"><?php echo number_format($key['totalClient']) ?></span></div>
            </div>
        <?php endforeach; ?>

        <div class="container-hidden">
            <div class="container-year-new-hidden">
                <table>
                    <caption>New Peso</caption>
                    <th>
                        <tr>
                            <td>Year</td>
                            <td>New Loan (Peso)</td>
                            <td>New (Count)</td>
                            <td>Total Amount Paid</td>
                        </tr>
                    </th>
                    <tbody>
                        <?php foreach ($getNewData->getYearsToDateNew()[0] as $key => $value) : $year = date('Y', strtotime($value[0][0]['date_released']) + 1); ?>
                            <tr>
                                <td id="dashboard-year"><?php echo $year ?></td>
                                <td id="dashboard-peso-NL"><?php echo number_format($value[0][0]['outstandingBalance']) ?></td>
                                <td id="dashboard-peso-NC"><?php echo $value[0][0]['rowCount'] ?></td>
                                <td id="total-paid-new"><?php echo $value[0][0]['totalAmountPaid'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>

            <div class="container-year-reloan-hidden">
                <table>
                    <caption>Reloan Peso</caption>
                    <th>
                        <tr>
                            <td>Reloan Loan (Peso)</td>
                            <td>Reloan (Count)</td>
                            <td>Total Amount Paid Reloan</td>
                        </tr>
                    </th>
                    <tbody>
                        <?php foreach ($getNewData->getYearsToDateReloan()[0] as $key => $value) : ?>
                            <tr>
                                <td id="dashboard-peso-RL"><?php echo $value[0][0]['outstandingBalance'] ?></td>
                                <td id="dashboard-peso-RC"><?php echo $value[0][0]['rowCountReloan'] ?></td>
                                <td id="total-paid-reloan"><?php echo $value[0][0]['totalAmountPaid'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>

            <div class="container-year-fullypaidNew-hidden">
                <table>
                    <caption>Fully Paid New Count</caption>
                    <th>
                        <tr>
                            <td>Fully Paid New (PESO)</td>
                            <td>Fully Paid New (Number)</td>

                        </tr>
                    </th>
                    <tbody>
                        <?php foreach ($getNewData->getYearsToDateNew()[1] as $key => $value) :  ?>
                            <tr>
                                <td id="dashboard-peso-FNL"><?php echo $value[0][0]['outstandingBalance'] ?></td>
                                <td id="dashboard-peso-FNC"><?php echo $value[0][0]['rowCount'] ?></td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>

            <div class="container-year-fullypaidReloan-hidden">
                <table>
                    <caption>Fully Paid Reloan Peso</caption>
                    <th>
                        <tr>
                            <td>Fully Paid Reloan (Peso)</td>
                            <td>Fully Paid Reloan (Number)</td>
                        </tr>
                    </th>
                    <tbody>
                        <?php foreach ($getNewData->getYearsToDateReloan()[1] as $key => $value) : ?>
                            <tr>
                                <td id="dashboard-peso-FRL"><?php echo $value[0][0]['outstandingBalance'] ?></td>
                                <td id="dashboard-peso-FRC"><?php echo $value[0][0]['rowCount'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
        <div class="child-information">
            <div class="child-information-table">
                <table id='child-information-table'>
                    <th>
                        <tr class="child-information-table-header">
                            <td>Year</td>
                            <td>New (Peso)</td>
                            <td>Reloan (Peso)</td>
                            <td>Total (Peso)</td>
                            <td>New (Number)</td>
                            <td>Reloan (Number)</td>
                            <td>Total (Number)</td>
                            <td>Collected Amount for the Month</td>
                            <td>Fully Paid New (Peso)</td>
                            <td>Fully Paid Reloan (Peso)</td>
                            <td>Total Peso</td>
                        </tr>
                    </th>
                    <tbody id='child-information-body'>

                    </tbody>
                </table>
            </div>
        </div>

        <div class="container-search">
            <div class="search-table">
                <div class="search-field">
                    <form method="POST">
                        <input type="date" class='date-search' name='start-date'>
                        <input type="date" class='date-search' name='end-date'>
                        <select name="loan-type">
                            <option disabled hidden selected value='N'>New</option>
                            <option value='N'>New</option>
                            <option value='R'>Reloan</option>
                        </select>
                        <input type="submit" class="btn btn-primary" name='submit-search-first' id='btn-search-first'>
                    </form>
                </div>
                <table id='search-table-first'>
                    <th>
                        <tr class="search-table-header">
                            <td>Year</td>
                            <td>Amount</td>
                            <td>Count</td>
                            <td>Collected Amount</td>
                            <td>Fully Paid</td>
                        </tr>
                    </th>
                    <tbody id='search-body'>
                        <?php
                        $getTotalSearch = $getTotal->searchSalesRange();
                        if (!is_array($getTotal->searchSalesRange())) {
                            echo "<span class='alert-message'>" . $getTotal->searchSalesRange() . "</span>";
                        } else {
                            echo "<tr>
                                            <td id='active-data-first'><strong>" . $_POST['start-date'] . " to " . $_POST['end-date'] . "</strong></td>
                                        ";


                            foreach ($getTotalSearch[0] as $key => $value) {
                                echo "<td id='convert-value'>" . number_format($value[0][0]['outstandingBalance']) . "</td>
                                            <td>" . number_format($value[0][0]['rowCount']) . "</td>
                                            <td>" . number_format($value[0][0]['totalAmountPaid']) . "</td>";
                            }

                            foreach ($getTotalSearch[1] as $key => $value) {

                                echo "<td>" . number_format($value[0][0]['totalAmountPaid']) . "</td></tr>";
                            }
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="dashboard-parent-login" id="dashboard-parent-login">
        <div class="login-child-information">
            <div class="login-child-title">
                <div class="users-panel" id="users-panel">Users Panel &#8594;</div>
            </div>
            <?php foreach ($getTotal->getUsers() as $key) : ?>
                <form method="post">
                    <div class="login-child-information-content">
                        <div class="login-name-container">
                            <div class="green-dot" id='green-dot'></div>
                            <div class="login-name" id="login-name"><?php echo $key['first_name'] . ' ' . $key['last_name'] ?></div>
                        </div>
                        <div class="access" id="agent-access"><?php echo $key['access'] ?></div>
                        <div class="access" hidden id='agent-status'><?php echo $key['status'] ?></div>
                        <div class="action" id="agent-action"><button type='submit' name='dashboard-logout' id='dashboard-logout'>Logout</button></div>
                        <input type="text" name='agent-id' hidden value="<?php echo $key['id'] ?>">
                    </div>
                </form>
            <?php endforeach; ?>
        </div>
    </div>
</div> <!-- end of whole div -->


<script src="./js/dashboard.js"></script>
<?php require_once('./adminfooter.php'); ?>