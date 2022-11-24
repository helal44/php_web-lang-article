 <!-- Comments Form -->
 <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form method="POST" >
                        <div class="form-group">
                            <textarea class="form-control" rows="3" placeholder=" leave comment .............." name="content"></textarea>
                        </div>
                        <div class="form-group">
                           <input type="text" name="author" placeholder="Author...." class="form-control">
                        </div>
                        <div class="form-group">
                           <input type="email" name="email" placeholder="email...." class="form-control">
                        </div>
                        <div class="">
                           <input type="submit" name="create_comment" value="Create Comment" class="btn btn-primary">
                        </div>
                    </form>
                </div>

                

                <!-- Posted Comments -->

                <!-- Comment -->
                <div class="media">
                    <?php view_comments(); ?>
                </div>

               
