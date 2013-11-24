<?php echo get_instance()->header(); ?>
<div class="container">
    <!-- start: PAGE HEADER -->
    <div class="row">
        <div class="col-sm-12">
            <!-- start: PAGE TITLE & BREADCRUMB -->
            <ol class="breadcrumb">
                <li>
                    <i class="clip-home-3"></i>
                    <a href="#">
                        Home
                    </a>
                </li>
                <li class="active">
                    Blog
                </li>
                <li class="search-box">
                    <form class="sidebar-search">
                        <div class="form-group">
                            <input type="text" placeholder="Start Searching...">
                            <button class="submit">
                                <i class="clip-search-3"></i>
                            </button>
                        </div>
                    </form>
                </li>
            </ol>
            <div class="page-header">
                <h1><small><?php echo $post->post_title; ?></small></h1>
                <?php if($post->post_type =='post'):?>
                    <a href="<?php echo site_url('blog/write/' . $post->post_id)?>" class="badge badge-green pull-right"><i class="icon icon-play-sign"></i>&nbsp; add an revision</a>
                    <?php endif;?>
            </div>
            <!-- end: PAGE TITLE & BREADCRUMB -->
        </div>
    </div>
    <div class="row col-sm-12">
        <?php echo nl2br( $post->post_content ); ?>
    </div>
    <?php if(isset($revisions) && count($revisions) > 1): ?>
        <div class="row col-sm-12" style="margin-top:10px">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="icon-question-sign"></i>
                    Revisions
                </div>
                <div class="panel-body">  
                    <table class="table table-condensed table-hover">
                        <thead><tr><th>Post Title</th><th>Reviewer</th><th>Action</th></tr></thead>
                        <tbody>
                            <?php $prev_post = null; foreach($revisions as $post):  ?>
                                <?php if($post->post_type =='original'):?>
                                    <tr class="success"><td><span class="badge badge-success">original</span>&nbsp;<a href="<?php echo site_url('blog/view/' . $post->post_id); ?>"><?php echo $post->post_title ?></a></td><td><?php echo $post->user->profile_link_with_avatar(); ?></td><td></td></tr>
                                    <?php else:?>
                                    <tr><td><a href="<?php echo site_url('blog/view/' . $post->post_id); ?>"><?php echo $post->post_title ?></a></td><td><?php echo $post->user->profile_link_with_avatar(); ?></td><td><a class="tooltips" data-placement="top" data-original-title="View differences between this and and <?php echo $prev_post->post_type =='original' ? 'oringial version' :  $prev_post->user->user_name . '\'s revision'; ?>"  href="<?php echo site_url('blog/view_diff/' . $post->post_id); ?>">compare</a></td></tr>
                                    <?php endif;?>
                                    
                                <?php $prev_post = $post; endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php endif; ?>
</div>
<?php echo get_instance()->footer(); ?>