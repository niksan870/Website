<div class="profilePage">
    <img class='profileImg profile' src="../<?php echo $_SESSION['user_data']['profile']; ?>" alt="">
    <form action="" method="post" enctype="multipart/form-data">
        <label class="fileContainer">
            <span class='trigger-upload'>Upload</span>
        <input type="file" name="profile" value="Edit">
        <input type="submit" name='submit' value="Edit">
    </form>
</div>

<div class="shares">
    <h1>Your Shares</h1>
    <?php foreach ($viewmodel['this_user_posts'] as $item) : ?>
        <div class="profile">
            <img class='profileImg shares' src="../<?php echo $item['profile_shares']; ?>" alt=""><h2 class='user-name'><?php echo $item['user_name']; ?></h2><br />
            <h3><?php echo $item['title']; ?></h3>
            <hr>
            <p class="a"><?php echo $item['body']; ?></p>
            <span class="date"><?php echo $item['create_date']; ?></span><br />
        </div>
      
    <?php endforeach; 