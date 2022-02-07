<?php
require_once "config.php";
session_start();
$conn = new  mysqli(host, username, password, db);
if (isset($_POST['message']) && !empty($_POST['message'])) {
?>
    <article class="msg-container msg-self">
        <div class="msg-box">
            <div class="flr">
                <div class="messages">
                    <p class="msg">
                    <div class="user-pm">
                        <?php echo $_POST['message']; ?>
                        </p>
                    </div>
                </div>
                <img class="user-img" id="user-0" src="//gravatar.com/avatar/56234674574535734573000000000001?d=retro" />
            </div>
    </article>
    <?php
    $result_parents_id = $conn->query("SELECT * FROM bot where title LIKE '%" . $_POST['message'] . "%'");
    if ($result_parents_id->num_rows > 0) :
        while ($row_parents_id = $result_parents_id->fetch_assoc()) :
            $parents_id = $row_parents_id['id'];
            $_SESSION['parents_id'] = $row_parents_id['id'];
        endwhile;
        $result = $conn->query("SELECT * FROM bot where parents_id=" . $parents_id);
        if ($result->num_rows > 0) :
            while ($row = $result->fetch_assoc()) :
    ?>
                <article class="msg-container msg-remote">
                    <div class="msg-box">
                        <img class="user-img" id="user-0" src="//gravatar.com/avatar/00034587632094500000000000000000?d=retro" />
                        <div class="flr">
                            <div class="messages">
                                <p class="msg">
                                    <?php echo $row['title'] ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </article>
    <?php
            endwhile;
        endif;
    endif;
    ?>
<?php
} else {
?>
    <article class="msg-container msg-remote">
        <div class="msg-box">
            <img class="user-img" src="//gravatar.com/avatar/00034587632094500000000000000000?d=retro" />
            <div class="flr">
                <div class="messages">
                    <p class="msg">
                        can i help you ?
                    </p>
                </div>
            </div>
        </div>
    </article>
    <article class="msg-container msg-remote">
        <div class="msg-box">
            <img class="user-img" src="//gravatar.com/avatar/00034587632094500000000000000000?d=retro" />
            <div class="flr">
                <div class="messages">
                    <p class="msg">
                        What's your problem?
                    </p>
                </div>
            </div>
        </div>
    </article>
    <?php
    $_SESSION['parents_id'] = 0;
    $result = $conn->query("SELECT * FROM bot where parents_id=0");
    while ($row = $result->fetch_assoc()) :
    ?>
        <article class="msg-container msg-remote">
            <div class="msg-box">
                <img class="user-img" src="//gravatar.com/avatar/00034587632094500000000000000000?d=retro" />
                <div class="flr">
                    <div class="messages">
                        <p class="msg">
                            <?php echo $row['title'] ?>
                        </p>
                    </div>
                </div>
            </div>
        </article>
    <?php
    endwhile;
    ?>
<?php
}
