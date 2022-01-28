<?php
$conn = new  mysqli('localhost','root','78188124','chatBot');
if(isset($_POST['message']) && !empty($_POST['message'])){

}else{
    ?>
<div class="bot-pm">
can i help you ?
</div>
<div class="bot-pm">
What's your problem?
</div>
<?php
$result=$conn->query("SELECT * FROM bot where parents_id=0");
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