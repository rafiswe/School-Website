<?php session_start();
require_once('function/function.php');
needLogged();
    get_part('header.php');
    get_part('sidebar.php');
    get_part('bread.php');
    ?>
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="col-md-9 heading_title">
                    All News Information
                </div>
                <div class="col-md-3 text-right">
                    <a href="add-news.php" class="btn btn-sm btn btn-primary"><i class="fa fa-plus-circle"></i> Add News</a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-body">
                <table class="table table-responsive table-striped table-hover table_cus">
                    <thead class="table_head">
                        <tr>
                            <th>Details</th>
                            <th>Category</th>
                            <th>Time</th>   
                            <th>Image</th>  
                            <th>Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sel = 'SELECT * FROM s_noticeboard ORDER BY notice_id DESC';
                        $qry = mysqli_query($con, $sel);
                        while ($data = mysqli_fetch_array($qry)) {
                            ?>
                            <tr>
                                <td><?= substr($data['notice_details'], 0, 15); ?>...</td>
                                <td><?= $data['ncate_id']; ?></td>
                                <td><?= substr($data['notice_time'],0,10); ?>...</td>
                                <td class="hidden-xs">
                                    <img height="50" src="uploads/<?= $data['notice_image']; ?>" alt="No Image" />
                                </td>
                                <td>
                                    <a href="edit-news.php?e=<?= $data['ncate_id']; ?>"><i class="fa fa-pencil-square fa-lg"></i></a>         
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="panel-footer">
                <div class="col-md-4">
                    <a href="#" class="btn btn-sm btn-warning">EXCEL</a>
                    <a href="#" class="btn btn-sm btn-primary">PDF</a>
                    <a href="#" class="btn btn-sm btn-danger">SVG</a>
                    <a href="#" class="btn btn-sm btn-success">PRINT</a>
                </div>
                <div class="col-md-4">
                </div>
                <div class="col-md-4 text-right">
                    <nav aria-label="Page navigation">
                        <ul class="pagination pagina_cus">
                            <li>
                                <a href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li>
                                <a href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div><!--col-md-12 end-->
    <?php
     get_part('footer.php');
?>          