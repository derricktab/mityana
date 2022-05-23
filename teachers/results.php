<?php include("header.php") ?>
<?php

$current_year = date('Y');
$current_term = "2";

$result = mysqli_query($con, "SELECT * FROM marks_old WHERE student='$student_id' AND year='$current_year' AND term='$current_term'") or die(mysqli_error($con));

?>

<h2 class="font-weight-bold text-primary ml-5 pt-3">My Results</h2>

<div class="row">
    <div class="table-responsive m-5">
        <table class="table">
            <thead>
                <tr>
                    <th>NO.</th>
                    <th>SUBJECT</th>
                    <th>BOT</th>
                    <th>MID</th>
                    <th>END</th>
                    <th>TOTAL</th>
                </tr>
            </thead>

            <tbody>
            <?php
                           
                while($row = mysqli_fetch_array($result)){

                $id = $row["id"];
                $subject = $row["subject"];
                $bot = $row["bot"];
                $mid = $row["mid"];
                $end = $row["end"];

                $total = $bot+$mid+$end;
                ?>
                <tr>
                    <td><?php  echo $id ?> </td>
                    <td><?php  echo $subject ?> </td>
                    <td><?php  echo $bot ?> </td>
                    <td><?php  echo $mid ?> </td>
                    <td><?php  echo $end ?> </td>
                    <td><?php  echo $total ?> </td>
                </tr>

                <?php } ?>

            </tbody>
        </table>
    </div>
</div>

<script>
    $("#results").addClass("active-tab");
</script>

<?php include("footer.php") ?>