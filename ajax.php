<?php
session_start();
$conn = new  mysqli('localhost', 'root', '78188124', 'chatBot');
if (isset($_POST['message']) && !empty($_POST['message'])) {
?>
 <div class="user-pm">
<?php echo $_POST['message']; ?>
</div>
<?php
    $result_parents_id = $conn->query("SELECT * FROM bot where title LIKE '%" . $_POST['message'] . "%'");
    if ($result_parents_id->num_rows > 0) :
        while ($row_parents_id = $result_parents_id->fetch_assoc()) :
            $parents_id = $row_parents_id['id'];
            $_SESSION['parents_id']=$row_parents_id['id'];
        endwhile;
        $result = $conn->query("SELECT * FROM bot where parents_id=" . $parents_id);
        if ($result->num_rows > 0) :
            while ($row = $result->fetch_assoc()) :
?>
                <div class="bot-pm">
                    <?php echo $row['title'] ?>
                </div>
    <?php
            endwhile;
        endif;
    endif;
    ?>
<?php
} else {
?>
    <div class="bot-pm">
        can i help you ?
    </div>
    <div class="bot-pm">
        What's your problem?
    </div>
    <?php
    $_SESSION['parents_id'] = 0;
    $result = $conn->query("SELECT * FROM bot where parents_id=0");
    while ($row = $result->fetch_assoc()) :
    ?>
        <div class="bot-pm">
            <?php echo $row['title'] ?>
        </div>
    <?php
    endwhile;
    ?>
<?php
}
