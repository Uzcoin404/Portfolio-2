<? ?>
<?if(count($myComments) > 0):?>
    <? for ($i=count($myComments)-1; $i >= 0; $i--): ?>
    <div class="comment" data-aos="flip-right" data-aos-duration="1000" data-aos-delay="300">
        <div class="comment_img_blog">
            <a href="./?route=profile"><img src="<?= $myProfile['avatar']?>" alt="" class="comment_img" title="View profile"></a>
        </div>
        <div class="comment_body">
            <div class="comment_item">
                <p class="comment_text"><?= $myComments[$i]['comment']?></p>
                <form action="../components/edit-comment.php" method="post" class="comment_edit_form" style="display: none;">
                    <textarea name="comment" class="comment_area" value="<?= $myComments[$i]['comment']?>" placeholder="Message" required></textarea>
                    <input type="hidden" name="id" value="<?= $myComments[$i]['id']?>">
                    <input type="hidden" name="username" value="<?= $myComments[$i]['username']?>">
                    <div class="edit_comment_buttons">
                        <button class="btn edit_comment_button edit_comment_btn" type="submit">Save</button>
                        <button class="btn edit_comment_button cancel_comment_btn" type="button">Cancel</button>
                    </div>
                </form>
                <div class="comment_functions" style="display: <?= $isMyProfile ? 'flex' : 'none'?>;">
                    <a href="#" class="comment_function" id="edit" title="Edit comment"><i class="fas fa-pen"></i></a href="#">
                    <a href="./?route=profile&del=<?= $myComments[$i]['id']?>" class="comment_function" id="delete" title="Delete comment"><i class="fas fa-trash"></i></a href="#">
                </div>
            </div>
            <div class="comment_footer">
                <a href="./?route=profile" class="comment_name" title="View profile"><?= $myComments[$i]['username']?></a>
                <p class="comment_date" title="Comment created Date"><?= $myComments[$i]['date']?></p>
            </div>
        </div>
    </div>
    <?endfor;
endif;?>