<?php

    require('../inc/db_connect.php');
    require('../inc/essentials.php');
    adminLogin();


    if(isset($_POST['add_image']))
    {
        
        $img_r = uploadImage($_FILES['picture'],CAROUSEL_FOLDER);

        if($img_r == 'inv_img')
        {
            echo $img_r;
        }
        else if ($img_r == 'inv_size')
        {
            echo $img_r;
        }

        else if ($img_r == 'upd_failed')
        {
            echo $img_r;
        }

        else 
        {
            $q = "INSERT INTO `carousel`(`image`) VALUES (?)";
            $values = [$img_r];
            $res = insert($q, $values,'s');
            echo $res;
        }
    }

    if(isset($_POST['get_carousel']))
    {
        $res = selectAll('carousel');

        while($row = mysqli_fetch_assoc($res))
        {
            $path  = CAROUSEL_IMG_PATH;
            echo <<<data

                <div class="col-md-3 mb-3">
                    <div class="card bg-dark text-white">
                        <img src="$path$row[image]" class="card-img" alt="img">
                        <div class="card-img-overlay text-end">
                            <button type="button" onclick="rem_image($row[sr_no] )" class="btn btn-danger btn-sm shadow-none">
                                  <i class="bi bi-trash3-fill"></i> Delete
                            </button>                                       
                        </div>
                    </div>
                </div>

            data;
        }
    }

    if(isset($_POST['rem_image']))
    {
        $frm_data = filteration(($_POST));
        $values = [$frm_data['rem_image']];

        $pre_q  = "SELECT * FROM `carousel` WHERE `sr_no`=? ";  
        $res = select($pre_q,$values,'i');
        $img = mysqli_fetch_assoc($res);

        if(deleteImage($img['image'],CAROUSEL_FOLDER))
        {
            $q = "DELETE FROM `carousel` WHERE `sr_no`=? ";
            $res = delete($q, $values,'i');
            echo $res;
        }
        else
        {
            echo 0;
        }
    }



//banner carousel section 
    if(isset($_POST['add_banner']))
    {
        
        $img_r = uploadImage($_FILES['picture'],BANNER_FOLDER);

        if($img_r == 'inv_img')
        {
            echo $img_r;
        }
        else if ($img_r == 'inv_size')
        {
            echo $img_r;
        }

        else if ($img_r == 'upd_failed')
        {
            echo $img_r;
        }

        else 
        {
            $q = "INSERT INTO `banner`(`image`) VALUES (?)";
            $values = [$img_r];
            $res = insert($q, $values,'s');
            echo $res;
        }
    }

    if(isset($_POST['get_banner']))
    {
        $res = selectAll('banner');

        while($row = mysqli_fetch_assoc($res))
        {
            $path  = BANNER_IMG_PATH;
            echo <<<data

                <div class="col-md-3 mb-3">
                    <div class="card bg-dark text-white">
                        <img src="$path$row[image]" class="card-img" alt="img">
                        <div class="card-img-overlay text-end">
                            <button type="button" onclick="rem_banner($row[sr_no] )" class="btn btn-danger btn-sm shadow-none">
                                  <i class="bi bi-trash3-fill"></i> Delete
                            </button>                                       
                        </div>
                    </div>
                </div>

            data;
        }
    }

    if(isset($_POST['rem_banner']))
    {
        $frm_data = filteration(($_POST));
        $values = [$frm_data['rem_banner']];

        $pre_q  = "SELECT * FROM `banner` WHERE `sr_no`=? ";  
        $res = select($pre_q,$values,'i');
        $img = mysqli_fetch_assoc($res);

        if(deleteImage($img['image'],BANNER_FOLDER))
        {
            $q = "DELETE FROM `banner` WHERE `sr_no`=? ";
            $res = delete($q, $values,'i');
            echo $res;
        }
        else
        {
            echo 0;
        }
    }

?>
