<?php echo get_instance()->header(); ?>
<div class="container">
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
                    Quizzes
                </li>
                <li class="search-box">
                    <form class="sidebar-search">
                        <div class="form-group">
                            <input type="text" placeholder="Start Searching..." data-default="130">
                            <button class="submit">
                                <i class="clip-search-3"></i>
                            </button>
                        </div>
                    </form>
                </li>
            </ol>
            <div class="page-header">
                <h1>Quizzes <small>management </small></h1>
            </div>
            <!-- end: PAGE TITLE & BREADCRUMB -->
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="icon-external-link-sign"></i>
                    Add a Quiz
                </div>
                <div class="panel-body">
                    <form role="form" class="form-horizontal" method="post">
                        <div class="form-group">
                            <div class="col-sm-6">
                                <label class="col-sm-4">Lesson</label>
                                <div class="col-sm-8">
                                    <select class="form-control" class="lesson_id" name="lesson_id">
                                        <?php foreach($lessons as $lesson):?>
                                            <option value="<?php echo $lesson->lesson_id; ?>"><?php echo $lesson->lesson_name; ?></option>
                                            <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <label class="col-sm-4">Name</label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" name="quiz_name"/>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <label class="col-sm-4">Weight (%)</label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" name="quiz_weight"/>
                                </div>
                            </div>


                        </div>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <label class="col-sm-4">Quiz Date</label>
                                <div class="col-sm-8">
                                    <input data-date-format="yyyy-mm-dd" data-date-viewmode="years" class="form-control date-picker" type="text" name="quiz_date"/>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label class="col-sm-4">Track ID</label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" name="track_id"/>
                                </div>
                            </div>

                        </div>  

                        <div class="form-group col-sm-12">
                            <input  type="submit" value="Save" class="btn btn-info pull-right"/>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>    
    <div class="row">
        <div class="col-sm-12">
            <table class="table table-bordered">
                <thead>
                    <tr><th>#T</th><th>Lesson</th><th>Quiz</th><th>Quiz Date</th><th>Action</th></tr>
                </thead>
                <?php foreach($quizzes as $quiz):?>
                    <tr><td><?php echo $quiz->track_id; ?></td><td><?php echo $quiz->lesson->lesson_name; ?></td><td><?php echo $quiz->quiz_name; ?></td><td><?php echo $quiz->quiz_date; ?></td><td><a onclick="return confirm('are you sure you want to delete this quiz?')" href="<?php echo site_url('manage/delete_quiz/' . $quiz->quiz_id); ?>">Delete</a></td></tr>
                    <?php endforeach;?>
            </table>
        </div>
    </div>

</div>
<?php echo get_instance()->footer(); ?>