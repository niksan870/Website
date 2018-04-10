<?php if (isset($_SESSION['is_logged_in'])): ?>
    <div class="wrapper-post" id="shrinked">
        <div class="post-submit">
            <?php Messages::display(); ?>
            <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>" id="contact-form-post">
                <input type="text" id="name" name="title" class="form-control" placeholder="Title" required>
                <textarea name="body" class="form-control" placeholder="Content" rows="4" required>
                </textarea>
                <input type="submit" name="submit" class="form-control submit" value="Post">
            </form>
        </div>
    </div>
<?php endif; ?>
<div class="shares">
    <?php foreach ($viewmodel['rows'] as $item) : ?>
        <div class="well" id="shrinked">

          <div class="submit-post">
            <div class="profile-rep"><img class='profileImg shares' src="<?php echo $item['profile_shares']; ?>" alt=""><p class='user-name'><?php echo $item['user_name']; ?></p></div><br />
            <h3><?php echo $item['title']; ?></h3>
            <hr>
                <p><?php echo $item['body']; ?></p>
                <span class="date"><?php echo $item['create_date']; ?></span>
          </div>
          <hr>
        
          <?php if(isset($_SESSION['is_logged_in'])): ?>
           <form class="comment-submit" method= "POST" active="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <img class="Comment-img" src="<?php echo $_SESSION['user_data']['profile'] ?>"><h2><?php echo $_SESSION['user_data']['name'] ?></h2>
                <input type="hidden" name="comment_id" value="<?php print_r($item['id']); ?>">
                <textarea name="comment"  rows="2" required></textarea>
                <input type="submit" name="submit-comment" value="Comment">
           </form>
           <hr>
          <?php else: ?>
          
          <?php endif; ?>

           <?php foreach($viewmodel['comments'] as $comment): ?>
            <?php if ($comment['share_id'] == $item['id']): ?>
                <div class="comment">
                    <img class="Comment-img" src="<?php echo $comment['profile'] ?>"><h3><?php echo $comment['user_name'] ?></h3>
                    <p><?php echo $comment['body']; ?></p>
                    <span class="date comment"><?php echo $comment['create_date']; ?></span>
                </div>
                <hr>
            <?php endif; ?>
          <?php endforeach; ?>
        <button type="submit" name="info" class="add-info" value="More">All comments</button>
      </div>
    <?php endforeach; ?>
</div>


